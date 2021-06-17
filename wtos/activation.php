<?php
error_reporting(-1);
session_start();
include('wtosConfigLocal.php');
include('wtos.php');
$activationKey='test';
$code= $os->get('activationCode');    

	
	  
	  function dAK($code,$key='')
	  {
	   global $os,$site;
	     if($code!=''){
					   $code=base64_decode(strrev($code)); 
					   $code=str_replace($key,'',$code);
					   $code=strrev($code);
					   if(strlen($code)==8)
					   {
						   $code=substr($code,0,4).'-'.substr($code,4,2).'-'.substr($code,6,2);
					  	 $codeBase64=strrev(base64_encode(strrev($code))); 
						  $os->mq("update settings set value='$codeBase64' where keyword='Validate WtosDate' ");
						 
						  echo '<span class="validCode">Activation successful.Subscription valid  upto '.$code.'  </span>';
						  ?>
						  
						  &nbsp;&nbsp;<a style="cursor:pointer; text-decoration:none;" href="<? echo $site['url-wtos'] ?>" >Login </a>
						  <? 
						  $os->Logout();
						 return $code;
					   }else
					   {
					
						echo '<span class="invalidCode">Invalid code</span>';
					   }
	     
		          }
		 }

?>
<html>
<body>
<div style="height:350px; width:100%;">
<style>
.boxContainer{ margin:auto; width:600px; margin-top:200px; height:100px;}
.activationCode{ height:38px; width:600px; font-size:25px; font-weight:bold; color:#383838;  }
.activationButton{  height:38px; width:60px;font-size:30px; font-weight:bold; cursor:pointer; margin-top:-2px;  }
.activeationText{ font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; color:#4B4B4B; letter-spacing:3px;    }
.validCode{ color:#009900; letter-spacing:2px;   }
.invalidCode{ color:#FF0000 ;   }
</style>
<?php //if(!$os->isLogin())
{?>
<div class="boxContainer">
<div class="activeationText">Enter activation code</div>

<form action="" method="get">
<table cellpadding="0" cellspacing="0"><tr><td><input type="text" name="activationCode" class="activationCode" /></td><td><input type="submit"  class="activationButton" value="OK" /> 
</td> </tr>



</table>
<div class="activeationText"><? dAK($code,$activationKey) ;   ?></div>
       
</form>

</div>



<? }
    




 ?>

</div>
	</body>
	</html>