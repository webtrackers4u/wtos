
******************************** WTF_listValues  *******************************
neeed to check relation 
	
	
	
  
		
		***************************************WTF_searchHtml*************************
		 
neeed to check relation 
   
   
 
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
										
 