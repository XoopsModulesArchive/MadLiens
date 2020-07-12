<?php
/**
* Module: MadLiens 2.0
* Licence : GPL
* Authors :
*			- DuGris (http://www.dugris.info)
*/

include("../../mainfile.php");
include_once(XOOPS_ROOT_PATH.'/modules/MadLiens/include/common.php');

if ( $xoopsModuleConfig['liens_conf_display'] == 0 ) {
	$xoopsOption['template_main'] = 'MadLiens_index.html';
} else {
	$xoopsOption['template_main'] = 'MadLiens_dyn.html';
}
include(XOOPS_ROOT_PATH."/header.php");

$id = empty($_REQUEST['id']) ? 0 : $_REQUEST['id'];

// Affichage du titre en fonction du theme
$xoopsTpl->assign( 'module_title', $myts->displayTarea( $xoopsModule->getVar('name', 'E') ));
// Affichage du titre en fonction du theme

$xoopsTpl->assign('lang_header',		$myts->displayTarea(MadLiens_GetOptions('liens_conf_header'),1 ));
$xoopsTpl->assign('lang_footer', 	$myts->displayTarea(MadLiens_GetOptions('liens_conf_footer'),1 ));
$xoopsTpl->assign('textarea_width',	MadLiens_GetOptions('liens_conf_twidth') );
$xoopsTpl->assign('textarea_height',MadLiens_GetOptions('liens_conf_theight') );

foreach ($MadLiens as $key => $liens) {
	if ($id == 0) {
		$id = $liens['id'];
	}
}
//$MadLiens = $MadLiensObj->getConfigValue();
$xoopsTpl->assign('Madliens', $MadLiens);
$xoopsTpl->assign('current', $id);

include(XOOPS_ROOT_PATH."/footer.php");
?>