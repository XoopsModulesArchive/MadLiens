<?php
/**
* Module: MadLiens 2.0
* Licence : GPL
* Authors :
*			- DuGris (http://www.dugris.info)
*/

if ( !defined("MADLIENS_LISTS_INCLUDED") ) {
	define("MADLIENS_LISTS_INCLUDED",1);
	class MadLiensLists {

		/*
		*  gets list of image file names in a directory
		*/
		function getMediaListAsArray($dirname, $prefix="") {
			$filelist = array();
			if ($handle = opendir($dirname)) {
				while (false !== ($file = readdir($handle))) {
					if ( preg_match("/(\.gif|\.jpg|\.png|\.swf)$/i", $file) ) {
						$file = $prefix.$file;
						$filelist[$file] = $file;
					}
				}
				closedir($handle);
				asort($filelist);
				reset($filelist);
			}
			return $filelist;
		}
	}
}
?>