<?php
/**
* Module: MadLiens 2.0
* Licence : GPL
* Authors :
*			- DuGris (http://www.dugris.info)
*/

if (!defined('XOOPS_ROOT_PATH')) { die('XOOPS root path not defined'); }

class MadLiens {

	var $filter;
	var $upload_url = '';
	var $upload_path = '';
	var $linkname = '';
	var $linktype = '';
	var $linknb = 4;

	function MadLiens ( $MadLiensConfig ) {
		$this->config = array();
		$this->moduleinfo = MadLiens_getModuleInfo();
		$this->MadLiensConfig = $MadLiensConfig;
	}

	function getFormConfig( $configType = 0, $formTitle = '') {
		$this->getConfigOptions( $configType );
		$form = new XoopsThemeForm($formTitle, $this->moduleinfo->dirname(), 'index.php');
		$form->setExtra('enctype="multipart/form-data"');

		$confcount = count($this->config);
		foreach ($this->config as $i => $confopt) {
			$config_handler =& xoops_gethandler('config');
			$title = (!defined($this->config[$i]->getVar('conf_desc')) || constant($this->config[$i]->getVar('conf_desc')) == '') ? constant($this->config[$i]->getVar('conf_title')) : constant($this->config[$i]->getVar('conf_title')).'<br /><br /><span style="font-weight:normal;">'.constant($this->config[$i]->getVar('conf_desc')).'</span>';
			switch ($this->config[$i]->getVar('conf_formtype')) {
			case 'textarea':
				$myts =& MyTextSanitizer::getInstance();
				if ($this->config[$i]->getVar('conf_valuetype') == 'array') {
					// this is exceptional.. only when value type is arrayneed a smarter way for this
					$ele = ($this->config[$i]->getVar('conf_value') != '') ? new XoopsFormTextArea($title, $this->config[$i]->getVar('conf_name'), $myts->htmlspecialchars(implode('|', $this->config[$i]->getConfValueForOutput())), 5, 50) : new XoopsFormTextArea($title, $this->config[$i]->getVar('conf_name'), '', 5, 50);
				} else {
					if ( strstr($this->config[$i]->getVar('conf_name'), 'allowedtype') ) {
						$ele = new XoopsFormTextArea($title, $this->config[$i]->getVar('conf_name'), $myts->htmlspecialchars($this->config[$i]->getConfValueForOutput()), 5, 50);
					} else {
						$ele = new XoopsFormDhtmlTextArea($title, $this->config[$i]->getVar('conf_name'), $myts->htmlspecialchars($this->config[$i]->getConfValueForOutput()), 5, 70);
					}
				}
				break;

			case 'select':
				$ele = new XoopsFormSelect($title, $this->config[$i]->getVar('conf_name'), $this->config[$i]->getConfValueForOutput());
				$options = $config_handler->getConfigOptions(new Criteria('conf_id', $this->config[$i]->getVar('conf_id')));
				$opcount = count($options);
				for ($j = 0; $j < $opcount; $j++) {
					$optval = defined($options[$j]->getVar('confop_value')) ? constant($options[$j]->getVar('confop_value')) : $options[$j]->getVar('confop_value');
					$optkey = defined($options[$j]->getVar('confop_name')) ? constant($options[$j]->getVar('confop_name')) : $options[$j]->getVar('confop_name');
					$ele->addOption($optval, $optkey);
				}
				break;

			case 'select_multi':
				$ele = new XoopsFormSelect($title, $this->config[$i]->getVar('conf_name'), $this->config[$i]->getConfValueForOutput(), 5, true);
				$options =& $config_handler->getConfigOptions(new Criteria('conf_id', $this->config[$i]->getVar('conf_id')));
				$opcount = count($options);
				for ($j = 0; $j < $opcount; $j++) {
					$optval = defined($options[$j]->getVar('confop_value')) ? constant($options[$j]->getVar('confop_value')) : $options[$j]->getVar('confop_value');
					$optkey = defined($options[$j]->getVar('confop_name')) ? constant($options[$j]->getVar('confop_name')) : $options[$j]->getVar('confop_name');
					$ele->addOption($optval, $optkey);
				}
				break;

			case 'yesno':
				$ele = new XoopsFormRadioYN($title, $this->config[$i]->getVar('conf_name'), $this->config[$i]->getConfValueForOutput(), _YES, _NO);
				break;

			case 'timezone':
				$ele = new XoopsFormSelectTimezone($title, $this->config[$i]->getVar('conf_name'), $this->config[$i]->getConfValueForOutput());
				break;

			case 'color':
				$myts =& MyTextSanitizer::getInstance();
				$ele = new XoopsFormColorPicker($title, $this->config[$i]->getVar('conf_name'), $myts->htmlspecialchars($this->config[$i]->getConfValueForOutput()));
				break;

			case 'hidden':
				$myts =& MyTextSanitizer::getInstance();
				$ele = new XoopsFormHidden( $this->config[$i]->getVar('conf_name'), $myts->htmlspecialchars( $this->config[$i]->getConfValueForOutput() ) );
				break;

			case 'textbox':
			default:
				$myts =& MyTextSanitizer::getInstance();

				if ( strstr($this->config[$i]->getVar('conf_name'), 'img') ) {
					$ele = new XoopsFormElementTray($title, '&nbsp;');

					$img_path = $this->upload_url . '/';
					$conf_value = $this->config[$i]->getVar('conf_value') ;
					$img_value  = $this->config[$i]->getVar('conf_value') ;
               if ( empty($conf_value) ) {
               	$conf_value = 'blank.png';
               	$img_value	 = 'blank.png';
               }

					// IMAGE SELECTOR
					$image_array = MadLiensLists :: getMediaListAsArray( $this->upload_path );
					$image_select = new XoopsFormSelect( '', $this->config[$i]->getVar('conf_name'), $this->config[$i]->getVar('conf_value') );
					$image_select->addOptionArray( $image_array );
					$image_select->setExtra( "onchange='showMediaSelected(\"image" . $i . "\", \"" . $this->config[$i]->getVar('conf_name') . "\", \"" .  "\", \"\", \"" . $this->upload_url . "\", \"" . MADLIENS_IMAGE_URL . "\")'" );
					$ele->addElement( $image_select );
					if ( strstr($conf_value, '.swf') ) {
						$img_value = 'swf_icon.gif';
						$img_path  = MADLIENS_IMAGE_URL;
					}
					$ele->addElement( new XoopsFormLabel( '', "<br /><img src='" . $img_path . $img_value . "' name='image" . $i . "' id='image" . $i . "' alt='' />" ) );

					// IMAGE UPLOAD
					$max_size = 1000000;
					$image_down = new XoopsFormFile('<br />', 'file_download' . $i , $max_size);
					$image_down->setExtra( "size ='30'") ;
					$ele->addElement($image_down);
					unset($image_array);
					unset($image_select);
					unset($image_down);

				} else {
					$ele = new XoopsFormText($title, $this->config[$i]->getVar('conf_name'), 30, 255, $myts->htmlspecialchars($this->config[$i]->getConfValueForOutput()));
				}

				break;
			}
			$hidden = new XoopsFormHidden('conf_ids[]', $this->config[$i]->getVar('conf_id'));
			$form->addElement($ele);
			$form->addElement($hidden);
			unset($conf_value);
			unset($ele);
			unset($hidden);
		}
		$form->addElement(new XoopsFormHidden('op', $configType));
		$form->addElement(new XoopsFormHidden('save', 'save'));
		$form->addElement(new XoopsFormButton('', 'button', _GO, 'submit'));

		$form->display();
	}

	function getConfigValue( ) {
		global $xoopsConfig, $swfObj;
		$return = array();
		for ($cpt=1; $cpt <= $this->linknb; $cpt++) {
			$this->getConfigOptions( $cpt );
			$display = false;
			foreach ( $this->config as $i => $config) {
            if ( !$display && strstr($this->config[$i]->getVar('conf_name'), 'disp') ) {
            	if ( $this->config[$i]->getVar('conf_value') ) {
            		if ( $this->config[$i]->getVar('conf_name') == 'liens_txt_disp' ) {
	            		$return[$cpt]['type'] = $this->linktype;
   	         		$return[$cpt]['name'] = $this->linkname;
      	      		$return[$cpt]['id']	 = $cpt;
	            		$return[$cpt]['links'][$i]['type'] 	 = $this->linktype;
      	      	}
						$display = true;
            	}
				} elseif ($display) {
					if ( $this->config[$i]->getVar('conf_value') != 'blank.png' ) {
						$title = $xoopsConfig['sitename'];
            		if (!empty($xoopsConfig['slogan'])) {
            			$title .= ' : ' . $xoopsConfig['slogan'];
            		}
            		$return[$cpt]['type'] = $this->linktype;
  	         		$return[$cpt]['name'] = $this->linkname;
     	      		$return[$cpt]['id']	 = $cpt;
            		$return[$cpt]['links'][$i]['img'] 	 = $this->upload_url . '/' . $this->config[$i]->getVar('conf_value');
            		$return[$cpt]['links'][$i]['alt']    = $title;
            		$return[$cpt]['links'][$i]['script'] = "<a href='" . XOOPS_URL . "/'><img src='" . $this->upload_url . '/' . $this->config[$i]->getVar('conf_value') . "' border='0' title='" . $title . "' /></a>";
            		$return[$cpt]['links'][$i]['type'] 	 = "img";
            		if(strtolower(substr($this->config[$i]->getVar('conf_value'),strrpos($this->config[$i]->getVar('conf_value'),".")))==".swf") {
            			$swfObj->loadswf( $this->upload_url . '/' . $this->config[$i]->getVar('conf_value') ) ;
	            		$return[$cpt]['links'][$i]['type'] 	 = "swf";
	            		$return[$cpt]['links'][$i]['width'] = $swfObj->width;
	            		$return[$cpt]['links'][$i]['height'] = $swfObj->height;
            		}
					}
				}
			}
		}
		return( $return );
	}

	function getConfigOptions ( $configType = 0) {
		$this->filter			= $this->MadLiensConfig[$configType]['filter'];
		$this->upload_url		= $this->MadLiensConfig[$configType]['upload_url'];
		$this->upload_path	= $this->MadLiensConfig[$configType]['upload_path'];
		$this->linktype		= $this->MadLiensConfig[$configType]['linktype'];
		$this->linkname		= $this->MadLiensConfig[$configType]['linkname'];

		$config_handler =& xoops_gethandler('config');
		$criteria = new CriteriaCompo(new Criteria('conf_modid', $this->moduleinfo->mid() ));
		$criteria->add(new Criteria('conf_name', $this->filter , 'like'));
		$criteria->setSort('conf_order');
		$this->config = $config_handler->getConfigs($criteria, true);
	}

}
?>