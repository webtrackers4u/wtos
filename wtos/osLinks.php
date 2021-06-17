
<?
global $os, $site;
function selectedPage($page)
{
    global $os;

    $className='';
    if($os->currentPageName()==$page)
    {
        $className='uk-active';
    }
    return $className;

}
$superAdmin=false;
if($os->userDetails['adminType']=='Super Admin'){ $superAdmin=true;  }


?>

<ul class="uk-subnav uk-subnav-pill uk-margin-remove">
    <? foreach ($os->osLinks as $link=>$title){?>
        <? if($os->hasOsLinkAccess($link)){?>
            <li class=" <? echo selectedPage($link) ?>" >
                <a href="<? echo $site['url-wtos'].$link ?>" ><?= $title?></a>
            </li>
        <?}?>
    <?}?>
</ul>

