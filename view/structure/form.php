<?php



switch($GLOBALS['f']){
	case 'login':
        include('view/forms/login.php');
		break;
	case 'item':
        include_once('view/forms/itemForm.php');
        itemForm();
		break;
	case 'update_profile':
		break;
    case 'email_register':
        include('view/forms/emailRegisterForm.php');
        break;
    case 'register':
        include('view/forms/registerForm.php');
        break;
}