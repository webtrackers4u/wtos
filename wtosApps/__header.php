<?

global $os, $site, $onHead;
$currentPage='';
if(isset($pageVar['segment'][1]))
{
    $currentPage=$pageVar['segment'][1];
}
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

    <link rel="shortcut icon"  href="<?= $site["url"]."favicon.ico"?>"  />
    <link rel="icon"  href="<?= $site["url"]."favicon.ico"?>"  />
    <title> <?php echo $os->wtospage['heading'];?> <?php echo $os->getSettings('siteTitle');?></title>
    <meta name="keywords" content="<?php echo $os->getSettings('metaKey');?> <?php echo $os->wtospage['metaTag'];?>   ">
    <meta name="description" content="<?php echo $os->getSettings('metaDescription');?> <?php echo $os->wtospage['metaDescription'];?> ">
    <script type="text/javascript" src="<? echo $site['url-library']?>wtos-1.1.js"></script>


    <link rel="stylesheet" href="<?= $site["themePath"]?>css/uikit.css" />
    <link rel="stylesheet" type="text/css" href="<?= $site["themePath"]?>css/style.css">

    <script src="<?= $site["themePath"]?>js/uikit.js"></script>
    <script src="<?= $site["themePath"]?>js/uikit-icons.js"></script>
</head>
<body>
<header>

    <nav class="uk-navbar-container main-menu-container uk-navbar-transparent">
        <div class="uk-container">
            <div uk-navbar>
                <div class="uk-navbar-left">
                    <a class="uk-navbar-item uk-logo" href="<?= $site["url"]?>">
                        <img src="<?= $site["themePath"]?>assets/images/logo.svg" style="height: 35px">
                    </a>
                </div>
                <div class="uk-navbar-right">
                    <ul class="uk-navbar-nav uk-visible@m">
                        <?foreach($onHead as $page){
                            $pageSeoLink=($page['externalLink']=='')?$os->sefu->l($page['seoId']):$pageSeoLink=$page['externalLink'];
                            $_target=($page['openNewTab']<1)?'':'target="_blank"';
                            $extra_css =  $page['seoId'] == $currentPage?"uk-active":"";

                            ?>
                            <li class="<?= $extra_css?>">
                                <a title="<? echo $page['title'] ?>"  <?php echo $_target ?> href="<? echo $pageSeoLink ?>"  ><? echo $page['title'] ?></a>
                            </li>
                        <?}?>
                    </ul>
                    <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon href="#"></a>
                </div>
            </div>
        </div>
    </nav>
</header>
<main>

