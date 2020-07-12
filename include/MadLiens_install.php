<?php
/**
* Module: MadLiens 2.0
* Licence : GPL
* Authors :
*			- DuGris (http://www.dugris.info)
*/

error_reporting(E_ALL);
if( !defined('MADLIENS_DIRNAME') ){
	define('MADLIENS_DIRNAME', 'MadLiens');
}

include_once XOOPS_ROOT_PATH.'/modules/' . MADLIENS_DIRNAME . '/include/common.php';

$img_source = MADLIENS_ROOT_PATH . 'images/blank.png';
$ind_source = XOOPS_ROOT_PATH . '/uploads/index.html';

$dest = MadLiens_create_dir( MADLIENS_DIRNAME );
if ($dest) {
	$img_dest = $dest . 'blank.png';
	$ind_dest = $dest . 'index.html';
	MadLiens_copyr($img_source, $img_dest);
	MadLiens_copyr($ind_source, $ind_dest);
}

$dest = MadLiens_create_dir( MADLIENS_DIRNAME . '/button' );
if ($dest) {
	$img_dest = $dest . 'blank.png';
	$ind_dest = $dest . 'index.html';
	MadLiens_copyr($img_source, $img_dest);
	MadLiens_copyr($ind_source, $ind_dest);
}

$dest = MadLiens_create_dir( MADLIENS_DIRNAME . '/logo' );
if ($dest) {
	$img_dest = $dest . 'blank.png';
	$ind_dest = $dest . 'index.html';
	MadLiens_copyr($img_source, $img_dest);
	MadLiens_copyr($ind_source, $ind_dest);
}

$dest = MadLiens_create_dir( MADLIENS_DIRNAME . '/banner' );
if ($dest) {
	$img_dest = $dest . 'blank.png';
	$ind_dest = $dest . 'index.html';
	MadLiens_copyr($img_source, $img_dest);
	MadLiens_copyr($ind_source, $ind_dest);
}
?>