<?php

/**
 * Default options for the "prsnl10" DokuWiki template
 *
 * Notes:
 * - In general, use the admin webinterface of DokuWiki to change config.
 * - To change the type of a config value, have a look at "metadata.php" in
 *   the same directory as this file.
 * - To change/translate the descriptions showed in the admin/configuration
 *   menu of DokuWiki, have a look at the file
 *   "/lib/tpl/prsnl10/lang/<your lang>/settings.php". If it does not exists,
 *   copy and translate the English one. And don't forget to mail the
 *   translation to us, SYN Systems <dokuwiki@dev.syn-systems.com> :-D.
 *
 *
 * LICENSE: This file is open source software (OSS) and may be copied under
 *          certain conditions. See COPYING file for details or try to contact
 *          the author(s) of this file in doubt.
 *
 * @license GPLv2 (http://www.gnu.org/licenses/gpl2.html)
 * @author Andreas Haerter <ah@syn-systems.com>
 * @link http://www.dokuwiki.org/template:prsnl10
 * @link http://www.dokuwiki.org/devel:configuration
 */


//check if we are running within the DokuWiki environment
if (!defined("DOKU_INC")){
    die();
}

//header navigation
$conf["prsnl10_headernav"]          = true; //TRUE: use/show header navigation
$conf["prsnl10_headernav_location"] = ":wiki:navigation_header"; //page/article used to store the header navigation

//custom copyright notice
$conf["prsnl10_copyright"]          = true; //TRUE: use/show copyright notice
$conf["prsnl10_copyright_default"]  = true; //TRUE: use default copyright notice (if copyright notice is enabled at all)
$conf["prsnl10_copyright_location"] = ":wiki:copyright"; //page/article used to store a custom copyright notice

//custom footer content
$conf["prsnl10_footer"]          = false; //TRUE: use/show custom footer content
$conf["prsnl10_footer_location"] = ":wiki:footer"; //page/article used to store a custom footer content

//other stuff
$conf["prsnl10_showpageinfo"]           = false; //TRUE: show meta information about the current page (footer->tpl_pageinfo())
$conf["prsnl10_hideadminlinksfromanon"] = false; //TRUE: hide admin links if client is not an authenticated user (including login link -> you have to call "example.com?do=login" manually)
$conf["prsnl10_loaduserjs"]             = false; //TRUE: prsnl10/user/user.js will be loaded

