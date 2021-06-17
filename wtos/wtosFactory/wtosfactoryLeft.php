<? 
$tableList=tablesInDb();
?>

<style>
.widthF{ width:70px;}
.fileClass{ height:20px; padding:5px 0px 0px 5px; }
.fileClass hover:{ background:#008FD5;}
.fileClass a{ color:#333333; }
.fileClassSelected{ height:20px; background:#008FD5;padding:5px 0px 0px 5px; }
.fileClassSelected a{ color:#FFFFFF; }
</style>
<form action="" method="post">
<input type="text" name="pluginNameNew" placeholder="Plugin name" class="widthF"/>
<select name="tableNew"><? $os->onlyOption($tableList) ?></select>
<input type="text" name="formNameNew" placeholder="Form name" class="widthF" />
<input type="hidden" name="createNewForm" value="ok" />
<input type="submit" value="OK" />
</form>
<br /><br />
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td>
	<div style="height:450px; overflow-y:scroll;">

<? 
$rootpluginStore=$site['root-plugin'].'wtosFactory/forms';
if($os->post('createNewForm')=='ok' && $os->post('pluginNameNew')!='' && $os->post('formNameNew')!='')
{
		$pluginNameNew=$os->post('pluginNameNew');
		$tableNew=$os->post('tableNew');
		$formNameNew=$os->post('formNameNew');
		if($tableNew=='')
		{
		
		$tableNew=str_replace(" ",'',$formNameNew);
		}
		
		$formDataFile=$pluginNameNew.'.'.$tableNew.'.'.$formNameNew.'.wtos';
		
		$formDataFileLoc=$rootpluginStore.'/'.$formDataFile;
		$handleformDataFile = fopen($formDataFileLoc, "w");
		 fwrite($handleformDataFile,'wtos ');
		fclose($handleformDataFile);
		


}


$filesForms = new RecursiveIteratorIterator(
						new RecursiveDirectoryIterator($rootpluginStore),
						RecursiveIteratorIterator::LEAVES_ONLY
					);
					$formDataFileCurrent=$os->get('formDataFile');
					foreach ($filesForms as $name => $file)
					{
						// Skip directories (they would be added automatically)
						
						$fileNameStr=$file->getFilename();
						$dfF=explode('.',$fileNameStr);
						if (!$file->isDir())
						{
						
						 $fileClass='fileClass';
						 if($formDataFileCurrent==$fileNameStr)
						 {
						  $fileClass='fileClassSelected';
						 }
						
						?>
						<div class="<? echo  $fileClass ?>"><a style="text-decoration:none;" href="?formDataFile=<? echo $fileNameStr ?>"><? echo $fileNameStr ?>	</a> </div>
							
							<? 
						}
					}
					
					?>
					</div>
					</td>
    <td>&nbsp;
	<div style="height:450px; overflow-y:scroll;">
	<? $tableList=tablesInDb();
	foreach( $tableList as $tableItem)
	{
	
	 $fieldsInTable=fieldsInTable($tableItem);
	  ?>
	  <b><? echo $tableItem; ?></b><br />
	  <div style="padding-left:10px;" >
	  <? 
	
	foreach( $fieldsInTable as $fieldsItem)
	{
	
	 
	  ?>
	  <? echo $fieldsItem; ?><br />
	  
	  <? 
	
	
	
	}
	
	?>
	</div>
	
	<?
	
	}
	
	?>
	</div>
	
	</td>
  </tr>
</table>

 
