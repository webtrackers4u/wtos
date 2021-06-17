<? 
## v-1.3 author Mizanur Rahaman  mizanur82@gmail.com  for new wtos
global $os; 
  
function quickEdit_v_four($options ,$foreignIdValue,$functionId)
{
global $os;


if($foreignIdValue<1)
{
      //  $dataToSave[$options['foreignId']]='';
    //    $foreignIdValue=   $os->save($options['foreignTable'],$dataToSave);

}



$options['functionId']=$functionId;
$options['ajaxEditFunction']='ajaxEdit'.$functionId;
$options['ajaxViewFunction']='ajaxView'.$functionId;
$options['ajaxViewDataFunction']='ajaxViewData'.$functionId;
$options['ajaxDeleteFunction']='ajaxDeleteData'.$functionId;
$options['foreignIdGlobalKey']='foreignIdValueGlobal_'.$functionId;


$options['ajaxDiv']='ajaxDiv'.$functionId;
 


extract($options);
$sessionKey='quickEdit-'.$functionId;





$_SESSION[$sessionKey]=$options;
 
  $javaScriptCallBack=$afterSaveCallback['javaScript'];

  ## form 
  
  
  ?>
  
  <? 
   foreach($fields as $fld=>$alise)
  {
       
  
 
  $scriptVarStr []="var ".$fld."=  escape(os.getVal('".$functionId.$fld."').trim());";
   $scriptUrlStr[]="'&".$fld."='+".$fld."";
  
  
  }
  ?>
  
  <div id="<? echo $ajaxDiv; ?>"> </div>
  
   <script>
   var <? echo $options['foreignIdGlobalKey'] ?>=<? echo $foreignIdValue ?>;
   function <? echo $ajaxEditFunction ?>()
   {
    
    <? echo  implode(" ",$scriptVarStr); ?>
	var vars=<? echo  implode('+',$scriptUrlStr); ?>;
	var url='quickEditPageAjx.php?foreignIdValue='+<? echo $options['foreignIdGlobalKey'] ?>+'&aQEsessonKey=<? echo $sessionKey ?>&getQuickEditValues=OK'+vars;
	 
	os.setAjaxFunc('<? echo $ajaxViewDataFunction ?>',url);
	
   
   }
   
   function <? echo $ajaxViewFunction ?>(foreignId)
   {
   
     <? echo $options['foreignIdGlobalKey'] ?>=foreignId;
     
	var url='quickEditPageAjx.php?foreignIdValue='+<? echo $options['foreignIdGlobalKey'] ?>+'&aQEsessonKey=<? echo $sessionKey ?>&getQuickViewValues=OK';
	
	os.setAjaxFunc('<? echo $ajaxViewDataFunction ?>',url);
	   
   }
   
   function <? echo $ajaxDeleteFunction ?>(tableId)
   {
   
     if(confirm('Are you sure. You want to delete the record?'))
	 {
	var url='quickEditPageAjx.php?foreignIdValue='+<? echo $options['foreignIdGlobalKey'] ?>+'&tableId='+tableId+'&aQEsessonKey=<? echo $sessionKey ?>&getQuickDeleteValues=OK';
	
	os.setAjaxFunc('<? echo $ajaxViewDataFunction ?>',url);
	}
	   
   }
   
   
   function <? echo $ajaxViewDataFunction ?>(data)
   {
     
	  
	 
	 var D=data.split('-DATAFORM-');
	 var AC=data.split('-AUTOCOMPLETE-');
	  AC=AC[1];
	   
	  
	 if(!AC){
 	      AC='';  
             } 
	

	 
	 
	  os.setHtml('<? echo $ajaxDiv; ?>',D[0]);
	  
	   if(AC!=''){
	    
	  var ACstrA=AC.split('-MULTIPLEAC-');
	  
	    
	 for(var i=0;i<ACstrA.length;i++)
	 {
	 var ACstr=ACstrA[i].split('-CLASSSTR-');
	 
	 //alert(ACstr);
	 if(ACstr[0]!=''){
		$(document).ready(function(){    
		$("."+ACstr[0]+"").autocomplete(ACstr[1].split("##"));
		});    
		}
	 
	 }
	 }
	 
	 <? if($javaScriptCallBack && $javaScriptCallBack!='')
	 {
	     echo $javaScriptCallBack.'(data);';
	 
	 }
	 ?>
	
	 
 
	$( ".dtpk" ).datepicker({
	dateFormat: 'dd-mm-yy',
	changeMonth: true,
	changeYear: true,
	yearRange: 'c-10:c+10'
	});
 
	 
	 
	  
     ///
   }
   
  <?  echo $ajaxViewFunction ?>('<? echo $foreignIdValue ?>');
  
   </script>
<? 


}