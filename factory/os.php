<?php

include($site['global-property'].'wtosGlobalFunction.php');
class wtos extends librarySettings  /// property only for factory
{







    // local settings
    var $showPerPage=20;   #overwritten
    var $dateFormat='d-m-Y';  #overwritten
    var $dateFormatJs='dd-mm-yy'; #overwritten
    var $dateFormatDB='Y-m-d h:i:s'; #overwritten
    var $wtAccess=array('wtAdd'=>true,'wtEdit'=>true,'wtDelete'=>true,'wtView'=>true); #overwritten



    // system default settings


    var  $adminTitle='wtOS Administration system';
    var  $adminDescription='wtOS  Administration system';
    var  $adminKeywords='wtOS  Administration system ';


    var $boxContainer=array (  'None' => 'None', 'Div' => 'Div',  'Span' => 'Span');
    var $boxYesNo= array ('Yes' => 'Yes', 'No' => 'No' );
    var $boxActive=array ('Active' => 'Active','Inactive' => 'Inactive');
    var $boxActiveColor=array ('Active' => '9FFFB8','Inactive' => 'FF8080');

    var $adminType=  array ('Admin' => 'Admin','Super Admin' => 'Super Admin');
    var $adminActive= array ('Active' => 'Active','Inactive' => 'Inactive');
    var $contactUsStatus= array ( 'New' => 'New',  'Viewed' => 'Viewed' );
    var $galleryCatagoryActive= array ( 'Active' => 'Active', 'Inactive' => 'Inactive'  );
    var $photoGalleryStatus= array ( 'Active' => 'Active', 'Inactive' => 'Inactive'  );

    var $noticeboardStatus= array ( 'Active' => 'Active', 'Inactive' => 'Inactive'  );
    var $noticeboardStatuseColor=array ('Active' => '9FFFB8','Inactive' => 'FF8080');



    var $pageContentStatusColor=array ('1' => '9FFFB8','0' => 'FF8080');
    var $pageContentStatus=array ('1' => 'Active','0' => 'Inactive');


    function getFormsFromCache(){
        global $site;
        $cache_dir = $site["root-factory"]."cache/forms/";
        $files_raw = glob($cache_dir."*.json");
        $files = [];

        foreach ($files_raw as $file){
            $f = [];
            $f["filename"] = str_replace([$site["root-factory"]."cache/forms/", ".json"],"", $file);
            $f["file"] = $file;
            $files[] = $f;
        }
        return $files;
    }

    function getFormFromCache($form){
        global $site;
        $cache_file_path = $site["root-factory"]."cache/forms/$form.json";
        try {
            $file = file_get_contents($cache_file_path);
            $file = json_decode($file, true);
            dump($file);
        } catch (Exception $exception){
            $file = false;
        }
        return $file;
    }

    function getColumnsFromDatabase($table){
        global $site;
        $db = $site["db"];
        $columns = $this->_db->query("select column_name as name,data_type as type from information_schema.columns where table_schema = '$db' and table_name = '$table';")->fetchAll();
        return $columns;
    }


}
$os=new wtos;
$os->loadWtosService($site['loginKey-wtos']);



?>
