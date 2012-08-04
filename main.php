<div>
	<?php
    	$p = $_GET['p'];
		switch($p){
			case 'i':
				include('view/item.php');
				break;
			case 'p':
				include('view/profile.php');
				break;
			default:
				include('view/homepage.php');
		}
	
	?>
</div>