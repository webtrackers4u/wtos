<?
/*
   # wtos version : 1.1
   # main ajax process page : rbreminderAjax.php 
   #  
*/
include('wtosConfigLocal.php');
include($site['root-wtos'].'top.php');
?><?
$pluginName='';
$listHeader='Reminder';
$ajaxFilePath= 'rbreminderAjax.php';
$os->loadPluginConstant($pluginName);
$loadingImage=$site['url-wtos'].'images/loadingwt.gif';
?><? 

$dbhost = $site['host'];
$dbuser = $site['user'];
$dbpass = $site['pass'];
$dbname =  $site['db'];
$backupFile = $site['root-wtos']."exp/$dbname.sql";

//$mysqldump=exec('which mysqldump');
//_d($mysqldump);
//$command = "$mysqldump --opt -h $dbhost -p $dbpass  -u $dbuser $dbname > $backupFile";
//exec($command);
//$command = "$mysqldump --opt -h $dbhost -p $dbpass  -u $dbuser $dbname > $backupFile";
//exec($command);
$mysql=exec('which mysql ');
//$p=exec("$mysql  -h $dbhost -p $dbpass  -u $dbuser $dbname  ");

//$mysql=system('which mysql ');
//$p=system("$mysql  -h $dbhost -p $dbpass  -u $dbuser $dbname  ");
 //echo "mysqldump --opt --host=$dbhost --user=$dbuser --password=$dbpass $dbname > $backupFile";
exec("D:\cwamp\bin\mysql\mysql5.5.24\bin/mysqldump --opt --host=$dbhost --user=$dbuser --password=$dbpass $dbname > $backupFile");// working
//passthru("D:\cwamp\bin\mysql\mysql5.5.24\bin/mysqldump --opt --host=$dbhost --user=$dbuser --password=$dbpass $dbname > $backupFile");
//$command='mysql -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' < ' .$mysqlImportFilename;
system('mysql -u <user> -p<password> dbname < filename.sql');
_d($p);
_d($site);


 


exit();

_d($site);
$tableName  = 'admin';
$backupFile = $site['root-wtos'].'exp/tableAdmin.sql';
$query      = "SELECT * INTO OUTFILE '$backupFile' FROM $tableName";
$result = $os->mq($query);

?><? include($site['root-wtos'].'bottom.php'); ?>