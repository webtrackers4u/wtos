<? 
/*
   # wtos version : 1.1
   # Edit page: contactusEdit.php 
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
$pageHeader='List contactus';
$editPageLink=$os->pluginLink($pluginName).$editPage.'?'.$os->addParams(array(),array()).'editRowId=';
$listPageLink=$os->pluginLink($pluginName).$listPage.'?'.$os->addParams(array(),array());


##  delete row
if($os->get('operation')=='deleteRow')
{
       if($os->deleteRow($primeryTable,$primeryField,$os->get('delId')))
	   {
	     $flashMsg='Data Deleted Successfully';
		 
		  $os->flashMessage($primeryTable,$flashMsg);
		  $os->redirect($site['url-wtos'].$listPage);
		  
	   }
}
 

##  fetch row

/* searching */

$andnameA=  $os->andField('name_s','name',$primeryTable,'%');
   $name_s=$andnameA['value']; $andname=$andnameA['andField'];	 
$andemailA=  $os->andField('email_s','email',$primeryTable,'%');
   $email_s=$andemailA['value']; $andemail=$andemailA['andField'];	 
$andmobileA=  $os->andField('mobile_s','mobile',$primeryTable,'%');
   $mobile_s=$andmobileA['value']; $andmobile=$andmobileA['andField'];	 
$anddetailsA=  $os->andField('details_s','details',$primeryTable,'%');
   $details_s=$anddetailsA['value']; $anddetails=$anddetailsA['andField'];	 
$andstatusA=  $os->andField('status_s','status',$primeryTable,'=');
   $status_s=$andstatusA['value']; $andstatus=$andstatusA['andField'];	 

$searchKey=$os->setNget('searchKey',$primeryTable);
$whereFullQuery='';
if($searchKey!=''){
$whereFullQuery ="and ( name like '%$searchKey%' Or email like '%$searchKey%' Or mobile like '%$searchKey%' Or details like '%$searchKey%' Or status like '%$searchKey%' )";

}

$listingQuery=" select * from $primeryTable where $primeryField>0   $whereFullQuery    $andname  $andemail  $andmobile  $anddetails  $andstatus   order by  $primeryField desc  ";

##  fetch row
 
$resource=$os->pagingQuery($listingQuery,$os->showPerPage);
$records=$resource['resource'];

 
$os->showFlash($os->flashMessage($primeryTable));
?>

	<table class="container" border="0" width="99%" cellpadding="0" cellspacing="0" style="margin:5px 3px 3px 3px">
				
			<tr>
			<td >
			<div class="search"  >
						 
			  
			  <table cellpadding="0" cellspacing="0" border="0">
							<tr >
							<td class="buttonSa">
							
							
							
							
	Search Key  
  <input type="text" id="searchKey"  value="<? echo $searchKey ?>" />   &nbsp;
     
	  
	 
   <div style="display:none" id="advanceSearchDiv">
         
 Name: <input type="text" class="wtTextClass" name="name_s" id="name_s" value="<? echo $name_s?>" /> &nbsp;  Email: <input type="text" class="wtTextClass" name="email_s" id="email_s" value="<? echo $email_s?>" /> &nbsp;  Mobile: <input type="text" class="wtTextClass" name="mobile_s" id="mobile_s" value="<? echo $mobile_s?>" /> &nbsp;  Details: <input type="text" class="wtTextClass" name="details_s" id="details_s" value="<? echo $details_s?>" /> &nbsp;  Status:
	
	<select name="status" id="status_s" class="textbox fWidth" ><option value="">Select Status</option>	<? 
										  $os->onlyOption($os->contactUsStatus,$status_s);	?></select>	
  
  </div>
							
							<a href="javascript:void(0)" onclick="javascript:searchText()" style="text-decoration:none;"><input type="button" value="Search" style="cursor:pointer" /></a>
						    &nbsp;
						    <a href="javascript:void(0)" onclick="javascript:searchReset()"  style="text-decoration:none;"><input type="button" value="Reset" style="cursor:pointer" /></a>
							
							</td>
							</tr>
					 </table>
					</div>
				<div style="padding:10px;" >
						 
			  <span class="listHeader"> <?php  echo $pageHeader; ?> </span>
			  
			  	 <a href="" style="margin-left:50px; text-decoration:none;"><input type="button" value="Refesh" style="cursor:pointer; text-decoration:none;" /></a>    
			   <a href="javascript:void(0)" style="text-decoration:none; display:none;" onclick="os.editRecord('<? echo $editPageLink?>0') "><input type="button" value="Add New Record" style="cursor:pointer;text-decoration:none;"/></a>
					</div>	
			</td>
			</tr>	
				
				
				<tr>
					
			  <td  class="middle" >
			  
			  <div class="pagingLinkCss">Total:<b><? echo $os->val($resource,'totalRec'); ?></b>  &nbsp;&nbsp; <?php  echo $resource['links'];?>		</div>	
			  
			  <!--  ggggggggggggggg   -->
			  
		
				
				 
			
				 
				 
				 <table  border="0" cellspacing="2" cellpadding="2" class="listTable" >
							<tr class="borderTitle" >
								<td >#</td>
								
								<td style="display:none;" >Action </td>
<td ><b>Date</b></td>  								
<td ><b>Name</b></td>  
  <td ><b>Email</b></td>  
  <td ><b>Mobile</b></td>  
  <td ><b>Details</b></td>  
<!--  <td ><b>image</b></td>  -->
  <td ><b>Status</b></td>  
  
								
							</tr>
											
							
							<?php
							 $serial=$os->val($resource,'serial');  
							 while(  $record=$os->mfa($records )){ 
							 $serial++;
							   $rowId=$record[$primeryField];
							 
								
							
							 ?>							
							<tr  class="trListing" >
								<td><?php echo $serial?>      </td>
								
								 <td class="actionLink" style="display:none;">                   
                       
						
						<? if($os->access('wtEdit')){ ?> <a href="javascript:void(0)" onclick="os.editRecord('<?   echo $editPageLink ?><?php echo $rowId  ?>')">Edit</a><? } ?>	 
						 
					<? if($os->access('wtDelete')){ ?> 	<a href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $rowId ?>') ">Delete</a><? } ?>	 
						 
						
						
					 
						
                        
                       </td>
	<td><?php echo $os->showDate($record['addedDate']);?> </td>  							
<td><?php echo $record['name']?> </td>  
  <td><?php echo $record['email']?> </td>  
  <td><?php echo $record['mobile']?> </td>  
  <td><?php echo $record['details']?> </td>  
 <!-- <td><img src="<?php  echo $site['url'].$record['image']; ?>"  height="70" width="70" /></td>  -->
  <td> <? echo $os->val($os->contactUsStatus,$record['status']); ?> </td> 
  
								 
														
					</tr>
				 
                            
							
							<?php 
							} 
							 ?>
							
							
							
						</table>
				 
				 	
	         
	  
			  
			  <!--   ggggggggggggggg  -->
			  
			  </td>
			  </tr>
			</table>






 
	<script>
	
	 function searchText()
	 {
	 
	   
 var name_sVal= os.getVal('name_s'); 
 var email_sVal= os.getVal('email_s'); 
 var mobile_sVal= os.getVal('mobile_s'); 
 var details_sVal= os.getVal('details_s'); 
 var status_sVal= os.getVal('status_s'); 
 var searchKeyVal= os.getVal('searchKey'); 
window.location='<?php echo $listPageLink; ?>name_s='+name_sVal +'&email_s='+email_sVal +'&mobile_s='+mobile_sVal +'&details_s='+details_sVal +'&status_s='+status_sVal +'&searchKey='+searchKeyVal +'&';
	  
	 }
	function  searchReset()
	{
			
	  window.location='<?php echo $listPageLink; ?>name_s=&email_s=&mobile_s=&details_s=&status_s=&searchKey=&';	
	   
	
	}
		
	// dateCalander();
	
	</script>
	
	 
<? include($site['root-wtos'].'bottom.php'); ?>
    