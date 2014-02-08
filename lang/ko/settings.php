<?php

/**
 * Korean language for the Config Manager
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
 * @author Myeongjin <aranet100@gmail.com>
 * @link https://www.dokuwiki.org/template:prsnl10
 * @link https://www.dokuwiki.org/config:lang
 * @link https://www.dokuwiki.org/devel:configuration
 */


//check if we are running within the DokuWiki environment
if (!defined("DOKU_INC")){
    die();
}

//header navigation
$lang["prsnl10_headernav"]          = "머리글 둘러보기를 보여줄까요?";
$lang["prsnl10_headernav_location"] = "만약 보여준다면 머리글 둘러보기로 다음 위키 문서 사용:";

//custom copyright notice
$lang["prsnl10_copyright"]          = "저작권 알림을 보여줄까요?";
$lang["prsnl10_copyright_default"]  = "만약 보여준다면 기본 저작권 알림을 사용하겠습니까?";
$lang["prsnl10_copyright_location"] = "기본 알림을 사용하지 않는다면 저작권 알림으로 다음 위키 문서 사용:";

//custom footer content
$lang["prsnl10_footer"]          = "추가적인 사용자 지정 바닥글 내용을 보여줄까요?";
$lang["prsnl10_footer_location"] = "만약 보여준다면 추가적인 바닥글 내용으로 다음 위키 문서 사용:";

//other stuff
$lang["prsnl10_showpageinfo"]           = "바닥글 안에 보여진 문서에 대한 메타 정보를 보여줄까요?";
$lang["prsnl10_hideadminlinksfromanon"] = "클라이언트가 인증된 사용자가 아니면 모든 관리자와 사용자 기능과 관련된 링크를 숨길까요? 이 기능이 활성이면 수동으로 로그인 양식을 호출해야 함에 주의하세요. (힌트: '".DOKU_URL.DOKU_SCRIPT."?do=login').";
$lang["prsnl10_loaduserjs"]             = "'prsnl10/user/user.js'를 불러올까요?";

