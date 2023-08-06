<?php
include('../../wtosConfig.php');
include(DIR_ADMIN.'top.php');
include('functions.php');



//$wtosFactoryId=$os->get('wtosFactoryId');
//$wtosFactoryId=2;
//if($wtosFactoryId<1){ echo 'error please create new form   '; exit();}



$formDataFile=$os->get('formDataFile');
$fdfD=explode('.', $formDataFile);

$pluginName=$fdfD['0'];
$pluginName=trim($pluginName);
$table=isset($fdfD['1']) ? $fdfD['1'] : '';
$formName=isset($fdfD['2']) ? $fdfD['2'] : '';

if($formDataFile=='') {
    echo 'error please select form or  create new form   ';
}


$formDataFileLoc=DIR_PLUGIN.'wtosFactory/forms/'.$formDataFile;  // for save and get JSON



if($os->post('saveFormData')=='saveFormData') {


    $post=$_POST;

    if($os->post('savedata')=='Add New Field') {
        $outPut= createFields($post);

        if($outPut['fields']!='') {
            $post['fields'][$outPut['fields']]=$outPut['fields'];
        }
        if($outPut['alise']!='') {
            $post['alise'][$outPut['fields']]=$outPut['alise'];
        }
        if($outPut['type']!='') {
            $post['type'][$outPut['fields']]=$outPut['type'];
        }

    }
    if($os->post('savedata')=='Save') {
        $dataTosave=json_encode($post);

        //  $updateq="update wtosFactory set formData='$dataTosave' where wtosFactoryId='$wtosFactoryId' ";
        //  $os->mq($updateq);

        $handleformDataFile = fopen($formDataFileLoc, "w");
        fwrite($handleformDataFile, $dataTosave);
        fclose($handleformDataFile);


        $previewPath=createPagesAjax($post);

    }

    if($os->post('savedata')=='Save Normal') {
        $dataTosave=json_encode($post);

        //  $updateq="update wtosFactory set formData='$dataTosave' where wtosFactoryId='$wtosFactoryId' ";
        //  $os->mq($updateq);

        $handleformDataFile = fopen($formDataFileLoc, "w");
        fwrite($handleformDataFile, $dataTosave);
        fclose($handleformDataFile);
        // $previewPath=createPagesAjax($post);
        $previewPathNormal=createPages($post);

    }







}

//$p=tablesInDb();
//$p=fieldsInTable('admin');


$pluginNameself='wtosFactory';

//$getJsonData=$os->rowByField('','wtosFactory','wtosFactoryId',$wtosFactoryId,$where='',$orderby='');
$formData='';
$getJsonDataStr='';

if (is_file($formDataFileLoc)) {
    $handle = fopen($formDataFileLoc, "r");
    $getJsonDataStr =(string) fread($handle, filesize($formDataFileLoc));
    fclose($handle);

}

$getJsonData['formData']=$getJsonDataStr;

//if($table==''){ echo 'missing table'; exit();}
$os->loadPluginConstant($pluginNameself, 'Constants.php');

if($getJsonData['formData']!='') {
    $formData=json_decode($getJsonData['formData'], true);
}

$fields=fieldsInTable($table);



if(!in_array('addedBy', $fields)) {

    $os->mq("ALTER TABLE `$table` ADD `addedBy` INT( 10 ) NOT NULL");

}
if(!in_array('addedDate', $fields)) {
    $os->mq("ALTER TABLE `$table` ADD `addedDate` DATETIME NOT NULL ");

}

$linkName=$formName;
// Ajax Pages
$viewPage=$table.'DataView.php';
$ajaxPage=$table.'Ajax.php';
$heading='Manage '.$formName;


if(isset($formData['linkName'])) {
    if(trim($formData['linkName'])!='') {
        $linkName=$formData['linkName'];
    }
}
if(isset($formData['ajaxPage'])) {
    if(trim($formData['ajaxPage'])!='') {
        $ajaxPage=$formData['ajaxPage'];
    }
}
if(isset($formData['viewPage'])) {
    if(trim($formData['viewPage'])!='') {
        $viewPage=$formData['viewPage'];
    }
}
if(isset($formData['heading'])) {
    if(trim($formData['heading'])!='') {
        $heading=$formData['heading'];
    }
}



// simple nonajax Ajax Pages
$editPage=$table.'Edit.php';
$listPage=$table.'List.php';
$headingAdd='Add new '.$table;
$headingEdit='Edit  '.$table;
$headingList='List '.$table;

if(isset($formData['editPage'])) {
    if(trim($formData['editPage'])!='') {
        $editPage=$formData['editPage'];
    }
}
if(isset($formData['listPage'])) {
    if(trim($formData['listPage'])!='') {
        $listPage=$formData['listPage'];
    }
}
if(isset($formData['headingAdd'])) {
    if(trim($formData['headingAdd'])!='') {
        $headingAdd=$formData['headingAdd'];
    }
}
if(isset($formData['headingEdit'])) {
    if(trim($formData['headingEdit'])!='') {
        $headingEdit=$formData['headingEdit'];
    }
}
if(isset($formData['headingList'])) {
    if(trim($formData['headingList'])!='') {
        $heading=$formData['headingList'];
    }
}



$pluginFolder='';
if($pluginName!='') {
    $pluginFolder=$pluginName.'/';
}


$previewPath=URL_PLUGIN.$pluginFolder.$viewPage ;
$previewPathNormal=URL_PLUGIN.$pluginFolder.$listPage ;
?>

<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td style="border:1px solid #0097DF;" valign="top">&nbsp;
	
	<?php  include('wtosfactoryLeft.php'); ?>
	 
	
	</td>
    <td valign="top"><form id="formFields" method="post" action="" style="padding-left:20px;">
<div style="padding:10px 5px 5px 0px;">plugin Name : <b><?php echo  $pluginName ?> </b>&nbsp;&nbsp;
Form Name <b><?php echo  $formName ?></b>&nbsp;&nbsp;
Table Name <b><?php echo  $table ?></b>&nbsp;&nbsp;


<input type="hidden" name="pluginName" value="<?php echo  $pluginName ?>" />
<input type="hidden" name="formName" value="<?php echo  $formName ?>" />
<input type="hidden" name="tableName" value="<?php echo  $table ?>" />





 Link Name <input name="linkName" class="flds" type="text" value="<?php echo  $linkName ?>" />
 </div> 
<br />AJAX PAGE PARAMETERS<br />
 
View Page <input name="viewPage" style="font-weight:bold;" class="flds" type="text" value="<?php echo  $viewPage ?>" /> &nbsp;
Ajax Page <input class="flds" name="ajaxPage" style="font-weight:bold;" type="text" value="<?php echo  $ajaxPage ?>"  /> &nbsp;
Heading <input name="heading" class="flds" type="text" value="<?php echo  $heading ?>" /> <br />

<br />NON AJAX PAGE PARAMETERS<br />

Edit Page <input name="editPage" style="font-weight:bold;" class="flds" type="text" value="<?php echo  $editPage ?>" /> &nbsp;
List Page <input class="flds" style="font-weight:bold;" name="listPage" type="text" value="<?php echo  $listPage ?>"  /> &nbsp; <br />
Heading Add <input name="headingAdd" class="flds" type="text" value="<?php echo  $headingAdd ?>" /> 
Heading Edit <input name="headingEdit" class="flds" type="text" value="<?php echo  $headingEdit ?>" /> 
Heading List <input name="headingList" class="flds" type="text" value="<?php echo  $headingList ?>" /> 


<div id="FieldForm">

<style>
.formTables{ margin:5px 0px 5px 0px; border:1px dotted #CCCCCC;}
.flds{ border:1px solid #F0F0F0; padding:1px 0px 2px 0px}
 
.formTables tr:hover{ background-color:#D8F8FE;}
</style>





</div>

<table  border="0" cellspacing="0" cellpadding="2" class="formTables">
<tr style="font-weight:bold; background-color:#0080C0; color:#FFFFFF;" >
	<td style="width:5px;">Key</td>
	<td >Ignor</td>  
	<td>Name</td>  
	<td>Type</td>
	<td>Valid<br />Empty</td> 
	<td>Listing</td> 
	<td>Search</td> 
	<td>Edit</td> 
	<td>Field Id </td>
	<td>Relation <br />( adminId,name,admin)(yesNo|yes,no)</td>
</tr>
 <?php
 $os->fieldsTypeTemp =$os->fieldsType;  // only for date
$i=0;
foreach($fields as $field) {
    $primeryChecked='';

    if($field=='addedDate' || $field=='addedBy' ||$field=='modifyBy' ||$field=='modifyDate') {
        continue;
    }
    $i++;



    $os->fieldsType =$os->fieldsTypeTemp;
    if($os->fieldsTypeDB[$field]!='datetime') {
        unset($os->fieldsType['Date']);
    } else {

        $os->fieldsType=array();
        $os->fieldsType['Date']='Date'; // only for date
    }

    if(isset($formData['primery'])) {
        $primeryChecked=($formData['primery']==$field) ? 'checked=checked' : '';
    } else {
        if($i==1) {
            $primeryChecked='checked=checked';
        }
    }

    $IgnorChecked='';
    if(isset($formData['ignor'][$field])) {
        $IgnorChecked=($formData['ignor'][$field]==1) ? 'checked=checked' : '';
    }


    $validationChecked='';
    if(isset($formData['validation'][$field])) {
        $validationChecked=($formData['validation'][$field]==1) ? 'checked=checked' : '';
    }


    $listingChecked='';
    if(isset($formData['listing'][$field])) {
        $listingChecked=($formData['listing'][$field]==1) ? 'checked=checked' : '';
    }

    $searchChecked='';
    if(isset($formData['search'][$field])) {
        $searchChecked=($formData['search'][$field]==1) ? 'checked=checked' : '';
    }

    $editChecked='';
    if(isset($formData['edit'][$field])) {
        $editChecked=($formData['edit'][$field]==1) ? 'checked=checked' : '';
    }

    $aliseChecked=$field;

    if(isset($formData['alise'][$field])) {
        if(trim($formData['alise'][$field])!='') {
            $aliseChecked=$formData['alise'][$field];
        }
    }

    $typeChecked='';
    if(isset($formData['type'][$field])) {
        if(trim($formData['type'][$field])!='') {
            $typeChecked=$formData['type'][$field];
        }
    }

    $relationChecked='';
    if(isset($formData['relation'][$field])) {
        if(trim($formData['relation'][$field])!='') {
            $relationChecked=$formData['relation'][$field];
        }
    }


    $ignorcolor='';
    if($IgnorChecked!='') {
        $ignorcolor='style="background-color:#E01F24;" ';
    }

    $colorType='';
    if(isset($os->fieldsColor[$typeChecked])) {

        $colorType=' style="background-color:#'.$os->fieldsColor[$typeChecked].'" ';

    }

    ?>
 

	<tr <?php echo $ignorcolor; ?>  id="ignor<?php echo $field ?>"><td align="right"><input type="radio"  name="primery" value="<?php echo $field ?>" <?php echo $primeryChecked; ?>  /> </td> 
		<td><input onclick="Ignor('ignor<?php echo $field ?>',this);"   id="" type="checkbox" name="ignor[<?php echo $field ?>]" value="1" <?php echo $IgnorChecked; ?> ?> </td> 
		<td><input style="color:#000000; font-weight:bold;" class="flds" type="text" name="alise[<?php echo $field ?>]" value="<?php echo $aliseChecked ?>" /></td>
		
		
		<td> <select class="flds" type="text" <?php echo $colorType ?> name="type[<?php echo $field ?>]" ><?php $os->onlyOption($os->fieldsType, $typeChecked); ?></select>
		</td>
		<td><input  class="flds" type="checkbox" name="validation[<?php echo $field ?>]" value="1" <?php echo $validationChecked; ?> /> </td> 
		<td><input  class="flds" type="checkbox" name="listing[<?php echo $field ?>]" value="1" <?php echo $listingChecked; ?> /> </td> 
		<td><input  class="flds" type="checkbox" name="search[<?php echo $field ?>]" value="1" <?php echo $searchChecked; ?>  /></td> 
		<td><input  class="flds" type="checkbox" name="edit[<?php echo $field ?>]" value="1" <?php echo $editChecked; ?>  /> </td> 
		<td><input  class="flds" type="text" readonly="readonly" style="background-color:#EBEBEB;" name="fields[<?php echo $field ?>]" value="<?php echo $field ?>"  /> </td>  
		<td><input  class="flds" type="text" name="relation[<?php echo $field ?>]" value="<?php echo $relationChecked ?>" style="width:200px;" /></td>
	</tr>
	
	
	
	
	<?php  } ?>
	
	</table>
	<table class="">
	<tr >
	<td width="60%"   > 
	<?php   $os->fieldsType =$os->fieldsTypeTemp; ?>
<input type="text" name="label" /><select name="fieldsType"><?php $os->onlyOption($os->fieldsType) ?></select><input type="submit" name="savedata" value="Add New Field" style="cursor:pointer;" />
<br />
<span style="color:#FF0000; font-style:italic;">Be careful After adding a database field You are not able to delete it. <br />

</span>
</td>
	
	 
	<td align="right" valign="top"><input type="submit" name="savedata" value="Save" style="cursor:pointer;" />   <input type="submit" name="savedata" value="Save Normal" style="cursor:pointer;" /> 
	<?php if($formData!='') { ?>
	
	<?php if($previewPath!='') {?>
	<input type="button" value="Preview" style="cursor:pointer;" onclick="popUpWindow('<?php echo $previewPath ?>', 20, 20, 1230, 600); " /> 
	<?php } ?>	
	<?php if($previewPathNormal!='') {?>
	<input type="button" value="Preview Normal" style="cursor:pointer;" onclick="popUpWindow('<?php echo $previewPathNormal ?>', 20, 20, 1230, 600); " /> 
	<?php } ?>	
	
	
	
	
	<?php if($pluginName!='') {
	    $zipFile=BASE_URL.$pluginName.'.zip';
	    ?>
	         <input type="button" value="Download" style="cursor:pointer;" onclick="window.location='<?php echo $zipFile; ?>'" />  
	 <?php } ?>
	 
	<?php  } ?></td>
</tr>
</table>
 
 <br />
 &nbsp;&nbsp;&nbsp;&nbsp;
 <input type="hidden" name="saveFormData" value="saveFormData" />
 </form></td>
  </tr>
</table>



 <script>
 
function Ignor(id,obj)
{
 if(obj.checked)
 {
   os.getObj(id).style.background='#E01F24';
 }else
 {
 os.getObj(id).style.background='';
 
 }

  
}
 </script>
<?php include(DIR_ADMIN.'bottom.php'); ?>