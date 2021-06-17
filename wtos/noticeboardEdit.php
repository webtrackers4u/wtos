<?
/*
   # wtos version : 1.1
   # List Page : noticeboardList.php 
   #  
*/
include('wtosConfigLocal.php');
include($site['root-wtos'].'top.php');
$pluginName='';
$os->loadPluginConstant($pluginName);
?><?

$editPage='noticeboardEdit.php';
$listPage='noticeboardList.php';
$primeryTable='noticeboard';
$primeryField='noticeboardId';
$pageHeader='Add new noticeboard';
 
 
$editPageLink=$os->pluginLink($pluginName).$editPage.'?'.$os->addParams(array(),array()).'editRowId=';
$listPageLink=$os->pluginLink($pluginName).$listPage.'?'.$os->addParams(array(),array());
$tmpVar='';
$editRowId=$os->get('editRowId');
if($editRowId)
{
 $pageHeader='Edit  noticeboard';
}


##  update row
if($os->post('operation'))
{

	 if($os->post('operation')=='updateField')
	 {
	  $rowId=$os->post('rowId');
	  
	  #---- edit section ----#
	 	 	 	 	 	 	 	 	 	 	 	 	 	  	 	 	 	 	 	 	 	 	    	  	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	  	 	  	 	 	
 $dataToSave['title']=addslashes($os->post('title')); 
 $dataToSave['link']=addslashes($os->post('link')); 
 $file=$os->UploadPhoto('file',$site['root'].'wtos-images');
				   	if($file!=''){
					$dataToSave['file']='wtos-images/'.$file;}
 $dataToSave['priority']=addslashes($os->post('priority')); 
 $dataToSave['status']=addslashes($os->post('status')); 

																																															
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
										<td><textarea  name="title" id="title" ><?php echo $os->getVal('title') ?></textarea></td>						
										</tr><tr >
	  									<td>Link </td>
										<td><input value="<?php echo $os->getVal('link') ?>" type="text" name="link" id="link" class="textbox  fWidth "/> </td>						
										</tr><tr >
	  									<td>File </td>
										<td>
										
										<a href="<?php echo $site['url']?><?php echo $os->getVal('file');?>" height="100" /><?php echo $os->getVal('file');?></a>		
										<input type="file" name="file" value=""  id="file"  style="display:none;"/><br>
										
										 <span style="cursor:pointer; color:#FF0000;" onclick="os.clicks('file');">Edit </span>
										 
										 
										 
										</td>						
										</tr><tr >
	  									<td>Priority </td>
										<td><input value="<?php echo $os->getVal('priority') ?>" type="text" name="priority" id="priority" class="textbox  fWidth "/> </td>						
										</tr><tr >
	  									<td>Status </td>
										<td>  
	
	<select name="status" id="status" class="textbox fWidth" ><option value="">Select Status</option>	<? 
										 $os->onlyOption($os->noticeboardStatus,$os->getVal('status'));?></select>	 </td>						
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
 