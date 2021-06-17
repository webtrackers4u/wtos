<?
/*
   # wtos version : 1.1
   # List Page : wtboxList.php 
   #  
*/
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
 $dataToSave['system']=addslashes($os->post('system')); 

																																															
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
 
 
	<table class="container">
				<tr>
					 
			  <td  class="middle" style="padding-left:5px;">
			  
			  
			 <div class="formsection">
						<h3><?php  echo $pageHeader; ?></h3>
						
						<form  action="<? echo $editPageLink ?>" method="post"   enctype="multipart/form-data" id="submitFormDataId">
						
						<fieldset class="cFielSets"  >
						<legend  class="cLegend">Details</legend>
						
				 
						
						<table width="100%" border="0" class="formClass"   >
						
							
<tr >
	  									<td>Title </td>
										<td><input value="<?php echo $os->getVal('title') ?>" type="text" name="title" id="title" class="textbox  fWidth "/> </td>						
										</tr><tr >
	  									<td>Acess Key </td>
										<td><input value="<?php echo $os->getVal('accessKey') ?>" type="text" name="accessKey" id="accessKey" class="textbox  fWidth "/> </td>						
										</tr><tr >
	  									<td>Language </td>
										<td> <select name="langId" id="langId" class="textbox fWidth" ><option value="">Select Language</option>		  	<? 
								
										  $os->optionsHTML($os->getVal('langId'),'langId','title','lang');?>
							</select> </td>						
										</tr><tr >
	  									<td>Css </td>
										<td><textarea  name="css" id="css" ><?php echo $os->getVal('css') ?></textarea></td>						
										</tr><tr >
	  									<td>Container </td>
										<td>  
	
	<select name="container" id="container" class="textbox fWidth" ><option value="">Select Container</option>	<? 
										 $os->onlyOption($os->boxContainer,$os->getVal('container'));?></select>	 </td>						
										</tr><tr >
	  									<td>Content </td>
										<td><textarea  name="content" id="content" ><?php echo $os->getVal('content') ?></textarea></td>						
										</tr><tr >
	  									<td>Tinymce </td>
										<td>  
	
	<select name="tinymce" id="tinymce" class="textbox fWidth" ><option value="">Select Tinymce</option>	<? 
										 $os->onlyOption($os->boxYesNo,$os->getVal('tinymce'));?></select>	 </td>						
										</tr><tr >
	  									<td>Active </td>
										<td>  
	
	<select name="active" id="active" class="textbox fWidth" ><option value="">Select Active</option>	<? 
										 $os->onlyOption($os->boxActive,$os->getVal('active'));?></select>	 </td>						
										</tr><tr >
	  									<td>System </td>
										<td>  
	
	<select name="system" id="system" class="textbox fWidth" ><option value="">Select System</option>	<? 
										 $os->onlyOption($os->boxYesNo,$os->getVal('system'));?></select>	 </td>						
										</tr>
                        </table>
						</fieldset>
						
						
						
						
						 
						
					<? if($os->access('wtEdit')){ ?> 	<input type="button" class="submit"  value="Save" onclick="submitFormData()" />	 <? } ?>	 
                        <input type="button" class="submit"  value="Back to List" onclick="javascript:window.location='<? echo $listPageLink ?>';" />	
						<input type="hidden" name="redirectLink"  value="<? echo $os->server('HTTP_REFERER'); ?>" />
						<input type="hidden" name="rowId" value="<?php   echo  $os->getVal($primeryField) ;?>" />
                        <input type="hidden" name="operation" value="updateField" />
						</form>
					</div>			  </td>
			  </tr>
			</table>


 
<script>
function submitFormData()
{


   

   
  os.submitForm('submitFormDataId');

}
</script>
 
<? include($site['root-wtos'].'bottom.php'); ?>
 