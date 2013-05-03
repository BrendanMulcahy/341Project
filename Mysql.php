<?php

require_once 'constants.php';

class Mysql {
	private $conn;
	
	function __construct() {
		$this->conn = new mysqli(HOST, USER, PW, DB) or 
					  die('There was a problem connecting to the database.');
	}
	
	function verify_Username_and_Pass($un, $pwd) {
				
		$query = "SELECT *
				FROM user
				WHERE username = ? AND password = ?
				LIMIT 1";
				
		if($stmt = $this->conn->prepare($query)) {
			$stmt->bind_param('ss', $un, $pwd);
			$stmt->execute();
			
			if($stmt->fetch()) {
				$stmt->close();
				return true;
			}
		}
	}
	
	function register_new_user($un, $pwd, $email) {
				
		$query = "SELECT *
				FROM user
				WHERE username = ? OR email = ?
				LIMIT 1";
				
		if($stmt = $this->conn->prepare($query)) {
			$stmt->bind_param('ss', $un, $email);
			$stmt->execute();
			
			//username or email already in use
			if($stmt->fetch()) {
				$stmt->close();
				return false;
			} else {
				$query = "	INSERT INTO `dota2admin`.`user` (`userID`, `userName`, `password`, `email`, `moderator`) 
				VALUES (NULL,
						?,
						?,
						?,
						'0')"; //moderator by default is false
				if($stmt = $this->conn->prepare($query)) {
					$stmt->bind_param('sss', $un, $pwd, $email);
					$stmt->execute();
					$stmt->close();
					return true;
				}
			}
		}	
	}
	
	function change_password($un, $oldpwd, $newpwd) {
				
		$query = "SELECT *
				FROM user
				WHERE username = ? AND password = ?
				LIMIT 1";
		
		//first find the old user and password
		if($stmt = $this->conn->prepare($query)) {
			$stmt->bind_param('ss', $un, $oldpwd);
			$stmt->execute();
			
			if($stmt->fetch()) {
				$stmt->close();
				
				$query = "	UPDATE `dota2admin`.`user`
							SET password = ?
							WHERE username = ?";
				if($stmt = $this->conn->prepare($query)) {
					$stmt->bind_param('ss', $newpwd, $un);
					$stmt->execute();
					$stmt->close();
					return true;
				}
			} else {
				return false; //old username + password combination not correct
			}
		}
	}
}