<?php

/**
 * Danish language for the Config Manager, translated by Jacob Palm
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
 * @author Jacob Palm
 * @link https://www.dokuwiki.org/template:prsnl10
 * @link https://www.dokuwiki.org/config:lang
 * @link https://www.dokuwiki.org/devel:configuration
 */


//check if we are running within the DokuWiki environment
if (!defined("DOKU_INC")){
    die();
}

//header navigation
$lang["prsnl10_headernav"]          = "Vis navigationlinks i toppen?";
$lang["prsnl10_headernav_location"] = "Hvis ja, så brug følgende wikiside til navigationslinks:";

//custom copyright notice
$lang["prsnl10_copyright"]          = "Vis copyright info?";
$lang["prsnl10_copyright_default"]  = "Hvis ja, skal standard copyright beskeden benyttes?";
$lang["prsnl10_copyright_location"] = "Hvis ikke standard beskeden, så brug følgende wikiside:";

//custom footer content
$lang["prsnl10_footer"]          = "Vis yderligere brugerdefineret indhold i bunden af siden?";
$lang["prsnl10_footer_location"] = "Hvis ja, vis følgende wikiside:";

//other stuff
$lang["prsnl10_showpageinfo"]           = "Vis meta information om aktuelle side i bunden af siden?";
$lang["prsnl10_hideadminlinksfromanon"] = "Skjul alle administrator og bruger funktioner og links hvis der ikke er logget på? Hvis de skjules skal du manuelt gå til login siden vha. en URL (hint: '".DOKU_URL.DOKU_SCRIPT."?do=login').";
$lang["prsnl10_loaduserjs"]             = "Indlæs 'prsnl10/user/user.js'?";

