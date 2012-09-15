<?php
include_once('DatabaseConnector.php');
class User{
	
	public static function register($username,$email,$passhash){
        $sql = "DELETE FROM `email_queue` WHERE `email`='$email'";
        DatabaseConnector::query($sql);
		$sql = "INSERT INTO user (
					username,
					email,
                    passhash,
					registered_at
                )
                VALUES (
					'$username',
					'$email',
					'$passhash',
					CURRENT_TIMESTAMP
                )";
		DatabaseConnector::query($sql);
		return mysql_insert_id();
		
		}
    public static function registerEmail($email){
        $sql = "INSERT INTO ";
        die("User::registerEmail($email) is not implemented yet");
    }
	public static function getUser($user_id){
		$sql = "SELECT * FROM `user` WHERE user_id=$user_id";
		$user =  DatabaseConnector::get_single($sql);
        echo mysql_error();
        return $user;
	}
	public static function changeInformation($user_id,$name,$surname,$username,$phone,$email){
		
		$sql = "UPDATE user(name,
							surname,
							username,
							phone,
							email) 
							SET 
							($'name',
							$'surname',
							$'username',
							$phone,
							$'email') 
							WHERE 
							user_id=$user_id";
		DatabaseConnector::query($sql);
		
		}
	public static function validate($username,$password){
		
		
		
		}
	public static function listActiveItems($user_id){
		
		$sql = "SELECT * FROM owned_by O INNER JOIN item I ON I.item_id=O.item_id WHERE user_id=$user_id";
		return DatabaseConnector::get_results($sql);
		
		}
	
	public static function isUserExist($email){
		
		$sql = "SELECT 1 FROM user WHERE email='$email'";
		$result = DatabaseConnector::get_value($sql);
		if($result == 1)
			return true;
		else
			return false;
	
		}
	
	public static function passwordCheck($email,$password){

		$sql = "SELECT 1 FROM user WHERE email='$email' AND passhash='$password'";
		$result = DatabaseConnector::get_value($sql);
		
		if($result == 1)
			return true;
		else
			return false;
		
	}
	
	public static function getUserId($email){
		
		$sql = "SELECT user_id FROM user WHERE email='$email'";
		
		$result = DatabaseConnector::get_value($sql);
		
		return $result;
		
		}
	
	}
	
	

