<? 
/*
   # wtos version : 1.1
   # page called by ajax script in wtossettings.php 
   #  
*/
include('wtosConfigLocal.php');
include($site['root-wtos'].'wtosCommon.php');
$pluginName='';
$os->loadPluginConstant($pluginName);
?><?

if($os->get('WT_settingsListing')=='OK')
{
    $where='';
	$showPerPage= $os->post('showPerPage');
	$andkeyword=  $os->postAndQuery('keyword_s','keyword','%');
	$andvalue=  $os->postAndQuery('value_s','value','%');

	   
	$searchKey=$os->post('searchKey');
	if($searchKey!=''){
	$where ="and ( keyword like '%$searchKey%' Or value like '%$searchKey%' )";
 
	}
		
	$listingQuery="  select * from settings where settingsId>0   $where   $andkeyword  $andvalue     order by settingsId desc";
	  
	$resource=$os->pagingQuery($listingQuery,$showPerPage,false,true);
	$rsRecords=$resource['resource'];
	 
 
?>
<div class="listingRecords">
<div class="pagingLinkCss">Total:<b><? echo $os->val($resource,'totalRec'); ?></b>  &nbsp;&nbsp; <? echo $resource['links']; ?>   </div>

<table  border="0" cellspacing="2" cellpadding="2" class="noBorder"  >
							<tr class="borderTitle" >
						
	                            <td >#</td>
									<td >Action </td>
								

											
<td ><b>Keyword</b></td>  
  <td ><b>Value</b></td>  
  						
							 
 
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
							<span  class="actionLink" ><a href="javascript:void(0)"  onclick="WT_settingsGetById('<? echo $record['settingsId'];?>')" >Edit</a></span>  <? } ?>  </td>
								
<td><?php echo $record['keyword']?> </td>  
  <td><?php echo $record['value']?> </td>  
  
								
				 </tr>
                          <? 
						  
						 
						  } ?>  
							
		
			
			
							 
		</table> 
		
		Wtos Expiry :<? 	$expDate=$os->getSettings('Validate WtosDate');
	      echo  strrev(base64_decode(strrev($expDate))); ?>
		
		</div>
		
		<br />
		
		
						
<?php 
exit();
	
}
 





if($os->get('WT_settingsEditAndSave')=='OK')
{
 $settingsId=$os->post('settingsId');
 
 
		 
 $dataToSave['keyword']=addslashes($os->post('keyword')); 
 $dataToSave['value']=addslashes($os->post('value')); 

 
		
		
		//$dataToSave['modifyDate']=$os->now();
		//$dataToSave['modifyBy']=$os->userDetails['adminId']; 
		
		if($settingsId < 1){
		
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
		}
		
		 
          $qResult=$os->save('settings',$dataToSave,'settingsId',$settingsId);///    allowed char '\*#@/"~$^.,()|+_-=:££ 	
		if($qResult)  
				{
		if($settingsId>0 ){ $mgs= " Data updated Successfully";}
		if($settingsId<1 ){ $mgs= " Data Added Successfully"; $settingsId=  $qResult;}
		
		  $mgs=$settingsId."#-#".$mgs;
		}
		else
		{
		$mgs="Error#-#Problem Saving Data.";
		
		}
		//_d($dataToSave);
		echo $mgs;		
 
exit();
	
} 
 
if($os->get('WT_settingsGetById')=='OK')
{
		$settingsId=$os->post('settingsId');
		
		if($settingsId>0)	
		{
		$wheres=" where settingsId='$settingsId'";
		}
	    $dataQuery=" select * from settings  $wheres ";
		$rsResults=$os->mq($dataQuery);
		$record=$os->mfa( $rsResults);
		
		 
 $record['keyword']=$record['keyword'];
 $record['value']=$record['value'];

		
		
		echo  json_encode($record);	 
 
exit();
	
}
 
 
if($os->get('WT_settingsDeleteRowById')=='OK')
{ 

$settingsId=$os->post('settingsId');
 if($settingsId>0){
 $updateQuery="delete from settings where settingsId='$settingsId'";
 $os->mq($updateQuery);
    echo 'Record Deleted Successfully';
 }
 exit();
}
 
