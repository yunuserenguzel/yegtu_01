<?php

include_once('DatabaseConnector.php');
include_once('user.php');
class Item{
	
	public static function getItem($item_id){
		$sql = "SELECT  I.*,
		                O.user_id AS `user_id`,
                        S.sub_category_id,
                        S.image AS sub_category_icon,
                        C.category_id
		        FROM item I
		        INNER JOIN owned_by O ON O.item_id=I.item_id
                INNER JOIN `in` N ON N.item_id=I.item_id
                INNER JOIN sub_category S ON S.sub_category_id=N.sub_category_id
                INNER JOIN under U ON U.sub_category_id=S.sub_category_id
                INNER JOIN category C ON C.category_id=U.category_id
		        WHERE I.item_id=$item_id";
		$item =  DatabaseConnector::get_single($sql);
        $item->user = User::getUser($item->user_id);
        return $item;
	}
	public static function createItem(
								$title,
								$description,
								$image,
								$user_id,
								$sub_category_id,
                                $price
							){
		$sql = "
			INSERT INTO item
				(
				title,
				description,
				image,
				price,
				available,
				created_at,
				view_count
				)
				VALUES
				(
				'$title',
				'$description',
				'$image',
			    '$price',
				1,
				CURRENT_TIMESTAMP,
				0
				)
		";
		
		DatabaseConnector::query($sql);
		
		$item_id = mysql_insert_id();
		$sql = "
			INSERT INTO owned_by
				(item_id,user_id)
				VALUES
				('$item_id','$user_id')
		";
		DatabaseConnector::query($sql);
		
		$sql = "
			INSERT INTO `in`
			(item_id,sub_category_id)
			VALUES
			($item_id,$sub_category_id)
		";
		DatabaseConnector::query($sql);
		
		return $item_id;
	}
	
	public static function getItemsBySubCategory($sub_category_id,$size,$page,$available=1){
		$start = $size*$page;
		$sql = "
			SELECT  I.*,S.*,
                C.category_id,
                C.color AS category_color,
                Us.username AS owner,
                CONCAT(C.image_folder,'/',S.image) AS sub_category_icon
			FROM
				item I
				INNER JOIN `in` ON `in`.item_id=I.item_id
				INNER JOIN owned_by O ON O.item_id=I.item_id
				INNER JOIN user Us ON Us.user_id=O.user_id
				INNER JOIN sub_category S ON S.sub_category_id=`in`.sub_category_id
                INNER JOIN under U ON U.sub_category_id=S.sub_category_id
                INNER JOIN category C ON C.category_id=U.category_id
			WHERE
				S.sub_category_id=$sub_category_id AND
				I.available=$available
			ORDER BY
				I.item_id
			LIMIT
				{$start},{$size}
		";
		return DatabaseConnector::get_results($sql);
	}
	
	public static function getItemsByCategory($category_id,$size,$page,$available=1){
		$start = $size*$page;
		$sql = "
			SELECT  I.*,S.*,
                C.category_id,
                C.color AS category_color,
                Us.username AS owner,
                CONCAT(C.image_folder,'/',S.image) AS sub_category_icon
			FROM
				item I
				INNER JOIN `in` ON `in`.item_id=I.item_id
				INNER JOIN owned_by O ON O.item_id=I.item_id
				INNER JOIN user Us ON Us.user_id=O.user_id
				INNER JOIN sub_category S ON S.sub_category_id=`in`.sub_category_id
                INNER JOIN under U ON U.sub_category_id=S.sub_category_id
                INNER JOIN category C ON C.category_id=U.category_id
			WHERE
				C.category_id=$category_id AND
				I.available=$available
			ORDER BY
				I.item_id DESC
			LIMIT
				{$start},{$size}
		";
		return DatabaseConnector::get_results($sql);
	}
	public static function getItemsByUser($user_id,$size,$page,$available=1){
		$start = $size*$page;
		$sql = "
			SELECT  I.*,S.*,
                C.category_id,
                C.color AS category_color,
                Us.username AS owner,
                CONCAT(C.image_folder,'/',S.image) AS sub_category_icon
			FROM
				item I
				INNER JOIN `in` ON `in`.item_id=I.item_id
				INNER JOIN owned_by O ON O.item_id=I.item_id
				INNER JOIN user Us ON Us.user_id=O.user_id
				INNER JOIN sub_category S ON S.sub_category_id=`in`.sub_category_id
                INNER JOIN under U ON U.sub_category_id=S.sub_category_id
                INNER JOIN category C ON C.category_id=U.category_id
			WHERE
				O.user_id=$user_id AND
				I.available=$available
			ORDER BY
				I.item_id DESC
			LIMIT
				{$start},{$size}
		";
		return DatabaseConnector::get_results($sql);
	}
	
	public static function getNewestItems($size,$page){
		$start = $size*$page;
		$sql = "
			SELECT  I.*,S.*,
                C.category_id,
                C.color AS category_color,
                Us.username AS owner,
                CONCAT(C.image_folder,'/',S.image) AS sub_category_icon
			FROM
				item I
				INNER JOIN `in` ON `in`.item_id=I.item_id
				INNER JOIN owned_by O ON O.item_id=I.item_id
				INNER JOIN user Us ON Us.user_id=O.user_id
				INNER JOIN sub_category S ON S.sub_category_id=`in`.sub_category_id
                INNER JOIN under U ON U.sub_category_id=S.sub_category_id
                INNER JOIN category C ON C.category_id=U.category_id
			WHERE
				I.available=1
			ORDER BY
				I.created_at DESC
			LIMIT
				{$start},{$size}
		";
		$result =  DatabaseConnector::get_results($sql);
        return $result;
	}
	
	public static function makeItemUnavailable($item_id,$available=0){
		$sql = "UPDATE item SET available=$available WHERE item_id=$item_id";
		return DatabaseConnector::query($sql);
	}
	
	public static function changePrice($item_id,$price){
		$sql = "UPDATE item SET price=$price WHERE item_id=$item_id";
		return DatabaseConnector::query($sql);
	}
	public static function isOwnedBy($item_id,$user_id){
		$sql = "SELECT 1 as isOwned FROM owned_by WHERE item_id=$item_id AND user_id=$user_id";
		$result = DatabaseConnector::get_value($sql);
		if($result == 1)
			return true;
		else
			return false;
	}
	public static function deleteItem($item_id){
		$sql = "DELETE FROM item WHERE item_id=$item_id";
		return DatabaseConnector::query($sql);
	}
    public static function incrementViewCount($item_id){
        $sql = "UPDATE item SET `view_count` = `view_count` + 1 WHERE item_id = $item_id";
        return DatabaseConnector::query($sql);
    }
}










