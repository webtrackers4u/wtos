<? 
/*
   # wtos version : 1.1
   # Edit page: wtboxEdit.php 
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
$pageHeader='List wtbox';
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

$andtitleA=  $os->andField('title_s','title',$primeryTable,'%');
   $title_s=$andtitleA['value']; $andtitle=$andtitleA['andField'];	 
$andaccessKeyA=  $os->andField('accessKey_s','accessKey',$primeryTable,'%');
   $accessKey_s=$andaccessKeyA['value']; $andaccessKey=$andaccessKeyA['andField'];	 

$searchKey=$os->setNget('searchKey',$primeryTable);
$whereFullQuery='';
if($searchKey!=''){
$whereFullQuery ="and ( title like '%$searchKey%' Or accessKey like '%$searchKey%' )";

}

$listingQuery=" select * from $primeryTable where $primeryField>0   $whereFullQuery    $andtitle  $andaccessKey   order by  $primeryField desc  ";

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
         
 Title: <input type="text" class="wtTextClass" name="title_s" id="title_s" value="<? echo $title_s?>" /> &nbsp;  Acess Key: <input type="text" class="wtTextClass" name="accessKey_s" id="accessKey_s" value="<? echo $accessKey_s?>" /> &nbsp; 
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
			   <a href="javascript:void(0)" style="text-decoration:none;" onclick="os.editRecord('<? echo $editPageLink?>0') "><input type="button" value="Add New Record" style="cursor:pointer;text-decoration:none;"/></a>
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
								<td >Action </td>
								
<td ><b>Title</b></td>  
  <td ><b>Acess Key</b></td>  
  <td ><b>Language</b></td>  
  <td ><b>Content</b></td>  
  <td ><b>Tinymce</b></td>  
  <td ><b>Active</b></td>  
  
								
							</tr>
											
							
							<?php
							 $serial=$os->val($resource,'serial');  
							 while(  $record=$os->mfa($records )){ 
							 $serial++;
							   $rowId=$record[$primeryField];
							 
								
							
							 ?>							
							<tr  class="trListing" >
								<td><?php echo $serial?>      </td>
								
								 <td class="actionLink">                   
                       
						
						<? if($os->access('wtEdit')){ ?> <a href="javascript:void(0)" onclick="os.editRecord('<?   echo $editPageLink ?><?php echo $rowId  ?>')">Edit</a><? } ?>	 
						 
					<? if($os->access('wtDelete')){ ?> 	<a href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $rowId ?>') ">Delete</a><? } ?>	 
						 
						
						
					 
						
                        
                       </td>
								
<td><?php echo $record['title']?> </td>  
  <td><?php echo $record['accessKey']?>|wtbox-<?php echo $record['accessKey']?>-wtbox </td>  
  <td>  <? echo 
	$os->rowByField('title','lang','langId',$record['langId']); ?></td> 
  <td><?php echo $record['content']?> </td>  
  <td> <? echo $os->val($os->boxYesNo,$record['tinymce']); ?> </td> 
  <td> 
  <? $os->editSelect($os->boxActive,$record['active'],'wtbox','active','wtboxId',$record['wtboxId'], $inputNameID='editSelect',$extraParams='class="editSelect" ',$os->boxActiveColor) ?>
  
  <? echo $os->val($os->boxActive,$record['active']); ?> </td> 
  
								 
														
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
	
	 
<? include($site['root-wtos'].'bottom.php'); ?>
    