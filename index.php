<?php
//for api
if(str_starts_with($_SERVER["REQUEST_URI"], "/api")){
    include __DIR__."/api/index.php";
    exit();
}
//
include('wtosConfig.php'); // load configuration
session_start();
include(DIR_APP.'/wtTemplate.php');
exit();
