<? 
$pCont= $os->rowByField('person,phone,email','rbcontact','rbcontactId',$record['rbcontactId']);
# -- 8-11-2016 for like search from diferent table using a Searchstr or search key - 
$rbcontactIds= $os->searchKeyGetIds($searchKey,'rbcontact','rbcontactId',$whereCondition='',$searchFields='');  
	$orrbcontactId='';
	if($rbcontactIds!='')
	{
	   $orrbcontactId= " or  rbcontactId IN ( $rbcontactIds) ";  // add this to search query 
	}
	
	
	?>
	
	<?   
   //// login curl capcha
   
    
	if($os->validateFormToken('login'))
	{
	
	      $os->processLogin('username','password','admin'); 
	 
	 }
 
 
 ?><?  $wtToken=$os->randomFormToken('login');
?>	
<input type="hidden" name="<? echo $wtToken['name'] ?>" value="<? echo $wtToken['value'] ?>" />
-----------------------------------------------------------------------------------------------------

get all data from linked table id 
$c= $os->getIdsDataFromQuery($rsRecords->queryString,'rbcontactId','rbcontact','rbcontactId',$fields='',$returnArray=true,$relation='121',$otherCondition=''); // get contact
   $c= $os->getIdsDataFromQuery($rsRecords->queryString,'rbreminderId','rbpayment','rbreminderId',$fields='',$returnArray=true,$relation='12M',$otherCondition=''); // get payments
   getIdsDataFromQuery($query,$fieldId,$linkedTable,$tableLinkedId,$fields='',$returnArray=true,$relation='121',$otherCondition='') 