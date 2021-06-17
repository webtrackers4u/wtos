<? 
include('../../wtosConfig.php');
include($site['root-wtos'].'wtosCommon.php');
$primeryTable='wtosfactory';
$primeryField='wtosfactoryId';
$pluginName='wtosFactory';

ob_end_clean();


if($os->get('WT_wtosfactoryListing')=='OK')
{
   $where=''; 
$andformTitleA=  $os->andField('formTitle_s','formTitle',$primeryTable,'%');
   $formTitle_s=$andformTitleA['value']; $andformTitle=$andformTitleA['andField'];	 

   
	$searchKey=$_GET['searchKey'];
	if($searchKey!=''){
	$where ="and ( formTitle like '%$searchKey%' )";
	}
	$listingQuery=" select * from wtosfactory where wtosfactoryId>0   $where   $andformTitle  $andformTitle     order by wtosfactoryId desc";
	
	 
	// $rsRecords=$os->mq($listingQuery);
	$resource=$os->pagingQuery($listingQuery,5,false,true);
	$rsRecords=$resource['resource'];
	
	 


 
?>
<div class="listingRecords">
<div class="pagingLinkCss"> <? echo $resource['links']; ?> </div>

<table  border="0" cellspacing="2" cellpadding="2" class="noBorder"  >
							<tr class="borderTitle" >
						
	                            <td >#</td>
								
								
<td ><b>Title</b></td>  
   
  
																
								<td >Action </td>
 
								
							</tr>
							
							
							
							<?php
								  
						 $i=0;
							while($record=$os->mfa( $rsRecords)){ 
							    
								
							
						
							 ?>
							<tr>
							<td><?php echo $i; ?>     </td>
								
								
<td><?php echo $record['formTitle']?> </td>  
 
  
								<td><span style="cursor:pointer;" class="editAjax" onclick="WT_wtosfactoryGetById('<? echo $record['wtosfactoryId'];?>')">Edit</span>    </td>
				 </tr>
                          <? 
						  
						 $i++;   
						  } ?>  
							
		
			
			
							 
		</table> 
		
		
		
		</div>
		
		<br />
		
		
						
<?php
exit();
	
}

if($os->get('WT_wtosfactoryEditAndSave')=='OK')
{
		$wtosfactoryId=$os->get('wtosfactoryId');
		
		
 $dataToSave['formTitle']=$os->get('formTitle'); 
 $dataToSave['formData']=$os->get('formData'); 

		
		
		$dataToSave['modifyDate']=$os->now();
		$dataToSave['modifyBy']=$os->userDetails['adminId']; 
		
		if($wtosfactoryId < 1){
		
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
		}
		
		$wtosfactoryIdV=$os->save('wtosfactory',$dataToSave,'wtosfactoryId',$wtosfactoryId);	
		
		if($wtosfactoryId>0 )
		{
		if($wtosfactoryId>0 ){ $mgs= " Data updated Successfully";}
		if($wtosfactoryId<1 ){ $mgs= " Data Added Successfully";}
		
		$mgs=$wtosfactoryId."#-#".$mgs;
		}else
		{
	//	$mgs="Error#-#Problem Saving Data.";
		$mgs='';
		}
		echo $mgs;		
 
exit();
	
}

if($os->get('WT_wtosfactoryGetById')=='OK')
{
		$wtosfactoryId=$os->get('wtosfactoryId');
		
		if($wtosfactoryId>0)	
		{
		$wheres=" where wtosfactoryId='$wtosfactoryId'";
		}
	    $dataQuery=" select * from wtosfactory  $wheres ";
		$rsResults=$os->mq($dataQuery);
		$record=$os->mfa( $rsResults);
		
		 
		
 $record['formTitle']=stripslashes($record['formTitle']);
 $record['formData']=stripslashes($record['formData']);

		
		echo  json_encode($record);	 
 
exit();
	
}


if($os->get('WT_wtosfactoryDeleteRowById')=='OK')
{ 

$wtosfactoryId=$_GET['wtosfactoryId'];
 if($wtosfactoryId>0){
 $updateQuery="delete from wtosfactory where wtosfactoryId='$wtosfactoryId'";
 $os->mq($updateQuery);
    echo 'Record Deleted Successfully';
 }
 exit();
}
