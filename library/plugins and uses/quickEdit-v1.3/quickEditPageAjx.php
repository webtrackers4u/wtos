<?php
## v-1.3 author Mizanur Rahaman  mizanur82@gmail.com for new wtos
session_start();
ob_start();

include('wtosConfigLocal.php');// load configuration
include('wtos.php'); // load wtos Library
ob_end_clean();

function viewQuickRows($options, $foreignIdValue)
{



    global $os;
    $condition='';
    $fldACStr='';
    extract($options);
    if($foreignIdValue!='') {
        $condition .="  $foreignId!='' and $foreignId>0 ";
        $condition .=" and $foreignId='$foreignIdValue'";
    }
    $tableQuery=str_replace('[condition]', $condition, $tableQuery);
    // $tableQuery;
    $rs=$os->mq($tableQuery);

    ?>
<table cellpadding="0" cellspacing="0" class="wtclass<?php echo $functionId ?>">
<tr style="display:none;" ><td colspan="30" class="PageHeading"> <?php echo $PageHeading ?></td></tr>
  
  
   

<?php
    $sl=1;
    while($row=$os->mfa($rs)) {


        ?>
 
  
 
  
  <tr>
  <!--<td style="color:#FF8040; font-weight:bold;"><?php echo $sl?> &nbsp;&nbsp; </td>-->
  <?php
        foreach($fields as $fld=>$alise) {

            $inlineEditAllow=$os->val($inlineEdit, $fld);
            $className=$class[$fld];
            //


            ?>
     <td>  
	 <?php if($type[$fld]=='T' || $type[$fld]=='' ||  $type[$fld]=='AC') {  ##  view date need to add for date fields

	     ?> 
	  <?php if($inlineEditAllow=='yes') {
	      $os->editText($row[$fld], $table, $fld, $tableId, $row[$tableId], $inputNameID='editText', $extraParams='class="'.$className.'" ', $ajaxPage='', $ajaxMethod='POST', $phpFunc='', $javascriptFunc='', $advanceOption='');
	  } else { ?>
	  <?php echo $row[$fld] ?>
	  <?php  } ?>
	  
	
	
	
	
	
	  <?php } elseif($type[$fld]=='DD') {

	      if($relation[$fld]!='') {

	          if(substr($relation[$fld], 0, 6)=='select') {
	              $qq=explode('-fld-', $relation[$fld]);

	              $qq[0]= $os->mq($qq[0]);
	              while($out=$os->mfa($qq[0])) {
	                  $os->ddDataType[$out[$qq[1]]]=$out[$qq[2]];

	              }


	          } else {
	              $os->ddDataType=$os->{$relation[$fld]} ;

	          }


	      }



	      echo $os->ddDataType[$row[$fld]];
	      ?> 
	 <select   class="<?php echo $class[$fld] ?>" style="display:none;"> 
	 <?php //  $os->onlyOption($os->ddDataType,$row[$fld]);?>
	 
	 </select>
	 <?php  } elseif($type[$fld]=='D') {
	     echo $os->showDate($row[$fld]);

	 }
            ?>
	 
	 </td>
  
  <?php


        }

        ?>
 <td> 
 <?php  if($delete) { ?>
 <input type="button" class="qdeleteButton" value="Del" title="Delete record"  onclick="<?php echo $ajaxDeleteFunction ?>('<?php echo $row[$tableId] ?>');" />
 <?php } ?>
 
 </td>
   </tr>
  
  
  

<?php
        $sl++;
    }

    ?>  <tr class="formTR">
   
  <?php


      ##form

      foreach($fields as $fld=>$alise) {
          $extraAttr = $os->val($extra, $fld);

          ?>
     <td><div class="wtalise<?php echo $functionId?>"> <?php echo $alise ?> </div>
	  
	 <?php if($type[$fld]=='T' || $type[$fld]=='' || $type[$fld]=='D') { ?> 
	 
	 
	 <input type="text" value="" id="<?php echo $functionId.$fld ?>" name="<?php echo $fld ?>" class="<?php echo $class[$fld] ?>" placeholder="<?php echo $alise ?> " <?php echo $extraAttr ?> />
	  
	  
	  <?php } elseif($type[$fld]=='DD') {

	      if($relation[$fld]!='') {

	          if(substr($relation[$fld], 0, 6)=='select') {
	              $qq=explode('-fld-', $relation[$fld]);

	              $qq[0]= $os->mq($qq[0]);
	              while($out=$os->mfa($qq[0])) {
	                  $os->ddDataType[$out[$qq[1]]]=$out[$qq[2]];

	              }



	          } else {
	              $os->ddDataType=$os->{$relation[$fld]} ;

	          }


	      }




	      ?> 
	 <select  id="<?php echo $functionId.$fld ?>" name="<?php echo $fld ?>" class="<?php echo $class[$fld] ?>" <?php echo $extraAttr ?>> 
	 <?php  $os->onlyOption($os->ddDataType); ?>
	 
	 </select>
	 <?php  } elseif($type[$fld]=='AC') {

	     if($relation[$fld]!='') {

	         if(substr($relation[$fld], 0, 6)=='select') {
	             $qq=explode('-fld-', $relation[$fld]);

	             $qq[0]= $os->mq($qq[0]);
	             while($out=$os->mfa($qq[0])) {
	                 $os->ddDataType[$out[$qq[1]]]=$out[$qq[2]];

	             }



	         } else {
	             $os->ddDataType=$os->{$relation[$fld]} ;

	         }


	     }


	     $classAC='autoComp'.$fld;

	     ?> 
	 
	    <input type="text" value="" id="<?php echo $functionId.$fld ?>" name="<?php echo $fld ?>" class="<?php echo $class[$fld] ?> <?php echo $classAC?>" <?php echo $extraAttr ?> />
	  
	 <?php
     if(is_array($os->ddDataType)) {

         $acString=implode('##', $os->ddDataType);
         $fldACStr .=$classAC.'-CLASSSTR-'.$acString.'-MULTIPLEAC-';
         // echo $fldACStr;
     }


     // $os->onlyOption($os->ddDataType);?>
	 
	 
	 <?php  } ?>
	 
	 </td>
  
  <?php



      }
    ?>
  <td> 
  
 <?php  if($add) { ?>
  <input type="button" class="qaddButton" value="Add" title="Add new record"  onclick="<?php echo $ajaxEditFunction ?>('<?php echo $foreignIdValue ?>');" />
 <?php } ?>
  
  </td>
   </tr> </table>


<?php


echo '-DATAFORM--AUTOCOMPLETE-'.$fldACStr.'-AUTOCOMPLETE--CALLBACKOUTPUT-'; //  auto complete within auto complete
    // next  phpCallback followed by  javascript call back
    $phpCallback=$afterSaveCallback['php'];
    if($phpCallback && $phpCallback!='') {
        $os->$phpCallback($options, $foreignIdValue); // you must define callback function in os  Callback($options,$foreignIdValue)
    }

    echo  '-CALLBACKOUTPUT-';

}



if($os->get('getQuickEditValues')=='OK') {



    $aQEsessonKey=$os->get('aQEsessonKey');
    $options=$_SESSION[$aQEsessonKey];
    $foreignIdValue=$os->get('foreignIdValue');

    if($foreignIdValue>0) { /////   5555555
        extract($options);
        ##   code starts





        foreach($fields as $fld=>$alise) {
            $dataForSave[$fld]=$_GET[$fld];
            if($type[$fld]=='D') {##  view date need date format
                $dataForSave[$fld]=$os->saveDate($_GET[$fld]);
            }



        }

        if(is_array($defaultValues) && count($defaultValues)>0) {
            foreach($defaultValues as $fld=>$val) {
                $dataForSave[$fld]=$val;

            }
        }



        if($foreignIdValue>0) {

            $dataForSave[$foreignId]=$foreignIdValue;
        }

        // $dataForSave['addedBy']=$os->userDetails['adminId'];  jojo
        $dataForSave['addedDate']=date("Y-m-d h:i:s");
        $os->save($table, $dataForSave);



        ##   view data

        viewQuickRows($options, $foreignIdValue);


    }


    exit();
}

if($os->get('getQuickViewValues')=='OK') {


    $aQEsessonKey=$os->get('aQEsessonKey');
    $options=$_SESSION[$aQEsessonKey];
    $foreignIdValue=$os->get('foreignIdValue');


    if($foreignIdValue>0) {

        ##   code start

        ##   view datas
        viewQuickRows($options, $foreignIdValue);



    }

    exit();
}


if($os->get('getQuickDeleteValues')=='OK') {


    $aQEsessonKey=$os->get('aQEsessonKey');
    $options=$_SESSION[$aQEsessonKey];
    $foreignIdValue=$os->get('foreignIdValue');
    $tableIdVal=$os->get('tableId');
    $table=$options['table'];
    $tableId=$options['tableId'];

    $tableQuery="delete from $table where  $tableId='$tableIdVal' ";
    $rs=$os->mq($tableQuery);
    viewQuickRows($options, $foreignIdValue);
    exit();
}
