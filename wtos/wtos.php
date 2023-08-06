<?php

include(DIR_GLOBAL_PROPERTY.'/wtosGlobalFunction.php');
class wtos extends librarySettings  /// property only for backoffice
{
    // local settings
    public $showPerPage=20;   #overwritten
    public $dateFormat='d-m-Y';  #overwritten
    public $dateFormatJs='dd-mm-yy'; #overwritten
    public $dateFormatDB='Y-m-d h:i:s'; #overwritten
    public $wtAccess=array('wtAdd'=>true,'wtEdit'=>true,'wtDelete'=>true,'wtView'=>true); #overwritten



    // system default settings


    public $adminTitle='wtOS Administration system';
    public $adminDescription='wtOS  Administration system';
    public $adminKeywords='wtOS  Administration system ';


    public $boxContainer=array(  'None' => 'None', 'Div' => 'Div',  'Span' => 'Span');
    public $boxYesNo= array('Yes' => 'Yes', 'No' => 'No' );
    public $boxActive=array('Active' => 'Active','Inactive' => 'Inactive');
    public $boxActiveColor=array('Active' => '9FFFB8','Inactive' => 'FF8080');

    public $adminType=  array('Admin' => 'Admin','Super Admin' => 'Super Admin');
    public $adminActive= array('Active' => 'Active','Inactive' => 'Inactive');
    public $contactUsStatus= array( 'New' => 'New',  'Viewed' => 'Viewed' );
    public $galleryCatagoryActive= array( 'Active' => 'Active', 'Inactive' => 'Inactive'  );
    public $photoGalleryStatus= array( 'Active' => 'Active', 'Inactive' => 'Inactive'  );

    public $noticeboardStatus= array( 'Active' => 'Active', 'Inactive' => 'Inactive'  );
    public $noticeboardStatuseColor=array('Active' => '9FFFB8','Inactive' => 'FF8080');



    public $pageContentStatusColor=array('1' => '9FFFB8','0' => 'FF8080');
    public $pageContentStatus=array('1' => 'Active','0' => 'Inactive');



    public $adminAccess=array();  //  var $adminAccess=array('Add'=>'Add','Edit'=>'Edit','Delete'=>'Delete','View'=>'View');  // add more here


    public function checkAccess($accKey='')
    {
        if($accKey!='') {
            $accArr = array();

            if($this->userDetails['access']!='') {
                $accArr = explode(',', $this->userDetails['access']);
            }
            if(is_array($accArr) && in_array($accKey, $accArr)) {
                return true;
            }
        } else {
            return false;
        }
    }


    /****
     * @var string[]
     * Extended
     */
    public $osLinks =  [
        'dashBoard.php'=>"Dashboard",
        'adminList.php'=>"Admin",
        'pageContent.php'=>"Pages",
        'contactusList.php'=>"Enquiry",
        'wtboxList.php'=>"wtBox",
        "gallerycatagoryDataView.php"=>"Album",
        "photogalleryDataView.php"=>"Album Images",
        "noticeboardList.php"=>"Notice"
    ];

    public $osLinksAccess = [
        'dashBoard.php'=>"ADD|DELETE|EDIT|VIEW",
        'adminList.php'=>"ADD|DELETE|EDIT|VIEW",
        'pageContent.php'=>"ADD|DELETE|EDIT|VIEW",
        'contactusList.php'=>"ADD|DELETE|EDIT|VIEW",
        'wtboxList.php'=>"ADD|DELETE|EDIT|VIEW",
        "gallerycatagoryDataView.php"=>"ADD|DELETE|EDIT|VIEW",
        "photogalleryDataView.php"=>"ADD|DELETE|EDIT|VIEW",
        "noticeboardList.php"=>"ADD|DELETE|EDIT|VIEW",
    ];

    public function hasOsLinkAccess($link)
    {
        $extended_access = (array)@json_decode($this->userDetails["extended_access"], JSON_OBJECT_AS_ARRAY);
        $acc = key_exists($link, $extended_access) || $this->isSuperAdmin();
        return $acc;
    }
    public function hasOsEventAccess($event, $link="")
    {
        $link=$link=="" ? $this->currentPageName() : $link;
        $extended_access = (array)@json_decode($this->userDetails["extended_access"], JSON_OBJECT_AS_ARRAY);
        $acc = isset($extended_access[$link][$event]) || $this->isSuperAdmin();
        return $acc;

    }



}
$os=new wtos();
$os->loadWtosService(LOGIN_KEY_ADMIN);
