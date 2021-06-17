<? 
/*
   # wtos version : 1.1
   # page called by ajax script in photogalleryDataView.php 
   #  
*/
include('wtosConfigLocal.php');
include($site['root-wtos'].'wtosCommon.php');
$pluginName='';
$os->loadPluginConstant($pluginName);

 
?><?

if($os->get('WT_photogalleryListing')=='OK')
 
{
    $where='';
	$showPerPage= $os->post('showPerPage');
	 	
	
$andgalleryCatagoryId=  $os->postAndQuery('galleryCatagoryId_s','galleryCatagoryId','%');
$andtitle=  $os->postAndQuery('title_s','title','%');
$andstatus=  $os->postAndQuery('status_s','status','%');

	   
	$searchKey=$os->post('searchKey');
	if($searchKey!=''){
	$where ="and ( galleryCatagoryId like '%$searchKey%' Or title like '%$searchKey%' Or status like '%$searchKey%' )";
 
	}
		
	$listingQuery="  select * from photogallery where photoGalleryId>0   $where   $andgalleryCatagoryId  $andtitle  $andstatus     order by photoGalleryId desc";
	  
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
  <td ><b>Image</b></td>  
  <td ><b>Title</b></td>  
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
							<span  class="actionLink" ><a href="javascript:void(0)"  onclick="WT_photogalleryGetById('<? echo $record['photoGalleryId'];?>')" >Edit</a></span>  <? } ?>  </td>
								
<td>  <? echo 
	$os->rowByField('categoryName','gallerycatagory','galleryCatagoryId',$record['galleryCatagoryId']); ?></td> 
  <td><img src="<?php  echo $site['url'].$record['name']; ?>"  height="70" width="70" /></td>  
  <td><?php echo $record['title']?> </td>  
  <td> <? if(isset($os->photoGalleryStatus[$record['status']])){ echo  $os->photoGalleryStatus[$record['status']]; } ?></td> 
  
								
				 </tr>
                          <? 
						  
						 
						  } ?>  
							
		
			
			
							 
		</table> 
		
		
		
		</div>
		
		<br />
		
		
						
<?php 
exit();
	
}
 





if($os->get('WT_photogalleryEditAndSave')=='OK')
{
 $photoGalleryId=$os->post('photoGalleryId');
 
 
		 
 $dataToSave['galleryCatagoryId']=addslashes($os->post('galleryCatagoryId')); 
 $name=$os->UploadPhoto('name',$site['root'].'wtos-images');
				   	if($name!=''){
					$dataToSave['name']='wtos-images/'.$name;}
 $dataToSave['title']=addslashes($os->post('title')); 
 $dataToSave['status']=addslashes($os->post('status')); 

 
		
		
		//$dataToSave['modifyDate']=$os->now();
		//$dataToSave['modifyBy']=$os->userDetails['adminId']; 
		
		if($photoGalleryId < 1){
		
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
		}
		
		 
          $qResult=$os->save('photogallery',$dataToSave,'photoGalleryId',$photoGalleryId);///    allowed char '\*#@/"~$^.,()|+_-=:££ 	
		if($qResult)  
				{
		if($photoGalleryId>0 ){ $mgs= " Data updated Successfully";}
		if($photoGalleryId<1 ){ $mgs= " Data Added Successfully"; $photoGalleryId=  $qResult;}
		
		  $mgs=$photoGalleryId."#-#".$mgs;
		}
		else
		{
		$mgs="Error#-#Problem Saving Data.";
		
		}
		//_d($dataToSave);
		echo $mgs;		
 
exit();
	
} 
 
if($os->get('WT_photogalleryGetById')=='OK')
{
		$photoGalleryId=$os->post('photoGalleryId');
		
		if($photoGalleryId>0)	
		{
		$wheres=" where photoGalleryId='$photoGalleryId'";
		}
	    $dataQuery=" select * from photogallery  $wheres ";
		$rsResults=$os->mq($dataQuery);
		$record=$os->mfa( $rsResults);
		
		 
 $record['galleryCatagoryId']=$record['galleryCatagoryId'];
 if($record['name']!=''){
						$record['name']=$site['url'].$record['name'];}
 $record['title']=$record['title'];
 $record['status']=$record['status'];

		
		
		echo  json_encode($record);	 
 
exit();
	
}
 
 
if($os->get('WT_photogalleryDeleteRowById')=='OK')
{ 

$photoGalleryId=$os->post('photoGalleryId');
 if($photoGalleryId>0){
 $updateQuery="delete from photogallery where photoGalleryId='$photoGalleryId'";
 $os->mq($updateQuery);
    echo 'Record Deleted Successfully';
 }
 exit();
}
 
