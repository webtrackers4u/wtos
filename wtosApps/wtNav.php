<?
global $os,$site, $pageVar, $currentPage, $onHead, $_REF_URL;
?>

<div id="main-menu">
    <div>

        <?if($os->isLogin()){?>
            <div class="profile-picture uk-hidden">
            </div>
        <div class="profile-summery">

            <p class="uk-margin-remove">
                <?= $os->loggedUser()["name"];?><br>
                <small class="uk-text-primary"><?= $os->loggedUser()["mobile_no"];?></small>
            </p>
        </div>
        <?}?>
        <div class="menu">
            <ul>
                <?
                foreach($onHead as $page)
                {
                    $pageSeoLink=($page['externalLink']=='')?$os->sefu->l($page['seoId']):$pageSeoLink=$page['externalLink'];
                    $_target=($page['openNewTab']<1)?'':'target="_blank"';
                    $extra_css =  $page['seoId'] == $currentPage?"selected":"";
                    ?>
                    <li class="<?= $extra_css?>">
                        <a title="<? echo $page['title'] ?>"  <?php echo $_target ?> href="<? echo $pageSeoLink ?>"  ><? echo $page['title'] ?></a>
                    </li>
                <? } ?>
                <?if($os->isLogin()){?>
                    <li>
                        <a href="?logout=OK&ref=<?=$_REF_URL;?>" class="uk-text-danger">Logout</a>
                    </li>
                <?}?>
            </ul>
        </div>
    </div>
</div>


<script>
    document.querySelector("#main-menu").addEventListener("click", function (event){
        if(event.target.id==="main-menu"){
            //history.back();
            window.setMenuActive(0);
        };
    });
</script>



