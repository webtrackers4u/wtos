<?
/*
   # wtos version : 1.1
   # main ajax process page : gallerycatagoryAjax.php 
   #  
*/
include('wtosConfigLocal.php');
include($site['root-wtos'].'top.php');
?><?
$pluginName='';
$listHeader='List gallerycatagory';
$ajaxFilePath= 'gallerycatagoryAjax.php';
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
	<? if($os->access('wtDelete')){ ?><input type="button" value="Delete" onclick="WT_gallerycatagoryDeleteRowById('');" /><? } ?>	 
	&nbsp;&nbsp;
	&nbsp; <input type="button" value="New" onclick="javascript:window.location='';" />
	 
	&nbsp;<? if($os->access('wtEdit')){ ?> <input type="button" value="Save" onclick="WT_gallerycatagoryEditAndSave();" /><? } ?>	 
	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="ajaxEditForm">	
	 
<tr >
	  									<td>Album </td>
										<td><input value="" type="text" name="categoryName" id="categoryName" class="textboxxx  fWidth "/> </td>						
										</tr><tr >
	  									<td>Status </td>
										<td>  
	
	<select name="active" id="active" class="textbox fWidth" ><option value="">Select Status</option>	<? 
										  $os->onlyOption($os->galleryCatagoryActive);	?></select>	 </td>						
										</tr>	
									
		 								
	</table>
	
	
	<input type="hidden"  id="showPerPage" value="<? echo $os->showPerPage; ?>" />					
	<input type="hidden"  id="galleryCatagoryId" value="0" />	
	<input type="hidden"  id="WT_gallerycatagorypagingPageno" value="1" />							
	<? if($os->access('wtDelete')){ ?><input type="button" value="Delete" onclick="WT_gallerycatagoryDeleteRowById('');" />	<? } ?>	  
	&nbsp;&nbsp;
	&nbsp; <input type="button" value="New" onclick="javascript:window.location='';" />
	 
	&nbsp; <? if($os->access('wtEdit')){ ?><input type="button" value="Save" onclick="WT_gallerycatagoryEditAndSave();" /><? } ?>	 
	</div>	
	
	 
	
	</td>
    <td valign="top" class="ajaxViewMainTableTD">
	
	Search Key  
  <input type="text" id="searchKey" />   &nbsp;
     
	  
	 
  <div style="display:none" id="advanceSearchDiv">
         
 Album: <input type="text" class="wtTextClass" name="categoryName_s" id="categoryName_s" value="" /> &nbsp;  Status:
	
	<select name="active" id="active_s" class="textbox fWidth" ><option value="">Select Status</option>	<? 
										  $os->onlyOption($os->galleryCatagoryActive);	?></select>	
   
  </div>
   
  <input type="button" value="Search" onclick="WT_gallerycatagoryListing();" style="cursor:pointer;"/>
  <input type="button" value="Reset" onclick="searchReset();" style="cursor:pointer;"/>
	<div style="padding:5px;" id="WT_gallerycatagoryListDiv">&nbsp; </div>
	&nbsp;</td>
  </tr>
</table>

		
			  			  
			  <!--   ggggggggggggggg  -->
			  
			  </td>
			  </tr>
			</table>
			
			 

<script>
 
function WT_gallerycatagoryListing() // list table searched data get 
{
	var formdata = new FormData();
	
	
 var categoryName_sVal= os.getVal('categoryName_s'); 
 var active_sVal= os.getVal('active_s'); 
formdata.append('categoryName_s',categoryName_sVal );
formdata.append('active_s',active_sVal );

	
	 
	formdata.append('searchKey',os.getVal('searchKey') );
	formdata.append('showPerPage',os.getVal('showPerPage') );
	var WT_gallerycatagorypagingPageno=os.getVal('WT_gallerycatagorypagingPageno');
	var url='wtpage='+WT_gallerycatagorypagingPageno;
	url='<? echo $ajaxFilePath ?>?WT_gallerycatagoryListing=OK&'+url;
	os.animateMe.div='div_busy';
	os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadingImage?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	
	os.setAjaxHtml('WT_gallerycatagoryListDiv',url,formdata);
		
}

WT_gallerycatagoryListing();
function  searchReset() // reset Search Fields
	{
		 os.setVal('categoryName_s',''); 
 os.setVal('active_s',''); 
	
		os.setVal('searchKey','');
		WT_gallerycatagoryListing();	
	
	}
	
 
function WT_gallerycatagoryEditAndSave()  // collect data and send to save
{
        
	var formdata = new FormData();
	var categoryNameVal= os.getVal('categoryName'); 
var activeVal= os.getVal('active'); 


 formdata.append('categoryName',categoryNameVal );
 formdata.append('active',activeVal );

	

	 var   galleryCatagoryId=os.getVal('galleryCatagoryId');
	 formdata.append('galleryCatagoryId',galleryCatagoryId );
  	var url='<? echo $ajaxFilePath ?>?WT_gallerycatagoryEditAndSave=OK&';
	os.animateMe.div='div_busy';
	os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadingImage?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	
	os.setAjaxFunc('WT_gallerycatagoryReLoadList',url,formdata);

}	

function WT_gallerycatagoryReLoadList(data) // after edit reload list
{
  
	var d=data.split('#-#');
	var galleryCatagoryId=parseInt(d[0]);
	if(d[0]!='Error' && galleryCatagoryId>0)
	{
	  os.setVal('galleryCatagoryId',galleryCatagoryId);
	}
	
	if(d[1]!=''){alert(d[1]);}
	WT_gallerycatagoryListing();
}

function WT_gallerycatagoryGetById(galleryCatagoryId) // get record by table primery id
{
	var formdata = new FormData();	 
	formdata.append('galleryCatagoryId',galleryCatagoryId );
	var url='<? echo $ajaxFilePath ?>?WT_gallerycatagoryGetById=OK&';
	os.animateMe.div='div_busy';
	os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadingImage?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	
	os.setAjaxFunc('WT_gallerycatagoryFillData',url,formdata);
				
}

function WT_gallerycatagoryFillData(data)  // fill data form by JSON
{
   
	var objJSON = JSON.parse(data);
	os.setVal('galleryCatagoryId',parseInt(objJSON.galleryCatagoryId));
	
 os.setVal('categoryName',objJSON.categoryName); 
 os.setVal('active',objJSON.active); 

  
}

function WT_gallerycatagoryDeleteRowById(galleryCatagoryId) // delete record by table id
{
	var formdata = new FormData();	 
	if(parseInt(galleryCatagoryId)<1 || galleryCatagoryId==''){  
	var  galleryCatagoryId =os.getVal('galleryCatagoryId');
	}
	
	if(parseInt(galleryCatagoryId)<1){ alert('No record Selected'); return;}
	
	var p =confirm('Are you Sure? You want to delete this record forever.')
	if(p){
	
	formdata.append('galleryCatagoryId',galleryCatagoryId );
	
	var url='<? echo $ajaxFilePath ?>?WT_gallerycatagoryDeleteRowById=OK&';
	os.animateMe.div='div_busy';
	os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadingImage?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	
	os.setAjaxFunc('WT_gallerycatagoryDeleteRowByIdResults',url,formdata);
	}
 

}
function WT_gallerycatagoryDeleteRowByIdResults(data)
{
	alert(data);
	WT_gallerycatagoryListing();
} 

function wtAjaxPagination(pageId,pageNo)// pagination function
{
	os.setVal('WT_gallerycatagorypagingPageno',parseInt(pageNo));
	WT_gallerycatagoryListing();
}

	
	
	
	 
	 
</script>


  
 
<? include($site['root-wtos'].'bottom.php'); ?>