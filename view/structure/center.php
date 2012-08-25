<?php

switch($GLOBALS['p']){
	case 'profile':
		break;
	case 'item':
		include('view/structure/item.php');
		break;
	case 'form':
		include('view/structure/form.php');
		break;
	case 'item-list':
    default:
		include('view/structure/item_list.php');
		break;
}
