<?php

/**
 * English language for the Config Manager
 *
 * If your language is not/only partially translated or you found an error/typo,
 * have a look at the following files:
 * - /lib/tpl/prsnl10/lang/<your lang>/lang.php
 * - /lib/tpl/prsnl10/lang/<your lang>/settings.php
 * If they are not existing, copy and translate the English ones.
 *
 * Don't forget to mail your translation to ARSAVA <dokuwiki@dev.arsava.com>.
 * Thanks! :-D
 *
 *
 * LICENSE: This file is open source software (OSS) and may be copied under
 *          certain conditions. See COPYING file for details or try to contact
 *          the author(s) of this file in doubt.
 *
 * @license GPLv2 (http://www.gnu.org/licenses/gpl2.html)
 * @author ARSAVA <dokuwiki@dev.arsava.com>
 * @link https://www.dokuwiki.org/template:prsnl10
 * @link https://www.dokuwiki.org/config:lang
 * @link https://www.dokuwiki.org/devel:configuration
 */


//check if we are running within the DokuWiki environment
if (!defined("DOKU_INC")){
    die();
}

//header navigation
$lang["prsnl10_headernav"]          = "Show header navigation?";
$lang["prsnl10_headernav_location"] = "If yes, use following wiki page as header navigation:";

//custom copyright notice
$lang["prsnl10_copyright"]          = "Show copyright notice?";
$lang["prsnl10_copyright_default"]  = "If yes, use default copyright notice?";
$lang["prsnl10_copyright_location"] = "If not default, use following wiki page as copyright notice:";

//custom footer content
$lang["prsnl10_footer"]          = "Show additional, custom footer content?";
$lang["prsnl10_footer_location"] = "If yes, use following wiki page as additional footer content:";

//other stuff
$lang["prsnl10_showpageinfo"]           = "Show meta information about the viewed page within footer?";
$lang["prsnl10_hideadminlinksfromanon"] = "Hide all admin and user functionality related links if the client is not an authenticated user? Please note that you have to call the login form manually if this is active (hint: '".DOKU_URL.DOKU_SCRIPT."?do=login').";
$lang["prsnl10_loaduserjs"]             = "Load 'prsnl10/user/user.js'?";

