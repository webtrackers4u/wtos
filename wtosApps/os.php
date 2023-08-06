<?php

include(DIR_GLOBAL_PROPERTY.'/wtosGlobalFunction.php');
class wtos extends librarySettings
{
    // local settings
    public $dateFormat='d-m-Y';  #overwritten
    public $dateFormatJs='dd-mm-yy'; #overwritten
    public $dateFormatDB='Y-m-d h:i:s'; #overwritten
    public $wtAccess=array('wtAdd'=>true,'wtEdit'=>true,'wtDelete'=>true,'wtView'=>true); #overwritten


    public function selectedTab($seoid)
    {

        return ;
    }

}
$os=new wtos();

$os->loadWtosService(LOGIN_KEY);
