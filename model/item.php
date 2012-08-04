<?php

include_once('DatabaseConnector.php');

class Item{
	
	public static function getItem($item_id){
		$sql = "SELECT * FROM item WHERE item_id=$item_id";
		return DatabaseConnector::get_single($sql);
	}
	public static function createItem(
								$title,
								$description,
								$image,
								$user_id,
								$sub_category_id
							){
		$sql = "
			INSERT INTO item
				(
				title,
				description,
				image,
				available,
				created_at,
				view_count
				)
				VALUES
				(
				'$title',
				'$description',
				'$image',
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
		DatabseConnector::query($sql);
		
		$sql = "
			INSERT INTO in
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
			SELECT I.*
			FROM
				item I
				INNER JOIN in ON in.item_id=I.item_id
				INNER JOIN sub_category S ON S.sub_category_id=in.sub_category_id
			WHERE
				S.sub_category_id=$sub_category_id	
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
			SELECT I.*,S.*
			FROM
				item I
				INNER JOIN in ON in.item_id=I.item_id
				INNER JOIN sub_category S ON S.sub_category_id=in.sub_category_id
				INNER JOIN under U ON U.sub_category_id=S.sub_category_id
				INNER JOIN category C ON C.category_id=U.category_id
			WHERE
				C.category_id=$category_id
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
			SELECT I.*,S.*
			FROM
				item I
				INNER JOIN in ON in.item_id=I.item_id
				INNER JOIN sub_category S ON S.sub_category_id=in.sub_category_id
				INNER JOIN owned_by O ON O.item_id=I.item_id
			WHERE
				O.user_id=$user_id
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
			SELECT I.*,S.*
			FROM
				item I
				INNER JOIN in ON in.item_id=I.item_id
				INNER JOIN sub_category S ON S.sub_category_id=in.sub_category_id
			WHERE
				I.available=1
			ORDER BY
				I.created_at DESC
			LIMIT
				{$start},{$size}
		";
		return DatabaseConnector::get_results($sql);
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
}










