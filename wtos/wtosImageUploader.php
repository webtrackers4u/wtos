<?
 
session_start();
include('wtosConfigLocal.php');// load configuration
include('wtos.php'); // load wtos Library
 

if(!$os->isLogin())
{
exit();
}
 
 if($_GET['delete']=='ok' && $_GET['delid']>0)
 {
 $delid= $_GET['delid'];
 
 
  if($os->mq("delete from imageuploader where imageId='$delid'"))
  {
      $os->removeImage('imageuploader','imageId',$delid,'image',str_replace('wtos/','',$site['root']));
    
  }
 }
 

 
 
 
   

if($os->post('operation')=='updateImg')
{
   $updateMsg='';

 
 
  
  
            $gImage=$os->UploadPhoto('image',$site['root'].'wtos-images');
			 
			if($gImage!='')
			{
			
			
			  
				$dataToSave['title']=$os->post('title');
				 
				$dataToSave['image']='wtos-images/'.$gImage;
				
				$os->save('imageuploader',$dataToSave,'imageId','0');
				$updateMsg='Image Updated Successfully';
			
			}
			
			
			
  
  
}

?>

<form  action="" method="post"   enctype="multipart/form-data">
 


    
						
						<fieldset class="cFielSet" style="background-color:#E4E1DD" >
						<legend  class="cLegend"></legend>
						
						
						<table border="0" class="formClass"  cellpadding="0" cellspacing="0">
						<tr>
							
						  <td width="107"  valign="top">Image Title:</td>
							<td width="231"  valign="top">
						  <input value="<?php if(isset($pageData['title'])){ echo $pageData['title']; } ?>" type="text" name="title"  style="width:210px;" class="textbox fWidth"/>	&nbsp;	&nbsp;	&nbsp;						
						  </td>
						  <td valign="top">
						 
						  <input type="file" name="image" /> 	<input type="submit" class="submit"  value="UPLOAD IMAGE" style=" width:140px;   font-weight:bold; font-size:15px; cursor:pointer; padding:3px;" />	
						  
						  </td>
						  
						    <td valign="top">
						 
						 					  
						  
<? if($updateMsg!='') { ?>
 <div style="color:#FFFFFF; background-color:#06990A; font-size:16px; font-weight:bold; padding:4px;" > <? echo $updateMsg; ?></div>
  
<? } ?>
						  
						  </td>
	

						  
							</tr>
							
							</table>
						
						</fieldset>
						
						
						
						
						
						
						
					             
									<!--<input type="button" class="submit"  value="Cancel"  />-->
								    <input type="hidden" name="operation" value="updateImg" />
						 
						
						</form>
	<?					
		
$userGalleryInfo=$os->get_imageuploader();
 
  

?>
<br />	
<style>
.imgBox{ float:left; padding:2px; margin:5px; cursor:pointer; border:1px solid #666666; -moz-border-radius:3px; 
-webkit-border-radius:3px;
border-radius:3px; }
.imgBox image{ cursor:pointer; border:1px solid #666666; -moz-border-radius:3px; 
-webkit-border-radius:3px;
border-radius:3px; }
</style>
<div>

<?  while($record=$os->mfa( $userGalleryInfo)){  ?>
<? 
 
  
?>
<div class="imgBox">
<img src="<?php  echo $site['url'].$record['image']; ?>" alt="" height="100" width="150"  onclick="javascript:insertWtImg(this);" /> <br />
	  <a href="?delete=ok&delid=<? echo $record['imageId']; ?> " title="Delete Image" style="color:#FF0000;">D</a> &nbsp;  <?php  echo $record['title']; ?>
	  </div>
<? } ?>

</div>	
	
	
	



	<script>
	//onclick="javascript:insertWtImg(this);"
	function insertWtImg(imo)
	{
	//alert(imo.src)
	 window.opener.document.getElementById('src').value=imo.src;
	 	
	 window.close();
	 //window.parent.getElementById('srcImg').src=imo.src;
	}
	</script>
					
				
	

