<?php

/**
 * Image Detail Template of the "prsnl10" template for DokuWiki
 *
 * Displays image details.
 *
 * NOTE: Based on the detail.php out of the "starter" template by Anika Henke.
 *
 *
 * LICENSE: This file is open source software (OSS) and may be copied under
 *          certain conditions. See COPYING file for details or try to contact
 *          the author(s) of this file in doubt.
 *
 * @license GPLv2 (http://www.gnu.org/licenses/gpl2.html)
 * @author Andreas Haerter <development@andreas-haerter.com>
 * @link http://andreas-haerter.com/projects/dokuwiki-template-prsnl10
 * @link http://www.dokuwiki.org/template:prsnl10
 * @link http://www.dokuwiki.org/devel:templates
 * @link http://www.dokuwiki.org/devel:coding_style
 * @link http://www.dokuwiki.org/devel:environment
 * @link http://www.dokuwiki.org/devel:action_modes
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
<title><?php echo hsc(tpl_img_getTag('IPTC.Headline',$IMG)) ?> [<?php echo hsc(strip_tags($conf['title'])) ?>]</title>
<?php
//show meta-tags
tpl_metaheaders();

//include default or userdefined favicon
//
//note: since 2011-04-22 "Rincewind RC1", there is a core function named
//      "tpl_getFavicon()". But its functionality is not really fitting the
//      behaviour of this template, therefore I don't use it here exclusively.
if (file_exists(DOKU_TPLINC."user/favicon.ico")){
    //user defined - you might find http://tools.dynamicdrive.com/favicon/
    //useful to generate one
    echo "\n<link rel=\"shortcut icon\" href=\"".DOKU_TPL."user/favicon.ico\" />\n";
} elseif (file_exists(DOKU_TPLINC."user/favicon.png")) {
    //note: I do NOT recommend PNG for favicons (cause it is not supported by
    //all browsers).
    echo "\n<link rel=\"shortcut icon\" href=\"".DOKU_TPL."user/favicon.png\" />\n";
}else{
    //default
    echo "\n<link rel=\"shortcut icon\" href=\"".(function_exists("tpl_getFavicon") ? tpl_getFavicon() : DOKU_TPL."images/favicon.ico")."\" />\n";
}

//load userdefined js?
if (tpl_getConf("prsnl10_loaduserjs")){
    echo "<script type=\"text/javascript\" charset=\"utf-8\" src=\"".DOKU_TPL."user/user.js\"></script>\n";
}
?>
</head>

<body>
    <div id="dokuwiki__detail" class="dokuwiki">
        <?php html_msgarea() ?>

        <?php if($ERROR){ print $ERROR; }else{ ?>

            <h1><?php echo hsc(tpl_img_getTag('IPTC.Headline',$IMG))?></h1>

            <div class="content">
                <?php tpl_img(900,700) ?>

                <div class="img_detail">
                    <h2><?php print nl2br(hsc(tpl_img_getTag('simple.title'))); ?></h2>

                    <dl>
                        <?php
                            $t = tpl_img_getTag('Date.EarliestTime');
                            if($t) print '<dt>'.$lang['img_date'].':</dt><dd>'.dformat($t).'</dd>';

                            $t = tpl_img_getTag('File.Name');
                            if($t) print '<dt>'.$lang['img_fname'].':</dt><dd>'.hsc($t).'</dd>';

                            $t = tpl_img_getTag(array('Iptc.Byline','Exif.TIFFArtist','Exif.Artist','Iptc.Credit'));
                            if($t) print '<dt>'.$lang['img_artist'].':</dt><dd>'.hsc($t).'</dd>';

                            $t = tpl_img_getTag(array('Iptc.CopyrightNotice','Exif.TIFFCopyright','Exif.Copyright'));
                            if($t) print '<dt>'.$lang['img_copyr'].':</dt><dd>'.hsc($t).'</dd>';

                            $t = tpl_img_getTag('File.Format');
                            if($t) print '<dt>'.$lang['img_format'].':</dt><dd>'.hsc($t).'</dd>';

                            $t = tpl_img_getTag('File.NiceSize');
                            if($t) print '<dt>'.$lang['img_fsize'].':</dt><dd>'.hsc($t).'</dd>';

                            $t = tpl_img_getTag('Simple.Camera');
                            if($t) print '<dt>'.$lang['img_camera'].':</dt><dd>'.hsc($t).'</dd>';

                            $t = tpl_img_getTag(array('IPTC.Keywords','IPTC.Category','xmp.dc:subject'));
                            if($t) print '<dt>'.$lang['img_keywords'].':</dt><dd>'.hsc($t).'</dd>';

                        ?>
                    </dl>
                    <?php //Comment in for Debug// dbg(tpl_img_getTag('Simple.Raw'));?>
                </div>
                <div class="clearer"></div>
            </div><!-- /.content -->

            <p class="back">&larr; <?php echo $lang['img_backto']?> <?php tpl_pagelink($ID)?></p>

        <?php } ?>
    </div>
</body>
</html>

