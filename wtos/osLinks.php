
<?php
global $os, $site;
function selectedPage($page)
{
    global $os;

    $className='';
    if($os->currentPageName()==$page) {
        $className='uk-active';
    }
    return $className;

}
$superAdmin=false;
if($os->userDetails['adminType']=='Super Admin') {
    $superAdmin=true;
}


?>

<ul class="uk-subnav uk-subnav-pill uk-margin-remove">
    <?php foreach ($os->osLinks as $link=>$title) {?>
        <?php if($os->hasOsLinkAccess($link)) {?>
            <li class=" <?php echo selectedPage($link) ?>" >
                <a href="<?php echo URL_WTOS.$link ?>" ><?= $title?></a>
            </li>
        <?}?>
    <?}?>
</ul>

