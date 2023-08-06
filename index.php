<?php

include('wtosConfig.php'); // load configuration

//for api
if(str_starts_with($_SERVER["REQUEST_URI"], "/api")){
    include __DIR__."/api/index.php";
    exit();
}
//
session_start();
include(DIR_APP.'/wtTemplate.php');
exit();
