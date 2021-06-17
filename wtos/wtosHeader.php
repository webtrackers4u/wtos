<?
global $site, $os;
?>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><? echo $os->adminTitle ?></title>
<meta name="description" content="<? echo $os->adminDescription ?>">
<meta name="keywords" content="<? echo $os->adminKeywords ?>">
<script type="text/javascript" src="<? echo $site['url-library']?>wtos-1.1.js"></script>
<link rel="stylesheet" type="text/css" href="<? echo $site['url-wtos']?>css/style.css" />
<link rel="stylesheet" href="<?php echo $site['url-wtos']?>/css/datepkr/jquery-ui.css">
<link rel="stylesheet" href="<?php echo $site['themePath']?>css/uikit.css">
<link rel="stylesheet" href="<?php echo $site['themePath']?>css/common.css">


<script> globalDateFormat='<? echo $os->dateFormatJs; ?>'; </script>
<script src="<?php echo $site['themePath']?>js/uikit.js"></script>
<script src="<?php echo $site['themePath']?>js/uikit-icons.js"></script>


<script src="<?php echo $site['url-wtos']?>js/datepkr/jquery-1.7.2.js"></script>
<script src="<?php echo $site['url-wtos']?>js/datepkr/jquery.ui.core.js"></script>
<script src="<?php echo $site['url-wtos']?>js/datepkr/jquery.ui.datepicker.js"></script>


