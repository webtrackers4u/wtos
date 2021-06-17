<?
use Library\Classes\Template;
include('wtosConfigLocal.php');
include($site['root-wtos'].'top.php');
?>
<?

$editPage='pageContentEdit.php';
$listPage='pageContent.php';
$primeryTable='pagecontent';
$primeryField='pagecontentId';
$pageHeader='Add Web Pages';
$editPageLink=$site['url-wtos'].$editPage.'?'.$os->addParams(array(),array()).'editRowId=';
$listPageLink=$site['url-wtos'].$listPage.'?'.$os->addParams(array(),array());
$tmpVar='';
$editRowId=$os->get('editRowId');
if($editRowId)
{
    $pageHeader='Edit Web Pages';
}


##  update row
if($os->post('operation'))
{

    if($os->post('operation')=='updateField')
    {
        $rowId=$os->post('rowId');

        #---- edit section ----#

        $dataToSave['heading']=$os->post('heading');
        $dataToSave['title']=$os->post('title');
        //$dataToSave['excerpt']=$os->post('excerpt');
        $dataToSave['icon']=$os->post('icon');
        $dataToSave['content']=addslashes($os->post('content'));
        $dataToSave['langId']=addslashes($os->post('langId'));
        //	$dataToSave['postInclude']=$os->post('postInclude');
        //$dataToSave['preInclude']=$os->post('preInclude');
        $dataToSave['parentPage']=$os->post('parentPage');
        $dataToSave['seoId']=$os->post('seoId');
        $dataToSave['externalLink']=$os->post('externalLink');

        $dataToSave['loginRequired']=(int)$os->post('loginRequired');
        $dataToSave['onHead']= (int)$os->post('onHead');
        $dataToSave['onBottom']=(int)$os->post('onBottom');
        $dataToSave['openNewTab']=(int)$os->post('openNewTab');

        $dataToSave['metaTitle']=$os->post('metaTitle');
        $dataToSave['metaTag']=$os->post('metaTag');
        $dataToSave['metaDescription']=$os->post('metaDescription');
        $dataToSave['addedBy']=$os->userDetails['adminId'];
        $dataToSave['addedDate']=date("Y-m-d h:i:s");
        $dataToSave['pageCss']=$os->post('pageCss');
        $dataToSave['showImage']=(int)$os->post('showImage');
        $dataToSave['excerpt']=addslashes($os->post('excerpt'));
        $dataToSave['template']=addslashes($os->post('template'));



        $image=$os->UploadPhoto('image',$site['root-image']);
        if($image!='')
        {
            $dataToSave['image']='wtos-images/'.$image;

            if($rowId)
            {
                //   $os->removeImage($primeryTable,$primeryField,$rowId,'image',$site['imgPath']);
            }


        }




        $pagecontentId = $os->saveTable($primeryTable,$dataToSave,$primeryField,$rowId);

        foreach($os->post("fields") as $field=>$value){
            Template::save_field($field, $value, $pagecontentId);
        }



        $flashMsg=($rowId)?'Record Updated Successfully':'Record Added Successfully';

        $os->flashMessage('123',$flashMsg);

        $os->redirect($os->post('redirectLink'));
        #---- edit section end ----#

    }


}



if($editRowId)
{

    $pageData=$os->rowByField('',$primeryTable,$primeryField,$editRowId);

}


?>


<div class="uk-padding-small">
    <form  action="<? echo $editPageLink ?>" method="post"   enctype="multipart/form-data">
        <h3 class="uk-margin-small">
            <?php  echo $pageHeader; ?>
            <div class="uk-float-right uk-text-normal">
            <button type="submit" class="uk-button uk-button-small uk-button-primary"  value="Save">Publish</button>
            <button type="button" class="uk-button uk-button-small uk-button-danger"  value="Back to List" onclick="javascript:window.location='<? echo $listPageLink ?>';">Back to List</button>
            </div>
        </h3>
        <div uk-grid>
            <div class="uk-width-expand@m">
                <div class="uk-card uk-card-small uk-card-default uk-card-body uk-margin">

                    <div class="uk-margin-small">
                        <input value="<?php if(isset($pageData['heading'])){ echo $pageData['heading']; } ?>" type="text" name="heading" class="uk-input uk-form-large" id="heading"/>
                    </div>
                    <div class="uk-margin-small">
                        Link Name
                        <input value="<?php if(isset($pageData['title'])){ echo $pageData['title']; } ?>" type="text" name="title" class="uk-input uk-form-small" onchange="setSeoId(this.value);" id="title" />
                    </div>

                    <script>
                        function sanitize(str) {
                            str = str.toLowerCase();
                            str = str.replace("  ", "");
                            str = str.replace(" ", "-");
                            str = str.replace("/", "-");

                            return str;
                        }
                        function setSeoId(value){
                            let el = document.querySelector("#seoId");
                            let slug = sanitize(value);
                            if (el.value==""){
                                el.value = slug;
                            }
                        }
                    </script>
                    <div class="uk-margin-small">
                        Pre Include
                        <input value="<?php if(isset($pageData['preInclude'])){ echo $pageData['preInclude']; } ?>" type="text" name="preInclude" class="uk-input uk-form-small"/>


                    </div>
                    <div class="uk-margin-small">
                        Excerpt

                        <textarea class="uk-textarea uk-form-small"  name="excerpt" id="excerpt"><?php if(isset($pageData['excerpt'])){ echo stripslashes($pageData['excerpt']); } ?></textarea>
                    </div>
                    <div class="uk-margin-small">
                        Description

                        <textarea class="uk-textarea uk-form-small"  name="content" id="description" style="min-height: 400px; width: 100%"><?php if(isset($pageData['content'])){ echo stripslashes($pageData['content']); } ?></textarea>
                    </div>

                    <div class="uk-margin-small">
                        Post Include
                        <input value="<?php if(isset($pageData['postInclude'])){ echo $pageData['postInclude']; } ?>"  type="text" name="postInclude" class="uk-input uk-form-small"/>
                    </div>

                </div>
                <div class="uk-card uk-card-small uk-card-default uk-card-body uk-margin">
                    <h4>Seo Details</h4>
                    <div class="uk-margin-small">
                        Meta Title:

                        <textarea class="uk-textarea uk-form-small" name="metaTitle" id="metaTitle"><?php if(isset($pageData['metaTitle'])){ echo $pageData['metaTitle']; } ?></textarea>
                    </div>

                    <div class="uk-margin-small">
                        Meta Tag:

                        <textarea class="uk-textarea uk-form-small" name="metaTag" id="metaTag"><?php if(isset($pageData['metaTag'])){ echo $pageData['metaTag']; } ?></textarea>
                    </div>
                    <div class="uk-margin-small">
                        Meta Description:

                        <textarea class="uk-input uk-form-small" name="metaDescription" id="metaDescription"><?php if(isset($pageData['metaDescription'])){ echo $pageData['metaDescription']; } ?></textarea>
                    </div>


                    <div class="uk-margin-small">
                        Page Css
                        <textarea class="uk-textarea uk-form-small" name="pageCss" id="pageCss"><?php if(isset($pageData['pageCss'])){ echo $pageData['pageCss']; } ?></textarea>
                    </div>


                </div>
                <div class="uk-card uk-card-small uk-card-default uk-card-body uk-margin">
                    <h4>Other Params</h4>
                    <?
                    $template = @$pageData["template"]!=""?$pageData["template"]:Template::$DEFAULT_TEMPLATE;
                    $fields = Template::get_fields($template);
                    ?>

                        <? foreach($fields as $field){?>
                            <div class="uk-margin-small">
                                <label><?= $field->label ?></label>
                                <div>
                                    <? if($field->type=="text"){?>
                                        <input class="uk-input uk-form-small" placeholder="<?= $field->placeholder?>" type="text" name="fields[<?= $field->name?>]" id="fields_<?= $field->name?>" value="<?= Template::get_field($field->name,$pageData["pagecontentId"])?>">
                                    <?}?>
                                    <? if($field->type=="textarea"){?>
                                        <textarea class="uk-textarea uk-form-small" placeholder="<?= $field->placeholder?>" type="text" name="fields[<?= $field->name?>]" id="fields_<?= $field->name?>"><?= Template::get_field($field->name,$pageData["pagecontentId"])?></textarea>
                                    <?}?>
                                    <? if($field->type=="rich-text"){?>
                                        <textarea class="uk-textarea uk-form-small tmce" placeholder="<?= $field->placeholder?>" type="text" name="fields[<?= $field->name?>]" id="fields_<?= $field->name?>"><?= Template::get_field($field->name,$pageData["pagecontentId"])?></textarea>
                                    <?}?>
                                </div>
                            </div>
                        <?}?>

                </div>

            </div>
            <div class="uk-width-large@m">
                <div class="uk-card uk-card-small uk-card-default uk-card-body uk-margin">
                    <h5 class="uk-margin-small">Attributes</h5>
                    <table class="uk-margin-small uk-width-1-1" style="border-collapse: collapse">
                        <tr>
                            <td>
                                Icon
                                <input name="icon" id="icon"
                                       class="uk-input uk-form-small uk-hidden"
                                       value="<? if(isset($pageData['icon'])){ echo $pageData['icon']; }?>"/>

                            </td>
                            <td class="p-s">
                                <a class="uk-button uk-button-small uk-button-default">
                                    <i id="icon_view" uk-icon="<? if(@$pageData['icon']!=""){ echo $pageData['icon']; } else {echo "bell";}?>"></i>
                                    Select Icon
                                </a>
                                <div class="uk-card-default uk-card-small uk-text-center uk-border-rounded uk-height-large uk-overflow-auto" uk-drop="mode:click">
                                    <div class="uk-card-body ">


                                    <div class="uk-grid uk-grid-small uk-child-width-1-5" uk-grid>
                                        <?
                                        foreach ($os->icons as $icon){
                                            ?>
                                            <a class="uk-modal-close uk-link"
                                               onclick="document.getElementById('icon').value='<?= $icon?>'; document.getElementById('icon_view').setAttribute('uk-icon', '<?= $icon?>')">
                                                <i uk-icon="<?= $icon?>" class=" uk-text-large"></i>

                                            </a>

                                            <?
                                        }
                                        ?>
                                    </div>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td class="uk-table-shrink uk-text-nowrap">Page Under:</td>
                            <td class="p-s">
                                <select name="parentPage" id="parentPage" class="uk-select uk-form-small">

                                    <option value="0"> No Parent </option>
                                    <?
                                    if(isset($pageData['parentPage'])){ $tmpVar= $pageData['parentPage']; }
                                    $os->optionsHTML($tmpVar,'pagecontentId','title','pagecontent',"active=1 ");

                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="uk-table-shrink uk-text-nowrap">Language</td>
                            <td class="p-s"><select name="langId" id="langId" class="uk-select uk-form-small" >

                                    <?
                                    if(isset($pageData['langId'])){ $tmpVar= $pageData['langId']; }
                                    $os->optionsHTML($tmpVar,'langId','title','lang',"");

                                    ?>
                                </select></td>
                        <tr>
                        <tr>
                            <td class="uk-table-shrink uk-text-nowrap">Template</td>
                            <td class="p-s">
                                <select class="uk-select uk-form-small" name="template" id="template">
                                    <? $os->onlyOption(Template::get_templates(), $pageData["template"])?>
                                </select>
                            </td>
                        <tr>
                        <tr>
                            <td class="uk-table-shrink uk-text-nowrap">External Link</td>
                            <td class="p-s">
                                <input value="<?php if(isset($pageData['externalLink'])){ echo $pageData['externalLink']; } ?>" type="text" name="externalLink" class="uk-input uk-form-small"/>
                            </td>
                        <tr>
                        <tr>
                            <td class="uk-table-shrink uk-text-nowrap">Slug</td>
                            <td class="p-s">
                                <input value="<?php if(isset($pageData['seoId'])){ echo $pageData['seoId']; } ?>"  type="text" name="seoId" class="uk-input uk-form-small"  id="seoId"/>
                            </td>
                        <tr>
                    </table>
                </div>
                <div class="uk-card uk-card-small uk-card-default uk-card-body uk-margin">
                    <h5 class="uk-margin-small">Options</h5>
                    <table class="uk-margin-small uk-width-1-1" style="border-collapse: collapse">
                        <tr>
                            <td class="p-right-m uk-table-shrink">
                                <input class="uk-checkbox" type="checkbox" name="loginRequired" id="loginRequired" value="1" <?php if(isset($pageData['loginRequired'])){ if($pageData['loginRequired']=='1'){ ?> checked="checked" <? } } ?>  />
                            </td>
                            <td>
                                Required Login
                            </td>
                        </tr>
                        <tr>
                            <td><input class="uk-checkbox" type="checkbox" name="onHead" id="onHead" value="1" <?php if(isset($pageData['onHead'])){ if($pageData['onHead']=='1'){ ?> checked="checked" <? } } ?>  /></td>
                            <td>Place on Head Menu</td>
                        </tr>
                        <tr>
                            <td><input class="uk-checkbox" type="checkbox" name="onBottom" value="1" <?php  if(isset($pageData['onBottom'])){ if($pageData['onBottom']=='1'){ ?> checked="checked" <? } } ?>></td>
                            <td>Place on Bottom Menu</td>
                        </tr>

                        <tr>
                            <td><input class="uk-checkbox" type="checkbox" name="openNewTab" value="1" <?php  if(isset($pageData['openNewTab'])){  if($pageData['openNewTab']=='1'){ ?> checked="checked" <? } } ?>  /></td>
                            <td>Open in a new tab</td>
                        </tr>
                    </table>
                </div>
                <div class="uk-card uk-card-small uk-card-default uk-card-body uk-margin">
                    <h5 class="uk-margin-small">Featured Image</h5>
                    <div class="uk-margin-small">
                        <label for="image" style="background-image: url('<?php  echo @$site['url'].@$pageData['image']; ?>')" class="uk-width-1-1 uk-height-medium uk-placeholder uk-flex uk-flex-middle uk-flex-center uk-background-cover">
                            <input type="file" name="image" id="image" class="uk-hidden" />
                            <span>Select Image</span>
                        </label>



                        <input type="checkbox" name="showImage" value="1" <?php if(isset($pageData['showImage'])){ if($pageData['showImage']=='1'){ ?> checked="checked" <? }} ?>  />
                        <font style="color:#0000FF">Show Image</font>

                    </div>
                </div>

            </div>
        </div>





        <input type="hidden" name="redirectLink"  value="<? echo $os->server('HTTP_REFERER'); ?>" />
        <input type="hidden" name="rowId" value="<?php if(isset($pageData[$primeryField])){ echo $pageData[$primeryField]; } ?>" />
        <input type="hidden" name="operation" value="updateField" />
    </form>
</div>


<? include('tinyMCE.php'); ?>
<script>tmce('description')</script>

<? include($site['root-wtos'].'bottom.php'); ?>
