<?php
/**
* Module: MadLiens 2.0
* Licence : GPL
* Authors :
*			- DuGris (http://www.dugris.info)
*/

if (!defined('XOOPS_ROOT_PATH')) { die('XOOPS root path not defined'); }

if( !defined('MADLIENS_DIRNAME') ){
	define('MADLIENS_DIRNAME', 'MadLiens');
}

if( !defined('MADLIENS_URL') ){
	define('MADLIENS_URL', XOOPS_URL . '/modules/' . MADLIENS_DIRNAME . '/');
}

if( !defined('MADLIENS_ROOT_PATH') ){
	define('MADLIENS_ROOT_PATH', XOOPS_ROOT_PATH.'/modules/'.MADLIENS_DIRNAME.'/');
}

if( !defined('MADLIENS_IMAGE_URL') ){
	define('MADLIENS_IMAGE_URL', MADLIENS_URL . 'images/');
}

if( !defined('MADLIENS_IMAGE_PATH') ){
	define('MADLIENS_IMAGE_PATH', MADLIENS_ROOT_PATH . 'images/');
}


$common_lang_file = MADLIENS_ROOT_PATH . "language/" . $xoopsConfig['language'] . "/modinfo.php";
if (!file_exists($common_lang_file)) {
	$common_lang_file = MADLIENS_ROOT_PATH . "language/french/modinfo.php";
}
include_once($common_lang_file);

include_once(XOOPS_ROOT_PATH . "/class/xoopslists.php");
include_once(XOOPS_ROOT_PATH . '/class/module.textsanitizer.php');
$myts =& MyTextSanitizer::getInstance();

include_once(MADLIENS_ROOT_PATH . 'include/config.php');
include_once(MADLIENS_ROOT_PATH . 'include/functions.php');
include_once(MADLIENS_ROOT_PATH . 'class/class.MadLiensLists.php');
include_once(MADLIENS_ROOT_PATH . 'class/class.swfheader.php');
include_once(MADLIENS_ROOT_PATH . 'class/class.MadLiens.php');

if (isset($_REQUEST)) {
	foreach ($_REQUEST as $k => $v) {
		$$k = $v;
	}
}
$op = isset($op) ? $op : 0;

global $xoopsModule;
if (is_object($xoopsModule) && $xoopsModule->getVar('dirname') == MADLIENS_DIRNAME && $xoopsModule->getVar('isactive')) {
	global $MadLiensConfig;
	$swfObj = new swfheader(false) ;
	$MadLiensObj = new MadLiens( $MadLiensConfig );
	$MadLiens = $MadLiensObj->getConfigValue();
}
?>