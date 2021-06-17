<?
/*
   # wtos version : 1.1
   # List Page : contactusList.php 
   #  
*/
include('wtosConfigLocal.php');
include($site['root-wtos'].'top.php');
$pluginName='';
$os->loadPluginConstant($pluginName);
?><?

$editPage='contactusEdit.php';
$listPage='contactusList.php';
$primeryTable='contactus';
$primeryField='contactid';
$pageHeader='Add new contactus';
 
 
$editPageLink=$os->pluginLink($pluginName).$editPage.'?'.$os->addParams(array(),array()).'editRowId=';
$listPageLink=$os->pluginLink($pluginName).$listPage.'?'.$os->addParams(array(),array());
$tmpVar='';
$editRowId=$os->get('editRowId');
if($editRowId)
{
 $pageHeader='Edit  contactus';
}


##  update row
if($os->post('operation'))
{

	 if($os->post('operation')=='updateField')
	 {
	  $rowId=$os->post('rowId');
	  
	  #---- edit section ----#
	 	 	 	 	 	 	 	 	 	 	 	 	 	  	 	 	 	 	 	 	 	 	    	  	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	  	 	  	 	 	
 $dataToSave['name']=addslashes($os->post('name')); 
 $dataToSave['email']=addslashes($os->post('email')); 
 $dataToSave['mobile']=addslashes($os->post('mobile')); 
 $dataToSave['details']=addslashes($os->post('details')); 
 $image=$os->UploadPhoto('image',$site['root'].'wtos-images');
				   	if($image!=''){
					$dataToSave['image']='wtos-images/'.$image;}
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
	  									<td>Name </td>
										<td><input value="<?php echo $os->getVal('name') ?>" type="text" name="name" id="name" class="textbox  fWidth "/> </td>						
										</tr><tr >
	  									<td>Email </td>
										<td><input value="<?php echo $os->getVal('email') ?>" type="text" name="email" id="email" class="textbox  fWidth "/> </td>						
										</tr><tr >
	  									<td>Mobile </td>
										<td><input value="<?php echo $os->getVal('mobile') ?>" type="text" name="mobile" id="mobile" class="textbox  fWidth "/> </td>						
										</tr><tr >
	  									<td>Details </td>
										<td><input value="<?php echo $os->getVal('details') ?>" type="text" name="details" id="details" class="textbox  fWidth "/> </td>						
										</tr><tr >
	  									<td>image </td>
										<td>
										
										<img id="imagePreview" src="<?php echo $site['url']?><?php echo $os->getVal('image');?>  " height="100"  />		
										<input type="file" name="image" value=""  id="image" onchange="os.readURL(this,'imagePreview') " style="display:none;"/><br>
										
										 <span style="cursor:pointer; color:#FF0000;" onclick="os.clicks('image');">Edit Image</span>
										 
										 
										 
										</td>						
										</tr><tr >
	  									<td>Status </td>
										<td>  
	
	<select name="status" id="status" class="textbox fWidth" ><option value="">Select Status</option>	<? 
										 $os->onlyOption($os->contactUsStatus,$os->getVal('status'));?></select>	 </td>						
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
 