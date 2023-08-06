<?php
/****
 * Autoloader
 ****/
include "vendor/autoload.php";


function _d($var)
{
    return Kint::dump($var);
}


/******
 * Constant configuration
 */

define("DB_HOST", "127.1.1.1");
define("DB_PORT", "3306");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "wtosv20");
define("BASE_FOLDER", "");


const BASE_DIR = __DIR__ . "/";
define("DIR_APP", realpath(BASE_DIR . "wtosApps/"));
define("DIR_LIB", realpath(BASE_DIR . "library/wtosLibrary/"));
define("DIR_UPLOAD", realpath(BASE_DIR . "wtos-images/"));
define("DIR_PLUGIN", realpath(BASE_DIR . "wtos/"));
define("DIR_ADMIN", realpath(BASE_DIR . "wtos/"));
define("DIR_GLOBAL_PROPERTY", realpath(BASE_DIR . "wtos/"));
define("DIR_LOG", realpath(BASE_DIR . "writable/logs"));


define("BASE_URL", (isset($_SERVER["HTTPS"]) ? "http://" : 'http://') . $_SERVER['SERVER_NAME'] . '/' . BASE_FOLDER);
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
