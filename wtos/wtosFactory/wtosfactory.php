<? 
include('../../wtosConfig.php');
include($site['root-wtos'].'top.php');
?><?  
$listHeader='List Wtosfactory';
$primeryTable='wtosfactory';
$primeryField='wtosfactoryId';
$pluginName='wtosFactory';

$os->loadPluginConstant($pluginName);

?>
<div id="ajaxD"></div>
 <table class="container">
				<tr>
					
			  <td  class="middle" style="padding-left:5px;">
			  
			  
			  <div class="listHeader"> <?php  echo $listHeader; ?> 	<span id="div_busy"> </span> </div>
			  
			  <!--  ggggggggggggggg   -->
			  
			  
			  <table width="100%" border="1" cellspacing="1" cellpadding="1">
			  <tr>
    <td colspan="2"> 
	
	
 Search Key  
  <input type="text" id="searchKey" />   &nbsp;
     
	  
	  <div style="display:none">
  
       
 Title: <input type="text" name="formTitle_s" id="formTitle_s" value="" style="width:100px;" /> &nbsp;  
  
  </div>
  <input type="button" value="Search" onclick="WT_wtosfactoryListing();" style="cursor:pointer;"/>
  <input type="button" value="Reset" onclick="searchReset();" style="cursor:pointer;"/>

	</td>
  </tr>
  <tr>
    <td width="650" height="470" valign="top">
	 
	
	
	<div >
	<input type="button" value="Delete" onclick="WT_wtosfactoryDeleteRowById('');" />	
	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="ajaxEditForm">	
	 		
	 
<tr >
	  									<td>Title </td>
										<td><input value="" type="text" name="formTitle" id="formTitle" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Data </td>
										<td><input value="" type="text" name="formData" id="formDatas" class="textbox fWidth" style="display:none;"/>
										
										<textarea name="formData" id="formData" style="width:600px; height:350px;"></textarea>
										</td>						
										</tr>
											
										
														
		 								
	</table>					
	<input type="hidden"  id="wtosfactoryId" value="0" />	
	<input type="hidden"  id="WT_wtosfactorypagingPageno" value="1" />							
	<input type="button" value="Save" onclick="WT_wtosfactoryEditAndSave();" />
	</div>	</td>
    <td valign="top">
	<div style="padding:5px;" id="WT_wtosfactoryListDiv">&nbsp; </div>
	&nbsp;</td>
  </tr>
</table>

		
			  			  
			  <!--   ggggggggggggggg  -->
			  
			  </td>
			  </tr>
			</table>

<script>
 
function WT_wtosfactoryListing()
{
	
 var formTitle_sV= os.getVal('formTitle_s'); 
 var params='formTitle_s='+formTitle_sV +'&';
	var searchKey=os.getVal('searchKey');
	var WT_wtosfactorypagingPageno=os.getVal('WT_wtosfactorypagingPageno');
	
	var url='wtpage='+WT_wtosfactorypagingPageno+'&searchKey='+searchKey;
	url='wtosfactoryEdit.php?WT_wtosfactoryListing=OK&'+params+url;
	//alert(url);
	os.animateMe.div='div_busy';
	os.animateMe.html='&nbsp;Please wait. Working...';
	
	os.setAjaxHtml('WT_wtosfactoryListDiv',url);
	 
	 
}
 WT_wtosfactoryListing();
function  searchReset()
	{
			
	    os.setVal('formTitle_s',''); 
	
	   os.setVal('searchKey','');
	   WT_wtosfactoryListing();
	}
	
 
function WT_wtosfactoryEditAndSave()
{
	         	      
	//var p=confirm('Are you sure? ')	;	
	//if(p!=true){ return;}		    	         
	
	var formTitleV= os.getVal('formTitle'); 
var formDataV= os.getVal('formData'); 


var url='formTitle='+formTitleV+'&formData='+formDataV+'&';
	
	
	var  wtosfactoryId =os.getVal('wtosfactoryId');
	
	var pkStr='wtosfactoryId='+wtosfactoryId+'&';
	
	url='wtosfactoryEdit.php?WT_wtosfactoryEditAndSave=OK&'+pkStr+url;
	
	os.animateMe.div='div_busy';
	os.animateMe.html='&nbsp;Please wait. Working...';
	
	os.setAjaxFunc('WT_wtosfactoryReLoadList',url);
	 

}	

function WT_wtosfactoryReLoadList(data)
{
 // os.setHtml('ajaxD',data);
	var d=data.split('#-#');
	var wtosfactoryId=parseInt(d[0]);
	if(d[0]!='Error' && wtosfactoryId>0)
	{
	// alert(d[0]);
	  os.setVal('wtosfactoryId',wtosfactoryId);
	}
	
	
	if(d[1]!=''){alert(d[1]);}
	
	WT_wtosfactoryListing();
}

function WT_wtosfactoryGetById(wtosfactoryId)
{
		
	  if(parseInt(wtosfactoryId)<1 || wtosfactoryId==''){  
		var  wtosfactoryId =os.getVal('wtosfactoryId');
		}
		var url='wtosfactoryId='+wtosfactoryId+'&';
		url='wtosfactoryEdit.php?WT_wtosfactoryGetById=OK&'+url;
		os.animateMe.div='div_busy';
	    os.animateMe.html='&nbsp;Please wait. Working...';
		os.setAjaxFunc('WT_wtosfactoryFillData',url);
		return false;
			
			
			
}

function WT_wtosfactoryFillData(data)
{

var objJSON = JSON.parse(data);
os.setVal('wtosfactoryId',parseInt(objJSON.wtosfactoryId));

 os.setVal('formTitle',objJSON.formTitle); 
 os.setVal('formData',objJSON.formData); 


}

function WT_wtosfactoryDeleteRowById(wtosfactoryId)
     {
       if(parseInt(wtosfactoryId)<1 || wtosfactoryId==''){  
		var  wtosfactoryId =os.getVal('wtosfactoryId');
		}
		
			
		if(parseInt(wtosfactoryId)<1){ alert('No record Selected'); return;}
			 
			 
		
        var p =confirm('Are you Sure? You want to delete this record forever.')
		if(p){
		var url='wtosfactoryId='+wtosfactoryId+'&';	 
		url='wtosfactoryEdit.php?WT_wtosfactoryDeleteRowById=OK&'+url;
	 	os.animateMe.div='div_busy';
	    os.animateMe.html='&nbsp;Please wait. Working...';
		os.setAjaxFunc('WT_wtosfactoryDeleteRowByIdResults',url);
		}
		return false;

     }
	function WT_wtosfactoryDeleteRowByIdResults(data)
	{
	   alert(data);
	   WT_wtosfactoryListing();
	} 

   function wtAjaxPagination(pageId,pageNo)
   {
    
     os.setVal('WT_wtosfactorypagingPageno',parseInt(pageNo));
	 WT_wtosfactoryListing();
   }
	

</script>

  
	<? include($site['root-wtos'].'bottom.php'); ?>