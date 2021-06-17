<? 
/*
   # wtos version : 1.1
   # page called by ajax script in gallerycatagoryDataView.php 
   #  
*/
include('wtosConfigLocal.php');
include($site['root-wtos'].'wtosCommon.php');
$pluginName='';
$os->loadPluginConstant($pluginName);

 
?><?

if($os->get('WT_gallerycatagoryListing')=='OK')
 
{
    $where='';
	$showPerPage= $os->post('showPerPage');
	 	
	
$andcategoryName=  $os->postAndQuery('categoryName_s','categoryName','%');
$andactive=  $os->postAndQuery('active_s','active','%');

	   
	$searchKey=$os->post('searchKey');
	if($searchKey!=''){
	$where ="and ( categoryName like '%$searchKey%' Or active like '%$searchKey%' )";
 
	}
		
	$listingQuery="  select * from gallerycatagory where galleryCatagoryId>0   $where   $andcategoryName  $andactive     order by galleryCatagoryId desc";
	  
	$resource=$os->pagingQuery($listingQuery,$os->showPerPage,false,true);
	$rsRecords=$resource['resource'];
	 
 
?>
<div class="listingRecords">
<div class="pagingLinkCss">Total:<b><? echo $os->val($resource,'totalRec'); ?></b>  &nbsp;&nbsp; <? echo $resource['links']; ?>   </div>

<table  border="0" cellspacing="2" cellpadding="2" class="noBorder"  >
							<tr class="borderTitle" >
						
	                            <td >#</td>
									<td >Action </td>
								

											
<td ><b>Album</b></td>  
  <td ><b>Status</b></td>  
  						
							 
 
						       	</tr>
							
							
							
							<?php
								  
						  	 $serial=$os->val($resource,'serial');  
						 
							while($record=$os->mfa( $rsRecords)){ 
							 $serial++;
							    
								
							
						
							 ?>
							<tr class="trListing">
							<td><?php echo $serial; ?>     </td>
							<td> 
							<? if($os->access('wtView')){ ?>
							<span  class="actionLink" ><a href="javascript:void(0)"  onclick="WT_gallerycatagoryGetById('<? echo $record['galleryCatagoryId'];?>')" >Edit</a></span>  <? } ?>  </td>
								
<td><?php echo $record['categoryName']?> </td>  
  <td> <? if(isset($os->galleryCatagoryActive[$record['active']])){ echo  $os->galleryCatagoryActive[$record['active']]; } ?></td> 
  
								
				 </tr>
                          <? 
						  
						 
						  } ?>  
							
		
			
			
							 
		</table> 
		
		
		
		</div>
		
		<br />
		
		
						
<?php 
exit();
	
}
 





if($os->get('WT_gallerycatagoryEditAndSave')=='OK')
{
 $galleryCatagoryId=$os->post('galleryCatagoryId');
 
 
		 
 $dataToSave['categoryName']=addslashes($os->post('categoryName')); 
 $dataToSave['active']=addslashes($os->post('active')); 

 
		
		
		//$dataToSave['modifyDate']=$os->now();
		//$dataToSave['modifyBy']=$os->userDetails['adminId']; 
		
		if($galleryCatagoryId < 1){
		
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
		}
		
		 
          $qResult=$os->save('gallerycatagory',$dataToSave,'galleryCatagoryId',$galleryCatagoryId);///    allowed char '\*#@/"~$^.,()|+_-=:££ 	
		if($qResult)  
				{
		if($galleryCatagoryId>0 ){ $mgs= " Data updated Successfully";}
		if($galleryCatagoryId<1 ){ $mgs= " Data Added Successfully"; $galleryCatagoryId=  $qResult;}
		
		  $mgs=$galleryCatagoryId."#-#".$mgs;
		}
		else
		{
		$mgs="Error#-#Problem Saving Data.";
		
		}
		//_d($dataToSave);
		echo $mgs;		
 
exit();
	
} 
 
if($os->get('WT_gallerycatagoryGetById')=='OK')
{
		$galleryCatagoryId=$os->post('galleryCatagoryId');
		
		if($galleryCatagoryId>0)	
		{
		$wheres=" where galleryCatagoryId='$galleryCatagoryId'";
		}
	    $dataQuery=" select * from gallerycatagory  $wheres ";
		$rsResults=$os->mq($dataQuery);
		$record=$os->mfa( $rsResults);
		
		 
 $record['categoryName']=$record['categoryName'];
 $record['active']=$record['active'];

		
		
		echo  json_encode($record);	 
 
exit();
	
}
 
 
if($os->get('WT_gallerycatagoryDeleteRowById')=='OK')
{ 

$galleryCatagoryId=$os->post('galleryCatagoryId');
 if($galleryCatagoryId>0){
 $updateQuery="delete from gallerycatagory where galleryCatagoryId='$galleryCatagoryId'";
 $os->mq($updateQuery);
    echo 'Record Deleted Successfully';
 }
 exit();
}
 
