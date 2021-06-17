<? 
## v-1.1 author Mizanur Rahaman  mizanur82@gmail.com
session_start();
ob_start();
include('includes/config.php');
include('coomon.php');
ob_end_clean();

function viewQuickRows($options,$foreignIdValue)
{


 
global $os;
 
 
extract($options);
if($foreignIdValue!='')
{ $condition .="  $foreignId!='' and $foreignId>0 ";
   $condition .=" and $foreignId='$foreignIdValue'";
}
$tableQuery=str_replace('[condition]',$condition,$tableQuery);
// $tableQuery;
$rs=$os->mq($tableQuery);

?>
<table cellpadding="0" cellspacing="0" class="wtclass<? echo $functionId ?>">
<tr style="display:none;" ><td colspan="30" class="PageHeading"> <? echo $PageHeading ?></td></tr>
  
  
   

<?
$sl=1;
while($row=$os->mfa($rs))
{


 ?>
 
  
 
  
  <tr>
  <!--<td style="color:#FF8040; font-weight:bold;"><? echo $sl?> &nbsp;&nbsp; </td>-->
  <?
 foreach($fields as $fld=>$alise)
  {
       ?>
     <td>  
	 <? if($type[$fld]=='T' || $type[$fld]=='' ||  $type[$fld]=='AC'){  ##  view date need to add for date fields
	 
	  ?> 
	<? echo $row[$fld] ?>
	  <? }else if($type[$fld]=='DD'){
	
	  if($relation[$fld]!='')
	  {
	    
	   if( substr($relation[$fld],0,6)=='select' )
	      {
		     $qq=explode('-fld-',$relation[$fld]);
			 
		      $qq[0]= $os->mq($qq[0]);
			  while( $out=$os->mfa($qq[0]))
			   {
			     $os->ddDataType[$out[$qq[1]]]=$out[$qq[2]];
			   
			   }
	   
	        
	        } else
			{
			   $os->ddDataType=$os->{$relation[$fld]} ;
			
			}   
	 
	  
	  }
	  
	  
	  
	  echo $os->ddDataType[$row[$fld]];
	   ?> 
	 <select   class="<? echo $class[$fld] ?>" style="display:none;"> 
	 <? //  $os->onlyOption($os->ddDataType,$row[$fld]); ?>
	 
	 </select>
	 <?  } else if($type[$fld]=='D'){
	     echo $os->showDate($row[$fld]);
	 
	 }
	 ?>
	 
	 </td>
  
  <? 
  
  
  }

?>
 <td> <input type="button" class="qdeleteButton" value="Del" title="Delete record"  onclick="<? echo $ajaxDeleteFunction ?>('<? echo $row[$tableId] ?>');" /></td>
   </tr>
  
  
  

<?
$sl++;
}

?>  <tr class="formTR">
   
  <?   
  
  
  ##form
  
  foreach($fields as $fld=>$alise)
  {
       ?>
     <td><div class="wtalise<? echo $functionId?>"> <? echo $alise ?> </div>
	  
	 <? if($type[$fld]=='T' || $type[$fld]=='' || $type[$fld]=='D'){ ?> 
	 <input type="text" value="" id="<? echo $functionId.$fld ?>" name="<? echo $fld ?>" class="<? echo $class[$fld] ?>" placeholder="<? echo $alise ?> " />
	  <? }
	  else if($type[$fld]=='DD')
	  {
	
	  if($relation[$fld]!='')
	  {
	    
	   if( substr($relation[$fld],0,6)=='select' )
	      {
		     $qq=explode('-fld-',$relation[$fld]);
			 
		      $qq[0]= $os->mq($qq[0]);
			  while( $out=$os->mfa($qq[0]))
			   {
			     $os->ddDataType[$out[$qq[1]]]=$out[$qq[2]];
			   
			   }
	   
	        
	        
			} else
			{
			   $os->ddDataType=$os->{$relation[$fld]} ;
			
			}   
	 
	  
	  }
	  
	  
	  
	  
	   ?> 
	 <select  id="<? echo $functionId.$fld ?>" name=" <? echo $fld ?>" class="<? echo $class[$fld] ?>"> 
	 <?  $os->onlyOption($os->ddDataType); ?>
	 
	 </select>
	 <?  } 
	 else if($type[$fld]=='AC')
	  {
	
	  if($relation[$fld]!='')
	  {
	    
	   if( substr($relation[$fld],0,6)=='select' )
	      {
		     $qq=explode('-fld-',$relation[$fld]);
			 
		      $qq[0]= $os->mq($qq[0]);
			  while( $out=$os->mfa($qq[0]))
			   {
			     $os->ddDataType[$out[$qq[1]]]=$out[$qq[2]];
			   
			   }
	   
	        
	        
			} else
			{
			   $os->ddDataType=$os->{$relation[$fld]} ;
			
			}   
	 
	  
	  }
	  
	  
	  $classAC='autoComp'.$fld;
	  
	   ?> 
	    <input type="text" value="" id="<? echo $functionId.$fld ?>" name="<? echo $fld ?>" class="<? echo $class[$fld] ?> <? echo $classAC?>" />
	   
	 <? 
	 if(is_array($os->ddDataType)){
	 
	 $acString=implode('##',$os->ddDataType);
	 $fldACStr .=$classAC.'-CLASSSTR-'.$acString.'-MULTIPLEAC-';
	// echo $fldACStr;
	 }
	    
	 
	 // $os->onlyOption($os->ddDataType); ?>
	 
	 
	 <?  } ?>
	 
	 </td>
  
  <? 
   
  
  
  }
  ?>
  <td> <input type="button" class="qaddButton" value="Add" title="Add new record"  onclick="<? echo $ajaxEditFunction ?>('<? echo $foreignIdValue ?>');" /></td>
   </tr> </table>


<?

 
echo '-DATAFORM--AUTOCOMPLETE-'.$fldACStr.'-AUTOCOMPLETE--CALLBACKOUTPUT-'; //  auto complete within auto complete 
 // next  phpCallback followed by  javascript call back 
 $phpCallback=$afterSaveCallback['php'];
 if($phpCallback && $phpCallback!='')
 {
   $os->$phpCallback($options,$foreignIdValue); // you must define callback function in os  Callback($options,$foreignIdValue)
 }
 
echo  '-CALLBACKOUTPUT-';

}



if($_GET['getQuickEditValues']=='OK') 
{
    
	
	
	$aQEsessonKey=varG('aQEsessonKey');
	$options=$_SESSION[$aQEsessonKey];
	 $foreignIdValue=varG('foreignIdValue');
	 
	 if($foreignIdValue>0) /////   5555555
	{
	extract($options);
	##   code starts
	

	
	
	
 foreach($fields as $fld=>$alise)
  {
      $dataForSave[$fld]=$_GET[$fld];
	   if($type[$fld]=='D')##  view date need date format
	  {  
	     $dataForSave[$fld]=$os->saveDate($_GET[$fld]);
	  }
	
  
  
  }
  
  if(is_array($defaultValues) && count($defaultValues)>0){
  foreach($defaultValues as $fld=>$val)
  {
      $dataForSave[$fld]=$val;
	     
  }}
   
  
  
  if($foreignIdValue>0){
  
  $dataForSave[$foreignId]=$foreignIdValue;
  }
  
	$dataForSave['addedBy']=$os->userDetails['adminId'];
	$dataForSave['addedDate']=date("Y-m-d h:i:s");
	$os->saveR($table,$dataForSave);
	
	
	
	##   view data
	
	viewQuickRows($options,$foreignIdValue);
	 
	
	}
	 
	
	exit();
}

if($_GET['getQuickViewValues']=='OK')
{
  
	
	$aQEsessonKey=varG('aQEsessonKey');
	$options=$_SESSION[$aQEsessonKey];
	$foreignIdValue=varG('foreignIdValue');
	
	
	 if($foreignIdValue>0)  
	{
 
	##   code start
	
	##   view datas
   viewQuickRows($options,$foreignIdValue);
	
	
	
	}
	
	exit();
}


if($_GET['getQuickDeleteValues']=='OK')
{
  
	
	$aQEsessonKey=varG('aQEsessonKey');
	$options=$_SESSION[$aQEsessonKey];
	$foreignIdValue=varG('foreignIdValue');
	$tableIdVal=varG('tableId');
	$table=$options['table'];
	$tableId=$options['tableId'];
	
	$tableQuery="delete from $table where  $tableId='$tableIdVal' ";
	$rs=$os->mq($tableQuery);
	viewQuickRows($options,$foreignIdValue);
	exit();
}