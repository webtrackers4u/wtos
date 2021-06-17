<?
/*
   # wtos version : 1.1
   # main ajax process page : photogalleryAjax.php 
   #  
*/
include('wtosConfigLocal.php');
include($site['root-wtos'].'top.php');
?><?
$pluginName='';
$listHeader='List photogallery';
$ajaxFilePath= 'photogalleryAjax.php';
$os->loadPluginConstant($pluginName);
$loadingImage=$site['url-wtos'].'images/loadingwt.gif';
 
?>
  

 <table class="container">
				<tr>
					 
			  <td  class="middle" style="padding-left:5px;">
			  
			  
			  <div class="listHeader"> <?php  echo $listHeader; ?>  </div>
			  
			  <!--  ggggggggggggggg   -->
			  
			  
			  <table width="100%"  cellspacing="0" cellpadding="1" class="ajaxViewMainTable">
			  
  <tr>
    <td width="470" height="470" valign="top" class="ajaxViewMainTableTD">
	<div>
	<? if($os->access('wtDelete')){ ?><input type="button" value="Delete" onclick="WT_photogalleryDeleteRowById('');" /><? } ?>	 
	&nbsp;&nbsp;
	&nbsp; <input type="button" value="New" onclick="javascript:window.location='';" />
	 
	&nbsp;<? if($os->access('wtEdit')){ ?> <input type="button" value="Save" onclick="WT_photogalleryEditAndSave();" /><? } ?>	 
	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="ajaxEditForm">	
	 
<tr >
	  									<td>Album </td>
										<td> <select name="galleryCatagoryId" id="galleryCatagoryId" class="textbox fWidth" ><option value="">Select Album</option>		  	<? 
								
										  $os->optionsHTML('','galleryCatagoryId','categoryName','gallerycatagory');?>
							</select> </td>						
										</tr><tr >
	  									<td>Image </td>
										<td>
										
										<img id="namePreview" src="" height="100" style="display:none;"	 />		
										<input type="file" name="name" value=""  id="name" onchange="os.readURL(this,'namePreview') " style="display:none;"/><br>
										
										 <span style="cursor:pointer; color:#FF0000;" onclick="os.clicks('name');">Edit Image</span>
										 
										 
										 
										</td>						
										</tr><tr >
	  									<td>Title </td>
										<td><input value="" type="text" name="title" id="title" class="textboxxx  fWidth "/> </td>						
										</tr><tr >
	  									<td>Status </td>
										<td>  
	
	<select name="status" id="status" class="textbox fWidth" ><option value="">Select Status</option>	<? 
										  $os->onlyOption($os->photoGalleryStatus);	?></select>	 </td>						
										</tr>	
									
		 								
	</table>
	
	
	<input type="hidden"  id="showPerPage" value="<? echo $os->showPerPage; ?>" />					
	<input type="hidden"  id="photoGalleryId" value="0" />	
	<input type="hidden"  id="WT_photogallerypagingPageno" value="1" />							
	<? if($os->access('wtDelete')){ ?><input type="button" value="Delete" onclick="WT_photogalleryDeleteRowById('');" />	<? } ?>	  
	&nbsp;&nbsp;
	&nbsp; <input type="button" value="New" onclick="javascript:window.location='';" />
	 
	&nbsp; <? if($os->access('wtEdit')){ ?><input type="button" value="Save" onclick="WT_photogalleryEditAndSave();" /><? } ?>	 
	</div>	
	
	 
	
	</td>
    <td valign="top" class="ajaxViewMainTableTD">
	
	Search Key  
  <input type="text" id="searchKey" />   &nbsp;
     
	  
	 
  <div style="display:none" id="advanceSearchDiv">
         
 Album:
	
	
	<select name="galleryCatagoryId" id="galleryCatagoryId_s" class="textbox fWidth" ><option value="">Select Album</option>		  	<? 
								
										  $os->optionsHTML('','galleryCatagoryId','categoryName','gallerycatagory');?>
							</select>
    Title: <input type="text" class="wtTextClass" name="title_s" id="title_s" value="" /> &nbsp;  Status:
	
	<select name="status" id="status_s" class="textbox fWidth" ><option value="">Select Status</option>	<? 
										  $os->onlyOption($os->photoGalleryStatus);	?></select>	
   
  </div>
   
  <input type="button" value="Search" onclick="WT_photogalleryListing();" style="cursor:pointer;"/>
  <input type="button" value="Reset" onclick="searchReset();" style="cursor:pointer;"/>
	<div style="padding:5px;" id="WT_photogalleryListDiv">&nbsp; </div>
	&nbsp;</td>
  </tr>
</table>

		
			  			  
			  <!--   ggggggggggggggg  -->
			  
			  </td>
			  </tr>
			</table>
			
			 

<script>
 
function WT_photogalleryListing() // list table searched data get 
{
	var formdata = new FormData();
	
	
 var galleryCatagoryId_sVal= os.getVal('galleryCatagoryId_s'); 
 var title_sVal= os.getVal('title_s'); 
 var status_sVal= os.getVal('status_s'); 
formdata.append('galleryCatagoryId_s',galleryCatagoryId_sVal );
formdata.append('title_s',title_sVal );
formdata.append('status_s',status_sVal );

	
	 
	formdata.append('searchKey',os.getVal('searchKey') );
	formdata.append('showPerPage',os.getVal('showPerPage') );
	var WT_photogallerypagingPageno=os.getVal('WT_photogallerypagingPageno');
	var url='wtpage='+WT_photogallerypagingPageno;
	url='<? echo $ajaxFilePath ?>?WT_photogalleryListing=OK&'+url;
	os.animateMe.div='div_busy';
	os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadingImage?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	
	os.setAjaxHtml('WT_photogalleryListDiv',url,formdata);
		
}

WT_photogalleryListing();
function  searchReset() // reset Search Fields
	{
		 os.setVal('galleryCatagoryId_s',''); 
 os.setVal('title_s',''); 
 os.setVal('status_s',''); 
	
		os.setVal('searchKey','');
		WT_photogalleryListing();	
	
	}
	
 
function WT_photogalleryEditAndSave()  // collect data and send to save
{
        
	var formdata = new FormData();
	var galleryCatagoryIdVal= os.getVal('galleryCatagoryId'); 
var nameVal= os.getObj('name').files[0]; 
var titleVal= os.getVal('title'); 
var statusVal= os.getVal('status'); 


 formdata.append('galleryCatagoryId',galleryCatagoryIdVal );
if(nameVal){  formdata.append('name',nameVal,nameVal.name );}
 formdata.append('title',titleVal );
 formdata.append('status',statusVal );

	

	 var   photoGalleryId=os.getVal('photoGalleryId');
	 formdata.append('photoGalleryId',photoGalleryId );
  	var url='<? echo $ajaxFilePath ?>?WT_photogalleryEditAndSave=OK&';
	os.animateMe.div='div_busy';
	os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadingImage?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	
	os.setAjaxFunc('WT_photogalleryReLoadList',url,formdata);

}	

function WT_photogalleryReLoadList(data) // after edit reload list
{
  
	var d=data.split('#-#');
	var photoGalleryId=parseInt(d[0]);
	if(d[0]!='Error' && photoGalleryId>0)
	{
	  os.setVal('photoGalleryId',photoGalleryId);
	}
	
	if(d[1]!=''){alert(d[1]);}
	WT_photogalleryListing();
}

function WT_photogalleryGetById(photoGalleryId) // get record by table primery id
{
	var formdata = new FormData();	 
	formdata.append('photoGalleryId',photoGalleryId );
	var url='<? echo $ajaxFilePath ?>?WT_photogalleryGetById=OK&';
	os.animateMe.div='div_busy';
	os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadingImage?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	
	os.setAjaxFunc('WT_photogalleryFillData',url,formdata);
				
}

function WT_photogalleryFillData(data)  // fill data form by JSON
{
   
	var objJSON = JSON.parse(data);
	os.setVal('photoGalleryId',parseInt(objJSON.photoGalleryId));
	
 os.setVal('galleryCatagoryId',objJSON.galleryCatagoryId); 
 os.setImg('namePreview',objJSON.name); 
 os.setVal('title',objJSON.title); 
 os.setVal('status',objJSON.status); 

  
}

function WT_photogalleryDeleteRowById(photoGalleryId) // delete record by table id
{
	var formdata = new FormData();	 
	if(parseInt(photoGalleryId)<1 || photoGalleryId==''){  
	var  photoGalleryId =os.getVal('photoGalleryId');
	}
	
	if(parseInt(photoGalleryId)<1){ alert('No record Selected'); return;}
	
	var p =confirm('Are you Sure? You want to delete this record forever.')
	if(p){
	
	formdata.append('photoGalleryId',photoGalleryId );
	
	var url='<? echo $ajaxFilePath ?>?WT_photogalleryDeleteRowById=OK&';
	os.animateMe.div='div_busy';
	os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadingImage?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	
	os.setAjaxFunc('WT_photogalleryDeleteRowByIdResults',url,formdata);
	}
 

}
function WT_photogalleryDeleteRowByIdResults(data)
{
	alert(data);
	WT_photogalleryListing();
} 

function wtAjaxPagination(pageId,pageNo)// pagination function
{
	os.setVal('WT_photogallerypagingPageno',parseInt(pageNo));
	WT_photogalleryListing();
}

	
	
	
	 
	 
</script>


  
 
<? include($site['root-wtos'].'bottom.php'); ?>