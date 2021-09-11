<?

use Library\Classes\Pagination;
use Library\Classes\Request;

include "__header.php";
global $os, $pageBody, $site;
echo stripslashes($os->wtospage['pageCss']);
?>

<section class="uk-section banner uk-hidden">

    <div class="uk-text-center uk-container" uk-scrollspy="cls: uk-animation-slide-bottom; ">
        <h1 class=" uk-heading-large uk-text-bolder uk-heading uk-image-text" ><?= $os->wtospage["heading"]?></h1>
        <p class="uk-text-large uk-container-small uk-margin-auto"><?= $os->wtospage["excerpt"]?></p class="text-xl">
    </div>
</section>


<section class="uk-section-default uk-section">
    <div class="uk-container">
        <? $pageBody;?>

        <?
        $page = (int)Request::getGet("page")??1;


        $paginated_data = $os->_db->contactus->paginate("*", null, ["page"=>$page, "rows"=>10]);
        $rows = $paginated_data["data"];
        $pager = $paginated_data["pager"];
        ?>
        <table class="uk-table uk-table-divider uk-table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Details</th>
            </tr>
            </thead>
            <tbody>
            <?foreach ($rows as $row){?>
                <tr>
                    <td nowrap=""><?= $row["name"]?></td>
                    <td><?= $row["email"]?></td>
                    <td><?= $row["mobile"]?></td>
                    <td><?= substr($row["details"], 0, 20)?>...</td>
                </tr>
            <?}?>
            </tbody>
        </table>
        <div class="uk-text-center uk-margin">
            <?= Pagination::generateLinks($page, $pager["pages"], []); ?>
        </div>
    </div>
</section>


<? include "__footer.php"?>

