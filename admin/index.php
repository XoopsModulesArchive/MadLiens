<?php
/**
* Module: MadLiens 2.0
* Licence : GPL
* Authors :
*			- DuGris (http://www.dugris.info)
*/

include_once("admin_header.php");

if ( getenv('REQUEST_METHOD') && getenv('REQUEST_METHOD') == 'POST' && $save == 'save' ) {
	// UPLOAD FILES
	if ( array_key_exists('xoops_upload_file', $_REQUEST) ) {
		include_once(XOOPS_ROOT_PATH."/class/uploader.php");

		$upload = true;
		$max_size = MadLiens_GetOptions('liens_conf_filesize');
		$max_imgwidth = MadLiens_GetOptions('liens_conf_width');
		$max_imgheight = MadLiens_GetOptions('liens_conf_height');
		$allowed_mimetypes = array_walk(explode("\n",MadLiens_GetOptions('liens_conf_allowedtype')),'trim');
		$upload_type = $MadLiensConfig[$op]['upload_type'];
		$upload_path = $MadLiensConfig[$op]['upload_path'];

		foreach ($_REQUEST['xoops_upload_file'] as $key => $filename) {
			if( !empty( $filename ) || $filename != "" ) {
				if( !empty($_FILES[$filename]['tmp_name']) && is_readable( $_FILES[$filename]['tmp_name'] ) ) {
					$uploader = new XoopsMediaUploader($upload_path, $allowed_mimetypes, $max_size, $max_imgwidth, $max_imgheight);
					if( $uploader->fetchMedia( $filename ) && $uploader->upload() ) {
						$upload = true;
						$_REQUEST[$upload_type . ($key+1) ] = $uploader->getSavedFileName();
					} else {
						$upload = false;
						echo $uploader->getErrors();
					}
				}
			}
		}
	}

	foreach ($_REQUEST['conf_ids'] as $key => $conf_id) {
		$config =& $config_handler->getConfig( $conf_id );
		$new_value = $_REQUEST[ $config->getVar('conf_name')] ;
		$config->setConfValueForInput($new_value);
		$config_handler->insertConfig($config);
	}
	redirect_header("index.php?op=$op",1,_MD_AM_DBUPDATED);
}


xoops_cp_header();
echo '<script type="text/javascript" src="' . MADLIENS_URL . 'include/js/MadLiens.js"></script>';
if ( $op == -1 && getenv('REQUEST_METHOD') ) {
	MadLiens_adminMenu( $op );
	MadLiens_GetLastVersion();
} elseif ( $op == 1 && getenv('REQUEST_METHOD') ) {
	MadLiens_adminMenu( $op, _AM_MADLIENS_ADMENU1 );
	$MadLiensObj->getFormConfig( $op, _AM_MADLIENS_ADMENU1 );
} elseif ( $op == 2 && getenv('REQUEST_METHOD') ) {
	MadLiens_adminMenu( $op, _AM_MADLIENS_ADMENU2 );
	$MadLiensObj->getFormConfig( $op, _AM_MADLIENS_ADMENU2 );
} elseif ( $op == 3 && getenv('REQUEST_METHOD') ) {
	MadLiens_adminMenu( $op, _AM_MADLIENS_ADMENU3 );
	$MadLiensObj->getFormConfig( $op, _AM_MADLIENS_ADMENU3 );
} elseif ( $op == 4 && getenv('REQUEST_METHOD') ) {
	MadLiens_adminMenu( $op, _AM_MADLIENS_ADMENU4 );
	$MadLiensObj->getFormConfig( $op, _AM_MADLIENS_ADMENU4 );
} else {
	MadLiens_adminMenu(0, _AM_MADLIENS_ADMENU0);
	$MadLiensObj->getFormConfig( 0, _AM_MADLIENS_ADMENU0 );
}

include_once("admin_footer.php");
?>