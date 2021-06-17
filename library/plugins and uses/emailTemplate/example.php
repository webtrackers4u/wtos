<? 
		    $params['WTSC-MEMBERNAME-WTSC']=$dataToSave['firstName']." ".$dataToSave['lastName'];
			$params['WTSC-USERID-WTSC']=$dataToSave['loginid'];
			$params['WTSC-PASSWORD-WTSC']=$dataToSave['loginpass'];
			$params['WTSC-EMAIL-WTSC']=$dataToSave['email'];
			$params['WTSC-CONTACT-WTSC']=$dataToSave['mobile'];
			$params['WTSC-ACTIVATIONKEY-WTSC']=$loginActivationKey;
			$params['WTSC-TIME-WTSC']=$os->now();
			$params['WTSC-ACTIVATIONID-WTSC']=base64_decode(base64_decode($loginActivationKey));
			
			emailTemplate('RegistrationEmailToMember',$dataToSave['email'],'Payfei Registration ',$params);
			
			emailTemplate('RegistrationEmailToAdmin','','Payfei New Member Registration ',$params);
			
			