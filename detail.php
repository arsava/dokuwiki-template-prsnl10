<?php

/**
 * Image detail page
 *
 * NOTE: Based on the detail.php out of the "starter" template by Anika Henke.
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
 */

//check if we are running within the DokuWiki environment
if (!defined("DOKU_INC")){
    die();
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo hsc($conf["lang"]); ?>" lang="<?php echo hsc($conf["lang"]); ?>" dir="<?php echo hsc($lang["direction"]); ?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo hsc(tpl_img_getTag('IPTC.Headline',$IMG)); echo " - ".hsc($conf["title"]); ?></title>
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><![endif]-->
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
if (tpl_getConf("prsnl10_loaduserjs")){
    echo "<script type=\"text/javascript\" charset=\"utf-8\" src=\"".DOKU_TPL."user/user.js\"></script>\n";
}
?>
<!--[if lte IE 8]><link rel="stylesheet" media="all" type="text/css" href="<?php echo DOKU_TPL; ?>css/prsnl10_screen_iehacks.css" /><![endif]-->
<!--[if lt IE 7]><style type="text/css">img, div { behavior: url(<?php echo DOKU_TPL; ?>js/iepngfix/iepngfix.htc); }</style><![endif]-->
</head>

<body>
    <div id="dokuwiki__detail" class="dokuwiki">
        <?php html_msgarea() ?>

        <?php if($ERROR){ print $ERROR; }else{ ?>

            <h1><?php echo hsc(tpl_img_getTag('IPTC.Headline',$IMG))?></h1>

            <div class="content">
                <?php tpl_img(900,700); /* parameters: maximum width, maximum height (and more) */ ?>

                <div class="img_detail">
                    <h2><?php print nl2br(hsc(tpl_img_getTag('simple.title'))); ?></h2>

                    <dl>
                        <?php
                            $config_files = getConfigFiles('mediameta');
                            foreach ($config_files as $config_file) {
                                if(@file_exists($config_file)) {
                                    include($config_file);
                                }
                            }

                            foreach($fields as $key => $tag){
                                $t = array();
                                if (!empty($tag[0])) {
                                    $t = array($tag[0]);
                                }
                                if(is_array($tag[3])) {
                                    $t = array_merge($t,$tag[3]);
                                }
                                $value = tpl_img_getTag($t);
                                if ($value) {
                                    echo '<dt>'.$lang[$tag[1]].':</dt><dd>';
                                    if ($tag[2] == 'date') {
                                        echo dformat($value);
                                    } else {
                                        echo hsc($value);
                                    }
                                    echo '</dd>';
                                }
                            }

                            $t_array = media_inuse(tpl_img_getTag('IPTC.File.Name',$IMG));
                            if (isset($t_array[0])) {
                                echo '<dt>'.$lang['reference'].':</dt>';
                                foreach ($t_array as $t) {
                                    echo '<dd>'.html_wikilink($t,$t).'</dd>';
                                }
                            }
                        ?>
                    </dl>
                    <?php //Comment in for Debug// dbg(tpl_img_getTag('Simple.Raw'));?>
                </div>
                <div class="clearer"></div>
            </div><!-- /.content -->

            <p class="back">
                <?php
                    $imgNS = getNS($IMG);
                    $authNS = auth_quickaclcheck("$imgNS:*");
                    if (($authNS >= AUTH_UPLOAD) && function_exists('media_managerURL')) {
                        $mmURL = media_managerURL(array('ns' => $imgNS, 'image' => $IMG));
                        echo '<a href="'.$mmURL.'">'.$lang['img_manager'].'</a><br />';
                    }
                ?>
                &larr; <?php echo $lang['img_backto']?> <?php tpl_pagelink($ID)?>
            </p>

        <?php } ?>
    </div>
</body>
</html>

