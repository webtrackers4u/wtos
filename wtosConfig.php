<?php

$site['base']=$_SERVER['DOCUMENT_ROOT'].'/';
$site['server']=(isset($_SERVER["HTTPS"]) ? "https://" : 'https://') . $_SERVER['SERVER_NAME'] . '/';


if(!in_array($_SERVER['SERVER_ADDR'],array('127.0.0.1','::1')))
{
 	$wtSystemFolder='';	##'wtossystem/'
	$site['host']='sql505.main-hosting.eu';
	$site['port']='3306';
	$site['user']='u990995717_wtosv2';
	$site['pass']='5+h:wH76mO';
	$site['db']='u990995717_wtosv2';
}
else
{


	 $wtSystemFolder=''; ## 'wtossystem/'

	$site['host']='localhost';
	$site['port']='3306';
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
 * Autoloader
 ****/
include "vendor/autoload.php";



/******
 * Constant configuration
 */

define("DB_HOST", $site["host"]);
define("DB_PORT", $site["port"]);
define("DB_USER", $site["user"]);
define("DB_PASS", $site["pass"]);
define("DB_NAME", $site["db"]);
define("BASE_FOLDER", $site["folder"]);


const BASE_DIR = __DIR__ . "/";
define("DIR_APP",    realpath(BASE_DIR."wtosApps/"));
define("DIR_LIB",    realpath(BASE_DIR."library/wtosLibrary/"));
define("DIR_UPLOAD", realpath(BASE_DIR."wtos-images/"));
define("DIR_ADMIN",  realpath(BASE_DIR."wtos/"));
define("DIR_LOG",  realpath(BASE_DIR."writable/logs"));


define("BASE_URL", (isset($_SERVER["HTTPS"]) ? "https://" : 'https://') . $_SERVER['SERVER_NAME'] . '/'. BASE_FOLDER);
const URL_LIB = BASE_URL . "library/wtosLibrary/";
const URL_APP = BASE_URL . "wtosApps/";
const URL_WTOS = BASE_URL . "wtos/";
const URL_UPLOAD = BASE_URL . "wtos-images/";


const LOGIN_KEY = "wtos-" . DB_NAME;
const LOGIN_KEY_ADMIN = "twos-" . DB_NAME . "-wtos";
const ENVIRONMENT = "-1";

//use debug bar
use Tracy\Debugger;

if($site["environment"]=="-1"){
    Debugger::$strictMode = true;
}
if(ENVIRONMENT=="-1"){
    Debugger::enable(Debugger::DEVELOPMENT, DIR_LOG);
    Debugger::$strictMode = TRUE;
}
?>
