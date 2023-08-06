<?php
/*
   # wtos version : 1.1
   # Edit page: adminEdit.php
   #
*/
include('wtosConfigLocal.php');
include(DIR_ADMIN.'top.php');
$pluginName='';
$os->loadPluginConstant($pluginName);


?><?php

$editPage='adminEdit.php';
$listPage='adminList.php';
$primeryTable='admin';
$primeryField='adminId';
$pageHeader='List admin';
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

$andnameA=  $os->andField('name_s', 'name', $primeryTable, '%');
$name_s=$andnameA['value'];
$andname=$andnameA['andField'];
$andadminTypeA=  $os->andField('adminType_s', 'adminType', $primeryTable, '=');
$adminType_s=$andadminTypeA['value'];
$andadminType=$andadminTypeA['andField'];
$andusernameA=  $os->andField('username_s', 'username', $primeryTable, '%');
$username_s=$andusernameA['value'];
$andusername=$andusernameA['andField'];

$searchKey=$os->setNget('searchKey', $primeryTable);
$whereFullQuery='';
if($searchKey!='') {
    $whereFullQuery ="and ( name like '%$searchKey%' Or adminType like '%$searchKey%' Or username like '%$searchKey%' )";

}

$listingQuery=" select * from $primeryTable where $primeryField>0   $whereFullQuery    $andname  $andadminType  $andusername   order by  $primeryField desc  ";

##  fetch row

$resource=$os->pagingQuery($listingQuery, 5);
$records=$resource['resource'];


$os->showFlash($os->flashMessage($primeryTable));
?>
<div class="uk-padding uk-padding-small">
    <h3 class="uk-margin-small"><?=$pageHeader;?></h3>
    <div>
        <div class="uk-inline uk-margin-small-bottom">
            <input type="text" id="searchKey" class="uk-input uk-form-small"  value="<?php echo $searchKey ?>" />

        </div>


        <div style="display:none" id="advanceSearchDiv">

            Name: <input type="text" class="wtTextClass" name="name_s" id="name_s" value="<?php echo $name_s?>" /> &nbsp;  Admin Type:

            <select name="adminType" id="adminType_s" class="textbox fWidth" ><option value="">Select Admin Type</option>	<?php
                $os->onlyOption($os->adminType, $adminType_s);	?></select>
            Username: <input type="text" class="wtTextClass" name="username_s" id="username_s" value="<?php echo $username_s?>" /> &nbsp;
        </div>


        <div class="uk-inline uk-margin-small-bottom">
            <a href="javascript:void(0)"
               onclick="javascript:searchText()" class="uk-button uk-button-primary uk-button-small">Search</a>

            <a href="javascript:void(0)" onclick="javascript:searchReset()"  class="uk-button uk-button-primary uk-button-small">Reset</a>
            <a href="javascript:void(0)"  onclick="os.editRecord('<?php echo $editPageLink?>0') " class="uk-button uk-button-secondary uk-button-small">Add New Record</a>
        </div>
    </div>

    <div class="uk-card uk-card-default uk-card-outline">
        <table class="uk-table uk-table-small uk-table-striped uk-table-responsive">
            <thead>
            <tr>
                <th class="uk-visible@m uk-table-shrink">#</th>
                <th>Name</th>
                <th>Admin Type</th>
                <th>Username</th>
                <th>Email</th>
                <th>Mobile No</th>
                <th>Address</th>
                <th>Active</th>
                <th>Access</th>
                <th>Action </th>
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
                    <td class="uk-visible@m "><?php echo $serial?>      </td>

                    <td title="Name"><?php echo $record['name']?> </td>
                    <td title="Admin Type"> <?php echo $os->val($os->adminType, $record['adminType']); ?> </td>
                    <td title="Username"><?php echo $record['username']?> </td>
                    <td title="Username"><?php echo $record['email']?> </td>
                    <td title="Mobile No."><?php echo $record['mobileNo']?> </td>
                    <td title="Mobile No."><?php echo $record['address']?> </td>
                    <td title="Status"> <?php echo $os->val($os->adminActive, $record['active']); ?> </td>
                    <td title="Access" style="line-height: 1">
                        <ul>
                        <?php
            $ea = (array)@json_decode($record["access"], JSON_OBJECT_AS_ARRAY);
    foreach ($ea as $link=>$accesses) {
        if(!isset($os->osLinks[$link])) {
            continue;
        };
        ?>
                            <li>
                                <?= $os->osLinks[$link]?>
                                <ul class="uk-hidden">
                                    <?foreach ($accesses as $access) {?>
                                        <li><?= $access?></li>
                                    <?}?>
                                </ul>
                            </li>
                            <?php
    }
    ?>
                        </ul>
                    </td>
                    <td>
                        <?php if($os->access('wtEdit')) { ?>
                            <a href="javascript:void(0)" onclick="os.editRecord('<?php   echo $editPageLink ?><?php echo $rowId  ?>')">Edit</a>
                        <?php } ?>

                        <?php if($os->access('wtDelete')) { ?>
                            /
                            <a class="uk-text-danger" href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $rowId ?>') ">Delete</a>
                        <?php } ?>
                    </td>
                </tr>



                <?php
}
?>


            </tbody>
        </table>


    </div>


    <div class="pagingLinkCss">Total:<b><?php echo $os->val($resource, 'totalRec'); ?></b>  &nbsp;&nbsp; <?php  echo $resource['links'];?>		</div>








    <script>

    function searchText()
    {


        var name_sVal= os.getVal('name_s');
        var adminType_sVal= os.getVal('adminType_s');
        var username_sVal= os.getVal('username_s');
        var searchKeyVal= os.getVal('searchKey');
        window.location='<?php echo $listPageLink; ?>name_s='+name_sVal +'&adminType_s='+adminType_sVal +'&username_s='+username_sVal +'&searchKey='+searchKeyVal +'&';

    }
    function  searchReset()
    {

        window.location='<?php echo $listPageLink; ?>name_s=&adminType_s=&username_s=&searchKey=&';


    }

    // dateCalander();

</script>


<?php include(DIR_ADMIN.'bottom.php'); ?>
