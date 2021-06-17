Execute a database backup query from PHP file. Below is an example of using SELECT INTO OUTFILE query for creating table backup:

<?php
$DB_HOST = "localhost";
$DB_USER = "xxx";
$DB_PASS = "xxx";
$DB_NAME = "xxx";

$con = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if($con->connect_errno > 0) {
  die('Connection failed [' . $db->connect_error . ']');
}

$tableName  = 'yourtable';
$backupFile = 'backup/yourtable.sql';
$query      = "SELECT * INTO OUTFILE '$backupFile' FROM $tableName";
$result = mysqli_query($con,$query);




?>

To restore the backup you just need to run LOAD DATA INFILE query like this:

<?php
$DB_HOST = "localhost";
$DB_USER = "xxx";
$DB_PASS = "xxx";
$DB_NAME = "xxx";

$con = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if($con->connect_errno > 0) {
  die('Connection failed [' . $db->connect_error . ']');
}

$tableName  = 'yourtable';
$backupFile = 'yourtable.sql';
$query      = "LOAD DATA INFILE 'backupFile' INTO TABLE $tableName";
$result = mysqli_query($con,$query);
?>



In *nix systems, use the WHICH command to show the location of the mysqldump, try this :

<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'password';
$dbname = 'test';
$mysqldump=exec('which mysqldump');


$command = "$mysqldump --opt -h $dbhost -u $dbuser -p $dbpass $dbname > $dbname.sql";

exec($command);
?>

 -1
down vote
	

You can use this command it works or me 100%

exec('C:\\wamp\\bin\\mysql\\mysql5.6.17\\bin\\mysqldump.exe -uroot DatabaseName> c:\\database_backup.sql');

note:
C:\\wamp\\bin\\mysql\\mysql5.6.17\\bin\\mysqldump.exe is the path for mysqldump app , check on your pc.

-uroot is -u{UserName}