<?php

require 'Mysql.php';

class Membership {
	
	function validate_user($un, $pwd) {
		$mysql = new Mysql();
		$ensure_credentials = $mysql->verify_Username_and_Pass($un, md5($pwd));
		
		if($ensure_credentials) {
			$_SESSION['status'] = 'authorized';
			$_SESSION['username'] = $un;
			header("location: index.php");
		} else return "Please enter a correct username and password";
		
	} 
	
	function log_User_Out() {
		if(isset($_SESSION['status'])) {
			unset($_SESSION['status']);
			unset($_SESSION['username']);
			
			if(isset($_COOKIE[session_name()])) 
				setcookie(session_name(), '', time() - 1000);
				session_destroy();
		}
	}
	
	function confirm_Member() {
		session_start();
		if($_SESSION['status'] !='authorized') header("location: login.php");
	}
	
	function already_Logged_In() {
		if(isset($_SESSION['status'])) header("location: index.php");
	}
	
	function register_user($un, $pwd, $pwd2, $email) {
		if ($pwd !== $pwd2) { return "Passwords do not match!";} //user mistyped one of their passwords
		
		$mysql = new Mysql();
		$register = $mysql->register_new_user($un, md5($pwd), $email);
		
		if($register) {
			return "Successfully registered! <a href=\"./login.php\">Return to login</a>";
		} else {
			return "Username or email already in use.";
		}
		
	}
	
	function change_password($un, $oldpwd, $newpwd, $newpwd2) {
		if ($newpwd !== $newpwd2) { return "Passwords do not match!";} //user mistyped one of their passwords
		
		$mysql = new Mysql();
		$change = $mysql->change_password($un, md5($oldpwd), md5($newpwd));
		
		if($change) {
			return "Successfully changed password! <a href=\"./index.php\">Return to index</a>";
		} else {
			return "Incorrect password entered!";
		}
		
	} 
	
}