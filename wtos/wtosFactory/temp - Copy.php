******************************** WTF_listTitles ********************************
******************************** WTF_listValues  *******************************
<td><?php echo $os->showDate($record['dated']);?> </td>  
  <td><?php echo $os->showDate($record['fromDate']);?> </td>  
  <td><?php echo $os->showDate($record['toDate']);?> </td>  
  <td><?php echo  
  $os->rowByField('firstName ','member','memberId',$record['tenantId'],$where='',$orderby='');?>
	 </td> 
 
  
  <td><?php echo  
	$os->agreementType[$record['type']]; ?></td> 
  <td><?php echo $record['commission']?> </td>  
  <td><?php echo $record['rentAmount']?> </td>  
  <td><?php 
  
  if(isset($os->agreementStatus[$record['status']])){
  echo  $os->agreementStatus[$record['status']]; } ?></td> 
  <td><?php echo $record['note']?> </td>  


/**********************WTF_andFields********************************/
<? 
	$f_dated_s= $os->post('f_dated_s');	$t_dated_s= $os->post('t_dated_s');
	$anddated=$os->DateQ('dated_s',$f_dated_s,$t_dated_s,$sTime='00:00:00',$eTime='59:59:59');
	
	$andtenantId=  $os->postAndQuery('tenantId_s','tenantId','%');
	$andlandlordId=  $os->postAndQuery('landlordId_s','landlordId','%');
	$andpropertyId=  $os->postAndQuery('propertyId_s','propertyId','%');
	$andtype=  $os->postAndQuery('type_s','type','%');
 	$andagentName=  $os->postAndQuery('agentName_s','agentName','%');
	$andstatus=  $os->postAndQuery('status_s','status','%');
	$andnote=  $os->postAndQuery('note_s','note','%');
	
	
	?>
	 
 /**********************WTF_searchFullQuery********************************/
	$where ="and ( dated like '%$searchKey%' Or tenantId like '%$searchKey%' Or landlordId like '%$searchKey%' Or propertyId like '%$searchKey%' Or type like '%$searchKey%' Or agentName like '%$searchKey%' Or status like '%$searchKey%' Or note like '%$searchKey%' )";
	
	/************************** ****************************/
	
	
	  //$listingQuery=" select * from rentagreement where rentagreementId>0   $where   $anddated  $andtenantId    $andlandlordId    $andpropertyId   $andtype    $andagentName    $andstatus    $andnote    order by rentagreementId desc";
	
	$listingQuery="  select * from WTF_table where WTF_primery>0   $where  WTF_andFieldQuery   order by WTF_primery desc";
	
	/**************************WTF_dataToSave****************************/
	<? 
 $dataToSave['dated']=$os->saveDate($os->post('dated')); 
 $dataToSave['fromDate']=$os->saveDate($os->post('fromDate')); 
 $dataToSave['toDate']=$os->saveDate($os->post('toDate')); 
 $dataToSave['tenantId']=$os->post('tenantId'); 
 $dataToSave['landlordId']=$os->post('landlordId'); 
 $dataToSave['propertyId']=$os->post('propertyId'); 
 $dataToSave['type']=$os->post('type'); 
 $dataToSave['rentAmountLandlord']=$os->post('rentAmount'); // varG('rentAmountLandlord'); 
 $dataToSave['commission']=$os->post('commission'); 
 $dataToSave['rentAmount']=$os->post('rentAmount'); 
 $dataToSave['deposite']=$os->post('deposite'); 
 $dataToSave['holdingDeposite']=$os->post('holdingDeposite'); 
 $dataToSave['adminFees']=$os->post('adminFees'); 
 $dataToSave['agentName']=$os->post('agentName'); 
 $dataToSave['rentDueDate']=$os->saveDate($os->post('rentDueDate')); 
 $dataToSave['paybleAmount']=$os->post('paybleAmount'); 
 $dataToSave['status']=$os->post('status'); 
 $dataToSave['note']=$os->post('note'); 

                  $floorplan=$os->UploadPhoto('imageTenant',$site['root'].'wtos-images');
					if($floorplan){
					$dataToSave['imageTenant']='wtos-images/'.$floorplan;
					}	
					
					?>
					
					
					
	***********************************************				WTF_FillJsonPhp**********************
		
 $record['dated']=$os->showDate($record['dated']); 
 $record['fromDate']=$os->showDate($record['fromDate']); 
 $record['toDate']=$os->showDate($record['toDate']); 
 $record['tenantId']=stripslashes($record['tenantId']);
 $record['landlordId']=stripslashes($record['landlordId']);
 $record['propertyId']=stripslashes($record['propertyId']);
 $record['type']=stripslashes($record['type']);
 $record['rentAmountLandlord']=stripslashes($record['rentAmountLandlord']);
 $record['commission']=stripslashes($record['commission']);
 $record['rentAmount']=stripslashes($record['rentAmount']);
 $record['deposite']=stripslashes($record['deposite']);
 $record['holdingDeposite']=stripslashes($record['holdingDeposite']);
 $record['adminFees']=stripslashes($record['adminFees']);
 $record['agentName']=stripslashes($record['agentName']);
 $record['rentDueDate']=$os->showDate($record['rentDueDate']); 
 $record['paybleAmount']=stripslashes($record['paybleAmount']);
 $record['status']=stripslashes($record['status']);
 $record['note']=stripslashes($record['note']);
 if($record['imageTenant']!=''){
		$record['imageTenant']=$site['url'].$record['imageTenant'];
		}
		
		
		***************************************WTF_searchHtml*************************
		 
From Date: <input class="dtpk" type="text" name="f_dated_s" id="f_dated_s" value="" style="width:100px;" /> &nbsp;  
  To Date: <input class="dtpk" type="text" name="t_dated_s" id="t_dated_s" value="" style="width:100px;" /> &nbsp;  
   Tenant:
	
	
	<select name="tenantId_s" id="tenantId_s" class="textbox fWidth" ><option value="">Select Tenant</option>		  	<? 
								
										  $os->optionsHTML('','memberId','firstName','member ');?>
							</select>
   Landlord:
	
	
	<select name="landlordId_s" id="landlordId_s" class="textbox fWidth" ><option value="">Select Landlord</option>		  	<? 
								
										  $os->optionsHTML('','memberId','firstName','member ');?>
							</select>
   Property:
	
	
	<select name="propertyId_s" id="propertyId_s" class="textbox fWidth" ><option value="">Select Property</option>		  	<? 
								
										  $os->optionsHTML('','propertyId','title','property');?>
							</select>
   Type:
	
	<select name="type_s" id="type_s" class="textbox fWidth" ><option value="">Select Type</option>	<? 
										  $os->onlyOption($os->agreementType,'');	?></select>	
   Agent Name: <input type="text" name="agentName_s" id="agentName_s" value="" style="width:100px;" /> &nbsp;  
   Status:
	
	<select name="status_s" id="status_s" class="textbox fWidth" ><option value="">Select Status</option>	<? 
										  $os->onlyOption($os->agreementStatus,'');	?></select>	
   Note: <input type="text" name="note_s" id="note_s" value="" style="width:100px;" /> &nbsp;  
   
   
  ******************************************************  WTF_searchScript  *********************************
	  
	var f_dated_sV= os.getVal('f_dated_s'); 
	var t_dated_sV= os.getVal('t_dated_s'); 
	var tenantId_sV= os.getVal('tenantId_s'); 
	var landlordId_sV= os.getVal('landlordId_s'); 
	var propertyId_sV= os.getVal('propertyId_s'); 
	var type_sV= os.getVal('type_s'); 
	var agentName_sV= os.getVal('agentName_s'); 
	var status_sV= os.getVal('status_s'); 
	var note_sV= os.getVal('note_s'); 
	var searchKey=os.getVal('searchKey');
 
	formdata.append('f_dated_s',f_dated_sV );
	formdata.append('t_dated_s',t_dated_sV );
	formdata.append('tenantId_s',tenantId_sV );
	formdata.append('landlordId_s',landlordId_sV );
	formdata.append('propertyId_s',propertyId_sV );
	formdata.append('type_s',type_sV );
	formdata.append('agentName_s',agentName_sV );
	formdata.append('status_s',status_sV );
	formdata.append('note_s',note_sV );
	
	*************************************  WTF_resetScript	**********************
	
	 os.setVal('f_dated_s',''); 
 os.setVal('t_dated_s',''); 
 os.setVal('tenantId_s',''); 
 os.setVal('landlordId_s',''); 
 os.setVal('propertyId_s',''); 
 os.setVal('type_s',''); 
 os.setVal('agentName_s',''); 
 os.setVal('status_s',''); 
 os.setVal('note_s',''); 
 
 	*************************************  WTF_EditJavaScripts
 ////   type text dropdown  	
	var datedV= os.getVal('dated'); 
	var fromDateV= os.getVal('fromDate'); 
	var toDateV= os.getVal('toDate'); 
	var tenantIdV= os.getVal('tenantId'); 
	var landlordIdV= os.getVal('landlordId'); 
	var propertyIdV= os.getVal('propertyId'); 
	var typeV= os.getVal('type'); 
	var rentAmountLandlordV= os.getVal('rentAmountLandlord'); 
	var commissionV= os.getVal('commission'); 
	var rentAmountV= os.getVal('rentAmount'); 
	var depositeV= os.getVal('deposite'); 
	var holdingDepositeV= os.getVal('holdingDeposite'); 
	var adminFeesV= os.getVal('adminFees'); 
	var agentNameV= os.getVal('agentName'); 
	var rentDueDateV= os.getVal('rentDueDate'); 
	var paybleAmountV= os.getVal('paybleAmount'); 
	var statusV= os.getVal('status'); 
	var noteV= os.getVal('note'); 
	
      if(os.check.empty('note','Please Add note')==false){ return false;}

    var   WTF_primery=os.getVal('WTF_primery');


  ////   type image 

	var imageTenant=os.getObj('imageTenant').files[0];
	if(imageTenant){  formdata.append('imageTenant',imageTenant,imageTenant.name ); }
	
	/// tupe check box
	// if(os.getObj('activeMember').checked==false){activeMember='';}
	/// tupe check box
	// if(os.getObj('activeMember').checked==false){activeMember='';}
	
	 
	formdata.append('fromDate',fromDateV );
	formdata.append('toDate',toDateV );
	formdata.append('note',noteV );
	formdata.append('rentAmount',rentAmountV );
	
	
	formdata.append('WTF_primery',WTF_primery );
	
	*************************************  WTF_FillJsonScript
	
 os.setVal('dated',objJSON.dated); 
 os.setVal('fromDate',objJSON.fromDate); 
 os.setVal('toDate',objJSON.toDate); 
 os.setVal('tenantId',objJSON.tenantId); 
 os.setVal('landlordId',objJSON.landlordId); 
 os.setVal('propertyId',objJSON.propertyId); 
 os.setVal('type',objJSON.type); 
 os.setVal('rentAmountLandlord',objJSON.rentAmountLandlord); 
 os.setVal('commission',objJSON.commission); 
 os.setVal('rentAmount',objJSON.rentAmount); 
 os.setVal('deposite',objJSON.deposite); 
 os.setVal('holdingDeposite',objJSON.holdingDeposite); 
 os.setVal('adminFees',objJSON.adminFees); 
 os.setVal('agentName',objJSON.agentName); 
 os.setVal('rentDueDate',objJSON.rentDueDate); 
 os.setVal('paybleAmount',objJSON.paybleAmount); 
 os.setVal('status',objJSON.status); 
 os.setVal('note',objJSON.note); 
 
 os.setImg('imageTenantPreview',objJSON.imageTenant);   /// for image
 //os.setLink('brochurePdfPreview',objJSON.imageTenant);   // for file 
 
 // os.setCheckTick('activeMember',JSON.activeMember);    // for check box 
 
 
 
	 	*************************************  WTF_EditFields				
		 								
	 
	<tr >
	  									<td>Property </td>
										<td colspan="10"><select name="propertyId" id="propertyId" class="textbox fWidth" >
							
							 		<?
							
							 $os->optionsHTML('','propertyId','title','property');
							?>
							</select>
  
										</td>						
										</tr>
										
										
										<tr >
	  									<td>Tenant </td>
										<td><select name="tenantId" id="tenantId" class="textbox fWidth" >
										<option></option>
							
							 		<?
							
							 $os->optionsHTML('','memberId','firstName','member '," status='TENANT' and memberType like 'Existing%' ");
							?>
							</select>
  
										</td>						
										 
	  									<td>Landlord </td>
										<td><select name="landlordId" id="landlordId" class="textbox fWidth" >
							<option></option>
							 		<?
							
							 $os->optionsHTML('','memberId','firstName','member '," status='LANDLORD'");
							?>
							</select>
  
										</td>						
										</tr>
										
											
	 		
	 
<tr >
	  									<td>Date </td>
										<td><input value="" type="text" name="dated" id="dated" class="dtpk textbox fWidth"/>
										</td>						
										 
	  									<td>Agent Name </td>
										<td><input value="" type="text" name="agentName" id="agentName" class="textbox fWidth"/>
										</td>						
										</tr>
										
										<tr >
	  									<td>Agreement From </td>
										<td><input value="" type="text" name="fromDate" id="fromDate" class="dtpk textbox fWidth"/>
										</td>						
										 
	  									<td> To </td>
										<td><input value="" type="text" name="toDate" id="toDate" class="dtpk textbox fWidth"/>
										</td>						
										</tr>
											
										
										
											
									
										
										
											
										
										<tr >
	  									<td>Rent Amount </td>
										<td><input value="" type="text" name="rentAmount" id="rentAmount" class="textbox fWidth" />
										</td>						
										 
	  									<td>Deposite </td>
										<td><input value="" type="text" name="deposite" id="deposite" class="textbox fWidth"  />
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Commission </td>
										<td><input value="" type="text" name="commission" id="commission" class="textbox fWidth"/>
										</td>							
										 
	  									<td>Admin Fees </td>
										<td><input value="" type="text" name="adminFees" id="adminFees" class="textbox fWidth"  />
										</td>						
										</tr>
											
											<tr >
											
											<td>Status </td>
										<td><select name="status" id="status" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->agreementStatus,'');	?></select>	
  
										</td>	
	  									<td>Holding Deposite </td>
										<td><input value="" type="text" name="holdingDeposite" id="holdingDeposite" class="textbox fWidth"  onkeyup="agreementCalc();"/>
										</td>						
										 
	  													
										</tr>
										
										
											
										
										<tr >
	  									<td>Due Date </td>
										<td><input value="" type="text" name="rentDueDate" id="rentDueDate" class="dtpk textbox fWidth"/> 
										</td>						
										 
	  									<td>Payble Amount </td>
										<td><input value="" type="text" name="paybleAmount" id="paybleAmount" class="textbox fWidth"/>
										</td>						
										</tr>
											
											<tr style="display:none;" >
	  									<td>Landlord Amount </td>
										<td><input value="" type="text" name="rentAmountLandlord" id="rentAmountLandlord" class="textbox fWidth"/>
										</td>	
										 <td>Type </td>
										<td><select name="type" id="type" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->agreementType,$pageData['type']);	?></select>	
  
										</td>			
	  													
										</tr>
											
											
										
										<tr >
	  														
										 
	  									<td>Note </td>
										<td colspan="10"><input value="" type="text" name="note" id="note" class="textbox fWidth" style="width:342px;"/>
										</td>						
										</tr>
										
										<tr><td colspan="5">
										Image Tenant
										
										<a href="" id="brochurePdfPreview" style="display:none;"> Link </a>
										<img id="imageTenantPreview" src="" height="100" style="display:none;"	 />		
										<input type="file" name="imageTenant" value=""  id="imageTenant" onchange="os.readURL(this,'imageTenantPreview') " style="display:none;"/>
										
										 <span style="cursor:pointer; color:#FF0000;" onclick="os.clicks('imageTenant');">Edit Image</span>
										
										</td></tr>
										
 