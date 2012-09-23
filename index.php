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
<META NAME="DESCRIPTION" CONTENT="Biltrader ile özel ders ilanı ver. Özel ders bul. İkinci el kitap ilanı ver, ikinci el kitap bul.">
<META NAME="KEYWORDS" CONTENT="biltrader, bilkent trader, bilkent">

<script type="text/javascript" src="js/jquery.js"></script>
<?php if(isset($_GET['alert'])){?>
    <script type="text/javascript">
        $(document).ready(function(){
            alert('<?php echo $_GET['alert']?>') ;
        });
    </script>
<?php }?>
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
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-18344743-7']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
</html>