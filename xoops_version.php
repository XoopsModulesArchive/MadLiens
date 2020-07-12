<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2001 - 2006 <http://www.xoops.org/>
*
* Module: MadLiens 2.0
* Licence : GPL
* Authors :
*			- DuGris (http://www.dugris.info)
*/

$modversion['name'] = _MI_MADLIENS_NAME;
$modversion['version'] = 2.00;
$modversion['description'] = _MI_MADLIENS_DESC;
$modversion['author'] = _MI_MADLIENS_AUTHOR;
$modversion['credits'] = _MI_MADLIENS_CREDITS;
$modversion['help'] = _MI_MADLIENS_SUPPORT;
$modversion['help'] = "no";
$modversion['license'] = "GPL see LICENSE";
$modversion['official'] = "no";
$modversion['image'] = "images/MadLiens_slogo.png";
$modversion['dirname'] = "MadLiens";

// XoopsInfo
$modversion['developer_website_url'] 	= "http://www.dugris.info/";
$modversion['developer_website_name']	= "DuGris Website";
$modversion['download_website']			= "http://www.dugris.info/modules/wfdownloads/viewcat.php?cid=1";
$modversion['status_fileinfo'] 			= "http://www.dugris.info/version/MadLiens.version";
$modversion['status_version']				= "";
$modversion['status']						= "";
$modversion['date']							= "";
$modversion['demo_site_url']				= "";
$modversion['demo_site_name'] 			= "";
$modversion['support_site_url']			= "http://www.frxoops.org";
$modversion['support_site_name']			= "Xoops France";
$modversion['submit_bug']					= "";
$modversion['submit_feature']				= "";
// XoopsInfo

//install
$modversion['onInstall'] = 'include/MadLiens_install.php';
//update
$modversion['onUpdate'] = 'include/MadLiens_install.php';
//unInstall
// $modversion['onUninstall'] = '';

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

// Templates
$cpt=1;
$modversion['templates'][$cpt]['file'] = 'MadLiens_text.html';
$modversion['templates'][$cpt]['description'] = '';
$cpt++;
$modversion['templates'][$cpt]['file'] = 'MadLiens_img.html';
$modversion['templates'][$cpt]['description'] = '';
$cpt++;
$modversion['templates'][$cpt]['file'] = 'MadLiens_swf.html';
$modversion['templates'][$cpt]['description'] = '';
$cpt++;
$modversion['templates'][$cpt]['file'] = 'MadLiens_index.html';
$modversion['templates'][$cpt]['description'] = '';
$cpt++;
$modversion['templates'][$cpt]['file'] = 'MadLiens_dyn.html';
$modversion['templates'][$cpt]['description'] = '';

//	Module Configs

// Afficher les sous menus dans le menu principal
$arr = 0;
$modversion['config'][$arr]['name'] = 'liens_conf_display';
$modversion['config'][$arr]['title'] = '_MI_MADLIENS_DISPLAY';
$modversion['config'][$arr]['description'] = '';
$modversion['config'][$arr]['formtype'] = 'select';
$modversion['config'][$arr]['valuetype'] = 'int';
$modversion['config'][$arr]['default'] = 0;
$modversion['config'][$arr]['options'] = array('_MI_MADLIENS_CLASSIC' => 0,'_MI_MADLIENS_DYNAMIC' => 1);

$arr++;
$modversion['config'][$arr]['name'] = 'liens_conf_submenu';
$modversion['config'][$arr]['title'] = '_MI_MADLIENS_SUBMENU';
$modversion['config'][$arr]['description'] = '';
$modversion['config'][$arr]['formtype'] = 'yesno';
$modversion['config'][$arr]['valuetype'] = 'int';
$modversion['config'][$arr]['default'] = '0';

$arr++;
$modversion['config'][$arr]['name'] = 'liens_conf_header';
$modversion['config'][$arr]['title'] = '_MI_MADLIENS_HEADER';
$modversion['config'][$arr]['description'] = '';
$modversion['config'][$arr]['formtype'] = 'textarea';
$modversion['config'][$arr]['valuetype'] = 'text';
$modversion['config'][$arr]['default'] = _MI_MADLIENS_TEXT_HEADER;

$arr++;
$modversion['config'][$arr]['name'] = 'liens_conf_footer';
$modversion['config'][$arr]['title'] = '_MI_MADLIENS_FOOTER';
$modversion['config'][$arr]['description'] = '';
$modversion['config'][$arr]['formtype'] = 'textarea';
$modversion['config'][$arr]['valuetype'] = 'text';
$modversion['config'][$arr]['default'] = _MI_MADLIENS_TEXT_FOOTER;

$arr++;
$modversion['config'][$arr]['name'] = 'liens_conf_twidth';
$modversion['config'][$arr]['title'] = '_MI_MADLIENS_TEXT_WIDTH';
$modversion['config'][$arr]['description'] = '';
$modversion['config'][$arr]['formtype'] = 'text';
$modversion['config'][$arr]['valuetype'] = 'text';
$modversion['config'][$arr]['default'] = 60;

$arr++;
$modversion['config'][$arr]['name'] = 'liens_conf_theight';
$modversion['config'][$arr]['title'] = '_MI_MADLIENS_TEXT_HEIGHT';
$modversion['config'][$arr]['description'] = '';
$modversion['config'][$arr]['formtype'] = 'text';
$modversion['config'][$arr]['valuetype'] = 'text';
$modversion['config'][$arr]['default'] = 6;

$arr++;
$modversion['config'][$arr]['name'] = 'liens_conf_filesize';
$modversion['config'][$arr]['title'] = '_MI_MADLIENS_IMG_FSIZE';
$modversion['config'][$arr]['description'] = '';
$modversion['config'][$arr]['formtype'] = 'text';
$modversion['config'][$arr]['valuetype'] = 'text';
$modversion['config'][$arr]['default'] = "20000";

$arr++;
$modversion['config'][$arr]['name'] = 'liens_conf_width';
$modversion['config'][$arr]['title'] = '_MI_MADLIENS_IMG_WIDTH';
$modversion['config'][$arr]['description'] = '';
$modversion['config'][$arr]['formtype'] = 'text';
$modversion['config'][$arr]['valuetype'] = 'text';
$modversion['config'][$arr]['default'] = "468";

$arr++;
$modversion['config'][$arr]['name'] = 'liens_conf_height';
$modversion['config'][$arr]['title'] = '_MI_MADLIENS_IMG_HEIGHT';
$modversion['config'][$arr]['description'] = '';
$modversion['config'][$arr]['formtype'] = 'text';
$modversion['config'][$arr]['valuetype'] = 'text';
$modversion['config'][$arr]['default'] = "60";

$arr++;
$modversion['config'][$arr]['name'] = 'liens_conf_allowedtype';
$modversion['config'][$arr]['title'] = '_MI_MADLIENS_IMG_TYPE';
$modversion['config'][$arr]['description'] = '';
$modversion['config'][$arr]['formtype'] = 'textarea';
$modversion['config'][$arr]['valuetype'] = 'text';
$modversion['config'][$arr]['default'] = "image/gif\nimage/jpg\nimage/jpeg\nimage/pjpeg\nimage/x-png\nimage/png\napplication/x-shockwave-flash";

// affichage du lien TEXTE
$arr++;
$modversion['config'][$arr]['name'] = 'liens_txt_disp';
$modversion['config'][$arr]['title'] = '_MI_MADLIENS_AFF_TXT';
$modversion['config'][$arr]['description'] = '';
$modversion['config'][$arr]['formtype'] = 'yesno';
$modversion['config'][$arr]['valuetype'] = 'int';
$modversion['config'][$arr]['default'] = '1';

// affichage du lien BOUTON
$arr++;
$modversion['config'][$arr]['name'] = 'liens_btn_disp';
$modversion['config'][$arr]['title'] = '_MI_MADLIENS_AFF_BTN';
$modversion['config'][$arr]['description'] = '';
$modversion['config'][$arr]['formtype'] = 'yesno';
$modversion['config'][$arr]['valuetype'] = 'int';
$modversion['config'][$arr]['default'] = '1';

// nom du fichier pour le lien bouton
for ($i = 1; $i <= 10; $i++) {
	$arr++;
	$modversion['config'][$arr]['name'] = 'liens_btn_img' . $i;
	$modversion['config'][$arr]['title'] = '_MI_MADLIENS_IMG_BTN';
	$modversion['config'][$arr]['description'] = '';
	$modversion['config'][$arr]['formtype'] = 'textbox';
	$modversion['config'][$arr]['valuetype'] = 'text';
	if ($i == 1) {
		$modversion['config'][$arr]['default'] = 'xoops.png';
	} else {
		$modversion['config'][$arr]['default'] = 'blank.png';
	}
}

// affichage du lien LOGO
$arr++;
$modversion['config'][$arr]['name'] = 'liens_logo_disp';
$modversion['config'][$arr]['title'] = '_MI_MADLIENS_AFF_LOGO';
$modversion['config'][$arr]['description'] = '';
$modversion['config'][$arr]['formtype'] = 'yesno';
$modversion['config'][$arr]['valuetype'] = 'int';
$modversion['config'][$arr]['default'] = '1';

// nom du fichier logo
for ($i = 1; $i <= 10; $i++) {
	$arr++;
	$modversion['config'][$arr]['name'] = 'liens_logo_img' . $i;
	$modversion['config'][$arr]['title'] = '_MI_MADLIENS_IMG_LOGO';
	$modversion['config'][$arr]['description'] = '';
	$modversion['config'][$arr]['formtype'] = 'textbox';
	$modversion['config'][$arr]['valuetype'] = 'text';
	$modversion['config'][$arr]['default'] = 'blank.png';
	if ($i == 1) {
		$modversion['config'][$arr]['default'] = 'xoops.png';
	} else {
		$modversion['config'][$arr]['default'] = 'blank.png';
	}
}

// affichage du lien BANNIERE
$arr++;
$modversion['config'][$arr]['name'] = 'liens_ban_disp';
$modversion['config'][$arr]['title'] = '_MI_MADLIENS_AFF_BAN';
$modversion['config'][$arr]['description'] = '';
$modversion['config'][$arr]['formtype'] = 'yesno';
$modversion['config'][$arr]['valuetype'] = 'int';
$modversion['config'][$arr]['default'] = '1';

// nom du fichier BANNIERE
for ($i = 1; $i <= 10; $i++) {
	$arr++;
	$modversion['config'][$arr]['name'] = 'liens_ban_img' . $i;
	$modversion['config'][$arr]['title'] = '_MI_MADLIENS_IMG_BAN';
	$modversion['config'][$arr]['description'] = '';
	$modversion['config'][$arr]['formtype'] = 'textbox';
	$modversion['config'][$arr]['valuetype'] = 'text';
	$modversion['config'][$arr]['default'] = 'blank.png';
	if ($i == 1) {
		$modversion['config'][$arr]['default'] = 'xoops.swf';
	} else {
		$modversion['config'][$arr]['default'] = 'blank.png';
	}
}

// Menu
$modversion['hasMain'] = 1;

global $xoopsDB, $xoopsUser, $xoopsConfig, $xoopsModule, $xoopsModuleConfig;

include_once(XOOPS_ROOT_PATH.'/modules/MadLiens/include/common.php');
if (is_object($xoopsModule) && $xoopsModule->getVar('dirname') == $modversion['dirname'] && $xoopsModule->getVar('isactive')) {
	$display = MadLiens_GetOptions('liens_conf_submenu');
	if ($display) {
		if ( file_exists( XOOPS_ROOT_PATH . '/modules/MadLiens/language/' . $xoopsConfig['language'] . '/main.php' ) ) {
			include_once(XOOPS_ROOT_PATH . '/modules/MadLiens/language/' . $xoopsConfig['language'] . '/main.php');
		} else {
			include_once(XOOPS_ROOT_PATH . '/modules/MadLiens/language/french/main.php');
		}

		$cpt = 0;
		global $MadLiens;
		foreach ($MadLiens as $key => $links) {
			$modversion['sub'][$cpt]['name'] = $links['name'];
			$modversion['sub'][$cpt]['url'] = "index.php?id=" . $links['id'];
			$cpt++;
		}
	}
}
?>