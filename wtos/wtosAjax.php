<?php 
session_start();
include('wtosConfigLocal.php');// load configuration
include('wtos.php'); // load wtos Library
 
 if($os->get('SetHomPage')=='OK')
 {
		  $homeId=$os->get('homeId');
		  $upQuery="update pagecontent set isHome='No' where (isHome='Yes' or isHome='')";
		  $os->mq($upQuery);
		  if($homeId>0)
		  {
		  $upQuery="update pagecontent set isHome='Yes' where pagecontentId='$homeId' ";
		  $os->mq($upQuery);
		  }
		  echo 'Success;';
		  exit();
 
 
 }
 
 
 if($_GET['wtosEditField']=='OKS')
{
  
	
	$newStatus=$os->get('newStatus');
	$table=$os->get('table');
	$satusfld=$os->get('satusfld');
	$idFld=$os->get('idFld');
	$idVal=$os->get('idVal');
    $data[$satusfld]=$newStatus;
	$os->save($table,$data,$idFld,$idVal);
	echo 'Update Successfully';
	
}
 
 
 
 
 
 
 
 
 
 
 
 
 
?> 
 
