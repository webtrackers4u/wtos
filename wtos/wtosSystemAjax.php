<?php 
session_start();
include('wtosConfigLocal.php');// load configuration
include('wtos.php'); // load wtos Library
 ## ----   sector AA123 reserved for system Function -------##
 
 if($os->get('SetHomPage')=='OK')  // system function
 {
		  $homeId=$os->get('homeId');
		  $upQuery="update pagecontent set isHome='No' where (isHome='Yes' or isHome='')";
		  $os->mq($upQuery);
		  if($homeId>0)
		  {
		  $upQuery="update pagecontent set isHome='Yes' where pagecontentId='$homeId' ";
		  $os->mq($upQuery);
		  }
		  echo 'Success fully updated;';
		  exit();
 
}
 
 
 if($_GET['wtosEditField']=='OKS') // system function
{
 
	$newStatus=$os->get('newStatus');
	$table=$os->get('table');
	$satusfld=$os->get('satusfld');
	$idFld=$os->get('idFld');
	$idVal=$os->get('idVal');
    $data[$satusfld]=$newStatus;
	$os->save($table,$data,$idFld,$idVal);
	echo 'Updated Successfully';
	
}

if($os->get('wtosEditField')=='OKPROCEED' && $os->get('method')=='POST') // system function
{

    $advanceOption=$os->post('advanceOption');
  
    $phpFunc=$os->post('phpFunc');
    
   
 
	$newStatus=$os->post('newStatus');
	$table=$os->post('table');
	$satusfld=$os->post('satusfld');
	$idFld=$os->post('idFld');
	$idVal=$os->post('idVal');
    $data[$satusfld]=$newStatus;
	$os->save($table,$data,$idFld,$idVal);
		
	
	
	echo '[#] Updated Successfully [#]';
	
	if($phpFunc!='')
	{
	   $os->$phpFunc($_POST);
	
	}
	
	
}

 
  ## ----   sector AA123 reserved for system Function   END HERE  -------##
 
 
 
 
 
 
 
 
 
 
 
?> 
 
