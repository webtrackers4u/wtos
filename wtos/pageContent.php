<?
include('wtosConfigLocal.php');
include($site['root-wtos'].'top.php');

if(!$os->checkAccess('Pages')){
//exit();
}

$editPage='pageContentEdit.php';
$listPage='pageContent.php';
$primeryTable='pagecontent';
$primeryField='pagecontentId';
$pageHeader='Web Pages';
$editPageLink=$site['url-wtos'].$editPage.'?'.$os->addParams(array(),array()).'editRowId=';
$listPageLink=$site['url-wtos'].$listPage.'?'.$os->addParams(array(),array());


##  delete row
if($os->get('operation')=='deleteRow')
{
    if($os->deleteRow($primeryTable,$primeryField,$os->get('delId')))
    {
        $flashMsg='Data Deleted Successfully';

        $os->flashMessage('123',$flashMsg);
        $os->redirect($site['url-wtos'].$listPage);

    }
}


##  fetch row

/* searching */

$active= $os->setNget('active',$primeryTable);  //for session set
$andActive=($active!=-1 && $active!='' )? " and active='$active'":'';


$andUser=$os->andField('name_search','title',$primeryTable,'%');
$name_search=$andUser['value']; $andname=$andUser['andField'];


$pagecontentIdA=$os->andField('pagecontentId','parentPage',$primeryTable);
$pagecontentId=$pagecontentIdA['value']; $andPagecontentId=$pagecontentIdA['andField'];

$langIdA=$os->andField('langId','langId',$primeryTable);
$langId=$langIdA['value']; $andlangId=$langIdA['andField'];




$listingQuery=" select * from $primeryTable where $primeryField>0  $andActive    $andPagecontentId    $andname $andlangId order by parentPage asc, priority asc,   $primeryField desc  ";

//echo $listingQuery;


##  fetch row



$recordsArr=$os->pagingQuery($listingQuery,10);

$records=$recordsArr['resource'];


#-- status dd #
$featured=array('0'=>'No','1'=>'Yes');
$colorFeatured=array('0'=>'F2C6C6','1'=>'A0EBB9');
$colorStatus=array('0'=>'F2C6C6','1'=>'A0EBB9');
$status=array('0'=>'Inactive','1'=>'Active');
$statuslist=array('-1'=>'All','1'=>'Active','0'=>'Inactive');



$os->showFlash($os->flashMessage('123'));
?>
<style>
    .editText{ width:50px;}
</style>

<table class="container" border="0" width="99%" cellpadding="0" cellspacing="0" style="margin:5px 3px 3px 3px">

    <tr>
        <td >
            <div class="search"  >


                <table cellpadding="0" cellspacing="0" border="0">
                    <tr >
                        <td class="buttonSa">



                            &nbsp;
                            Page Under:
                            <select name="catId" id="pagecontentId" >
                                <option value=""> Select Parent Page </option>
                                <option value="0"> Only Parent Pages </option>
                                <?
                                $os->optionsHTML($pagecontentId,'pagecontentId','title','pagecontent',"active=1 and parentPage<1");

                                ?>
                            </select>


                            &nbsp;

                            Link Name:<input type="text" name="name_search" id="name_search" value="<?php echo $name_search?>" style="width:100px;" />

                            Language:<select name="langId" id="langId" onchange="searchText()">
                                <option value=""> Select Language</option>

                                <?
                                $os->optionsHTML($langId,'langId','title,langId','lang',"");

                                ?>
                            </select>

                            Status:
                            &nbsp;
                            <select name="active" id="active_search" ><?php  $os->onlyOption($statuslist,$active);	?>
                            </select>
                            &nbsp;

                            <a href="javascript:void(0)" onclick="javascript:searchText()">Search</a>
                            &nbsp;
                            <a href="javascript:void(0)" onclick="javascript:searchReset()">Reset</a>

                        </td>
                    </tr>
                </table>
            </div>
            <div style="padding:10px;" >

                <span class="listHeader"> <?php  echo $pageHeader; ?></span>

                <a href="" style="margin-left:50px; text-decoration:none;"><input type="button" value="Refesh" style="cursor:pointer; text-decoration:none;" /></a>
                <a href="javascript:void(0)" style="text-decoration:none;" onclick="os.editRecord('<? echo $editPageLink?>0') "><input type="button" value="Add New Record" style="cursor:pointer;text-decoration:none;"/></a>


            </div>
        </td>
    </tr>


    <tr>

        <td  class="middle" style="border:1px solid #999999; padding:2px;">



            <!--  ggggggggggggggg   -->





            <div class="pagingLinkCss">Total:<b><? echo $os->val($recordsArr,'totalRec'); ?></b>  &nbsp;&nbsp; <?php  echo $recordsArr['links'];?>	 <?  $pagecontentIdHome=$os->rowByField('pagecontentId','pagecontent','isHome','Yes'); ?>

                &nbsp; &nbsp; Current Home Page   <select name="homepage" id="pagecontentIdHome" onchange="setHomePage();" >
                    <option value=""> Select Home Page </option>
                    <?
                    $os->optionsHTML($pagecontentIdHome,'pagecontentId','pagecontentId,title','pagecontent',"active=1");

                    ?>
                </select>
                <script>
                    function setHomePage()
                    {
                        var homeId=os.getVal('pagecontentIdHome');
                        if(homeId!='')
                        {

                            var url='wtosAjax.php?SetHomPage=OK&'+url+'&homeId='+homeId;
                            os.setAjaxFunc('setHome',url);
                        }


                    }

                    function setHome(data)
                    {
                        alert(data);

                    }
                </script></div>

            <table  border="0" cellspacing="1" cellpadding="2" class="listTable" >
                <tr class="borderTitle" >
                    <td >#</td>
                    <td ><b>Link Name</b></td>
                    <td><b>Icon</b></td>
                    <td ><b> Page Under</b></td>
                    <td ><b> Link</b></td>

                    <td ><b>Order</b></td>
                    <td ><b>Active</b></td>

                    <td style="width:100px;" >Action </td>

                </tr>


                <?php
                $i=1;
                while(  $record=$os->mfa($records )){

                    $rowId=$record[$primeryField];
                    $parentPage=$os->rowByField('title','pagecontent','pagecontentId',$record['parentPage']);
                    $selected=0;

                    $homeColor="";
                    if($record['isHome']=='Yes')
                    {
                        $homeColor="background-color:#FFC6AA";
                    }


                    ?>

                    <tr  class="trListing" style="<? echo $homeColor ?>" >
                        <td><?php echo $i?>      </td>
                        <td valign="top"><b style="color:#2E2E2E;"> <?php echo $record['title']?></b><br />
                            <font style="font-size:10px; font-style:italic; color:#787878;">
                                Page Heading/Title : <?  echo  $record['heading'];?> <br />
                                position : <?  echo  ($record['onHead'])?'Header ' :'';  echo  ($record['onBottom'])?'  Footer' :'';  ?>
                                , Page Id : <b> <?  echo  $record['pagecontentId'];  ?></b>

                                <? if($record['image']!=''){ ?> <br />
                                    Show Image :  <?  echo  ($record['showImage'])?'<font color="#008A45">Active</font> ' :'<font color="#FF4848">Inactive</font>';?><br />
                                    Image  Link <a href="<?  echo $site['url'].$record['image'] ; ?> " target="_blank" ><?php echo  $record['image']; ?> </a>

                                <? } ?>
                            </font>




                        </td>
                        <td>
                            <i  class="<?= $record['icon'];?> uk-text-large"></i>

                        </td>
                        <td>
                            <?php echo $parentPage?>
                        </td>
                        <td>
                            <?php if(  $record['externalLink'] ){ ?>
                                Ex: <font color="#FF0000"><b><? echo $record['externalLink']?></b></font>
                            <? } else{ ?>

                                <font color="#0000CC"><b><?php echo $record['seoId']?></b></font>

                            <? } ?>
                            <br />
                            <font style="font-size:10px; font-style:italic; color:#787878">

                                Meta Tag : <?  echo  $record['metaTag'];?> <br />
                                Meta Description : <?  echo  $record['metaDescription'];?>
                            </font>



                        </td>

                        <td>
                            <? $os->editText($record['priority'],'pagecontent','priority','pagecontentId',$record['pagecontentId'], $inputNameID='editText',$extraParams='class="editText" ');?>
                        </td>


                        <td> <? $os->editSelect($os->pageContentStatus,$record['active'],'pagecontent','active','pagecontentId',$record['pagecontentId'], $inputNameID='editSelect',$extraParams='class="editSelect" ',$os->pageContentStatusColor) ?>  </td>
                        <td class="actionLink">


                            <a href="javascript:void(0)" onclick="os.editRecord('<?   echo $editPageLink ?><?php echo $rowId  ?>')">Edit</a>

                            <a href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $rowId ?>') ">Delete</a>






                        </td>

                    </tr>



                    <?php $i++;
                }
                ?>



            </table>
            <div class="pagingLinkCss">Total:<b><? echo $os->val($recordsArr,'totalRec'); ?></b>  &nbsp;&nbsp; <?php  echo $recordsArr['links'];?>	</div>




            <!--   ggggggggggggggg  -->

        </td>
    </tr>
</table>








<script>

    function searchText()
    {

        var nameSearch= os.getVal('name_search');

        var pagecontentIdVal= os.getVal('pagecontentId');
        var langId= os.getVal('langId');

        window.location='?name_search='+nameSearch+'&pagecontentId='+pagecontentIdVal+'&langId='+langId;

    }
    function  searchReset()
    {

        window.location='?name_search=&active=-1=&areaId=&pagecontentId=&catId=&langId=';

    }



</script>

<? include($site['root-wtos'].'bottom.php'); ?>
