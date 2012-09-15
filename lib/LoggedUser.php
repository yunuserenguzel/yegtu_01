<?php
session_start();
class LoggedUser{
	
	public static function GetUserId(){
		return $_SESSION['LoggedUser']['Id'];
	}
	public static function LogInUser(
			$user_id,
			$user_email	
		){
		$_SESSION['LoggedUser'] = array(); 
		$_SESSION['LoggedUser']['Id'] = $user_id;
		$_SESSION['LoggedUser']['Email'] = $user_email;   
	}
	public static function IsUserLogged(){
        $result = false;
        if(isset($_SESSION['LoggedUser']))
            $result = true;
		return $result;
	}
	public static function LogOutUser(){
		unset($_SESSION['LoggedUser']);
	}
	
}