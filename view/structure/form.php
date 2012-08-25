<?php



switch($GLOBALS['f']){
	case 'login':
		break;
	case 'item':
        include_once('view/forms/itemForm.php');
        itemForm();
		break;
	case 'update_profile':
		break;
	case 'register':
		include('view/forms/registerForm.php');
		break;
}