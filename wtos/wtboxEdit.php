<?
/*
   # wtos version : 1.1
   # List Page : wtboxList.php
   #
*/

use Library\Classes\Block;

include('wtosConfigLocal.php');
include($site['root-wtos'].'top.php');
$pluginName='';
$os->loadPluginConstant($pluginName);
?><?

$editPage='wtboxEdit.php';
$listPage='wtboxList.php';
$primeryTable='wtbox';
$primeryField='wtboxId';
$pageHeader='Add new wtbox';


$editPageLink=$os->pluginLink($pluginName).$editPage.'?'.$os->addParams(array(),array()).'editRowId=';
$listPageLink=$os->pluginLink($pluginName).$listPage.'?'.$os->addParams(array(),array());
$tmpVar='';
$editRowId=$os->get('editRowId');
if($editRowId)
{
    $pageHeader='Edit  wtbox';
}


##  update row
if($os->post('operation'))
{

    if($os->post('operation')=='updateField')
    {
        $rowId=$os->post('rowId');
        #---- edit section ----#

        $dataToSave['title']=addslashes($os->post('title'));
        $dataToSave['accessKey']=addslashes($os->post('accessKey'));
        $dataToSave['langId']=addslashes($os->post('langId'));
        $dataToSave['css']=addslashes($os->post('css'));
        $dataToSave['container']=addslashes($os->post('container'));
        $dataToSave['content']=addslashes($os->post('content'));
        $dataToSave['tinymce']=addslashes($os->post('tinymce'));
        $dataToSave['active']=addslashes($os->post('active'));
        $dataToSave["block"] = addslashes($os->post('block'));
        $dataToSave["block_values"] = addslashes(@serialize($os->post('block_values')));


        if($rowId < 1){
            $dataToSave['addedDate']=$os->now();
            $dataToSave['addedBy']=$os->userDetails['adminId'];
        }

        $os->save($primeryTable,$dataToSave,$primeryField,$rowId);

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


    <h3><?php  echo $pageHeader; ?></h3>

    <form  action="<? echo $editPageLink ?>" method="post"   enctype="multipart/form-data" id="submitFormDataId">

        <input type="hidden" name="redirectLink"  value="<? echo $os->server('HTTP_REFERER'); ?>" />
        <input type="hidden" name="rowId" value="<?php   echo  $os->getVal($primeryField) ;?>" />
        <input type="hidden" name="operation" value="updateField" />
        <div class="uk-card uk-card-default uk-card-outline uk-card-small uk-margin">
            <div class="uk-card-header">
                <h4>Details</h4>
            </div>
            <div class="uk-card-body">
                <div class="uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s uk-grid-small" uk-grid>

                    <div>
                        <label>Title </label>
                        <input value="<?php echo $os->getVal('title') ?>" type="text" name="title" id="title" class="uk-input uk-form-small"/>
                    </div>
                    <div>
                        <label>Access Key </label>
                        <input value="<?php echo $os->getVal('accessKey') ?>" type="text" name="accessKey" id="accessKey" class="uk-input uk-form-small"/>
                    </div>
                    <div>
                        <label>Language </label>
                         <select name="langId" id="langId" class="uk-select uk-form-small" >
                             <option value="">Select Language</option>		  	<?

                                $os->optionsHTML($os->getVal('langId'),'langId','title','lang');?>
                            </select>
                    </div>

                    <div>
                        <label>Container </label>
                        <select name="container" id="container" class="uk-select uk-form-small" ><option value="">Select Container</option>	<?
                            $os->onlyOption($os->boxContainer,$os->getVal('container'));?>
                        </select>
                    </div>
                    <div class="uk-width-1-1 uk-hidden">
                        <label>Css </label>
                        <textarea  name="css" id="css"  class="uk-textarea uk-form-small"><?php echo $os->getVal('css') ?></textarea>
                    </div>
                    <div class="uk-width-1-1 <?= $os->getVal('block')!=""?"uk-hidden":""?>">
                        <label>Content </label>
                        <textarea  name="content" id="content" class="uk-textarea uk-form-small" style="min-height: 150px"><?php echo $os->getVal('content') ?></textarea>
                    </div>
                    <div  class="uk-hidden">
                        <label>Tinymce </label>
                            <select name="tinymce" id="tinymce" class="uk-select uk-form-small" ><option value="">Select Tinymce</option>	<?
                                $os->onlyOption($os->boxYesNo,$os->getVal('tinymce'));?></select>
                    </div>
                    <div>
                        <label>Active </label>
                            <select name="active" id="active" class="uk-select uk-form-small" ><option value="">Select Active</option>	<?
                                $os->onlyOption($os->boxActive,$os->getVal('active'));?></select>
                    </div>


                    <div>
                        <label>Block</label>

                        <select name="block" id="block" class="uk-select uk-form-small" >
                            <option value="">Select Block</option>
                            <? $os->onlyOption(Block::get_blocks(),$os->getVal('block'));?>

                        </select>

                    </div>
                </div>
            </div>
        </div>

        <div>
            <?
            Block::render_form($os->getVal('block'), "block_values", $os->getVal("block_values"));
            ?>
        </div>





        <div class="uk-margin-small">



            <? if($os->access('wtEdit')){ ?>
                <input type="button" class="uk-button uk-button-small uk-button-primary"  value="Save" onclick="submitFormData()" />
            <? } ?>
            <input type="button" class="uk-button uk-button-small uk-button-danger"   value="Back to List" onclick="javascript:window.location='<? echo $listPageLink ?>';" />
        </div>

    </form>
</div>

<? include('tinyMCE.php'); ?>
<script>
    function submitFormData()
    {





        os.submitForm('submitFormDataId');

    }
</script>


<? include($site['root-wtos'].'bottom.php'); ?>

