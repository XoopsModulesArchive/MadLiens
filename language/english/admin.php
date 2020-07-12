<?php
/**
* Module: MadLiens 2.0
* Licence : GPL
* Authors :
*			- DuGris (http://www.dugris.info)
*/

define("_AM_MADLIENS_CONFIG",							"Configuration MADLIENS");

// Menu
define("_AM_MADLIENS_ADMENU0",						"Configuration");
define("_AM_MADLIENS_ADMENU1",						"Link text");
define("_AM_MADLIENS_ADMENU2",						"Button(s)");
define("_AM_MADLIENS_ADMENU3",						"Logo(s)");
define("_AM_MADLIENS_ADMENU4",						"Banner(s)");

define("_AM_MADLIENS_GOMOD", 							"Go to module");
define("_AM_MADLIENS_UPDATE_MODULE", 				"<font color='#CC0000'>Update module</font>");
define("_AM_MADLIENS_DB_CHECKTABLES", 				"Check tables");
define("_AM_MADLIENS_ABOUT", 							"About");

// new version
global $xoopsModule;
define("_AM_MADLIENS_NEWVERSION",					"<font color='#000099'>New module version</font>");
define("_AM_MADLIENS_MAKE_UPGRADE",					"A new version of <font color='#CC0000'>" . $xoopsModule->name() . "</font> is available<br />in downloading on this address :");
define("_AM_MADLIENS_NO_UPGRADE",					"You have the last version !!!");
define("_AM_MADLIENS_MAKE_UPDATE",					"The update of the module was not made : ");

define("_AM_MADLIENS_IMG_UPLOAD",					"Image uploading" );
?>