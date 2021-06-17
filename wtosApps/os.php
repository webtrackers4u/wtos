<?php
include($site['global-property'].'wtosGlobalFunction.php');
class wtos extends librarySettings
{
            // local settings
			var $dateFormat='d-m-Y';  #overwritten
			var $dateFormatJs='dd-mm-yy'; #overwritten
			var $dateFormatDB='Y-m-d h:i:s'; #overwritten
			var $wtAccess=array('wtAdd'=>true,'wtEdit'=>true,'wtDelete'=>true,'wtView'=>true); #overwritten


			function selectedTab($seoid)
			{

			     return ;
			}

}
$os=new wtos;

$os->loadWtosService($site['loginKey']);


?>
