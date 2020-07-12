<?php
/**
* Module: epetitions
* Version : 1.0
* Author: DuGris aka L. Jen <http://www.dugris.info>
* Licence: GPL see LICENSE
*/

$i=0;
$adminmenu[$i]['title'] =_MI_MADLIENS_ADMENU0;
$adminmenu[$i]['link'] = 'admin/index.php?op=0';

$i++;
$adminmenu[$i]['title'] = _MI_MADLIENS_ADMENU1;
$adminmenu[$i]['link'] = 'admin/index.php?op=1';

$i++;
$adminmenu[$i]['title'] = _MI_MADLIENS_ADMENU2;
$adminmenu[$i]['link'] = 'admin/index.php?op=2';

$i++;
$adminmenu[$i]['title'] = _MI_MADLIENS_ADMENU3;
$adminmenu[$i]['link'] = 'admin/index.php?op=3';

$i++;
$adminmenu[$i]['title'] = _MI_MADLIENS_ADMENU4;
$adminmenu[$i]['link'] = 'admin/index.php?op=4';

if (isset($xoopsModule)) {
	$i = 0;
	$headermenu[$i]['title'] = _PREFERENCES;
	$headermenu[$i]['link'] = '../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod=' . $xoopsModule->getVar('mid');

	$i++;
	$headermenu[$i]['title'] = _AM_MADLIENS_GOMOD;
	$headermenu[$i]['link'] = MADLIENS_URL;

	$i++;
	$headermenu[$i]['title'] = _AM_MADLIENS_UPDATE_MODULE;
	$headermenu[$i]['link'] = XOOPS_URL . '/modules/system/admin.php?fct=modulesadmin&op=update&module=' . $xoopsModule->getVar('dirname');

	$i++;
	$headermenu[$i]['title'] = _AM_MADLIENS_NEWVERSION;
	$headermenu[$i]['link'] = 'index.php?op=-1';
}
?>