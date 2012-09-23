<?php
include_once('../lib/Util.php');
include_once('../model/item.php');
include_once('../lib/LoggedUser.php');

if(isset($_GET['action'])){
	
	switch($_GET['action']){
        case "item_viewed":
            $item_id = Util::FilterString($_GET['item_id']);
            Item::incrementViewCount($item_id);
            echo mysql_error() . '<br/>';
            print_r(Item::getItem($item_id));
	}
}
else if(isset($_POST['action'])){
	switch($_POST['action']){
		
		case 'create_item':
			if(!LoggedUser::IsUserLogged()){
				//redirect user to somewhere
                header("Location: ../?alert=". urlencode("İlan eklemek için giriş yapınız."));
				exit(-1);
			}
			$title = Util::FilterString($_POST['title']);			
			$description = Util::FilterString($_POST['description']);
			$user_id = LoggedUser::GetUserId();
//			/*<[[TEST*/$user_id = 2; /*TEST]]>*/
            $sub_category_id  = Util::FilterString($_POST['sub_category_id']);
			$price = Util::FilterString($_POST['price']);
            $image = null;
			$item_id = Item::createItem(
				$title,
				$description,
				$image,
				$user_id,
				$sub_category_id,
                $price
			);

            header('Location: ../?p=item&i='.$item_id);
			break;
		
		case 'change_item_price':
			break;
		
		case 'delete_item':
			break;
			
	}
}