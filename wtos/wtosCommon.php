<? 
session_start();
error_reporting($site['environment']);
include($site['root-wtos'].'wtos.php');

$os->userDetails =$os->session($os->loginKey,'logedUser');
 
if($os->session($os->loginKey,'logedUser','active')!='Active')
{  
             $os->Logout();
 }

if($os->get('logout')=="logout")
{
	 $os->Logout();	 
}
 
if($os->CurrentPageName()!='index.php')
{
	 if(!$os->isLogin())  {	 ?>
	 <script type="text/javascript" language="javascript">
       window.location="<?php echo $site['url-wtos'].''?>";
     </script>
	 <? 
	  exit();  }
}

   

