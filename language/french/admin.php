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
define("_AM_MADLIENS_ADMENU1",						"Lien texte");
define("_AM_MADLIENS_ADMENU2",						"Bouton(s)");
define("_AM_MADLIENS_ADMENU3",						"Logo(s)");
define("_AM_MADLIENS_ADMENU4",						"Bannière(s)");

define("_AM_MADLIENS_GOMOD", 							"Aller au module");
define("_AM_MADLIENS_UPDATE_MODULE", 				"Mise-à-jour du module");
define("_AM_MADLIENS_DB_CHECKTABLES", 				"Vérifier les tables");
define("_AM_MADLIENS_ABOUT", 							"a propos");

// new version
global $xoopsModule;
define("_AM_MADLIENS_NEWVERSION",					"<font color='#009900'>Nouvelle version</font>");
define("_AM_MADLIENS_MAKE_UPGRADE",					"Une nouvelle version de <font color='#CC0000'>" . $xoopsModule->name() . "</font> est disponible<br />en téléchargement à cette adresse :");
define("_AM_MADLIENS_NO_UPGRADE",					"Vous avez la dernière version !!!");
define("_AM_MADLIENS_MAKE_UPDATE",					"La mise à jour du module n'a pas été effectuée : ");

define("_AM_MADLIENS_IMG_UPLOAD",					"Téléchargement d'images" );

?>