<?php 
session_start();

include('wtosConfigLocal.php');// load configuration
include('wtos.php'); // load wtos Library
function showDataAndForm($functionId)
{
    global $os;   
	$sessionKey='SAA-'.$functionId;
	$os->data=$os->getSession($sessionKey); 
   	$containerId=$os->getVal('containerId');
	$idForAssign=$os->getVal('idForAssign');
	$searchTxtId=$os->getVal('searchTxtId');
	$table=$os->getVal('table');
	$tableId=$os->getVal('tableId');
	$fields=$os->getVal('fields');
	$scriptCallback=$os->getVal('scriptCallback');
	
	$searchTxt=$os->getVal('searchTxt');
	$popupBoxId=$os->getVal('popupBoxId');
	$popupBoxDataId=$os->getVal('popupBoxDataId');

    $returnField=$os->getVal('returnField');
   

	$fieldsStr=$fields.",".$tableId;	
	 
	
	$fieldsA=explode(',',$fields);
// add form
	?>  <?
	// add form end
	
		
	$where="";
	$searchKeyArr=array();
	if(trim($searchTxt)!='')
	{
	   
		$tbls=$os->mq("SHOW COLUMNS FROM $table ");
		while($tbl=$os->mfa($tbls))
		{
		
			$fldName=$tbl['Field']; 
			
			$searchKeyArr[]= $fldName ." like '%$searchTxt%'";
		}
		
	     $skString=implode(' Or ',$searchKeyArr);
	   
	   
	   $where="  $skString ";
	}
	
	$dataRS=$os->getTable($fieldsStr ,$table,$where,$fieldsA[0]);
	
	if($dataRS){
	$cc=1;
	
			?>
			<div class="sasclear"> </div>
			<div class="popoupHead">Search Results</div>
			<div class="sasclear"> </div>
			<table class="SAAListTable" cellpadding="0" cellspacing="0"><? 
			
			while($row=$os->mfa($dataRS)) 
			{ 
			 ?> <tr onclick="saa.assignValue('<? echo $functionId; ?>','<? echo $row[$returnField] ?>')"> 
			 <td>  <? echo $cc ?>   </td>
			<? foreach($fieldsA as $field){ ?>
			 <td>  <? echo $row[trim($field)] ?>   </td>
			  <? } ?>
			  
			  </tr><? $cc++; }	?> 
			  </table>
		
			
			<? 
			
			}else
			{
			?>
			No data found.
			
			<?
			}

}





if($os->get('SAA_DrawSearchBox')=='OK' && $os->post('RETURN')=='SearchBoxHTML')
{
   
	$functionId=$os->post('functionId');
	$containerId=$os->post('containerId');
	$idForAssign=$os->post('idForAssign');
	$table=$os->post('table');
	$tableId=$os->post('tableId');
	$fields=$os->post('fields');
	$fieldsTitle=$os->post('fieldsTitle');
	
	$returnField=$os->post('returnField');
	$scriptCallback=$os->post('scriptCallback');
	$extraParam=$os->post('extraParam');
	$searchTxtId=$os->post('searchTxtId');
	$popupBoxId=$os->post('popupBoxId');
	$popupBoxDataId=$os->post('popupBoxDataId');
		
	$sessionKey='SAA-'.$functionId;
	$os->setSession($os->post(),$sessionKey); 
	$fieldsStr=$fields.",".$tableId;	
	$fieldsA=explode(',',$fields);
	
	echo "[SAA:SEPERATOR]".$functionId."[SAA:SEPERATOR]";
	 
?>
<span class="actionLink SAAeditlink">
<a href="javascript:void(0)" onclick="saa.prepare('<? echo $functionId; ?>')">S</a>
</span>

<div id="<? echo $popupBoxId ?>" class="SAA_popupBOX" style="display:none;">
<div class="SAApopoupClose" onclick="saa.popUpClose('<? echo $popupBoxId ?>')">X</div>

<div class="saaTabLinkClassActive " id="saaTabLink1" onclick="saa.tab('saaTabLink1','SaaTab1')" >Search</div> <div class="saaTabLinkClassInActive " onclick="saa.tab('saaTabLink2','SaaTab2')" id="saaTabLink2" >Add New Record</div>

<div class="sasclear"> </div>
<div class="SaaTabClass" id="SaaTab1">
<table class="SAAListTableForm" cellpadding="0" cellspacing="0">
<tr> 
			 <td> <input type="text" id="<? echo $searchTxtId ?>" class="SAASearchTextBox class_<? echo $searchTxtId; ?>" />    </td>
	 
	
 
	<td><input type="button" style="cursor:pointer;" value="Search" 
 
onclick="saa.prepare('<? echo $functionId; ?>')" /> </td>
	</tr>
	</table>
</div>
<div class="SaaTabClass" id="SaaTab2" style="display:none;">

	<table class="SAAListTableForm" cellpadding="0" cellspacing="0"><tr><?
	 foreach($fieldsA as $field){ 
	  $fieldId=$field."_".$functionId;
	 ?>
			 <td> <input type="text" class="SAATextBox" value="" placeholder="<? echo $field; ?>" id="<? echo $fieldId; ?>" />     </td>
	<?  }  
	
	?> 
	<td> <input type="button" value="Save" onclick="saa.addValue('<? echo $functionId; ?>')" style="cursor:pointer;" /></td>
	</tr>
	</table>
</div>



<div class="sasclear"> </div>

<div id="<? echo $popupBoxDataId ?>" class="SAA_popupBOX_data">
 
</div>



</div>
 

<? 
 exit();
}

if($os->get('SAA_ListResults')=='OK' && $os->post('RETURN')=='SearchResultsAndForm')
{
	$functionId=$os->post('functionId');
	$sessionKey='SAA-'.$functionId;
	$searchTxt=$os->post('searchTxt');
	$os->setSession($searchTxt,$sessionKey,'searchTxt'); 
	$popupBoxDataId=$os->getSession($sessionKey,'popupBoxDataId');
	echo "[SAA:SEPERATOR]".$functionId."[SAA:SEPERATOR]";
	showDataAndForm($functionId);
	exit();
}
if($os->get('SAA_AddRecord')=='OK' && $os->post('RETURN')=='ListingAndForm')
{
   
    $dataToSave=array();
    $functionId=$os->post('functionId');
	$sessionKey='SAA-'.$functionId;
	$os->data=$os->getSession($sessionKey); 
    $functionId=$os->getVal('functionId');
    $idForAssign=$os->getVal('idForAssign');
	$popupBoxDataId=$os->getVal('popupBoxDataId');
	$table=$os->getVal('table');
	$tableId=$os->getVal('tableId');
	$fields=$os->getVal('fields');
	
	
	$fieldsStr=$fields.",".$tableId;	
	$fieldsA=explode(',',$fields);
	foreach($fieldsA as $field)
	{ 
	    $dataToSave[$field]=$os->post($field);
	}  
	
	$dataToSave['addedDate']=$os->now();
	//$dataToSave['addedBy']=$os->userDetails['adminId']; 
	
	$os->save($table,$dataToSave,$tableId,'');
	echo "[SAA:SEPERATOR]".$functionId."[SAA:SEPERATOR]";
	showDataAndForm($functionId);
	echo "[SAA:SEPERATOR]"; 
	$os->optionsHTML('',$tableId,$fieldsA[0],$table); 
	exit();
	
}
