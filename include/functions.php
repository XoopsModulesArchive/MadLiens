<?php
/**
* Module: MadLiens 2.0
* Licence : GPL
* Authors :
*			- DuGris (http://www.dugris.info)
*/

if (!defined('XOOPS_ROOT_PATH')) { die('XOOPS root path not defined'); }

function MadLiens_adminMenu($currentoption = 0, $breadcrumb = '') {
	/* Nice buttons styles */
	echo "<style type='text/css'>
			#buttontop { float:left; width:100%; background: #e7e7e7; font-size:93%; line-height:normal; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; margin: 0; }
			#buttonbar { float:left; width:100%; background: #e7e7e7 url('" . MADLIENS_URL . "/images/bg.gif') repeat-x left bottom; font-size:93%; line-height:normal; border-left: 1px solid black; border-right: 1px solid black; margin-bottom: 12px; }
			#buttonbar ul { margin:0; margin-top: 15px; padding:10px 10px 0; list-style:none; }
			#buttonbar li { display:inline; margin:0; padding:0; }
			#buttonbar a { float:left; background:url('" . MADLIENS_URL . "/images/left_both.gif') no-repeat left top; margin:0; padding:0 0 0 9px; border-bottom:1px solid #000; text-decoration:none; }
			#buttonbar a span { float:left; display:block; background:url('" . MADLIENS_URL . "images/right_both.gif') no-repeat right top; padding:5px 15px 4px 6px; font-weight:bold; color:#765; }
			/* Commented Backslash Hack hides rule from IE5-Mac \*/
			#buttonbar a span {float:none;}
			/* End IE5-Mac hack */
			#buttonbar a:hover span { color:#333; }
			#buttonbar #current a { background-position:0 -150px; border-width:0; }
			#buttonbar #current a span { background-position:100% -150px; padding-bottom:5px; color:#333; }
			#buttonbar a:hover { background-position:0% -150px; }
			#buttonbar a:hover span { background-position:100% -150px; }
			</style>";

	global $xoopsModule, $xoopsConfig;
	$myts = &MyTextSanitizer::getInstance();

	$tblColors = Array_Fill(0,8,'');
	$tblColors[$currentoption] = 'current';

	if (file_exists(MADLIENS_ROOT_PATH . 'language/' . $xoopsConfig['language'] . '/modinfo.php')) {
		include_once MADLIENS_ROOT_PATH . 'language/' . $xoopsConfig['language'] . '/modinfo.php';
	} else {
		include_once MADLIENS_ROOT_PATH . 'language/french/modinfo.php';
	}

	include_once MADLIENS_ROOT_PATH . 'admin/menu.php';

	echo '<div id="buttontop">';
	echo '<table style="width: 100%; padding: 0;" cellspacing="0"><tr>';
	echo '<td style="font-size: 10px; text-align: left; color: #2F5376; padding: 0 6px; line-height: 18px;">';
	for( $i=0; $i<count($headermenu); $i++ ){
		echo '<a class="nobutton" href="' . $headermenu[$i]['link'] .'">' . $headermenu[$i]['title'] . '</a> ';
		if ($i < count($headermenu)-1) {
			echo "| ";
		}
	}
	echo '</td>';
	echo '<td style="font-size: 10px; text-align: right; color: #2F5376; padding: 0 6px; line-height: 18px;">' . $breadcrumb . '</td>';
	echo '</tr></table>';
	echo '</div>';

	echo '<div id="buttonbar">';
	echo "<ul>";

	for( $i=0; $i<count($adminmenu); $i++ ){
		echo '<li id="' . $tblColors[$i] . '"><a href="' . MADLIENS_URL . $adminmenu[$i]['link'] . '"><span>' . $adminmenu[$i]['title'] . '</span></a></li>';
	}
	echo '</ul></div>';
	echo '<div style="float:left; width:100%">';
}

function MadLiens_getAllowedTypes( $allowedType ) {
	$ret = array();
	$myarray = explode("|", $allowedType);
	foreach ($myarray as $key => $typemine) {
		$ret[$key] = "image/" . $typemine;
	}
	return $ret;
}

function MadLiens_get_copywrit() {
	echo "<div style='margin-top:10px'><span style='float: right; text-align: right; '>
			<a target='_blank' href='http://www.dugris.info/'><img src='" . MADLIENS_IMAGE_URL . "MadLiens.gif' border='0' align='absmiddle'></a>
			</span></div></div>";
}

function &MadLiens_getModuleInfo() {
    static $MadLiensModule;
	if (!isset($MadLiensModule)) {
	    global $xoopsModule;
	    if (isset($xoopsModule) && is_object($xoopsModule) && $xoopsModule->getVar('dirname') == 'MadLiens') {
	        $MadLiensModule =& $xoopsModule;
	    }
	    else {
	        $hModule = &xoops_gethandler('module');
	        $MadLiensModule = $hModule->getByDirname('MadLiens');
	    }
	}
	return $MadLiensModule;
}

function MadLiens_GetOptions($option, $repmodule='MadLiens')
{
	global $xoopsModuleConfig, $xoopsModule;
	static $tbloptions= Array();
	if(is_array($tbloptions) && array_key_exists($option,$tbloptions)) {
		return $tbloptions[$option];
	}

	$retval=false;
	if (isset($xoopsModuleConfig) && (is_object($xoopsModule) && $xoopsModule->getVar('dirname') == $repmodule && $xoopsModule->getVar('isactive'))) {
		if(isset($xoopsModuleConfig[$option])) {
			$retval= $xoopsModuleConfig[$option];
		}
	} else {
		$module_handler =& xoops_gethandler('module');
		$module =& $module_handler->getByDirname($repmodule);
		$config_handler =& xoops_gethandler('config');
		if ($module) {
		    $moduleConfig =& $config_handler->getConfigsByCat(0, $module->getVar('mid'));
	    	if(isset($moduleConfig[$option])) {
	    		$retval= $moduleConfig[$option];
	    	}
		}
	}
	$tbloptions[$option]=$retval;
	return $retval;
}

function MadLiens_GetLastVersion() {
	@include_once('../xoops_version.php');
	$version = @file_get_contents($modversion['status_fileinfo']);
	if ($version) {
		if ($version > ($GLOBALS['xoopsModule']->getVar('version')/100) ) {
			echo '<div class="bg1" style="margin:20px 100px; padding:5px; border:2px solid #FF0000; text-align:center; font-weight:bold;">';
			echo _AM_MADLIENS_MAKE_UPGRADE . '<a href="' ;
			if ( array_key_exists( 'download_website', $modversion ) && $modversion['download_website']!= '' ) {
				echo $modversion['download_website'] . '" target="_blank"><br /><br /><font color="#0000CC">' . $modversion['developer_website_name'];
			} else {
				echo $modversion['developer_website_url'] . '" target="_blank"><br /><br /><font color="#0000CC">' . $modversion['developer_website_name'];
			}
			echo '</font></a>';
			echo '</div>';
		} else {
			echo '<div class="bg1" style="margin:20px 100px; padding:5px; border:2px solid #FF0000; text-align:center; font-weight:bold;">';
			echo _AM_MADLIENS_NO_UPGRADE;
			echo '</div>';
		}
	}
}

function MadLiens_UpdatedModule() {
	global $modversion;
	if ( $modversion['version'] != ($GLOBALS['xoopsModule']->getVar('version')/100) ) {
		$redirect = XOOPS_URL . '/modules/system/admin.php?fct=modulesadmin&op=update&module=' . $GLOBALS['xoopsModule']->getVar('dirname');
		redirect_header( $redirect , 3, _AM_MADLIENS_MAKE_UPDATE ) ;
	}
}

/**
 * Copy a file, or a folder and its contents
 *
 * @author      Aidan Lister <aidan@php.net>
 * @version     1.0.0
 * @param       string   $source    The source
 * @param       string   $dest      The destination
 * @return      bool     Returns true on success, false on failure
 */
function MadLiens_copyr($source, $dest)
{
    // Simple copy for a file
    if (is_file($source)) {
        return copy($source, $dest);
    }

    // Make destination directory
    if (!is_dir($dest)) {
        mkdir($dest);
    }

    // Loop through the folder
    $dir = dir($source);
    while (false !== $entry = $dir->read()) {
        // Skip pointers
        if ($entry == '.' || $entry == '..') {
            continue;
        }

        // Deep copy directories
        if (is_dir("$source/$entry") && ($dest !== "$source/$entry")) {
            copyr("$source/$entry", "$dest/$entry");
        } else {
            copy("$source/$entry", "$dest/$entry");
        }
    }

    // Clean up
    $dir->close();
    return true;
}

function MadLiens_create_dir( $directory = '' ) {
	$thePath = XOOPS_ROOT_PATH . '/uploads/' . $directory . '/';

	if(@is_writable($thePath)){
		MadLiens_admin_chmod($thePath, $mode = 0777);
		return $thePath;
	} elseif(!@is_dir($thePath)) {
		MadLiens_admin_mkdir($thePath);
		return $thePath;
	}
	return 0;
}

/**
* Thanks to the NewBB2 Development Team
*/
function MadLiens_admin_mkdir($target)
{
	// http://www.php.net/manual/en/function.mkdir.php
	// saint at corenova.com
	// bart at cdasites dot com
	if (is_dir($target) || empty($target)) {
		return true; // best case check first
	}

	if (file_exists($target) && !is_dir($target)) {
		return false;
	}

	if (MadLiens_admin_mkdir(substr($target,0,strrpos($target,'/')))) {
		if (!file_exists($target)) {
			$res = mkdir($target, 0777); // crawl back up & create dir tree
			MadLiens_admin_chmod($target);
	  	    return $res;
	  }
	}
    $res = is_dir($target);
	return $res;
}

/**
* Thanks to the NewBB2 Development Team
*/
function MadLiens_admin_chmod($target, $mode = 0777)
{
	return @chmod($target, $mode);
}
?>