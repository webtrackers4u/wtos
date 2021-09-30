<?

use Library\Classes\Block;

include "__header.php";
global $os, $pageBody, $site;
echo stripslashes($os->wtospage['pageCss']);
?>

<section class="uk-section banner">

    <div class="uk-text-center uk-container" uk-scrollspy="cls: uk-animation-slide-bottom; ">
        <h1 class=" uk-heading-large uk-text-bolder uk-heading uk-image-text" ><?= $os->wtospage["heading"]?></h1>
        <p class="uk-text-large uk-container-small uk-margin-auto"><?= $os->wtospage["excerpt"]?></p class="text-xl">
    </div>
</section>


<section class="uk-section-default uk-section">
    <div class="uk-container">
        <? echo $pageBody;?>
    </div>
</section>


<? include "__footer.php"?>

