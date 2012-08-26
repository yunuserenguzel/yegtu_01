<?php 
session_start();
//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
include_once('lib/Util.php');
include_once('model/DatabaseConnector.php');
include_once('model/user.php');
include_once('model/category.php');
include_once('model/item.php');
include_once('model/message.php');
global $p,$f,$c,$s;
$p = isset($_GET['p']) ? $_GET['p'] : NULL;
$f = isset($_GET['f']) ? $_GET['f'] : NULL;
$c = isset($_GET['c']) ? $_GET['c'] : NULL;
$s = isset($_GET['s']) ? $_GET['s'] : NULL;


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Biltrader </title>
<link href="css/main.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" type="image/png" href="images/favicon.png" />
<script type="text/javascript" src="js/jquery.js"></script>
</head>

<body>
<div id="page">
	<div id="header">
		<?php include('view/structure/header.php');?>    	
    </div>
	<div id="content">
    	<div id="left">
	    	<?php include('view/structure/left.php');?>
        </div>
		<div id="center">
	        <?php include('view/structure/center.php');?>
        </div>
    </div>
</div>
</body>
</html>