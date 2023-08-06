<?php

$site['base']=$_SERVER['DOCUMENT_ROOT'].'/';
$site['server']=(isset($_SERVER["HTTPS"]) ? "https://" : 'https://') . $_SERVER['SERVER_NAME'] . '/';


if(!in_array($_SERVER['SERVER_ADDR'], array('127.0.0.1','::1'))) {
    $wtSystemFolder='';	##'wtossystem/'
    $site['host']='sql505.main-hosting.eu';
    $site['port']='3306';
    $site['user']='u990995717_wtosv2';
    $site['pass']='5+h:wH76mO';
    $site['db']='u990995717_wtosv2';
} else {
    $wtSystemFolder=''; ## 'wtossystem/'

    $site['host']='localhost';
    $site['port']='3306';
    $site['user']='root';
    $site['pass']='';
    $site['db']='wtosv20';
}

function _d($var)
{
    return Kint::dump($var);
}


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
define("BASE_FOLDER", "");


const BASE_DIR = __DIR__ . "/";
define("DIR_APP", realpath(BASE_DIR."wtosApps/"));
define("DIR_LIB", realpath(BASE_DIR."library/wtosLibrary/"));
define("DIR_UPLOAD", realpath(BASE_DIR."wtos-images/"));
define("DIR_PLUGIN", realpath(BASE_DIR."wtos/"));
define("DIR_ADMIN", realpath(BASE_DIR."wtos/"));
define("DIR_GLOBAL_PROPERTY", realpath(BASE_DIR."wtos/"));
define("DIR_LOG", realpath(BASE_DIR."writable/logs"));


define("BASE_URL", (isset($_SERVER["HTTPS"]) ? "http://" : 'http://') . $_SERVER['SERVER_NAME'] . '/'. BASE_FOLDER);
const URL_LIB = BASE_URL . "library/wtosLibrary/";
const URL_APP = BASE_URL . "wtosApps/";
const URL_WTOS = BASE_URL . "wtos/";
const URL_UPLOAD = BASE_URL . "wtos-images/";
const URL_PLUGIN = BASE_URL . "wtos/";


const LOGIN_KEY = "wtos-" . DB_NAME;
const LOGIN_KEY_ADMIN = "twos-" . DB_NAME . "-wtos";
const ENVIRONMENT = ~E_WARNING;

error_reporting(ENVIRONMENT);

//use debug bar
$whoops = new \Whoops\Run();
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
$whoops->register();
