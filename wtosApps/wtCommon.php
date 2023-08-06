<?php
global $os, $site;

include(DIR_APP.'/os.php');

/*
 * Routing
 */
//menu
$onHead = [];
$onBottom = [];
$pagecontentLinks=$os->get_pagecontent('seoId ,	externalLink, title  , pagecontentId , openNewTab, icon, onHead, onBottom,  loginRequired', "active=1 and parentPage<1 ", " priority asc ", '', '');
while($page=$os->mfa($pagecontentLinks)) {
    $page["icon"] = $page['icon']!="" ? $page['icon'] : 'fimanager flaticon-001-hand-wash';
    if ($page["onHead"]==1) {
        $onHead[] = $page;
    }
    if ($page["onBottom"]==1) {
        $onBottom[] = $page;
    }
}

$pageVar['segment']=array();
$os->wtospage=array();
$os->sefu()->setExtension('');
//$os->sefu()->setExtension('.ijk');
$pagevar['defaultPage']='wtHome.php';//   to design home page seperately
$requestPage= $os->sefu->LoadPageName();
$pageVar['segment']=$os->sefu->getSegments();

// $lang=$os-> getLang();
$lang='';
$andLangId='';
if($lang!='') {
    $andLangId=" and langId=$lang";
}


if($requestPage!="" && $requestPage!="home") {


    $os->wtospage = $os->rowByField('', 'pagecontent', 'seoId', $requestPage, " and active=1  ", '', ' 1');

    if($os->wtospage['pagecontentId']>0) {
        $pageBody=preg_replace('/src=\".*?wtos-images/', 'src="'.BASE_URL."wtos-images", stripslashes($os->wtospage['content']));
        $pageBody=$os->replaceWtBox($pageBody);

    } else {
        header("HTTP/1.0 404 Not Found");
        include "404.php";
        exit();
    }

} else {

    $os->wtospage =$os->rowByField('', 'pagecontent', 'isHome', 'Yes', " and active=1  ", '', ' 1');
    $pageBody=preg_replace('/src=\".*?wtos-images/', 'src="'.BASE_URL."wtos-images", stripslashes($os->wtospage['content']));
    $pageBody=$os->replaceWtBox($pageBody);

}

$pageBody = "<div id='edit_area'>".$pageBody."</div>";

$os->siteValidation();
if($os->getSettings('Deactivate Site')!=0) {
    echo '<style>
 .deactivateMessage{ margin:150px 0px 0px 250px ; font-size:20px; font-style:italic; color:#FF0000; font-weight:bold;}
 </style><div class="deactivateMessage">'.$os->getSettings('Deactivate Message').'</div>';
    exit();
}

$updateHit="update settings set value=value+1 where keyword='hitCoount'";
$os->mq($updateHit);



/*********
 * Templating System
 *********/

$template = DIR_APP."/template-default.php";
$template = $os->val($os->wtospage, "template")!="" ? DIR_APP."/".$os->val($os->wtospage, "template") : $template;
$page_template_name = DIR_APP."/page-".$os->val($os->wtospage, "seoId").".php";
$template = file_exists($page_template_name) ? $page_template_name : $template;
$template = $os->val($os->wtospage, "isHome")=="Yes"|| $os->val($os->wtospage, "seoId")=="" ? DIR_APP."/template-home.php" : $template;


if (file_exists($template)) {
    include $template;
    exit();
} else {
    throw new Exception($template." template file not found");
}
