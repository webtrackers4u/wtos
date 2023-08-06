<?php

use Library\Classes\Request;

include "__header.php";
global $os, $pageBody, $site;
echo stripslashes($os->wtospage['pageCss']);

$gallery_id = Request::getGet("id");
$gallery = $os->_db->getModel("gallerycatagory")->selectOne("*", ["galleryCatagoryId"=>$gallery_id]);
if(!$gallery) {
    $galleries = $os->_db->getModel("gallerycatagory")->select("*");
    ?>

    <section class="uk-section banner">

        <div class="uk-text-center uk-container" uk-scrollspy="cls: uk-animation-slide-bottom; ">
            <h1 class=" uk-heading-large uk-text-bolder uk-heading uk-image-text" ><?= $os->wtospage["heading"]?></h1>
            <p class="uk-text-large uk-container-small uk-margin-auto"><?= $os->wtospage["excerpt"]?></p class="text-xl">
        </div>
    </section>
    <section class="uk-section-default uk-section">
        <div class="uk-container">
            <div class="uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s" uk-grid>


            <?php
            foreach ($galleries as $gallery) {
                ?>
                <div>
                    <div class="uk-card uk-card-default uk-card-outline uk-border-rounded uk-card-body uk-text-center pointable">
                        <h3><?= $gallery["categoryName"]?></h3>
                    </div>
                </div>

                <?php
            }
    ?>
            </div>
        </div>
    </section>
<?php } else {
    $images = $os->_db->getModel("photogallery")->select("*", [
        "galleryCatagoryId"=>$gallery_id
    ]);
    ?>

    <section class="uk-section banner">

        <div class="uk-text-center uk-container" uk-scrollspy="cls: uk-animation-slide-bottom; ">
            <h1 class=" uk-heading-large uk-text-bolder uk-heading uk-image-text" ><?= $gallery["categoryName"]?></h1>
            <p class="uk-text-large uk-container-small uk-margin-auto"><?= $os->wtospage["excerpt"]?></p class="text-xl">
        </div>
    </section>
    <section class="uk-section-default uk-section">
        <div class="uk-container">
            <div class="uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s" uk-grid>


                <?php
                foreach ($images as $image) {
                    ?>
                    <div>
                        <div class="uk-card uk-card-default uk-card-outline uk-border-rounded pointable uk-overflow-hidden">
                            <img src="<?=BASE_URL.$image["name"]?>">


                            <div class=" uk-card-body">
                                <?= $image["title"]?>
                            </div>

                        </div>
                    </div>

                    <?php
                }
    ?>
            </div>
        </div>
    </section>

    <?php
}
?>

<?php include "__footer.php"?>

