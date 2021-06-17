<?php
// _d($site);
?>
<style>
.SAA_popupBOX{ height:300px; width:700px; border:20px solid #e4e1d1; background:#F0F0F0; position:absolute; top:100; right:100; margin-left:10px; overflow-y:scroll; padding:2px;  border-radius: 5px;    box-shadow: 0px 0px 5px #000000;}
.SAA_popupBOX_data{}
.SAApopoupClose{ height:12px; width:10px; font-weight:bold; color:#e4e1d0; float:right; cursor:pointer; border:3px solid #e4e1d1; background-color:#F0F0F0; padding:0px 5px 4px 5px;}
.SAApopoupClose:hover{ color:#FF0000;  border:3px solid #e4e1d1; background-color:#FFFFFF;   }
.popoupHead{float:left; width:200px; margin:5px 0px 0px 10px; font-weight:bold; }
.sasclear{ clear:both; height:0px;}
.SAAListTable{ border:2px inset #E6F2FF; margin-left:10px; background-color:#FCFCFC;  border-radius: 4px; }
.SAAListTable td{ border-bottom:2px groove #FCFCFC;border-right:2px groove #FCFCFC; padding:3px;}
.SAAListTable tr:hover{ background-color:#CCE6FF; cursor:pointer;}

.SAAListTableForm{border:1px dotted #e4e1d1;border-radius: 1px; margin-left:2px; }
.SAAListTableForm  td{border-bottom:1px dotted #e4e1d1;border-right:1px dotted #e4e1d1; padding:3px;margin-left:2px;}

.SAATextBox{ width:100px;}
.SaaTabClass{ background-color:#FFFFFF; padding:5px 1px 5px 0px; margin-left:10px; border:1px inset #e4e1d1; margin-top:-1px; }
.saaTabLinkClassActive{margin:5px 0px 0px 10px; font-weight:bold; float:left; width:auto; border:1px inset #e4e1d1; border-bottom:0px #999999 solid; padding:2px 5px 2px 5px; background-color:#FFFFFF;  }
.saaTabLinkClassInActive{  margin:5px 0px 0px 10px; font-weight:bold;float:left; width:auto; border:0px outset #009966;  padding:2px 5px 2px 5px;   cursor:pointer;  }
.saaTabLinkClassInActive:hover{ background-color:#006BD7; color:#FFFFFF  }
.SAASearchTextBox{ width:200px;}

</style>

<script>
var saa = new Object();
saa.programmer = "Mizanur82@gmail.com";
saa.ajaxPath='<? echo $site['url-wtos'] ; ?>wtosSearchAddAssignAjax.php?';
saa.execute=function(functionId,containerId,idForAssign,table,tableId,fields,fieldsTitle,returnField,scriptCallback,extraParams)
{
	// functionId any unique prefix char (a,b,ab,c,g, s, sw etc) container( span / div) id should be  SAA_m 
	// idForAssign  // id in which neeed to assign id or value
	// searchTxtId    // search text box id
	  saa[functionId]= new Object();
	 
	 
	
	var searchTxtId='SAA_searchBox_'+functionId;
	var popupBoxId='SAA_popupBOX_'+functionId;
	var popupBoxDataId='SAA_popupBOX_Data_'+functionId;
	
	
	saa[functionId].functionId=functionId;
	saa[functionId].containerId=containerId;
	saa[functionId].idForAssign=idForAssign;
	saa[functionId].table=table;
	saa[functionId].tableId=tableId;
	saa[functionId].fields=fields;
	saa[functionId].fieldsTitle=fieldsTitle;
	saa[functionId].returnField=returnField;
	saa[functionId].scriptCallback=scriptCallback;
	saa[functionId].extraParams=extraParams;
	
	saa[functionId].searchTxtId=searchTxtId;
	saa[functionId].popupBoxId=popupBoxId;
	saa[functionId].popupBoxDataId=popupBoxDataId;
	
		 
	var formdata = new FormData();
	formdata.append('functionId',functionId );
	formdata.append('containerId',containerId );
	formdata.append('idForAssign',idForAssign );
	formdata.append('table',table );
	formdata.append('tableId',tableId );
	formdata.append('fields',fields );
	formdata.append('fieldsTitle',fieldsTitle );
	formdata.append('returnField',returnField );
	formdata.append('scriptCallback',scriptCallback );	
	formdata.append('extraParam',extraParams );
	formdata.append('searchTxtId',searchTxtId );
	formdata.append('popupBoxId',popupBoxId );
	formdata.append('popupBoxDataId',popupBoxDataId );
 
	
	formdata.append('RETURN','SearchBoxHTML' );
	
	var url=saa.ajaxPath+'SAA_DrawSearchBox=OK';
	os.animateMe.div=containerId;
	os.animateMe.html='Wait..';	
	os.setAjaxFunc('saa.executeOutput',url,formdata);
  
 }
 
 saa.executeOutput=function(data)
 {
  var D=data.split('[SAA:SEPERATOR]');
  var functionId=D[1];
  var containerId=saa[functionId].containerId;
  os.setHtml(containerId,D[2]);
   
 }
 
 
 

saa.prepare=function(functionId)
{
   
   
    var searchTxtId=saa[functionId].searchTxtId;
	var popupBoxId=saa[functionId].popupBoxId;
	var popupBoxDataId= saa[functionId].popupBoxDataId;
	
	
    var searchTxt=os.getVal(searchTxtId);
	saa[functionId].searchTxt=searchTxt;
	
	saa.popUpOpen(popupBoxId);
	  
    var formdata = new FormData();
		
	formdata.append('functionId',functionId );
	formdata.append('searchTxt',searchTxt );
	formdata.append('RETURN','SearchResultsAndForm' );
	
	var url=saa.ajaxPath+'SAA_ListResults=OK';
	os.animateMe.div=popupBoxDataId;
	os.animateMe.html='Wait..';	
	os.setAjaxFunc('saa.prepareOutput',url,formdata);
  
 }
 
 saa.prepareOutput=function(data)
 {
  var D=data.split('[SAA:SEPERATOR]');
  var functionId=D[1];
  var popupBoxDataId=saa[functionId].popupBoxDataId;
  os.setHtml(popupBoxDataId,D[2]);
  
  
  
  
 }


saa.addValue=function(functionId)
{
    var searchTxtId =saa[functionId].searchTxtId;
	var popupBoxId =saa[functionId].popupBoxId;
	var popupBoxDataId = saa[functionId].popupBoxDataId;
    var fields = saa[functionId].fields;
	var k=confirm('Are you sure . Add new record.');
	if(!k){ return false;}
	

    var formdata = new FormData();
		
	formdata.append('functionId',functionId );
	// add fields Value 
	 
	var fldsA=fields.split(',');
	var tmpVarId='';
	for (var i = 0; i < fldsA.length; i++) 
	{
	   tmpVarId=fldsA[i]+'_'+functionId;
	   formdata.append(fldsA[i],os.getVal(tmpVarId));
	   os.setVal(tmpVarId,'');
	   
	
	}
	
	
	
	formdata.append('RETURN','ListingAndForm' );	
	var url=saa.ajaxPath+'SAA_AddRecord=OK';
	os.animateMe.div=popupBoxDataId;
	os.animateMe.html='Wait..';	
	os.setAjaxFunc('saa.addValueOutput',url,formdata);
  
 }
 
 saa.addValueOutput=function(data)
 {
  
  var D=data.split('[SAA:SEPERATOR]');
  var functionId=D[1];
  var popupBoxDataId=saa[functionId].popupBoxDataId;
  var idForAssign=saa[functionId].idForAssign;
  
  os.setHtml(popupBoxDataId,D[2]);
  os.setHtml(idForAssign,D[3]);
 }



saa.assignValue=function(functionId,returnFieldValue)
{   

  
     
	var idForAssign =saa[functionId].idForAssign;
	var popupBoxId =saa[functionId].popupBoxId;
	var popupBoxDataId = saa[functionId].popupBoxDataId;
	var scriptCallback = saa[functionId].scriptCallback;
	saa[functionId].returnFieldValue=returnFieldValue;
	
	os.setVal(idForAssign,returnFieldValue);
	saa.popUpClose(popupBoxId);
	if(scriptCallback!=''){ eval(scriptCallback+'(functionId);');	}
   
   
   
}






saa.popUpOpen=function(popupBoxId)
{
   os.getObj(popupBoxId).style.display='';
   
   
}
saa.popUpClose=function(popupBoxId)
{
   os.getObj(popupBoxId).style.display='none';
}


saa.tab=function(saaTabLink,SaaTab)
{

os.getObj('SaaTab1').style.display='none';
os.getObj('saaTabLink1').className='saaTabLinkClassInActive';

os.getObj('SaaTab2').style.display='none';
os.getObj('saaTabLink2').className='saaTabLinkClassInActive';

os.getObj(SaaTab).style.display='';
os.getObj(saaTabLink).className='saaTabLinkClassActive';

}
 
</script>

<!-- Application Example 

another example with select box
<span id="SAA_m" class="SAA_Container"> </span>
<script> saa.execute('m','SAA_m','rbcontactId','rbcontact','rbcontactId','person,refCode,phone,email','P,Ref,Phone,Email','rbcontactId','finalcalculate','');</script>
			
another example with text box
<input type="text" id="tests" />							
<span id="SAA_p" class="SAA_Container"> </span>
<script> saa.execute('p','SAA_p','tests','rbcontact','rbcontactId','person,refCode,phone,email','P,Ref,Phone,Email','person','','');</script>


-->