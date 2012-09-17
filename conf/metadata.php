<?php

/**
 * Types of the different option values for the "prsnl12" DokuWiki template
 *
 * Notes:
 * - In general, use the admin webinterface of DokuWiki to change config.
 * - To change/add configuration values to store, have a look at this file
 *   and the "default.php" in the same directory as this file.
 * - To change/translate the descriptions showed in the admin/configuration
 *   menu of DokuWiki, have a look at the file
 *   "/lib/tpl/prsnl12/lang/<your lang>/settings.php". If it does not exists,
 *   copy and translate the English one. And don't forget to mail the
 *   translation to me, Andreas Haerter <ah@bitkollektiv.org> :-D.
 *
 *
 * LICENSE: This file is open source software (OSS) and may be copied under
 *          certain conditions. See COPYING file for details or try to contact
 *          the author(s) of this file in doubt.
 *
 * @license GPLv2 (http://www.gnu.org/licenses/gpl2.html)
 * @author Andreas Haerter <ah@bitkollektiv.org>
 * @link http://www.dokuwiki.org/template:prsnl12
 * @link http://www.dokuwiki.org/devel:configuration
 */


//check if we are running within the DokuWiki environment
if (!defined("DOKU_INC")){
    die();
}

//header navigation
$meta["prsnl12_headernav"]          = array("onoff");
$meta["prsnl12_headernav_location"] = array("string");

//custom copyright notice
$meta["prsnl12_copyright"]          = array("onoff");
$meta["prsnl12_copyright_default"]  = array("onoff");
$meta["prsnl12_copyright_location"] = array("string");

//custom footer content
$meta["prsnl12_footer"]          = array("onoff");
$meta["prsnl12_footer_location"] = array("string");

//other stuff
$meta["prsnl12_showpageinfo"]           = array("onoff");
$meta["prsnl12_hideadminlinksfromanon"] = array("onoff");
$meta["prsnl12_loaduserjs"]             = array("onoff");

