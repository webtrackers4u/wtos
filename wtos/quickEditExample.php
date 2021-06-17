<?
$options=array();
$options['PageHeading']='Payments';  
$options['foreignId']='linkedIdValue'; 
$options['foreignTable']='rentbill';
$options['table']='payments';
$options['tableId']='paymentsId';
$options['tableQuery']="select * from payments where linkedIdFields='rentbillId'  and [condition] order by paymentsId "; 
$options['fields']=array('dated'=>'Date','amount'=>'Amount','mode'=>'Mode','details'=>'details');
$options['type']=array('dated'=>'D','amount'=>'T','mode'=>'DD','details'=>'T'); 
$options['relation']=array('dated'=>'','amount'=>'','mode'=>'paymentMode','details'=>''); 
$options['class']=array('dated'=>'dtpk payDate','amount'=>'paymentText','mode'=>'paymentdown','details'=>'paymentText');  ## add jquery date class
$options['add']='1';
$options['delete']='1';
$options['defaultValues']=array('linkedIdFields'=>'rentbillId','direction'=>'IN','title'=>'Rent Payments','note'=>'');   
$options['afterSaveCallback']=array('php'=>'calculatePaymentTotal','javaScript'=>'setPaymentTotal');  
$functionId='payments';
quickEdit_v_four($options ,0,$functionId);
?>
<style>
  .qaddButton{ font-size:10px; font-weight:bold; background-color:#009900;color:#FFFFFF; cursor:pointer; height:20px;  padding:0px; margin:0px; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}
  .qdeleteButton{ font-size:10px; font-weight:bold; background-color:#FF0000;color:#FFFFFF; cursor:pointer; height:20px;  padding:0px; margin:0px; line-height:10px;-moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}
   .wtclass<? echo $functionId?>{   margin:0px 5px 0px 0px; padding:0px; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}
  .wtclass<? echo $functionId?> tr{ height:10px;}
  .wtclass<? echo $functionId?> td{ height:10px; padding:0px;}
  .wtclass<? echo $functionId?> tr:hover{ background-color:#F0F0F0;}
   .wtclass<? echo $functionId?> .PageHeading{ font-family:Verdana, Arial, Helvetica, sans-serif; font-size:18px; background:#007CB9; color:#FFFFFF; padding:2px; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; font-style:italic;}
   .wtalise<? echo $functionId?>{ display:none;}
  .paymentText{-moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; border:1px dotted #F2F2F2; width:120px; }
  .otheramount{-moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; border:1px dotted #F2F2F2; width:70px; }
  .formTR{ opacity:0.1;}
  .formTR:hover{ opacity:1;}
  .paymentdown{-moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; border:0px;-webkit-appearance: none; -moz-appearance: none;  text-indent: 1px; text-overflow: '';}
  .payDate{-moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; border:1px dotted #F2F2F2; width:110px;}
</style>
  <script>
 function setPaymentTotal(data)
 {
   
		var callBackOutput=data.split('-CALLBACKOUTPUT-');
		callBackOutput=callBackOutput[1];
		if(!callBackOutput){   callBackOutput='';      } 
		 
		
		var totalVal= parseFloat(eval(callBackOutput)) ;
		totalVal=totalVal.toFixed(2);
		os.setVal('receivedAmount',totalVal);	 
		 setDueAmount();
 }
 
 </script>