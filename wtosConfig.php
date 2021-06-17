<?php

$site['base']=$_SERVER['DOCUMENT_ROOT'].'/';
$site['server']='http://'.$_SERVER['SERVER_NAME'].'/';


if(!in_array($_SERVER['SERVER_ADDR'],array('127.0.0.1','::1')))
{
 	$wtSystemFolder='';	##'wtossystem/'
	$site['host']='85.10.205.173';
	$site['user']='nahid_root';
	$site['pass']='querty12345';
	$site['db']='pp_book';
}
else
{


	 $wtSystemFolder=''; ## 'wtossystem/'

	$site['host']='localhost';
	$site['user']='root';
	$site['pass']='12345678';
	$site['db']='wtosv20';


}


$site['folder']=$wtSystemFolder;
$site['application-folder']=$wtSystemFolder.'wtosApps/';# wtossystem/application/'
$site['library-folder']=$wtSystemFolder.'library/wtosLibrary/'; ##  'wtossystem/library/wtosLibrary/'
$site['uploadImage-folder']=$wtSystemFolder.'wtos-images/';## 'wtossystem/wtos-images/'
$site['admin-folder']=$wtSystemFolder.'wtos/';  // 'wtossystem/wtos/'
$site['global-property-folder']=$wtSystemFolder.'wtos/';
$site['plugin-folder']=$wtSystemFolder.'wtos/';


## non editable area
$site['root']=$site['base'].$site['folder'];
$site['root-wtos']=$site['base'].$site['admin-folder'];
$site['application']=$site['base'].$site['application-folder'];
$site['library']=$site['base'].$site['library-folder'];
$site['root-image']=$site['base'].$site['uploadImage-folder'];
$site['global-property']=$site['base'].$site['global-property-folder'];
$site['root-plugin']=$site['base'].$site['plugin-folder'];

$site['url-library']=$site['server'].$site['library-folder'];
$site['themePath']=$site['server'].$site['application-folder'];
$site['url']=$site['server'].$site['folder'];
$site['url-wtos']=$site['server'].$site['admin-folder'];
$site['url-image']=$site['server'].$site['uploadImage-folder'];
$site['url-plugin']=$site['server'].$site['plugin-folder'];
$site['loginKey']='wtos-'.$site['db'];
$site['loginKey-wtos']='wtos-'.$site['db'].'-wtos';
$site['environment']='-1'; // -1 development  // 0 production

function _d($var){echo '<pre>';print_r($var);echo '</pre>';}


/****
 * Vendor
 */
include "vendor/autoload.php";
define("DB_HOST",$site["host"]);
define("DB_NAME",$site["db"]);
define("DB_USER",$site["user"]);
define("DB_PASS",$site["pass"]);
