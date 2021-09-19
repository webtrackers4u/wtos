<?
global $site, $os;
include('config.php');
include('common.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <? include('header.php'); ?>
</head>
<body>

<?
dump(get_included_files());
?>

<? include('login.php') ?>


</body>
</html>

