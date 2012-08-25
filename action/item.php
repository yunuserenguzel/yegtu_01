<?php
include_once('../lib/Util.php');
include_once('../model/item.php');
include_once('../lib/LoggedUser.php');

if(isset($_GET['action'])){
	
	switch($_GET['action']){
		
	}
}
else if(isset($_POST['action'])){
	switch($_POST['action']){
		
		case 'create_item':
//			if(!LoggedUser::IsUserLogged()){
//				//redirect user to somewhere
//				exit(-1);
//			}
			$title = Util::FilterString($_POST['title']);			
			$description = Util::FilterString($_POST['description']);
//			$user_id = LoggedUser::GetUserId();
			/*<[[TEST*/$user_id = 2; /*TEST]]>*/
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