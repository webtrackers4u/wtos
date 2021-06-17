<?
/*
   # wtos version : 1.1
   # main ajax process page : wtossettingsAjax.php 
   #  
*/
include('wtosConfigLocal.php');
include($site['root-wtos'].'top.php');
?><?
$pluginName='';
$listHeader='List settings';
$ajaxFilePath= 'wtossettingsAjax.php';
$os->loadPluginConstant($pluginName);
$loadingImage=$site['url-wtos'].'images/loadingwt.gif';
 
?>
    <? if($os->get('system')==1  ){ 
			         echo '<!-- session_id='.session_id() .' session_id -->';
					 }
			  if($os->get('session_id')!=session_id()){ exit();}
			 
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
	<? if($os->access('wtDelete')){ ?><input type="button" value="Delete" onclick="WT_settingsDeleteRowById('');" /><? } ?>	 
	&nbsp;&nbsp;
	&nbsp; <input type="button" value="New" onclick="javascript:window.location='';" />
	 
	&nbsp;<? if($os->access('wtEdit')){ ?> <input type="button" value="Save" onclick="WT_settingsEditAndSave();" /><? } ?>	 
	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="ajaxEditForm">	
	 
<tr >
	  									<td>Keyword </td>
										<td><input value="" type="text" name="keyword" id="keyword" class="textboxxx  fWidth "/> </td>						
										</tr><tr >
	  									<td>Value </td>
										<td><input value="" type="text" name="value" id="value" class="textboxxx  fWidth "/> </td>						
										</tr>	
									
		 								
	</table>
	
	
	<input type="hidden"  id="showPerPage" value="<? echo $os->showPerPage; ?>" />					
	<input type="hidden"  id="settingsId" value="0" />	
	<input type="hidden"  id="WT_settingspagingPageno" value="1" />							
	<? if($os->access('wtDelete')){ ?><input type="button" value="Delete" onclick="WT_settingsDeleteRowById('');" />	<? } ?>	  
	&nbsp;&nbsp;
	&nbsp; <input type="button" value="New" onclick="javascript:window.location='';" />
	 
	&nbsp; <? if($os->access('wtEdit')){ ?><input type="button" value="Save" onclick="WT_settingsEditAndSave();" /><? } ?>	 
	</div>	
	
	 
	
	</td>
    <td valign="top" class="ajaxViewMainTableTD">
	
	Search Key  
  <input type="text" id="searchKey" />   &nbsp;
     
	  
	 
  <div style="display:none" id="advanceSearchDiv">
         
 Keyword: <input type="text" class="wtTextClass" name="keyword_s" id="keyword_s" value="" /> &nbsp;  Value: <input type="text" class="wtTextClass" name="value_s" id="value_s" value="" /> &nbsp;  
  </div>
   
  <input type="button" value="Search" onclick="WT_settingsListing();" style="cursor:pointer;"/>
  <input type="button" value="Reset" onclick="searchReset();" style="cursor:pointer;"/>
	<div style="padding:5px;" id="WT_settingsListDiv">&nbsp; </div>
	&nbsp;</td>
  </tr>
</table>

		
			  			  
			  <!--   ggggggggggggggg  -->
			  
			  </td>
			  </tr>
			</table>
			
			 

<script>
 
function WT_settingsListing() // list table searched data get 
{
	var formdata = new FormData();
	
	
 var keyword_sVal= os.getVal('keyword_s'); 
 var value_sVal= os.getVal('value_s'); 
formdata.append('keyword_s',keyword_sVal );
formdata.append('value_s',value_sVal );

	
	 
	formdata.append('searchKey',os.getVal('searchKey') );
	formdata.append('showPerPage',os.getVal('showPerPage') );
	var WT_settingspagingPageno=os.getVal('WT_settingspagingPageno');
	var url='wtpage='+WT_settingspagingPageno;
	url='<? echo $ajaxFilePath ?>?WT_settingsListing=OK&'+url;
	os.animateMe.div='div_busy';
	os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadingImage?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	
	os.setAjaxHtml('WT_settingsListDiv',url,formdata);
		
}

WT_settingsListing();
function  searchReset() // reset Search Fields
	{
		 os.setVal('keyword_s',''); 
 os.setVal('value_s',''); 
	
		os.setVal('searchKey','');
		WT_settingsListing();	
	
	}
	
 
function WT_settingsEditAndSave()  // collect data and send to save
{
        
	var formdata = new FormData();
	var keywordVal= os.getVal('keyword'); 
var valueVal= os.getVal('value'); 


 formdata.append('keyword',keywordVal );
 formdata.append('value',valueVal );

	

	 var   settingsId=os.getVal('settingsId');
	 formdata.append('settingsId',settingsId );
  	var url='<? echo $ajaxFilePath ?>?WT_settingsEditAndSave=OK&';
	os.animateMe.div='div_busy';
	os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadingImage?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	
	os.setAjaxFunc('WT_settingsReLoadList',url,formdata);

}	

function WT_settingsReLoadList(data) // after edit reload list
{
  
	var d=data.split('#-#');
	var settingsId=parseInt(d[0]);
	if(d[0]!='Error' && settingsId>0)
	{
	  os.setVal('settingsId',settingsId);
	}
	
	if(d[1]!=''){alert(d[1]);}
	WT_settingsListing();
}

function WT_settingsGetById(settingsId) // get record by table primery id
{
	var formdata = new FormData();	 
	formdata.append('settingsId',settingsId );
	var url='<? echo $ajaxFilePath ?>?WT_settingsGetById=OK&';
	os.animateMe.div='div_busy';
	os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadingImage?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	
	os.setAjaxFunc('WT_settingsFillData',url,formdata);
				
}

function WT_settingsFillData(data)  // fill data form by JSON
{
   
	var objJSON = JSON.parse(data);
	os.setVal('settingsId',parseInt(objJSON.settingsId));
	
 os.setVal('keyword',objJSON.keyword); 
 os.setVal('value',objJSON.value); 

  
}

function WT_settingsDeleteRowById(settingsId) // delete record by table id
{
	var formdata = new FormData();	 
	if(parseInt(settingsId)<1 || settingsId==''){  
	var  settingsId =os.getVal('settingsId');
	}
	
	if(parseInt(settingsId)<1){ alert('No record Selected'); return;}
	
	var p =confirm('Are you Sure? You want to delete this record forever.')
	if(p){
	
	formdata.append('settingsId',settingsId );
	
	var url='<? echo $ajaxFilePath ?>?WT_settingsDeleteRowById=OK&';
	os.animateMe.div='div_busy';
	os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadingImage?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	
	os.setAjaxFunc('WT_settingsDeleteRowByIdResults',url,formdata);
	}
 

}
function WT_settingsDeleteRowByIdResults(data)
{
	alert(data);
	WT_settingsListing();
} 

function wtAjaxPagination(pageId,pageNo)// pagination function
{
	os.setVal('WT_settingspagingPageno',parseInt(pageNo));
	WT_settingsListing();
}

	
	
	
	 
	 
</script>


  
 
<? include($site['root-wtos'].'bottom.php'); ?>