<?
use Library\Classes\Template;
global $os, $site;
error_reporting($site['environment']);
include($site['application'].'os.php');
$pageVar['segment']=array();
$os->wtospage=array();
$os->sefu()->setExtension('');
//$os->sefu()->setExtension('.ijk');
$pagevar['defaultPage']='wtHome.php';//   to design home page seperately
$requestPage= $os->sefu->LoadPageName();
$pageVar['segment']=$os->sefu->getSegments();
$content=$pagevar['defaultPage'];
// $lang=$os-> getLang();
$lang='';
$andLangId='';
if($lang!='')
{
    $andLangId=" and langId=$lang";
}


if($requestPage!="" && $requestPage!="home" )
{


    $os->wtospage = $os->rowByField('','pagecontent','seoId',$requestPage," and active=1  " ,'',' 1');

    if($os->wtospage['pagecontentId']>0)
    {
        $pageBody=preg_replace('/src=\".*?wtos-images/','src="'.$site['url']."wtos-images",stripslashes($os->wtospage['content']));
        $pageBody=$os->replaceWtBox($pageBody);

    } else {
        header("HTTP/1.0 404 Not Found");
        include "404.php";
        exit();
    }

}else{

    $os->wtospage =$os->rowByField('','pagecontent','isHome','Yes'," and active=1  " ,'',' 1');
    $pageBody=preg_replace('/src=\".*?wtos-images/','src="'.$site['url']."wtos-images",stripslashes($os->wtospage['content']));
    $pageBody=$os->replaceWtBox($pageBody);

}

$pageBody = "<div id='edit_area'>".$pageBody."</div>";

$os->siteValidation();
if($os->getSettings('Deactivate Site')!=0){  echo '<style>
 .deactivateMessage{ margin:150px 0px 0px 250px ; font-size:20px; font-style:italic; color:#FF0000; font-weight:bold;}
 </style><div class="deactivateMessage">'.$os->getSettings('Deactivate Message').'</div>'; exit();}

$updateHit="update settings set value=value+1 where keyword='hitCoount'";
$os->mq($updateHit);

/*********
 * Login logout
 */
$_REF_URL = urlencode( rtrim($site["server"],"/").$_SERVER["REQUEST_URI"]);
if ($os->get("logout")=="OK"){
    $os->Logout();
    $ref_url = $os->get("ref");
    if ($ref_url==""){
        $ref_url = $site["url"];
    }
    $os->redirect($ref_url);
    exit();
}
if($os->wtospage["loginRequired"]==1 && !$os->isLogin()){
    $os->redirect($site["url"]."sign-in?ref=$_REF_URL");
    exit();
}



/*********
 * Templating System
 *********/

$template = $site["application"]."template-default.php";
$template = $os->val($os->wtospage, "template")!=""?$site["application"].$os->val($os->wtospage, "template"):$template;
$page_template_name = $site["application"]."page-".$os->val($os->wtospage, "seoId").".php";
$template = file_exists($page_template_name)?$page_template_name:$template;

$template = $os->val($os->wtospage, "isHome")=="Yes"|| $os->val($os->wtospage, "seoId")==""?$site["application"]."template-home.php":$template;


if (file_exists($template)){
    include $template;
    exit();
} else {
    print $template." template file not found";
}

