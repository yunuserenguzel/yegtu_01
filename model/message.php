<?php

include_once('DatabaseConnector.php');
class Message{
	
	public static function getMessage($message_id){
		
		$sql = "SELECT * FROM message WHERE message_id=$message_id";
		return DatabaseConnector::get_single($sql);
	}
	public static function markAsRead($message_id){
		
		$sql = "UPDATE message(read) SET ('1') WHERE message_id = $message_id";
		return DatabaseConnector::query($sql);
	}
	public static function createMessage($item_id,$subject,$message,$sender_id,$receiver_id){
		
		$sql = "INSERT INTO message 
		(item_id,
		subject,
		message,
		sender_id,
		receiver_id,
		created_at,
		)
		VALUES
		($item_id,
		$subject,
		$message,
		$sender_id,
		$receiver_id,
		CURRENT_TIMESTAMP
		)";
		if(!DatabaseConnector::query($sql))die(mysql_error());
		return mysql_insert_id();
	}
	public static function getMessageList($user_id){
		
		$sql = "SELECT * FROM message M 
		INNER JOIN user U 
		ON U.user_id=M.user_id 
		WHERE user_id=$user_id";
		return DatabaseConnector::get_results($sql);
		
	}
	
}