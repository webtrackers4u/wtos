<?php

use Library\Classes\Pagination;
use Library\Classes\Request;
use Library\Classes\Router;
use Library\Classes\Tools;

include "__header.php";
global $os, $pageBody, $site;
echo stripslashes($os->wtospage['pageCss']);
//declare router pattern
$router = new Router("/contact-list/:page");
//get router params
$page = $router->getParam("page") ?: 1;
?>

<section class="uk-section banner uk-hidden">

    <div class="uk-text-center uk-container" uk-scrollspy="cls: uk-animation-slide-bottom; ">
        <h1 class=" uk-heading-large uk-text-bolder uk-heading uk-image-text"><?= $os->wtospage["heading"] ?></h1>
        <p class="uk-text-large uk-container-small uk-margin-auto"><?= $os->wtospage["excerpt"] ?></p class="text-xl">
    </div>
</section>


<section class="uk-section-default uk-section">
    <div class="uk-container">
        <?php $pageBody; ?>

        <?php
        $pagination = ["page" => $page, "rows" => 10];
        $paginated_data = $os->_db->getModel("contactus")->paginate("*", null, $pagination);
        $rows = $paginated_data["data"];
        $pager = $paginated_data["pager"];
        ?>
        <div class="uk-card-outline uk-card-default uk-border-rounded">
            <div class="uk-card-header">
                <div uk-grid>
                    <div>
                        <div class="uk-card-title">
                            Showing <?= $pager["from"] ?> - <?= $pager["to"] ?> of <?= $pager["total"] ?>
                        </div>
                    </div>

                    <div class="uk-width-expand">
                        <?= Pagination::generateLinks($page, $pager["pages"], [
                            "pattern" => "<li class='[active]'><a href='" . Tools::base_url("contact-list/[page]") . "'>[label]</a></li>",
                            "container" => "<ul class='uk-pagination uk-flex-right'>[links]</ul>",
                        ]); ?>
                    </div>
                </div>

            </div>
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
                    <?php
                    foreach ($rows as $row) { ?>
                        <tr>
                            <td nowrap=""><?= $row["name"] ?></td>
                            <td><?= $row["email"] ?></td>
                            <td><?= $row["mobile"] ?></td>
                            <td><?= substr($row["details"], 0, 20) ?>...</td>
                        </tr>
                    <?php }
                    //dump($os->_db->log());
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</section>


<?php include "__footer.php" ?>