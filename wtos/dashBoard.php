<?php
include('wtosConfigLocal.php');
include(DIR_ADMIN.'top.php');
?>
<?php
$totalQ=$os->mq("Select count(*) c from pagecontent");
$totalQ=$os->mfa($totalQ);
$totalPage=$totalQ['c'];

$totalQ=$os->mq("Select count(*) c from admin");
$totalQ=$os->mfa($totalQ);
$totalAdmin=$totalQ['c'];

$totalQ=$os->mq("Select count(*) c from contactus");
$totalQ=$os->mfa($totalQ);
$totalEnquery=$totalQ['c'];

$hitCoount=$os->rowByField('value', 'settings', 'keyword', 'hitCoount');
?>
<style>
.dashBox{ float:left; border:1px solid #666666; margin:5px; padding:3px; border-bottom:2px solid #333333;border-right:2px solid #333333; height:150px; width:200px;-moz-border-radius:5px; -webkit-border-radius:5px;border-radius:5px; background-color:#FFFFFF;}
</style>
<div style="height:20px;"><h1>Dashboard</h1></div>
<div style="height:20px;"></div>

<div class="dashBox">
<table width="200" border="0" cellspacing="2" cellpadding="2">
  <tr>
   <td> <b>&radic;</b></td>
    <td>Total No of pages </td>
    <td><?php echo $totalPage; ?></td>
  </tr>
  <tr>
   <td> <b>&radic;</b></td>
    <td>Total No of Admin </td>
    <td><?php echo $totalAdmin; ?></td>
  </tr>
  
  <tr>
   <td> <b>&radic;</b></td>
    <td>Total No of Hit </td>
    <td><?php echo $hitCoount; ?></td>
  </tr>
  
   <tr>
   <td> <b>&radic;</b></td>
    <td>Total No of Enquery </td>
    <td><?php echo $totalEnquery; ?></td>
  </tr>
  
  
  
  
  <tr>
    <td colspan="2"></td>
    
  </tr>
</table>
</div>
<div class="dashBox">
</div>
<div class="dashBox">
</div>
<div class="dashBox">
</div>
<div class="dashBox">
</div>


<div style="clear:both;">&nbsp;</div>



<div style="height:20px; padding:50px 0px 0px 5px;">For any help contact admin@webtrackers.co.in </div>
 
<?php include(DIR_ADMIN.'bottom.php'); ?>