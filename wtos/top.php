<?php
global $site, $os;
include(DIR_ADMIN.'wtosCommon.php');
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-gb">
<head>
    <?php include('wtosHeader.php'); ?>

</head>
<body>
<div id="div_busy" style="position:fixed; top:0px; left:45%;"></div>
<?php $os->validateWtos(); ?>

<header class="uk-background-primary">
    <div class="">
        <div class="uk-grid uk-flex uk-flex-middle" uk-grid>
            <div>
                <a class="uk-button uk-button-small uk-button-primary"><?= $os->adminTitle?></a>
            </div>
            <div class="uk-width-expand"></div>
            <div class="uk-flex uk-flex-middle">
                <a class="uk-button uk-button-small uk-button-primary">
                    Howdy, <?= $os->userDetails["name"]?>
                    <img src="images/login.jpg" style="height: 18px; width: 18px; object-fit: cover;">
                </a>
                <div class="profile-drop uk-card uk-card-small uk-card-default uk-margin-remove" uk-drop="mode: click">

                    <div class="uk-card-header uk-light">
                        <table style="border-collapse: collapse">
                            <tr>
                                <td>
                                    <img alt="ui" src="<?= $site["url-wtos"]?>images/user.png" style="height: 40px; width: 40px;" alt="" class="uk-border-circle"/>
                                </td>
                                <td style="line-height: 1; vertical-align: middle; padding-left: 10px"  valign="middle">
                                    <h5 class="uk-margin-remove"><?= $os->userDetails["name"]?></h5>
                                    <small class="uk-margin-remove"><?= $os->userDetails["email"]?></small>

                                </td>
                            </tr>
                        </table>

                    </div>


                    <ul class="uk-nav uk-dropdown-nav uk-nav-divider profile-nav">
                        <li><a href="#">My Profile</a></li>
                        <li><a href="<?php echo URL_WTOS ?>dashBoard.php?logout=logout" style="color: #830101">Logout</a></li>
                    </ul>

                </div>

            </div>
        </div>
    </div>
    <div class="main-menu-container uk-box-shadow-small"><?php include('osLinks.php') ?></div>
</header>

<div class="sidebar sidebar-left" style="display:none;"> <!-- animated slider -->
    <div class="block">
        <?php if($os->isLogin()) { ?><a class="tlinkCss logout" href="?logout=logout" style="text-decoration:none; color:#FF0000">Logout</a> <?php }?>
    </div>
    <div class="toggler">
        <img src="images/arrow.png"/>
    </div>
</div>
