<?
global $site, $os;
$login_response = $os->processLogin('username','password','admin');

?>
<?php if($os->isLogin()){
    $os->redirect($site['url-factory'].'home.php');
    exit();
    ?>

    <?php

} ?>
<?php if(!$os->isLogin()){
    if($os->post('SystemLogin')=='SystemLogin'){
        if(!$login_response){
            ?>
            <script>
                UIkit.notification({
                    message: 'Wrong username or password',
                    status: 'danger',
                    pos: 'top-center',
                    timeout: 5000
                });
            </script>
            <?

        }
    }
    ?>

    <div class="uk-height-1-1 uk-width-1-1 uk-flex uk-flex-middle uk-flex-center uk-padding-small uk-section-muted"
         style="height: 100vh; width: 100vw;">



        <div class="uk-card uk-width-large uk-card-body uk-card-default">
            <div class="uk-text-center uk-margin">
                <img src="<?=$site["url-image"]?>logo.svg" class="uk-width-medium">
            </div>

            <form id="loginForm" method="post" class="uk-margin">



                <table class="uk-width-1-1 uk-table uk-table-small uk-table-justify">
                    <tr>
                        <td>Username</td>
                        <td><input type="text" required class="uk-input uk-form-small" name="username" value="" /></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" required class="uk-input uk-form-small" name="password" value="" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button class="uk-button uk-button-small uk-button-primary">Sign In</button>
                        </td>
                    </tr>
                </table>


                <table class="uk-margin-auto text-xs uk-margin-small-top">
                    <tr>

                        <td class="uk-visible@s">

                            <a href="http://webtrackers.co.in/" title="Powered By Webtrackers4u" target="_blank">
                                <img src="<?php echo $site['url-factory'] ?>images/poweredBywebtrackers4u.png" alt="" width="20"   style="margin:0 0 0 5px; border:none;"/></a>
                        </td>

                        <td>Copyright &copy; 2011 <? echo $os->adminTitle ?> All rights reserved</td>
                    </tr>
                </table>




                <input type="hidden" name="SystemLogin" value="SystemLogin"/>
                <!--<input type="submit" class="loginbtn" value="" />-->

            </form>
        </div>

    </div>

    <?php
    exit();
} ?>

