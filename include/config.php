<?php
/**
* Module: MadLiens 2.0
* Licence : GPL
* Authors :
*			- DuGris (http://www.dugris.info)
*/

if (!defined('XOOPS_ROOT_PATH')) { die('XOOPS root path not defined'); }

$MadLiensConfig = array (
	0 => array ('filter'			=> 'liens_conf%',
					'upload_url'	=> '',
					'upload_path'	=>'',
					'upload_type'	=> '',
					'linkname'		=> '',
					'linktype'		=> ''),

	1 => array ('filter'			=> 'liens_txt%',
					'upload_url'	=> '',
					'upload_path'	=>'',
					'upload_type'	=> '',
					'linkname'		=> _MI_MADLIENS_ADMENU1,
					'linktype'		=> 'text'),

	2 => array ('filter'			=> 'liens_btn%',
					'upload_url'	=> XOOPS_URL . '/uploads/' . MADLIENS_DIRNAME . '/button',
					'upload_path'	=> XOOPS_ROOT_PATH . '/uploads/' . MADLIENS_DIRNAME . '/button',
					'upload_type'	=> 'liens_btn_img',
					'linkname'		=> _MI_MADLIENS_ADMENU2,
					'linktype'		=> 'img'),

	3 => array ('filter'			=> 'liens_logo%',
					'upload_url'	=> XOOPS_URL . '/uploads/' . MADLIENS_DIRNAME . '/logo',
					'upload_path'	=> XOOPS_ROOT_PATH . '/uploads/' . MADLIENS_DIRNAME . '/logo',
					'upload_type'	=> 'liens_logo_img',
					'linkname'		=> _MI_MADLIENS_ADMENU3,
					'linktype'		=> 'img'),

	4 => array ('filter'			=> 'liens_ban%',
					'upload_url'	=> XOOPS_URL . '/uploads/' . MADLIENS_DIRNAME . '/banner',
					'upload_path'	=> XOOPS_ROOT_PATH . '/uploads/' . MADLIENS_DIRNAME . '/banner',
					'upload_type'	=> 'liens_ban_img',
					'linkname'		=> _MI_MADLIENS_ADMENU4,
					'linktype'		=> 'img'),

);
?>