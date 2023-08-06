<?php
session_start();
error_reporting(ENVIRONMENT);
include(DIR_ADMIN.'wtos.php');

$os->userDetails =$os->session($os->loginKey, 'logedUser');

if($os->session($os->loginKey, 'logedUser', 'active')!='Active') {
    $os->Logout();
}

if($os->get('logout')=="logout") {
    $os->Logout();
}

if($os->CurrentPageName()!='index.php') {
    if(!$os->isLogin()) {	 ?>
	 <script type="text/javascript" language="javascript">
       window.location="<?php echo URL_WTOS.''?>";
     </script>
	 <?php
     exit();
    }
}
