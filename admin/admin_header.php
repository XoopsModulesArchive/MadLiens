<?php
/**
* Module: MadLiens 2.0
* Licence : GPL
* Authors :
*			- DuGris (http://www.dugris.info)
*/

include('../../../mainfile.php');
include_once(XOOPS_ROOT_PATH . '/class/xoopsmodule.php');
include_once(XOOPS_ROOT_PATH . '/include/cp_header.php');
include_once(XOOPS_ROOT_PATH . '/include/cp_functions.php');
include_once(XOOPS_ROOT_PATH . '/class/xoopslists.php');
include_once(XOOPS_ROOT_PATH . '/class/xoopsformloader.php');

@include_once( XOOPS_ROOT_PATH.'/modules/MadLiens/xoops_version.php' );
include_once(XOOPS_ROOT_PATH.'/modules/MadLiens/include/common.php');


if ( !file_exists( $lang_file = XOOPS_ROOT_PATH . '/modules/system/language/' . $xoopsConfig['language'] . '/admin.php' ) ) {
	$lang_file = XOOPS_ROOT_PATH . '/modules/system/language/english/admin.php';
}
include_once($lang_file);

$myts =& MyTextSanitizer::getInstance();


$myts =& MyTextSanitizer::getInstance();

$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : 0;
$save = isset($_REQUEST['save']) ? $_REQUEST['save'] : '';


if ( basename(getenv('PHP_SELF')) == 'index.php') {
	MadLiens_UpdatedModule();
}
?>