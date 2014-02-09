<?php

/**
 * Main file of the "prsnl10" template for DokuWiki
 *
 *
 * LICENSE: This file is open source software (OSS) and may be copied under
 *          certain conditions. See COPYING file for details or try to contact
 *          the author(s) of this file in doubt.
 *
 * @license GPLv2 (http://www.gnu.org/licenses/gpl2.html)
 * @author ARSAVA <dokuwiki@dev.arsava.com>
 * @link https://www.dokuwiki.org/template:prsnl10
 * @link https://www.dokuwiki.org/devel:templates
 * @link https://www.dokuwiki.org/devel:coding_style
 * @link https://www.dokuwiki.org/devel:environment
 * @link https://www.dokuwiki.org/devel:action_modes
 * @link http://blog.andreas-haerter.com/2011/03/16/how-to-create-a-maintainable-dokuwiki-template
 */


//check if we are running within the DokuWiki environment
if (!defined("DOKU_INC")){
    die();
}


/**
 * Stores the name the current client used to login
 *
 * @var string
 * @author ARSAVA <dokuwiki@dev.arsava.com>
 */
$loginname = "";
if (!empty($conf["useacl"])){
    if (isset($_SERVER["REMOTE_USER"]) && //no empty() but isset(): "0" may be a valid username...
        $_SERVER["REMOTE_USER"] !== ""){
        $loginname = $_SERVER["REMOTE_USER"]; //$INFO["client"] would not work here (-> e.g. when
                                              //current IP differs from the one used to login)
    }
}


//get needed language array
include DOKU_TPLINC."lang/en/lang.php";
//overwrite English language values with available translations
if (!empty($conf["lang"]) &&
    $conf["lang"] != "en" &&
    file_exists(DOKU_TPLINC."/lang/".$conf["lang"]."/lang.php")){
    //get language file (partially translated language files are no problem
    //cause non translated stuff is still existing as English array value)
    include DOKU_TPLINC."/lang/".$conf["lang"]."/lang.php";
}


//detect revision
$rev = (int)$INFO["rev"]; //$INFO comes from the DokuWiki core
if ($rev < 1){
    $rev = (int)$INFO["lastmod"];
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo hsc($conf["lang"]); ?>" lang="<?php echo hsc($conf["lang"]); ?>" dir="<?php echo hsc($lang["direction"]); ?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php tpl_pagetitle(); echo " - ".hsc($conf["title"]); ?></title>
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><![endif]-->
<link rel="stylesheet" media="all" type="text/css" href="<?php echo ((!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on") ? "https" : "http"); ?>://fonts.googleapis.com/css?family=Droid+Sans" />
<?php
//show meta-tags
tpl_metaheaders();
echo "<meta name=\"viewport\" content=\"width=device-width,initial-scale=1\" />";

//include default or userdefined favicon
//
//note: since 2011-04-22 "Rincewind RC1", there is a core function named
//      "tpl_getFavicon()". But its functionality is not really fitting the
//      behaviour of this template, therefore I don't use it here exclusively.
if (file_exists(DOKU_TPLINC."user/favicon.ico")){
    //user defined - you might find http://tools.dynamicdrive.com/favicon/
    //useful to generate one
    echo "\n<link rel=\"shortcut icon\" href=\"".DOKU_TPL."user/favicon.ico\" />\n";
}elseif (file_exists(DOKU_TPLINC."user/favicon.png")){
    //note: I do NOT recommend PNG for favicons (cause it is not supported by
    //all browsers).
    echo "\n<link rel=\"shortcut icon\" href=\"".DOKU_TPL."user/favicon.png\" />\n";
}else{
    //default
    echo "\n<link rel=\"shortcut icon\" href=\"".(function_exists("tpl_getFavicon") ? tpl_getFavicon() : DOKU_TPL."images/favicon.ico")."\" />\n";
}

//include default or userdefined Apple Touch Icon (see <http://j.mp/sx3NMT> for
//details)
if (file_exists(DOKU_TPLINC."user/apple-touch-icon.png")){
    echo "<link rel=\"apple-touch-icon\" href=\"".DOKU_TPL."user/apple-touch-icon.png\" />\n";
}else{
    //default
    echo "<link rel=\"apple-touch-icon\" href=\"".(function_exists("tpl_getFavicon") ? tpl_getFavicon(false, "apple-touch-icon.png") : DOKU_TPL."images/apple-touch-icon.png")."\" />\n";
}

//load userdefined js?
if (tpl_getConf("prsnl10_loaduserjs") && file_exists(DOKU_TPLINC."user/user.js")){
    echo "<script type=\"text/javascript\" charset=\"utf-8\" src=\"".DOKU_TPL."user/user.js\"></script>\n";
}
?>
<!--[if lte IE 8]><link rel="stylesheet" media="all" type="text/css" href="<?php echo DOKU_TPL; ?>css/prsnl10_screen_iehacks.css" /><![endif]-->
<!--[if lt IE 7]><style type="text/css">img { behavior: url(<?php echo DOKU_TPL; ?>js/iepngfix/iepngfix.htc); }</style><![endif]-->
</head>

<body>
<div id="pagewrap"<?php
    if ($ACT !== "show" && //speed up: check most common action first
        ($ACT === "admin" ||
         $ACT === "conflict" ||
         $ACT === "diff" ||
         $ACT === "draft" ||
         $ACT === "edit" ||
         $ACT === "media" ||
         $ACT === "preview" ||
         $ACT === "save")){
        echo " class=\"admin\"";
    } ?>>

    <!-- start header -->
    <div id="tmpl_header">
        <div id="tmpl_header_left">
            <?php
            //include userdefined logo or show text-headline
            echo "<div id=\"tmpl_header_logo\">\n                <a href=\"".DOKU_BASE."\" name=\"dokuwiki__top\" id=\"dokuwiki__top\" accesskey=\"h\"";
            if (file_exists(DOKU_TPLINC."user/logo.png")){
                //user defined PNG
                echo "><img src=\"".DOKU_TPL."user/logo.png\" id=\"tmpl_header_logo_img\" alt=\"\"/></a>";
            }elseif (file_exists(DOKU_TPLINC."user/logo.gif")){
                //user defined GIF
                echo "><img src=\"".DOKU_TPL."user/logo.gif\" id=\"tmpl_header_logo_img\" alt=\"\"/></a>";
            }elseif (file_exists(DOKU_TPLINC."user/logo.jpg")){
                //user defined JPG
                echo "><img src=\"".DOKU_TPL."user/logo.jpg\" id=\"tmpl_header_logo_img\" alt=\"\"/></a>";
            }else{
                //default
                echo " class=\"tmpl_header_logo_txt\">".hsc($conf["title"])."</a>";
            }
            echo "\n            </div>\n";
            ?>
        </div>

        <div id="tmpl_header_right">
            <?php
            //show header navigation?
            if (tpl_getConf("prsnl10_headernav")){
                echo "<div id=\"tmpl_header_nav\">\n                ";
                //we have to show a custom navigation
                if (empty($conf["useacl"]) ||
                    auth_quickaclcheck(cleanID(tpl_getConf("prsnl10_headernav_location")))){ //current user got access?
                    //get the rendered content of the defined wiki article to use as custom navigation
                    $interim = tpl_include_page(tpl_getConf("prsnl10_headernav_location"), false);
                    if ($interim === "" ||
                        $interim === false){
                        //show creation/edit link if the defined page got no content
                        echo "[&#160;";
                        tpl_pagelink(tpl_getConf("prsnl10_headernav_location"), hsc($lang["prsnl10_fillplaceholder"]." (".tpl_getConf("prsnl10_headernav_location").")"));
                        echo "&#160;]<br />";
                    }else{
                       //show the rendered page content
                       echo $interim;
                    }
                }
                echo "\n            </div>\n";
            }
            ?>
        </div>
        <div class="clearer"></div>
    </div>
    <!-- end header -->


    <!-- start main content area -->
    <div class="dokuwiki">
        <?php html_msgarea(); ?>

        <!--[if lt IE 7]>
        <noscript>Your browser has JavaScript disabled, the page layout will be broken.
        Please enable it and reload this page or <a href="http://browser-update.org/en/update.html">update
        your browser</a>.</noscript>
        <![endif]-->

        <!-- start main content -->
        <div id="content"<?php echo (($ACT === "media") ? " class=\"mediamanagerfix\"" : ""); ?>>
            <div class="page">
            <?php
            $toc = tpl_toc(true);
            if ($toc){
                echo $toc;
             } ?>

<!-- start rendered page content -->
<?php
//send already created content to get a faster page rendering on the client
tpl_flush();
//show page content
tpl_content(false);
?>
<!-- end rendered page content -->
<div class="clearer"></div>


            </div>
        </div>
        <!-- end main content -->
        <div class="clearer"></div>
        <?php
        //send already created content to get a faster page rendering on the client
        tpl_flush();
        ?>

        <div id="tmpl_footer">
            <div id="tmpl_footer_actlinksleft">
                <?php
                echo "[&#160;";
                tpl_actionlink("top");
                if (actionOK("index")){ //check if action is disabled
                    echo "&#160;|&#160;";
                    tpl_actionlink("index");
                }
                echo "&#160;]";
                ?>
            </div>
            <div id="tmpl_footer_actlinksright">
                <?php
                if (!empty($loginname) ||
                    !tpl_getConf("prsnl10_hideadminlinksfromanon")){
                    echo "[&#160;";
                    tpl_actionlink("login"); //"login" handles both login/logout
                    if (!empty($INFO["writable"])){ //$INFO comes from DokuWiki core
                        echo "&#160;|&#160;";
                        tpl_actionlink("edit"); //"edit" handles edit/create/show
                    }
                    if (!empty($INFO["exists"]) &&
                        actionOK("revisions")){ //check if action is disabled
                        echo "&#160;|&#160;";
                        tpl_actionlink("revisions");
                    }
                    if (!empty($loginname) &&
                        $ACT === "show" &&
                        actionOK("subscribe")){ //check if action is disabled
                        echo "&#160;|&#160;";
                        tpl_actionlink("subscribe");
                    }
                    if ((!empty($INFO["writable"]) || //$INFO comes from DokuWiki core
                         !empty($INFO["isadmin"]) || //purpose of this template are "non-wiki" websites, therefore show this link only to users with write permission and admins
                         !empty($INFO["ismanager"])) &&
                        actionOK("media") && //check if action is disabled
                        function_exists("media_managerURL")) { //new media manager is available on DokuWiki releases newer than 2011-05-25a "Rincewind" / since 2011-11-10 "Angua" RC1
                        echo "&#160;|&#160;";
                        tpl_actionlink("media");
                    }
                    if (!empty($INFO["isadmin"]) ||  //$INFO comes from DokuWiki core
                        !empty($INFO["ismanager"])){
                        echo "&#160;|&#160;";
                        tpl_actionlink("admin");
                    }
                    if (!empty($loginname) &&
                        actionOK("profile")){ //check if action is disabled
                        echo "&#160;|&#160;";
                        tpl_actionlink("profile");
                    }
                    echo "&#160;]";
                }else{
                    echo "&#160;";
                }
                ?>
            </div>
            <div class="clearer"></div>
            <div id="tmpl_footer_metainfo">
                <!-- Please do NOT remove the following prsnl10 and/or DokuWiki link/notice. Thank you. :-) -->
                <a href="https://www.dokuwiki.org/template:prsnl10" target="_blank"<?php echo ((cleanID(getID()) === "start") ? "" : " rel=\"nofollow\"") ?>>prsnl10 on DW</a> under the hood
                <?php
                if(!empty($INFO["exists"]) &&
                   tpl_getConf("prsnl10_showpageinfo")) {
                    echo " &#160;|&#160; ";
                    tpl_pageinfo();
                }
                if (!empty($loginname)){
                    echo " &#160;|&#160; ";
                    tpl_userinfo();
                }
                //additional footer content?
                if (tpl_getConf("prsnl10_footer")){
                    if (empty($conf["useacl"]) ||
                        auth_quickaclcheck(cleanID(tpl_getConf("prsnl10_footer_location")))){ //current user got access?
                        //get the rendered content of the defined wiki article to use as custom content
                        $interim = tpl_include_page(tpl_getConf("prsnl10_footer_location"), false);
                        if ($interim === "" ||
                            $interim === false){
                            //show creation/edit link if the defined page got no content
                            echo "<p>[&#160;";
                            tpl_pagelink(tpl_getConf("prsnl10_footer_location"), hsc($lang["prsnl10_fillplaceholder"]." (".tpl_getConf("prsnl10_footer_location").")"));
                            echo "&#160;]</p>";
                        }else{
                            //show the rendered page content
                            echo $interim;
                        }
                    }
                }
                ?>

            </div><?php
            //copyright notice
            if (tpl_getConf("prsnl10_copyright")){
                echo "\n            <div id=\"licenseinfo\">\n                ";
                if (tpl_getConf("prsnl10_copyright_default")){
                    tpl_license(false);
                }else{
                    if (empty($conf["useacl"]) ||
                        auth_quickaclcheck(cleanID(tpl_getConf("prsnl10_copyright_location")))){ //current user got access?
                        //get the rendered content of the defined wiki article to use as custom notice
                        $interim = tpl_include_page(tpl_getConf("prsnl10_copyright_location"), false);
                        if ($interim === "" ||
                            $interim === false){
                            //show creation/edit link if the defined page got no content
                            echo "[&#160;";
                            tpl_pagelink(tpl_getConf("prsnl10_copyright_location"), hsc($lang["prsnl10_fillplaceholder"]." (".tpl_getConf("prsnl10_copyright_location").")"));
                            echo "&#160;]<br />";
                        }else{
                            //show the rendered page content
                            echo $interim;
                        }
                    }
                }
                echo "\n            </div>";
            }
            ?>

        </div>
    </div>
    <!-- end main content area -->
    <div class="clearer"></div>
    <?php
    //provide DokuWiki housekeeping, required in all templates
    tpl_indexerWebBug();
    //include web analytics software
    if (file_exists(DOKU_TPLINC."/user/tracker.php")){
        include DOKU_TPLINC."/user/tracker.php";
    }
    ?>

</div>
</body>
</html>
