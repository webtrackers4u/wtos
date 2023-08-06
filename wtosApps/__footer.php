
<?php
global $onBottom, $currentPage, $os, $site;
?>
<footer class="uk-background-primary uk-light">
    <section class="uk-section">
        <div class="uk-container uk-text-center">
            <p>
                Environment: <?= ENVIRONMENT=="-1" ? "Development" : "Production"?>
            </p>
            <ul class="uk-subnav uk-flex uk-flex-middle uk-flex-center uk-flex-wrap">

                <?php foreach ($onBottom as $page) {
                    $pageSeoLink=($page['externalLink']=='') ? $os->sefu->l($page['seoId']) : $pageSeoLink=$page['externalLink'];
                    $_target=($page['openNewTab']<1) ? '' : 'target="_blank"';
                    $extra_css =  $page['seoId'] == $currentPage ? "selected" : "";

                    ?>
                    <li class="<?= $extra_css?>">
                        <a title="<?php echo $page['title'] ?>"  <?php echo $_target ?> href="<?php echo $pageSeoLink ?>"  ><?php echo $page['title'] ?></a>
                    </li>
                <?}?>
            </ul>
        </div>

    </section>
    <div style="background-color: rgba(0,0,0,0.03)">
        <div class="uk-container background-color-primary-dark uk-text-center">
            <p class="uk-margin-small-top uk-margin-small-bottom uk-text-small">Copyright © 2021- WEBTRACKERS4U . All rights reserved.</p>
        </div>
    </div>
</footer>

<?php
include __DIR__."/../wtos/tinyMCE.php";
?>
<script>
    //tmce_inline("edit_area");
</script>

</main>
</body>
</html>
