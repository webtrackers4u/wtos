<?
/*
   # wtos version : 1.1
   # List Page : adminList.php
   #
*/
include('wtosConfigLocal.php');
include($site['root-wtos'].'top.php');
$pluginName='';
$os->loadPluginConstant($pluginName);
?><?

$editPage='adminEdit.php';
$listPage='adminList.php';
$primeryTable='admin';
$primeryField='adminId';
$pageHeader='Add new admin';


$editPageLink=$os->pluginLink($pluginName).$editPage.'?'.$os->addParams(array(),array()).'editRowId=';
$listPageLink=$os->pluginLink($pluginName).$listPage.'?'.$os->addParams(array(),array());

if($os->userDetails['adminType']!='Super Admin'){ exit(); }

$tmpVar='';
$editRowId=$os->get('editRowId');
if($editRowId)
{
    $pageHeader='Edit  admin';
}


##  update row
if($os->post('operation'))
{


    if($os->post('operation')=='updateField')
    {



        $rowId=$os->post('rowId');

        #---- edit section ----#

        $dataToSave['name']=addslashes($os->post('name'));
        $dataToSave['adminType']=addslashes($os->post('adminType'));
        $dataToSave['username']=addslashes($os->post('username'));
        $dataToSave['password']=addslashes($os->post('password'));
        $dataToSave['address']=addslashes($os->post('address'));
        $dataToSave['email']=addslashes($os->post('email'));
        $dataToSave['mobileNo']=addslashes($os->post('mobileNo'));
        $dataToSave['active']=addslashes($os->post('active'));
        $dataToSave['access'] = addslashes(json_encode($os->post("access")));
        if($rowId < 1){
            $dataToSave['addedDate']=$os->now();
            $dataToSave['addedBy']=$os->userDetails['adminId'];
        }




        $os->saveTable($primeryTable,$dataToSave,$primeryField,$rowId);


        $flashMsg=($rowId)?'Record Updated Successfully':'Record Added Successfully';

        $os->flashMessage($primeryTable,$flashMsg);

        $os->redirect($os->post('redirectLink'));
        #---- edit section end ----#

    }


}


$pageData='';
if($editRowId)
{

    $os->data=$os->rowByField('',$primeryTable,$primeryField,$editRowId);

}


$os->showFlash($os->flashMessage($primeryTable));
?>


<div class="uk-padding-small">



    <form  action="<? echo $editPageLink ?>" method="post"   enctype="multipart/form-data" id="submitFormDataId">

        <div class="uk-grid uk-grid-small" uk-grid>
            <div>
                <div class="uk-card uk-card-small uk-card-default uk-card-outline">
                    <div class="uk-card-header">
                        <h3>personal details</h3>
                    </div>
                    <div class="uk-card-body">
                        <table class="uk-table uk-table-small uk-table-justify">


                            <tr >
                                <td>Name </td>
                                <td>
                                    <input value="<?php echo $os->getVal('name') ?>" type="text" name="name" id="name" class="uk-input uk-form-small"/>
                                </td>
                            </tr><tr >
                                <td>Admin Type </td>
                                <td>

                                    <select name="adminType" id="adminType" class="uk-select uk-form-small" ><option value="">Select Admin Type</option>	<?
                                        $os->onlyOption($os->adminType,$os->getVal('adminType'));?></select>	 </td>
                            </tr><tr >
                                <td>Username </td>
                                <td><input value="<?php echo $os->getVal('username') ?>" type="text" name="username" id="username" class="uk-input uk-form-small"/> </td>
                            </tr><tr >
                                <td>Password </td>
                                <td><input value="<?php echo $os->getVal('password') ?>" type="text" name="password" id="password" class="uk-input uk-form-small"/> </td>
                            </tr><tr >
                                <td>Address </td>
                                <td><input value="<?php echo $os->getVal('address') ?>" type="text" name="address" id="address" class="uk-input uk-form-small"/> </td>
                            </tr><tr >
                                <td>Email </td>
                                <td><input value="<?php echo $os->getVal('email') ?>" type="text" name="email" id="email" class="uk-input uk-form-small"/> </td>
                            </tr><tr >
                                <td>Mobile No </td>
                                <td><input value="<?php echo $os->getVal('mobileNo') ?>" type="text" name="mobileNo" id="mobileNo" class="uk-input uk-form-small"/> </td>
                            </tr><tr >
                                <td>Active </td>
                                <td>

                                    <select name="active" id="active" class="uk-select uk-form-small" ><option value="">Select Active</option>	<?
                                        $os->onlyOption($os->adminActive,$os->getVal('active'));?></select>	 </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
            <div class="uk-width-expand">
                <div class="uk-card uk-card-small uk-card-default uk-card-outline uk-margin-small">
                    <div class="uk-card-header">
                        <h3>Access Details</h3>
                    </div>
                    <div>
                        <table class="uk-table uk-table-small uk-table-divider">

                            <?
                            $ac_body = "";
                            $ac_heads = [];
                            ob_start();
                            $access = (array)@json_decode($os->getVal("access"), JSON_OBJECT_AS_ARRAY);
                            $access_keys = array_keys($access);
                            foreach ($os->osLinks as $link=>$label){
                                $id = str_replace(".php","_php", strtolower($link));
                                ?>
                                <tr>
                                    <td>
                                        <?= $label?>
                                    </td>
                                    <? foreach (@explode("|",@$os->osLinksAccess[$link]) as $access){
                                        $ac_heads[$access] = $access;
                                        ?>
                                        <td>
                                            <label>
                                                <input name="access[<?= $link?>][]" value="<?= $access?>"
                                                    <?= in_array($access, (array)@$access[$link])?"checked":($os->isSuperAdmin()?"":"disabled")?>
                                                       type="checkbox">
                                                <?= ucfirst(strtolower(str_replace("_"," ", $access))); ?>
                                            </label>
                                        </td>
                                    <?}?>
                                </tr>
                            <?}?>
                            <?
                            $ac_body = ob_get_contents();
                            ob_end_clean();
                            ?>

                            <tr>
                                <td>Link</td>
                                <td colspan="<?= sizeof($ac_heads)?>"> Access</td>
                            </tr>
                            <?= $ac_body;?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function checkAllAccess(link){
                var ul = document.querySelector("[sub="+link+"]");
                ul.querySelectorAll("input[type=checkbox]").forEach(checkbox=> {
                    checkbox.checked = document.querySelector("input[check=" + link + "]").checked;
                });
            }
        </script>







        <div class="uk-margin-small">
        <? if($os->access('wtEdit')){ ?>
            <button type="button" class="uk-button uk-button-small uk-button-primary"  value="Save" onclick="submitFormData()" >Save</button>
        <? } ?>
        <button type="button" class="uk-button uk-button-small uk-button-danger"  value="Back to List" onclick="javascript:window.location='<? echo $listPageLink ?>';" >Cancel</button>
        <input type="hidden" name="redirectLink"  value="<? echo $os->server('HTTP_REFERER'); ?>" />
        <input type="hidden" name="rowId" value="<?php   echo  $os->getVal($primeryField) ;?>" />
        <input type="hidden" name="operation" value="updateField" />
        </div>
    </form>
</div>



<script>
    function submitFormData()
    {
        os.submitForm('submitFormDataId');
    }
</script>

<? include($site['root-wtos'].'bottom.php'); ?>
