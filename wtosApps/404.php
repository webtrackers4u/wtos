<?php
global $os, $site;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-gb">
<head>
    <meta charset="utf-8">
    <meta name="language" content="en-uk, english">
    <meta name="DC.description" content="">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <link rel="shortcut icon"  href="<?= BASE_URL."favicon.ico"?>"  />
    <link rel="icon"  href="<?= BASE_URL."favicon.ico"?>"  />
    <title>Page not found</title>

    <link rel="stylesheet" href="<?= URL_APP?>css/uikit.css" />
    <link rel="stylesheet" type="text/css" href="<?= URL_APP?>css/style.css">

    <script src="<?= URL_APP?>js/uikit.js"></script>
    <script src="<?= URL_APP?>js/uikit-icons.js"></script>

</head>
</html>
<div style="height: 100vh; width: 100vw; padding: 25px; display: flex; align-items: center; justify-content: center">
    <div class="uk-text-center uk-width-xlarge" >
        <h1 class="uk-heading uk-heading-xlarge uk-text-bolder">404</h1>
        <h3>Ops! The page could not be found.</h3>
        <p style="text-transform: lowercase">SORRY BUT THE PAGE YOU ARE LOOKING FOR DOES NOT EXIST, HAVE BEEN REMOVED. NAME CHANGED OR IS TEMPORARILY UNAVAILABLE</p>

        <a class="uk-button uk-button-primary" href="<?= BASE_URL?>">Go back to homepage <span uk-icon="arrow-right"></span></a>
    </div>
</div>

