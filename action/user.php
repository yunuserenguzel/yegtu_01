<?php
include_once('../model/user.php');
if(isset($_GET['action'])){
	
	switch($_GET['action']){
		case 'logout':
			break;
	}
}
else if(isset($_POST['action'])){
	switch($_POST['action']){
		
		case 'login':
		
		$email = $_GET['email'];
		$password = $_GET['password'];
		if(User::isUserExist($email)){
			
			if(User::passwordCheck($password)){
				
				$id = User::getUserId($email);
				
				LoggedUser::LogInUser($id,$email);
				
			}//sifreyi yanlıs girerse kısmı eksik
			
		}
		
			break;
		
		case 'register':
			break;
		
		case 'validate_email':
			break;
			
	}
}