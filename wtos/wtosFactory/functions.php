<? 
 

function tablesInDb($db='')
{
 global $site,$os;
 if($db==''){
  $db=$site['db'];
  }
  
  $tableoptionsArr=array();
  $tbls=$os->mq("SHOW TABLES FROM $db");
  while($tbl=$os->mfa($tbls))
   {
    
	   $tableName=$tbl['Tables_in_'.$db]; 
	   $tableoptionsArr[$tableName]=$tableName;
  
   }
 
   
   return  $tableoptionsArr;
}

function fieldsInTable($tableName)
{
 global $site,$os;
 
  $tableoptionsArr=array();
  $tbls=$os->mq("SHOW COLUMNS FROM $tableName");
  while($tbl=$os->mfa($tbls))
   {
     
	   $fldName=$tbl['Field']; 
	   $tableoptionsArr[$fldName]=$fldName;
       $os->fieldsTypeDB[$fldName]=$tbl['Type']; 
   }
 
   
   return  $tableoptionsArr;
}


function createFields($dataTosave)
{
    global $site,$os; 
	$field='';
	$table=$dataTosave['tableName'];
	$label=$dataTosave['label']; 
	$Type=$dataTosave['fieldsType'];
	$field = preg_replace('/[^a-zA-Z]/s', '', $label);
   
$outPut['fields']='';
$outPut['alise']='';
$outPut['type']='';
if(trim($table)!='' && trim($field)!='')
{
 

              $q="ALTER TABLE `$table` ADD ";

              
			  
			    if($Type=='text'){  $q .=" `$field`  VARCHAR( 100 ) NOT NULL ;";   }
			 	if($Type=='Textarea'){  $q .=" `$field`  TEXT  NOT NULL ;";   }
			 //	if($Type=='Date'){     $q .=" `$field`  DATE NOT NULL ;";   }
			    if($Type=='Date'){     $q .=" `$field`  datetime NOT NULL ;";   }
			  	if($Type=='Selectbox'){    $q .=" `$field`  VARCHAR( 50 ) NOT NULL ;";   }
			 	if($Type=='Image'){     $q .=" `$field`  VARCHAR( 200 ) NOT NULL ;";   }
			 	if($Type=='CheckBox'){    $q .=" `$field`  VARCHAR( 2 ) NOT NULL ;";   }
			    // echo  $q;	
				$os->mq($q);
			  
 $outPut['fields']=$field;
 $outPut['alise']=$label;
 $outPut['type']=$Type;

 
}
 
 
  return  $outPut;

}


function relationCode($relation,$fld,$alise,$op)
{


$v_search=$fld.'_s';

if($op=='edit')
{
  $v_search=$fld;
}

if($relation==''){ return;}

$relationCodes="";
$fs=explode('|',$relation);
if(count($fs)>1)
{
 
   
	if($op=='search')
	{
	$relationCodes=' '.$alise.':'.'
	
	<select name="'.$fld.'" id="'.$v_search.'" class="textbox fWidth" ><option value="">Select '.$alise.'</option>	<? 
										  $os->onlyOption($os->'.$fs[0].',$'.$v_search.');	?></select>	';
	}
	if($op=='list')
	{
	/*$relationCodes='<? if(isset($os->'.$fs[0].'[$record[\''.$fld.'\']])){ echo  $os->'.$fs[0].'[$record[\''.$fld.'\']]; } ?>';*/
	$relationCodes='<? echo $os->val($os->'.$fs[0].',$record[\''.$fld.'\']); ?> ';
	
	 
	
	
	}
	
	if($op=='edit')
	{
	$relationCodes='  
	
	<select name="'.$fld.'" id="'.$v_search.'" class="textbox fWidth" ><option value="">Select '.$alise.'</option>	<? 
										 $os->onlyOption($os->'.$fs[0].',$os->getVal(\''.$fld.'\'));?></select>	';
	
	
	}
	
	

}else{
$fs=explode(',',$relation);
				
							
	if($op=='search')
	{
	$relationCodes=' '.$alise.':'.'
	
	
	<select name="'.$fld.'" id="'.$v_search.'" class="textbox fWidth" ><option value="">Select '.$alise.'</option>		  	<? 
								
										  $os->optionsHTML($'.$v_search.',\''.$fs[0].'\',\''.$fs[1].'\',\''.$fs[2].'\');?>
							</select>';
	}			
		if($op=='list')
	{
	 
	 
	$relationCodes=' <? echo 
	$os->rowByField(\''.$fs[1].'\',\''.$fs[2].'\',\''.$fs[0].'\',$record[\''.$fld.'\']); ?>';
	}	
	 
	if($op=='edit')
	{
	$relationCodes=' <select name="'.$fld.'" id="'.$v_search.'" class="textbox fWidth" ><option value="">Select '.$alise.'</option>		  	<? 
								
										  $os->optionsHTML($os->getVal(\''.$fld.'\'),\''.$fs[0].'\',\''.$fs[1].'\',\''.$fs[2].'\');?>
							</select>';
	
	
	}				
							
							
							
}
 
return $relationCodes;


}

function relationCodeAjax($relation,$fld,$alise,$op)   
{

$v_search=$fld.'_s';
if($op=='edit')
{
  $v_search=$fld;
}

if($relation==''){ return;}

$relationCodes="";
$fs=explode('|',$relation);
if(count($fs)>1)
{
 
   
	if($op=='search')
	{
	$relationCodes=' '.$alise.':'.'
	
	<select name="'.$fld.'" id="'.$v_search.'" class="textbox fWidth" ><option value="">Select '.$alise.'</option>	<? 
										  $os->onlyOption($os->'.$fs[0].');	?></select>	';
	}
	if($op=='list')
	{
	$relationCodes='<? if(isset($os->'.$fs[0].'[$record[\''.$fld.'\']])){ echo  $os->'.$fs[0].'[$record[\''.$fld.'\']]; } ?>';
	
	
	}
	
	if($op=='edit')
	{
	$relationCodes='  
	
	<select name="'.$fld.'" id="'.$v_search.'" class="textbox fWidth" ><option value="">Select '.$alise.'</option>	<? 
										  $os->onlyOption($os->'.$fs[0].');	?></select>	';
	
	
	}
	
	

}else{
$fs=explode(',',$relation);
				
							
	if($op=='search')
	{
	$relationCodes=' '.$alise.':'.'
	
	
	<select name="'.$fld.'" id="'.$v_search.'" class="textbox fWidth" ><option value="">Select '.$alise.'</option>		  	<? 
								
										  $os->optionsHTML(\'\',\''.$fs[0].'\',\''.$fs[1].'\',\''.$fs[2].'\');?>
							</select>';
	}			
		if($op=='list')
	{
	 
	 
	$relationCodes=' <? echo 
	$os->rowByField(\''.$fs[1].'\',\''.$fs[2].'\',\''.$fs[0].'\',$record[\''.$fld.'\']); ?>';
	}	
	
	if($op=='edit')
	{
	$relationCodes=' <select name="'.$fld.'" id="'.$v_search.'" class="textbox fWidth" ><option value="">Select '.$alise.'</option>		  	<? 
								
										  $os->optionsHTML(\'\',\''.$fs[0].'\',\''.$fs[1].'\',\''.$fs[2].'\');?>
							</select>';
	
	
	}				
							
							
							
}
 

return $relationCodes;


}

function val($var)
{
     if(isset($var)){ return $var;}
	 return;
}


function createPagesAjax($data)
{
	global $os,$site;
	
	
	#collect variables 
	$pluginName=$data['pluginName'];
	 
	//$pluginName='iamoknow';
	$formName=$data['formName'];
	$tableName=$data['tableName'];
	$viewPage=$data['viewPage'];
	$ajaxPage=$data['ajaxPage'];
	$heading=$data['heading'];
	$linkName=$data['linkName'];
	$primery=$data['primery'];
	
	$alise=$data['alise'];
	$type=$data['type'];
	$validation=isset($data['validation'])?$data['validation']:'';;
	$listing=isset($data['listing'])?$data['listing']:'';;
	$search=isset($data['search'])?$data['search']:'';;
	$fields=isset($data['fields'])?$data['fields']:'';;
	$relation=isset($data['relation'])?$data['relation']:'';;
	$edit=isset($data['edit'])?$data['edit']:'';;
	 
	
	$pluginRoot=$site['root-plugin'];
	$previewPath=$site['url-plugin'].$viewPage ;
	if(trim($pluginName)!='')
	{
	$pluginRoot=$site['root-plugin'].$pluginName.'/';
	$previewPath=$site['url-plugin'].$pluginName.'/'.$viewPage ;
	}
	 
	
	$viewPageLoc=$pluginRoot.$viewPage;
	$ajaxPageLoc=$pluginRoot.$ajaxPage;
	$metaName=trim($pluginName);
	$pluginMetaPageLoc=$pluginRoot.$metaName.'MetaData.php';
	$pluginConstantPageLoc=$pluginRoot.$metaName.'Contants.php';
	
	
	
	
	
	
	
	$viewPageTemplateLoc=$site['root-plugin'].'wtosFactory/'.'wtosFactory.DataView.html';
	$ajaxPageTemplateLoc=$site['root-plugin'].'wtosFactory/'.'wtosFactory.DataAjax.html';
	$pluginMetaTemplateLoc=$site['root-plugin'].'wtosFactory/'.'wtosFactory.metaData.html';
	
	$handle = fopen($viewPageTemplateLoc, "r");
    $os->viewPageStrTmpl =(string) fread($handle, filesize($viewPageTemplateLoc));fclose($handle);
	$handle = fopen($ajaxPageTemplateLoc, "r");
    $os->ajaxPageStrTmpl =(string) fread($handle, filesize($ajaxPageTemplateLoc));fclose($handle);
	
	//$handle = fopen($pluginMetaTemplateLoc, "r");
   // $os->pluginMetaPageStrTmpl =(string) fread($handle, filesize($pluginMetaTemplateLoc));fclose($handle);
	
	$os->viewPageStr=' output content view ';
    $os->ajaxPageStr=' output content ajax  ';
	$os->pluginMetaPageStr='';
	 
	
	    ###3  initialize seettings
	    $os->Factory['WTF_config_directory']='../wtosConfigLocal.php';
	    if(trim($pluginName)=='')
		{
		   $os->Factory['WTF_config_directory']='wtosConfigLocal.php';
		} 
		$os->Factory['WTF_config_directory']='wtosConfigLocal.php'; // for temporary no plugin
		
	    $os->Factory['WTF_plugin']=$pluginName;
		$os->Factory['WTF_primery']=$primery;
		$os->Factory['WTF_table']=$tableName;
		$os->Factory['WTF_viewPage']=$viewPage;
		$os->Factory['WTF_ajaxPage']=$ajaxPage;
		$os->Factory['WTF_H_viewPage']=$heading;
	
		
		$os->Factory['WTF_functionKey']=$os->Factory['WTF_table'];
		$functionKey='WT_'.$os->Factory['WTF_functionKey'];
		$os->Factory['WTF_listingDiv']=$functionKey.'ListDiv'; 
		
		$os->Factory['WTF_listingKey']=$functionKey.'Listing'; 
		$os->Factory['WTF_editKey']=$functionKey.'EditAndSave'; 
		$os->Factory['WTF_AfterEditReload']=$functionKey.'ReLoadList';
		$os->Factory['WTF_getTableRowById']=$functionKey.'GetById';  
		$os->Factory['WTF_FillData']=$functionKey.'FillData'; 
		$os->Factory['WTF_deleteRowById']=$functionKey.'DeleteRowById'; 
		$os->Factory['WTF_pagingPageno']=$functionKey.'pagingPageno';      
		
		$os->Factory['WTF_dataToSave']="\n";
		$os->Factory['WTF_andFields']="\n";
		$os->Factory['WTF_andFieldQuery']=" ";
		$os->Factory['WTF_searchHtml']="\n";
		$os->Factory['WTF_listTitles']="\n";
		$os->Factory['WTF_listValues']="\n";
		$os->Factory['WTF_searchScript']="\n";
		$os->Factory['WTF_searchScriptAppend']='';
		$os->Factory['WTF_resetScript']='';
		$os->Factory['WTF_EditFields']="\n";
		$os->Factory['WTF_searchFullQuery']="\n";
		$os->Factory['WTF_EditJavaScripts']="\n";
		$os->Factory['WTF_FillJsonScript']="\n";
		$os->Factory['WTF_FillJsonPhp']="\n";
		$os->Factory['WTF_javascriptEmptyValidation']="\n";
		$os->Factory['WTF_version']=$os->version;
		
		$editJavaScripts['vVal']='';
		$editJavaScripts['gLink']='';
		$constantDataArray=array('version'=>$os->version);
		 
    
 
	
	###3 end
	
	
	
	 
	
	##555 start code generate
	$allowCodeGenerate=1;
	if($allowCodeGenerate==1){
	
	
//	_d($data);
 $searchKeyArr=array();
	foreach($fields as $f)
	{
	        $allow=true;
			if($primery==$f) 
			{
		          $allow=false;
			}
			
			$alise=isset($data['alise'][$f])?$data['alise'][$f]:'';
			$type=isset($data['type'][$f])?$data['type'][$f]:'';
			$relation=isset($data['relation'][$f])?$data['relation'][$f]:'';
			
			$v_search=$f.'_s'; // something wrong here  $v_search=$f; conflict with edit
			$v_and='$and'.$f;
  
            
		  
		  $ignor=isset($data['ignor'][$f])?$data['ignor'][$f]:'';
		  $validation=isset($data['validation'][$f])?$data['validation'][$f]:'';
		  $listing=isset($data['listing'][$f])?$data['listing'][$f]:'';
		  $search=isset($data['search'][$f])?$data['search'][$f]:'';
		  $edit=isset($data['edit'][$f])?$data['edit'][$f]:'';
		  if($ignor==1 ){  continue; }
		  
		  
		  if($validation==1 && $allow==true ){ 
		  
		   
		  # validation script;  if(os.check.empty('note','Please Add note')==false){ return false;}
		    $os->Factory['WTF_javascriptEmptyValidation'] .='if(os.check.empty(\''.$f.'\',\'Please Add '.$alise.'\')==false){ return false;} '."\n";
		   }
		   
		   
		   if($listing==1 )
		   {
			
					$os->Factory['WTF_listTitles'] .= '<td ><b>'.$alise.'</b></td> '." \n  ";
					
					if($type=='Image'){
					
					$os->Factory['WTF_listValues'] .= '<td><img src="<?php  echo $site[\'url\'].$record[\''.$f.'\']; ?>"  height="70" width="70" /></td> '." \n  ";
					
					
					}elseif($type=='Selectbox'){
						if(trim($relation)!=''){
						$htmlRelation=relationCodeAjax($relation,$f,$alise,'list');
						$os->Factory['WTF_listValues'] .=  '<td> '.$htmlRelation.'</td> '."\n  ";
					}
					
					}elseif($type=='Date'){
					$os->Factory['WTF_listValues'] .= '<td><?php echo $os->showDate($record[\''.$f.'\']);?> </td> '." \n  ";
					
					}else
					{
					$os->Factory['WTF_listValues'] .= '<td><?php echo $record[\''.$f.'\']?> </td> '." \n  ";
					
					}
			  
			  
			  
			  
			  		  
		   }
		   
		   
		   
		   if($search==1 )
		   {
		   
			
					if($type=='CheckBox'){
					
					$os->Factory['WTF_searchHtml'] .= ' ';
					
					
					}elseif($type=='Image'){
					
					$os->Factory['WTF_searchHtml'] .= ' ';
					
					
					}elseif($type=='Selectbox'){
								if(trim($relation)!=''){
								$htmlRelation=relationCodeAjax($relation,$f,$alise,'search');
								$os->Factory['WTF_searchHtml'] .=  $htmlRelation."\n  ";
								
								
								
								}
								
								
								$os->Factory['WTF_andFields'] .= $v_and.'=  $os->postAndQuery(\''.$v_search.'\',\''.$f.'\',\'%\');'."\n";
								$os->Factory['WTF_andFieldQuery'] .= $v_and."  ";
								
								$searchKeyArr[]= $f .' like \'%$searchKey%\'';
								
								
								$os->Factory['WTF_searchScript'] .= ' var '.$v_search.'Val= os.getVal(\''.$v_search.'\'); '."\n";
								$os->Factory['WTF_searchScriptAppend'] .='formdata.append(\''.$v_search.'\','.$v_search.'Val );'."\n";
								$os->Factory['WTF_resetScript'] .=' os.setVal(\''.$v_search.'\',\'\'); '."\n";   
					
					
					
					}elseif($type=='Date'){
					 				
				$os->Factory['WTF_searchHtml'] .='From '.$alise.': <input class="wtDateClass" type="text" name="f_'.$v_search.'" id="f_'.$v_search.'" value=""  /> &nbsp; '."  ".
	   'To '.$alise.': <input class="wtDateClass" type="text" name="t_'.$v_search.'" id="t_'.$v_search.'" value=""  /> &nbsp; '." \n  ";
	   
	   
	  
	               $os->Factory['WTF_andFields'] .='
    $f_'.$v_search.'= $os->post(\'f_'.$v_search.'\'); $t_'.$v_search.'= $os->post(\'t_'.$v_search.'\');
   '.$v_and.'=$os->DateQ(\''.$f.'\',$f_'.$v_search.',$t_'.$v_search.',$sTime=\'00:00:00\',$eTime=\'59:59:59\');'."\n";
    $os->Factory['WTF_andFieldQuery'] .= $v_and."  ";
	
	
	
	 
 
	
	
	    $os->Factory['WTF_searchScript'] .= ' var f_'.$v_search.'Val= os.getVal(\'f_'.$v_search.'\'); '."\n";
		$os->Factory['WTF_searchScriptAppend'] .='formdata.append(\'f_'.$v_search.'\',f_'.$v_search.'Val );'."\n";
		$os->Factory['WTF_resetScript'] .=' os.setVal(\'f_'.$v_search.'\',\'\'); '."\n";
		

		$os->Factory['WTF_searchScript'] .= ' var t_'.$v_search.'Val= os.getVal(\'t_'.$v_search.'\'); '."\n";
		$os->Factory['WTF_searchScriptAppend'] .='formdata.append(\'t_'.$v_search.'\',t_'.$v_search.'Val );'."\n";
		$os->Factory['WTF_resetScript'] .=' os.setVal(\'t_'.$v_search.'\',\'\'); '."\n";
   
					
					}else
					{
					 
					 $os->Factory['WTF_searchHtml'] .=' '.$alise.': <input type="text" class="wtTextClass" name="'.$v_search.'" id="'.$v_search.'" value="" /> &nbsp; ';
					 
					  $os->Factory['WTF_andFields'] .= $v_and.'=  $os->postAndQuery(\''.$v_search.'\',\''.$f.'\',\'%\');'."\n";
					  $os->Factory['WTF_andFieldQuery'] .= $v_and."  ";
					 
   
                       $searchKeyArr[]= $f .' like \'%$searchKey%\'';          
					   
					   
					   
					   
					$os->Factory['WTF_searchScript'] .= ' var '.$v_search.'Val= os.getVal(\''.$v_search.'\'); '."\n";
					$os->Factory['WTF_searchScriptAppend'] .='formdata.append(\''.$v_search.'\','.$v_search.'Val );'."\n";
					$os->Factory['WTF_resetScript'] .=' os.setVal(\''.$v_search.'\',\'\'); '."\n";        
					
					}
					
					
					
			  
			  
			  
			  
			  		  
		   }
		   
		   
		    if($edit==1 && $allow==true )
			{ 
			
			       
				   
				   
				   
				     if($type=='Image'){    
					
					 $os->Factory['WTF_dataToSave'] .=' $'.$f.'=$os->UploadPhoto(\''.$f.'\',$site[\'root\'].\'wtos-images\');
				   	if($'.$f.'!=\'\'){
					$dataToSave[\''.$f.'\']=\'wtos-images/\'.$'.$f.';}'."\n";	 
					  
					  $os->Factory['WTF_FillJsonScript'] .=' os.setImg(\''.$f.'Preview\',objJSON.'.$f.'); '."\n";   // os.setLink('brochurePdfPreview',objJSON.imageTenant);  
					 	$os->Factory['WTF_FillJsonPhp'] .=' if($record[\''.$f.'\']!=\'\'){
						$record[\''.$f.'\']=$site[\'url\'].$record[\''.$f.'\'];}'."\n";		
					
					 
 
					
		             $editJavaScripts['vVal'] .= 'var '.$f.'Val= os.getObj(\''.$f.'\').files[0]; '."\n";
	                 $editJavaScripts['gLink'] .='if('.$f.'Val){  formdata.append(\''.$f.'\','.$f.'Val,'.$f.'Val.name );}'."\n";	
					 
					 
					 //  <a href="" id="brochurePdfPreview" style="display:none;"> Link </a>
					  $os->Factory['WTF_EditFields'] .='<tr >
	  									<td>'.$alise.' </td>
										<td>
										
										<img id="'.$f.'Preview" src="" height="100" style="display:none;"	 />		
										<input type="file" name="'.$f.'" value=""  id="'.$f.'" onchange="os.readURL(this,\''.$f.'Preview\') " style="display:none;"/><br>
										
										 <span style="cursor:pointer; color:#FF0000;" onclick="os.clicks(\''.$f.'\');">Edit Image</span>
										 
										 
										 
										</td>						
										</tr>';  
					
					}elseif($type=='Date'){
					
					$os->Factory['WTF_dataToSave'] .=' $dataToSave[\''.$f.'\']=$os->saveDate($os->post(\''.$f.'\')); '."\n";	
					$os->Factory['WTF_FillJsonScript'] .=' os.setVal(\''.$f.'\',objJSON.'.$f.'); '."\n";  	
					 $os->Factory['WTF_FillJsonPhp'] .=' $record[\''.$f.'\']=$os->showDate($record[\''.$f.'\']); '."\n";	
					 
					 $editJavaScripts['vVal'] .= 'var '.$f.'Val= os.getVal(\''.$f.'\'); '."\n";
	                 $editJavaScripts['gLink'] .=' formdata.append(\''.$f.'\','.$f.'Val );'."\n";	
					 
					 $os->Factory['WTF_EditFields'] .=	'<tr >
	  									<td>'.$alise.' </td>
										<td><input value="" type="text" name="'.$f.'" id="'.$f.'" class="wtDateClass textbox fWidth"/></td>						
										</tr>';  
					 
					
					}elseif($type=='CheckBox'){
					
					$os->Factory['WTF_dataToSave'] .=' $dataToSave[\''.$f.'\']=$os->post(\''.$f.'\'); '."\n";	
				    $os->Factory['WTF_FillJsonScript'] .=' os.setCheckTick(\''.$f.'\',objJSON.'.$f.'); '."\n";
					$os->Factory['WTF_FillJsonPhp'] .=' $record[\''.$f.'\']=$record[\''.$f.'\'];'."\n";	
					
					
					$editJavaScripts['vVal'] .= 'var '.$f.'Val= os.getVal(\''.$f.'\'); '."\n  ".'if(os.getObj(\''.$f.'\').checked==false){'.$f.'Val=\'\';}';
	                $editJavaScripts['gLink'] .=' formdata.append(\''.$f.'\','.$f.'Val );'."\n";
					
					 $os->Factory['WTF_EditFields'] .=	'<tr >
	  									<td> </td>
										<td><input value="1" type="checkbox" name="'.$f.'" id="'.$f.'" class="textbox fWidth"/>  '.$alise.'</td>						
										</tr>';  
					}
					else 
					{
					 $os->Factory['WTF_dataToSave'] .=' $dataToSave[\''.$f.'\']=addslashes($os->post(\''.$f.'\')); '."\n";		
					 $os->Factory['WTF_FillJsonScript'] .=' os.setVal(\''.$f.'\',objJSON.'.$f.'); '."\n";  
					 $os->Factory['WTF_FillJsonPhp'] .=' $record[\''.$f.'\']=$record[\''.$f.'\'];'."\n";
					 
					 $editJavaScripts['vVal'] .= 'var '.$f.'Val= os.getVal(\''.$f.'\'); '."\n";
	                 $editJavaScripts['gLink'] .=' formdata.append(\''.$f.'\','.$f.'Val );'."\n";	
					 
					 if( $type=='Textarea')
					 {
					    $os->Factory['WTF_EditFields'] .=	'<tr >
	  									<td>'.$alise.' </td>
										<td><textarea  name="'.$f.'" id="'.$f.'" ></textarea></td>						
										</tr>'; 
										
										 
					 }
					 elseif($type=='Selectbox'){
					
					
					if(trim($relation)!=''){
						$htmlRelation=relationCodeAjax($relation,$f,$alise,'edit');
						
						 $os->Factory['WTF_EditFields'] .=	'<tr >
	  									<td>'.$alise.' </td>
										<td>'.$htmlRelation.' </td>						
										</tr>';  
					}
					
					
					}
										
					 
					 
					 else
					 {
					   $dateFieldsClass='';
					     if( $type=='Date')
						 {
						 
						     $dateFieldsClass='wtDateClass';
						 }
					 
					     $os->Factory['WTF_EditFields'] .=	'<tr >
	  									<td>'.$alise.' </td>
										<td><input value="" type="text" name="'.$f.'" id="'.$f.'" class="textboxxx  fWidth '.$dateFieldsClass.'"/> </td>						
										</tr>';  
					 }
					
					 
					
					
					
					
					
					
					
					}
			 
			  
			        
					
					
			
			
			 
		 
		    }
		  
		 
	 
	  
	 
	
	
	
	
	
	
	## generate Constant Array 353
	 if($relation!='')
	 {
			$fs=explode('|',$relation);
			if(count($fs)>1)
			{
			 $key=$fs[0];
			 if($key!='' && $fs[1]!='')
			 {
				  $mDataValsA= explode(',',$fs[1]);
				  $mDataVals=array_combine($mDataValsA,$mDataValsA);
				  $constantDataArray[$key]=$mDataVals;
			 }
			     
			}
	 
	 
	 }
	 
	
	} // end for each fiels
	} // and allow generate
	
	
	 $os->Factory['WTF_EditJavaScripts']=$editJavaScripts['vVal']."\n\n".$editJavaScripts['gLink'];
	
	
	
	 
	if(count($searchKeyArr)>0){
 
$skString=implode(' Or ',$searchKeyArr);
$os->Factory['WTF_searchFullQuery']= "and ( $skString )";
}

$os->Factory['WTF_searchScript'] =$os->Factory['WTF_searchScript'] .$os->Factory['WTF_searchScriptAppend'];
	##555 end code generate
	##2 prepar  file 
		
		$os->viewPageStr=$os->viewPageStrTmpl;
		$os->ajaxPageStr=$os->ajaxPageStrTmpl;
	   // $os->pluginMetaPageStr= $os->pluginMetaPageStrTmpl;
		
		
		foreach($os->Factory as $key=>$val)
		{
		 
		 $os->viewPageStr= str_ireplace( $key, $val,$os->viewPageStr);
		 $os->ajaxPageStr= str_ireplace( $key, $val,$os->ajaxPageStr);
		 
		
		}  
  
	
	
	
		if (!file_exists($site['root-plugin'].$pluginName)) {
		   mkdir($site['root-plugin'].$pluginName, 0777, true);
		 }
 
		$os->viewPageObj = fopen($viewPageLoc, 'w');
		$os->ajaxPageObj = fopen($ajaxPageLoc, 'w');
	
		
		fwrite($os->viewPageObj,$os->viewPageStr);
		fwrite($os->ajaxPageObj,$os->ajaxPageStr);
		
		
		fclose($os->viewPageObj);
		fclose($os->ajaxPageObj);
		
		
		
		
		
		//if (!file_exists($pluginMetaPageLoc)) 
		//{
			//$os->pluginMetaPageObj = fopen($pluginMetaPageLoc, 'w');
			//fwrite($os->pluginMetaPageObj,$os->pluginMetaPageStr);
			//fclose($os->pluginMetaPageObj);
			
		//}
		 
		 
		 $os->readWriteConstantFile($pluginConstantPageLoc,$constantDataArray); // write all  data to meta file used by install process
		 
		 ## process zip
		 
		 $processZip='NotOk';
		 if($processZip=='ok'){
		 $pluginName=str_replace(array('wtosFactory','..','../','./',' '),'',$pluginName);
		 if($pluginName!='' && $pluginName!='wtosFactory')
		 {
		 	
			$zipFolder=$site['root-plugin'].$pluginName;
			$zipFile=$site['root'].$pluginName.'.zip';
			
								// Get real path for our folder
					$rootPath = $zipFolder; // folder to zip
					
					// Initialize archive object
					$zip = new ZipArchive();
					$zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE);
					
					// Create recursive directory iterator
					/** @var SplFileInfo[] $files */
					$files = new RecursiveIteratorIterator(
						new RecursiveDirectoryIterator($rootPath),
						RecursiveIteratorIterator::LEAVES_ONLY
					);
					
					foreach ($files as $name => $file)
					{
						// Skip directories (they would be added automatically)
						if (!$file->isDir())
						{
							// Get real and relative path for current file
							$filePath = $file->getRealPath();
							$relativePath = substr($filePath, strlen($rootPath) + 1);
					
							// Add current file to archive
							$zip->addFile($filePath, $relativePath);
						}
					}
					
					// Zip archive will be created only after closing object
					$zip->close();
			
			
			
		 }
		 }
		##2  end 
		
		// plugin instalation  extraction 
		//  $os->installPlugin('jojo',$zipFile);   // need to implement with security   //  zip unzip  file hack attack posibilities 
		 
		return $previewPath;
		
		
	
}


function createPages($data)
{
	global $os,$site;
	
	
	#collect variables 
	$pluginName=$data['pluginName'];
	 
	//$pluginName='iamoknow';
	$formName=$data['formName'];
	$tableName=$data['tableName'];
	$viewPage=$data['viewPage'];
	$ajaxPage=$data['ajaxPage'];
	$heading=$data['heading'];
	$linkName=$data['linkName'];
	$primery=$data['primery'];
	
	//non ajaxpage
	$editPage=$data['editPage'];
	$listPage=$data['listPage'];
	$headingAdd=$data['headingAdd'];
	$headingEdit=$data['headingEdit'];
	$headingList=$data['headingList'];
	 
	
	
	//$ajaxPage=$editPage;
	//$viewPage=$listPage;
	
	$ajaxPage=$listPage;
	$viewPage=$editPage;
	
	
	
	$alise=$data['alise'];
	$type=$data['type'];
	$validation=isset($data['validation'])?$data['validation']:'';
	$listing=isset($data['listing'])?$data['listing']:'';
	$search=isset($data['search'])?$data['search']:'';
	$fields=isset($data['fields'])?$data['fields']:'';
	$relation=isset($data['relation'])?$data['relation']:'';
	$edit=isset($data['edit'])?$data['edit']:'';;
	 
	
	$pluginRoot=$site['root-plugin'];
	$previewPath=$site['url-plugin'].$ajaxPage ;
	if(trim($pluginName)!='')
	{
	$pluginRoot=$site['root-plugin'].$pluginName.'/';
	$previewPath=$site['url-plugin'].$pluginName.'/'.$ajaxPage ;
	}
	 
	
	$viewPageLoc=$pluginRoot.$viewPage; /// as list
	$ajaxPageLoc=$pluginRoot.$ajaxPage; // as edit
	
	
	
	
	
	$metaName=trim($pluginName);
	$pluginMetaPageLoc=$pluginRoot.$metaName.'MetaData.php';
	$pluginConstantPageLoc=$pluginRoot.$metaName.'Contants.php';
	
	
	
	
	
	
	
	$viewPageTemplateLoc=$site['root-plugin'].'wtosFactory/'.'wtosFactory.normal.DataEdit.html';
	$ajaxPageTemplateLoc=$site['root-plugin'].'wtosFactory/'.'wtosFactory.normal.DataList.html';
	$pluginMetaTemplateLoc='';
	
	$handle = fopen($viewPageTemplateLoc, "r");
    $os->viewPageStrTmpl =(string) fread($handle, filesize($viewPageTemplateLoc));fclose($handle);
	$handle = fopen($ajaxPageTemplateLoc, "r");
    $os->ajaxPageStrTmpl =(string) fread($handle, filesize($ajaxPageTemplateLoc));fclose($handle);
	
	//$handle = fopen($pluginMetaTemplateLoc, "r");
   // $os->pluginMetaPageStrTmpl =(string) fread($handle, filesize($pluginMetaTemplateLoc));fclose($handle);
	
	$os->viewPageStr=' output content view ';
    $os->ajaxPageStr=' output content ajax  ';
	$os->pluginMetaPageStr='';
	 
	
	    ###3  initialize seettings
	    $os->Factory['WTF_config_directory']='../wtosConfigLocal.php';
	    if(trim($pluginName)=='')
		{
		   $os->Factory['WTF_config_directory']='wtosConfigLocal.php';
		} 
	    $os->Factory['WTF_plugin']=$pluginName;
		$os->Factory['WTF_primery']=$primery;
		$os->Factory['WTF_table']=$tableName;
		$os->Factory['WTF_viewPage']=$viewPage;
		$os->Factory['WTF_ajaxPage']=$ajaxPage;
		$os->Factory['WTF_H_viewPage']=$heading;
		
		
		$os->Factory['WTF_editPage']=$editPage;
		$os->Factory['WTF_listPage']=$listPage;
		$os->Factory['WTF_headingAdd']=$headingAdd;
		$os->Factory['WTF_headingEdit']=$headingEdit;
		$os->Factory['WTF_headingList']=$headingList;
	 
		
		
		
		
	
		
		$os->Factory['WTF_functionKey']=$os->Factory['WTF_table'];
		$functionKey='WT_'.$os->Factory['WTF_functionKey'];
		$os->Factory['WTF_listingDiv']=$functionKey.'ListDiv'; 
		
		$os->Factory['WTF_listingKey']=$functionKey.'Listing'; 
		$os->Factory['WTF_editKey']=$functionKey.'EditAndSave'; 
		$os->Factory['WTF_AfterEditReload']=$functionKey.'ReLoadList';
		$os->Factory['WTF_getTableRowById']=$functionKey.'GetById';  
		$os->Factory['WTF_FillData']=$functionKey.'FillData'; 
		$os->Factory['WTF_deleteRowById']=$functionKey.'DeleteRowById'; 
		$os->Factory['WTF_pagingPageno']=$functionKey.'pagingPageno';      
		
		$os->Factory['WTF_dataToSave']="\n";
		$os->Factory['WTF_andFields']="\n";
		$os->Factory['WTF_andFieldQuery']=" ";
		$os->Factory['WTF_searchHtml']="\n";
		$os->Factory['WTF_listTitles']="\n";
		$os->Factory['WTF_listValues']="\n";
		$os->Factory['WTF_searchScript']="\n";
		$os->Factory['WTF_searchScriptAppend']='';
		$os->Factory['WTF_resetScript']='';
		$os->Factory['WTF_EditFields']="\n";
		$os->Factory['WTF_searchFullQuery']="\n";
		$os->Factory['WTF_EditJavaScripts']="\n";
		$os->Factory['WTF_FillJsonScript']="\n";
		$os->Factory['WTF_FillJsonPhp']="\n";
		$os->Factory['WTF_javascriptEmptyValidation']="\n";
		$os->Factory['WTF_version']=$os->version;
		
		$editJavaScripts['vVal']='';
		$editJavaScripts['gLink']='';
		$constantDataArray=array('version'=>$os->version);
		 
    
 
	
	###3 end
	
	
	
	 
	
	##555 start code generate
	$allowCodeGenerate=1;
	if($allowCodeGenerate==1){
	
	
//	_d($data);
 $searchKeyArr=array();
	foreach($fields as $f)
	{
	        $allow=true;
			if($primery==$f) 
			{
		          $allow=false;
			}
			
			$alise=isset($data['alise'][$f])?$data['alise'][$f]:'';
			$type=isset($data['type'][$f])?$data['type'][$f]:'';
			$relation=isset($data['relation'][$f])?$data['relation'][$f]:'';
			
			$v_search=$f.'_s'; // something wrong here  $v_search=$f; conflict with edit
			$v_and='$and'.$f;
			$v_andFT='$and'.$f.'A' ;
  
            
		  
		  $ignor=isset($data['ignor'][$f])?$data['ignor'][$f]:'';
		  $validation=isset($data['validation'][$f])?$data['validation'][$f]:'';
		  $listing=isset($data['listing'][$f])?$data['listing'][$f]:'';
		  $search=isset($data['search'][$f])?$data['search'][$f]:'';
		  $edit=isset($data['edit'][$f])?$data['edit'][$f]:'';
		  if($ignor==1 ){  continue; }
		  
		  
		  if($validation==1 && $allow==true ){ 
		  
		   
		  # validation script;  if(os.check.empty('note','Please Add note')==false){ return false;}
		    $os->Factory['WTF_javascriptEmptyValidation'] .='if(os.check.empty(\''.$f.'\',\'Please Add '.$alise.'\')==false){ return false;} '."\n";
		  
		  
		   }
		   
		   
		   if($listing==1 )
		   {
			
					$os->Factory['WTF_listTitles'] .= '<td ><b>'.$alise.'</b></td> '." \n  ";
					
					
					
					if($type=='CheckBox'){
					
					$os->Factory['WTF_listValues'] .= '<td><input readonly="1" value="1" <? if($os->val($record,\''.$f.'\')==1){ echo \'checked="Checked"\';  } ?> type="checkbox"/> </td> '." \n  ";
					
					
					}elseif($type=='Image'){
					
					$os->Factory['WTF_listValues'] .= '<td><img src="<?php  echo $site[\'url\'].$record[\''.$f.'\']; ?>"  height="70" width="70" /></td> '." \n  ";
					
					
					}elseif($type=='Selectbox'){
						if(trim($relation)!=''){
						$htmlRelation=relationCode($relation,$f,$alise,'list');
						$os->Factory['WTF_listValues'] .=  '<td> '.$htmlRelation.'</td> '."\n  ";
					}
					
					}elseif($type=='Date'){
					$os->Factory['WTF_listValues'] .= '<td><?php echo $os->showDate($record[\''.$f.'\']);?> </td> '." \n  ";
					
					}else
					{
					$os->Factory['WTF_listValues'] .= '<td><?php echo $record[\''.$f.'\']?> </td> '." \n  ";
					
					}
			  
			  
			  
			  
			  		  
		   }
		   
		   
		   
		   if($search==1 )
		   {
		   
			
					if($type=='CheckBox'){
					
					$os->Factory['WTF_searchHtml'] .= ' ';
					
					
					}elseif($type=='Image'){
					
					$os->Factory['WTF_searchHtml'] .= ' ';
					
					
					}elseif($type=='Date'){
					 				
				$os->Factory['WTF_searchHtml'] .='From '.$alise.': <input class="wtDateClass" type="text" name="f_'.$v_search.'" id="f_'.$v_search.'" value="<? echo $f_'.$v_search.'?>"  /> &nbsp; '."  ".
	   'To '.$alise.': <input class="wtDateClass" type="text" name="t_'.$v_search.'" id="t_'.$v_search.'" value="<? echo $t_'.$v_search.'?>"  /> &nbsp; '." \n  ";
	   
	   
	  
	               $os->Factory['WTF_andFields'] .='
    $f_'.$v_search.'= $os->setNget(\'f_'.$v_search.'\'); $t_'.$v_search.'= $os->setNget(\'t_'.$v_search.'\');
   '.$v_and.'=$os->DateQ(\''.$f.'\',$f_'.$v_search.',$t_'.$v_search.',$sTime=\'00:00:00\',$eTime=\'59:59:59\');'."\n";
    $os->Factory['WTF_andFieldQuery'] .= $v_and."  ";
	 
	
	
		
		
		
		$os->Factory['WTF_searchScript'] .= ' var f_'.$v_search.'Val= os.getVal(\'f_'.$v_search.'\'); '."\n";
		$os->Factory['WTF_searchScriptAppend'] .='f_'.$v_search.'=\'+f_'.$v_search.'Val +\'&';
		$os->Factory['WTF_resetScript'] .='f_'.$v_search.'=&';
		

		$os->Factory['WTF_searchScript'] .= ' var t_'.$v_search.'Val= os.getVal(\'t_'.$v_search.'\'); '."\n";
		$os->Factory['WTF_searchScriptAppend'] .='t_'.$v_search.'=\'+t_'.$v_search.'Val +\'&';
		$os->Factory['WTF_resetScript'] .='t_'.$v_search.'=&';
		
		
		
   
					
					}else
					{
					
					
					if($type=='Selectbox'){
								if(trim($relation)!=''){
								$htmlRelation=relationCode($relation,$f,$alise,'search');
								$os->Factory['WTF_searchHtml'] .=  $htmlRelation."\n  ";
								 $os->Factory['WTF_andFields'] .= $v_andFT.'=  $os->andField(\''.$v_search.'\',\''.$f.'\',$primeryTable,\'=\');
   $'.$v_search.'='.$v_andFT.'[\'value\']; '.$v_and.'='.$v_andFT.'[\'andField\'];	 '."\n";
								
								}
					         }else{
					 
					       $os->Factory['WTF_searchHtml'] .=' '.$alise.': <input type="text" class="wtTextClass" name="'.$v_search.'" id="'.$v_search.'" value="<? echo $'.$v_search.'?>" /> &nbsp; ';
						    $os->Factory['WTF_andFields'] .= $v_andFT.'=  $os->andField(\''.$v_search.'\',\''.$f.'\',$primeryTable,\'%\');
   $'.$v_search.'='.$v_andFT.'[\'value\']; '.$v_and.'='.$v_andFT.'[\'andField\'];	 '."\n";
					 }
					 
					  
					 
					  
   
   
					  $os->Factory['WTF_andFieldQuery'] .= $v_and."  ";
					 
   
                              
					   
					   
								
					
					$os->Factory['WTF_searchScript'] .= ' var '.$v_search.'Val= os.getVal(\''.$v_search.'\'); '."\n";
					$os->Factory['WTF_searchScriptAppend'] .=$v_search.'=\'+'.$v_search.'Val +\'&';
					$os->Factory['WTF_resetScript'] .=$v_search.'=&';
					
					
					
					}
					
					
					
			       $searchKeyArr[]= $f .' like \'%$searchKey%\'';  
			  
			
			  		  
		   }
		   
		   
		   
		   
		   
		    if($edit==1 && $allow==true )
			{ 
			
			       
				   
				   
				   
				     if($type=='Image'){     
					
					 $os->Factory['WTF_dataToSave'] .=' $'.$f.'=$os->UploadPhoto(\''.$f.'\',$site[\'root\'].\'wtos-images\');
				   	if($'.$f.'!=\'\'){
					$dataToSave[\''.$f.'\']=\'wtos-images/\'.$'.$f.';}'."\n";	 
					  
					//  $os->Factory['WTF_FillJsonScript'] .=' os.setImg(\''.$f.'Preview\',objJSON.'.$f.'); '."\n";   // os.setLink('brochurePdfPreview',objJSON.imageTenant);  
					// 	$os->Factory['WTF_FillJsonPhp'] .=' if($record[\''.$f.'\']!=\'\'){
					//	$record[\''.$f.'\']=$site[\'url\'].$record[\''.$f.'\'];}'."\n";		
					
					 
 
					
		          //   $editJavaScripts['vVal'] .= 'var '.$f.'Val= os.getObj(\''.$f.'\').files[0]; '."\n";
	               //  $editJavaScripts['gLink'] .='if('.$f.'Val){  formdata.append(\''.$f.'\','.$f.'Val,'.$f.'Val.name );}'."\n";	
					 
					 
					 //  <a href="" id="brochurePdfPreview" style="display:none;"> Link </a>
					  $os->Factory['WTF_EditFields'] .='<tr >
	  									<td>'.$alise.' </td>
										<td>
										
										<img id="'.$f.'Preview" src="<?php echo $site[\'url\']?><?php echo $os->getVal(\''.$f.'\');?>  " height="100"  />		
										<input type="file" name="'.$f.'" value=""  id="'.$f.'" onchange="os.readURL(this,\''.$f.'Preview\') " style="display:none;"/><br>
										
										 <span style="cursor:pointer; color:#FF0000;" onclick="os.clicks(\''.$f.'\');">Edit Image</span>
										 
										 
										 
										</td>						
										</tr>';  
					
					}elseif($type=='Date'){
					
					$os->Factory['WTF_dataToSave'] .=' $dataToSave[\''.$f.'\']=$os->saveDate($os->post(\''.$f.'\')); '."\n";	
				//	$os->Factory['WTF_FillJsonScript'] .=' os.setVal(\''.$f.'\',objJSON.'.$f.'); '."\n";  	
				//	 $os->Factory['WTF_FillJsonPhp'] .=' $record[\''.$f.'\']=$os->showDate($record[\''.$f.'\']); '."\n";	
					 
				//	 $editJavaScripts['vVal'] .= 'var '.$f.'Val= os.getVal(\''.$f.'\'); '."\n";
	              //   $editJavaScripts['gLink'] .=' formdata.append(\''.$f.'\','.$f.'Val );'."\n";	
					 
					 $os->Factory['WTF_EditFields'] .=	'<tr >
	  									<td>'.$alise.' </td>
										<td><input value="<?php  echo $os->showDate( $os->getVal(\''.$f.'\'));?>" type="text" name="'.$f.'" id="'.$f.'" class="wtDateClass textbox fWidth"/></td>						
										</tr>';  
					
					
					}elseif($type=='CheckBox'){  
					
					$os->Factory['WTF_dataToSave'] .=' $dataToSave[\''.$f.'\']=$os->post(\''.$f.'\'); '."\n";	
				    $os->Factory['WTF_EditFields'] .=	'<tr >
	  									<td> </td>
										<td><input value="1" <? if($os->getVal(\''.$f.'\')==1){ echo \'checked="Checked"\';  } ?> type="checkbox" name="'.$f.'" id="'.$f.'" class="textbox fWidth"/>  '.$alise.'</td>						
										</tr>';  
					}
					else 
					{
					 $os->Factory['WTF_dataToSave'] .=' $dataToSave[\''.$f.'\']=addslashes($os->post(\''.$f.'\')); '."\n";		
										 
					 if( $type=='Textarea')
					 {
					    $os->Factory['WTF_EditFields'] .=	'<tr >
	  									<td>'.$alise.' </td>
										<td><textarea  name="'.$f.'" id="'.$f.'" ><?php echo $os->getVal(\''.$f.'\') ?></textarea></td>						
										</tr>'; 
										
										 
					 }
					 elseif($type=='Selectbox'){ // not implemented
					
					
					if(trim($relation)!=''){
						$htmlRelation=relationCode($relation,$f,$alise,'edit');
						
						 $os->Factory['WTF_EditFields'] .=	'<tr >
	  									<td>'.$alise.' </td>
										<td>'.$htmlRelation.' </td>						
										</tr>';  
					}
					
					
					}
										
					 
					 
					 else
					 {
					    
					 
					     $os->Factory['WTF_EditFields'] .=	'<tr >
	  									<td>'.$alise.' </td>
										<td><input value="<?php echo $os->getVal(\''.$f.'\') ?>" type="text" name="'.$f.'" id="'.$f.'" class="textbox  fWidth "/> </td>						
										</tr>';  
					 }
					
					 
					
					
					
					
					
					
					
					}
			 
			  
			        
					
					
			
			
			 
		 
		    }
		  
		 
	 
	  
	 
	
	
	
	
	
	
	## generate Constant Array 353
	 if($relation!='')
	 {
			$fs=explode('|',$relation);
			if(count($fs)>1)
			{
			 $key=$fs[0];
			 if($key!='' && $fs[1]!='')
			 {
				  $mDataValsA= explode(',',$fs[1]);
				  $mDataVals=array_combine($mDataValsA,$mDataValsA);
				  $constantDataArray[$key]=$mDataVals;
			 }
			     
			}
	 
	 
	 }
	 
	
	} // end for each fiels
	} // and allow generate
	
	
	// $os->Factory['WTF_EditJavaScripts']=$editJavaScripts['vVal']."\n\n".$editJavaScripts['gLink'];
	
		
	
	 
	if(count($searchKeyArr)>0){
 
$skString=implode(' Or ',$searchKeyArr);
$os->Factory['WTF_searchFullQuery']= "and ( $skString )";

   

}

// for search script 
                    $os->Factory['WTF_searchScript'] .= ' var searchKeyVal= os.getVal(\'searchKey\'); '."\n";
					$os->Factory['WTF_searchScriptAppend'] .= 'searchKey=\'+searchKeyVal +\'&';
					$os->Factory['WTF_resetScript'] .='searchKey=&';

        $os->Factory['WTF_searchScriptAppend']='window.location=\'<?php echo $listPageLink; ?>'.$os->Factory['WTF_searchScriptAppend'].'\';';
		$os->Factory['WTF_searchScript'] =$os->Factory['WTF_searchScript'] .$os->Factory['WTF_searchScriptAppend'];
		$os->Factory['WTF_resetScript']='window.location=\'<?php echo $listPageLink; ?>' .$os->Factory['WTF_resetScript'].'\';';
	##555 end code generate
	##2 prepar  file 
		
		$os->viewPageStr=$os->viewPageStrTmpl;
		$os->ajaxPageStr=$os->ajaxPageStrTmpl;
	   // $os->pluginMetaPageStr= $os->pluginMetaPageStrTmpl;
		
		
		foreach($os->Factory as $key=>$val)
		{
		 
		 $os->viewPageStr= str_ireplace( $key, $val,$os->viewPageStr);
		 $os->ajaxPageStr= str_ireplace( $key, $val,$os->ajaxPageStr);
		 
		
		}  
  
	
	
	
		if (!file_exists($site['root-plugin'].$pluginName)) {
		   mkdir($site['root-plugin'].$pluginName, 0777, true);
		 }
 
		$os->viewPageObj = fopen($viewPageLoc, 'w');
		$os->ajaxPageObj = fopen($ajaxPageLoc, 'w');
	
		
		fwrite($os->viewPageObj,$os->viewPageStr);
		fwrite($os->ajaxPageObj,$os->ajaxPageStr);
		
		
		fclose($os->viewPageObj);
		fclose($os->ajaxPageObj);
		
		
		
		
		
		//if (!file_exists($pluginMetaPageLoc)) 
		//{
			//$os->pluginMetaPageObj = fopen($pluginMetaPageLoc, 'w');
			//fwrite($os->pluginMetaPageObj,$os->pluginMetaPageStr);
			//fclose($os->pluginMetaPageObj);
			
		//}
		 
		 
		 $os->readWriteConstantFile($pluginConstantPageLoc,$constantDataArray); // write all  data to meta file used by install process
		 
		 ## process zip
		 
		 $processZip='NotOk';
		 if($processZip=='ok'){
		 $pluginName=str_replace(array('wtosFactory','..','../','./',' '),'',$pluginName);
		 if($pluginName!='' && $pluginName!='wtosFactory')
		 {
		 	
			$zipFolder=$site['root-plugin'].$pluginName;
			$zipFile=$site['root'].$pluginName.'.zip';
			
								// Get real path for our folder
					$rootPath = $zipFolder; // folder to zip
					
					// Initialize archive object
					$zip = new ZipArchive();
					$zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE);
					
					// Create recursive directory iterator
					/** @var SplFileInfo[] $files */
					$files = new RecursiveIteratorIterator(
						new RecursiveDirectoryIterator($rootPath),
						RecursiveIteratorIterator::LEAVES_ONLY
					);
					
					foreach ($files as $name => $file)
					{
						// Skip directories (they would be added automatically)
						if (!$file->isDir())
						{
							// Get real and relative path for current file
							$filePath = $file->getRealPath();
							$relativePath = substr($filePath, strlen($rootPath) + 1);
					
							// Add current file to archive
							$zip->addFile($filePath, $relativePath);
						}
					}
					
					// Zip archive will be created only after closing object
					$zip->close();
			
			
			
		 }
		 }
		##2  end 
		
		// plugin instalation  extraction 
		//  $os->installPlugin('jojo',$zipFile);   // need to implement with security   //  zip unzip  file hack attack posibilities 
		 
		return $previewPath;
		
		
	
}


?>