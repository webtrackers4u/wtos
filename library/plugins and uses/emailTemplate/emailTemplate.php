 <?php 
 function prepareBody($str,$params=array())
 {
    foreach($params as $key=>$value)
	{
	$str=str_replace($key,$value,$str);
	
	}
	return $str;
 
 }
 
 function emailHeader()
 {
 global $site; 
 
  ?>
  <div style="width:80%; border:1px solid #00364D; border-radius:5px; margin:10px;">
   <div style="width:100%; border:1px solid #00364D; background-color:#00364D; border-radius:5px 5px 0px 0px; height:50px; ">
  <div style="color:#FFFFFF;padding:2px 0px 0px 10px;"> <img src="<? echo $site['themePath']?>images/logo.png" /> <br /> Fast Simple And Safe Money Transfer </div>
   </div>
   <div style="padding:10px;">
  <?
 
 }
 function emailFooter()
 {
 global $site; 
  ?>
  <br /><br />
  Kind Regards,<br />
  The  Team
  <br />
  <img src="<? echo $site['themePath']?>images/logo1.png" />
   <br />
  </div>
  
  </div>
  
  <?
 
 }
 function emailTemplate($templateID,$to='',$subject='',$params=array())
 {
     
   // $params value should be WTSC-USERNAME-WTSC  $params=array('WTMAIL-USERNAME-WTMAIL'=>'Mizanur82@gmail.com');
    global $os,$pageVar,$site; 
	$adminEmail= $os->getSettings('email');
	$from=$adminEmail;
	$fromName=' Admin';
	
	if(trim($subject)==''){ $subject='Email from '.$site['url'];}
	if(trim($to)==''){ $to=$adminEmail;}
	 
	 
	
 
  if($templateID=='NewTransactionEmailToMember')
  {
    $os->startOB();?>
	<?  emailHeader(); ?>
	Hi   WTSC-MEMBERNAME-WTSC
	<br />
	You Have created transaction  successfully;
	<br />
	Your Transaction Id : WTSC-TRANSACTIONID-WTSC<br />
	To: WTSC-TRANSACTIONTO-WTSC<br />
	Amount :WTSC-TRANSACTIONAMOUNT-WTSC WTSC-AMOUNTCURRENCY-WTSC<br />
	Time :WTSC-TRANSACTIONTIME-WTSC <br /><br />
	Thank you .;<br />
	<?  emailFooter(); ?>
    <? $body=$os->getOB();
	$body=prepareBody($body,$params);
	$os->mailBody=$body;
    $os->sendMail($to,$from,$fromName,$subject,$body,$attachments='' );
  }
  
  if($templateID=='NewTransactionEmailToAdmin')
  {
    $os->startOB();?>
	<?  emailHeader(); ?>
	Hi  team <br />  <br />    
	
	A member named WTSC-MEMBERNAME-WTSC
	created new  transaction  successfully;
	<br />
	Transaction Id : <h3>WTSC-TRANSACTIONID-WTSC</h3><br />
	To: WTSC-TRANSACTIONTO-WTSC<br />
	Amount :WTSC-TRANSACTIONAMOUNT-WTSC WTSC-AMOUNTCURRENCY-WTSC<br />
	Time :WTSC-TRANSACTIONTIME-WTSC <br />
	 <br />
	<?  emailFooter(); ?>
    <? $body=$os->getOB();
	$body=prepareBody($body,$params);
	$os->mailBody=$body;
     $os->sendMail($adminEmail,$from,$fromName,$subject,$body,$attachments='' );
  }
  
  
  
  
  
   if($templateID=='NotificationEmailToMember')
  {
     $os->startOB();?>
	<?  emailHeader(); ?>
	Hi   WTSC-MEMBERNAME-WTSC
	<br />
	You Have message from  ;
	<br />
	WTSC-NOTIFICATION-WTSC 
	<br />
	 
	
	To login   <a href="<? echo $site['url'] ?>/login"> CLICK HERE </a><br />
	Thanks;<br />
	<?  emailFooter(); ?>
    <? $body=$os->getOB();
	$body=prepareBody($body,$params);
	$os->mailBody=$body;
    $os->sendMail($to,$from,$fromName,$subject,$body,$attachments='' );
  
  }
  
  if($templateID=='RegistrationEmailToMember')
  {  $sesid=session_id();
    $os->startOB();?>
	<?  emailHeader(); ?>
	Hi   WTSC-MEMBERNAME-WTSC
	<br /><br />
	You Have registered  successfully;
	<br /><br />
	Your User Id : WTSC-USERID-WTSC <br />
	Password :WTSC-PASSWORD-WTSC <br /> <br />
	 
	To login  you need to activate your account .  <br /><br /> <a target="_blank" style="text-decoration:none;" href="<? echo $site['url'] ?>wtosApps/loginActivation.php?key=WTSC-ACTIVATIONKEY-WTSC&token=<? echo $sesid; ?>"><div style=" color:#FFFFFF; background-color:#3CD392; width:200px; text-align:center; padding:10px;border-radius:5px; font-size:14px; font-weight:bold;text-decoration:none; " > Activate My Account </div></a><br /> <br />
	Thank you for your time.<br />
	<?  emailFooter(); ?>
    <?php $body=$os->getOB();
	$body=prepareBody($body,$params);
	$os->mailBody=$body;
    $os->sendMail($to,$from,$fromName,$subject,$body,$attachments='' );
  
  }
  
  if($templateID=='RegistrationEmailToAdmin')
  {
    $os->startOB();?>
	<?  emailHeader(); ?>
	
	Hi  Team<br /><br />
	
	A new user registered  to . Details of the registration here:<br /><br />
	
	
	<table width="400" border="0" cellspacing="1" cellpadding="1">
    <tr> <td>Name</td> <td>WTSC-MEMBERNAME-WTSC</td></tr>
	 <tr><td>Email</td><td>WTSC-EMAIL-WTSC</td></tr>
	  <tr><td>User Id</td><td>WTSC-USERID-WTSC</td></tr>
	  <tr><td>Contact</td><td>WTSC-CONTACT-WTSC</td></tr>
	   <tr><td>Time</td><td>WTSC-TIME-WTSC</td></tr>
   </table>

	 
	
	 <br />
	<?  emailFooter(); ?>
    <? $body=$os->getOB();
	$body=prepareBody($body,$params);
	$os->mailBody=$body;
    $os->sendMail($adminEmail,$from,$fromName,$subject,$body,$attachments='' );
  
  }
  
  
  
  if($templateID=='ForgotPassEmailToMember')
  {
  
    $os->startOB();?>
	<?  emailHeader(); ?>
	Hi   WTSC-MEMBERNAME-WTSC
	<br /><br />
	We are happy to serve you.
	<br /><br />
	Your User Id : WTSC-USERID-WTSC <br />
	Password :WTSC-PASSWORD-WTSC <br /> <br />
	 
	To login     <a target="_blank" style="text-decoration:none;" href="<? echo $site['url'] ?>login">Login</a>  <br /> <br />
	Thank you for your time.<br />
	<?  emailFooter(); ?>
    <?php $body=$os->getOB();
	$body=prepareBody($body,$params);
	$os->mailBody=$body;
    $os->sendMail($to,$from,$fromName,$subject,$body,$attachments='' );
  
  }
 
 
 } 
 
  