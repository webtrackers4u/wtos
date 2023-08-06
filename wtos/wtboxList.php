<?php
/*
   # wtos version : 1.1
   # Edit page: wtboxEdit.php
   #
*/
global $os, $site;
include('wtosConfigLocal.php');
include(DIR_ADMIN.'top.php');
$pluginName='';
$os->loadPluginConstant($pluginName);


?><?php

$editPage='wtboxEdit.php';
$listPage='wtboxList.php';
$primeryTable='wtbox';
$primeryField='wtboxId';
$pageHeader='List wtbox';
$editPageLink=$os->pluginLink($pluginName).$editPage.'?'.$os->addParams(array(), array()).'editRowId=';
$listPageLink=$os->pluginLink($pluginName).$listPage.'?'.$os->addParams(array(), array());


##  delete row
if($os->get('operation')=='deleteRow') {
    if($os->deleteRow($primeryTable, $primeryField, $os->get('delId'))) {
        $flashMsg='Data Deleted Successfully';

        $os->flashMessage($primeryTable, $flashMsg);
        $os->redirect(URL_WTOS.$listPage);

    }
}


##  fetch row

/* searching */

$andtitleA=  $os->andField('title_s', 'title', $primeryTable, '%');
$title_s=$andtitleA['value'];
$andtitle=$andtitleA['andField'];
$andaccessKeyA=  $os->andField('accessKey_s', 'accessKey', $primeryTable, '%');
$accessKey_s=$andaccessKeyA['value'];
$andaccessKey=$andaccessKeyA['andField'];

$searchKey=$os->setNget('searchKey', $primeryTable);
$whereFullQuery='';
if($searchKey!='') {
    $whereFullQuery ="and ( title like '%$searchKey%' Or accessKey like '%$searchKey%' )";

}

$listingQuery=" select * from $primeryTable where $primeryField>0   $whereFullQuery    $andtitle  $andaccessKey   order by  $primeryField desc  ";

##  fetch row

$resource=$os->pagingQuery($listingQuery, $os->showPerPage);
$records=$resource['resource'];


$os->showFlash($os->flashMessage($primeryTable));
?>
<div class="uk-padding-small">


    <h4> <?php  echo $pageHeader; ?> </h4>
    <div class="uk-grid-small uk-grid-match" uk-grid >
        <div>
            Search Key
            <input type="text" id="searchKey"  value="<?php echo $searchKey ?>" class="uk-input uk-form-small" />
        </div>

        <div class="uk-hidden">
            Title:
            <input type="text" name="title_s" id="title_s" value="<?php echo $title_s?>" class="uk-input uk-form-small"/>
        </div>
        <div class="uk-hidden">
            Access Key:
            <input type="text" name="accessKey_s" id="accessKey_s" value="<?php echo $accessKey_s?>" class="uk-input uk-form-small"/>
        </div>
        <div class="">
            <div class="uk-flex-bottom uk-flex">
                <a class="uk-button uk-button-primary uk-button-small" href="javascript:void(0)" onclick="javascript:searchText()" style="text-decoration:none;">Search</a>
                <a class="uk-button uk-button-primary uk-button-small uk-margin-small-left" href="javascript:void(0)" onclick="javascript:searchReset()"  style="text-decoration:none;">Reset</a>
                <a class="uk-button uk-button-secondary uk-button-small uk-margin-small-left" href="javascript:void(0)" onclick="os.editRecord('<?php echo $editPageLink?>0') ">Add New Record</a>
            </div>

        </div>

    </div>
    <div class="pagingLinkCss uk-margin-small">Total:<b><?php echo $os->val($resource, 'totalRec'); ?></b>  &nbsp;&nbsp; <?php  echo $resource['links'];?></div>
    <div class="uk-card uk-card-outline uk-card-default">
        <table  class="uk-table uk-table-small uk-table-striped uk-table-hover">
            <thead>
            <tr>
                <th class="uk-table-shrink">#</th>
                <th>Action </th>

                <th>Title</th>
                <th>Access Key</th>
                <th>Language</th>
                <th class="uk-hidden">Content</th>
                <th>Block</th>
                <th>Active</th>
            </tr>
            </thead>
            <tbody>


            <?php
            $serial=$os->val($resource, 'serial');
while($record=$os->mfa($records)) {
    $serial++;
    $rowId=$record[$primeryField];



    ?>
                <tr>
                    <td><?php echo $serial?>      </td>

                    <td>
                        <?php if($os->access('wtEdit')) { ?> <a href="javascript:void(0)" onclick="os.editRecord('<?php   echo $editPageLink ?><?php echo $rowId  ?>')">Edit</a><?php } ?>
                        \
                        <?php if($os->access('wtDelete')) { ?> <a class="uk-text-danger" href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $rowId ?>') ">Delete</a><?php } ?>
                    </td>

                    <td><?= $record['title']?> </td>
                    <td>
                        <?= $record['accessKey']?><br>
                        <small class="uk-text-primary">wtbox-<?php echo $record['accessKey']?>-wtbox</small>
                    </td>
                    <td><?= $os->rowByField('title', 'lang', 'langId', $record['langId']); ?></td>
                    <td class="uk-hidden"><?= $record['content']?></td>
                    <td><?= $record['block']?> </td>
                    <td><?= $record['active']?> </td>
                </tr>
                <?php
}
?>

            </tbody>

        </table>
    </div>

</div>







<script>

    function searchText()
    {


        var title_sVal= os.getVal('title_s');
        var accessKey_sVal= os.getVal('accessKey_s');
        var searchKeyVal= os.getVal('searchKey');
        window.location='<?php echo $listPageLink; ?>title_s='+title_sVal +'&accessKey_s='+accessKey_sVal +'&searchKey='+searchKeyVal +'&';

    }
    function  searchReset()
    {

        window.location='<?php echo $listPageLink; ?>title_s=&accessKey_s=&searchKey=&';


    }

    // dateCalander();

</script>


<?php include(DIR_ADMIN.'bottom.php'); ?>

