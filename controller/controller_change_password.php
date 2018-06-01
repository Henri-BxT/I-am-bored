<?php
session_start();
require_once("../view/view_change_password.php");

$tmp_password= "";

// Button pressed
if(isset($_POST['validation'])){
	//If field password is empty
	if(empty($_POST['password']) || $_POST['password'] == " " || $_POST['password'] === "New Password"){	
		print("The field New Password is empty <br>");
	}
	//If the string is too small or too long
	else if(strlen($_POST['password']) < 6 || strlen($_POST['password']) > 14){
		print("The length is not respected <br>");
	}
	//If everythin is okay
	else{
		$tmp_password = $_POST['password'];
		//If field password is empty
		if(empty($_POST['pass_confirmation']) || $_POST['pass_confirmation'] == " "){	
			print("The field Re-type Password is empty <br>");
		}
		//If the first password is not the same as the confirmation
		else if($_POST['pass_confirmation'] != $tmp_password){
			print("The typed passwords are not the same");
		}
		////If the first password is the same as the confirmation
		else if($_POST['pass_confirmation'] == $tmp_password){
			$password = $_POST['pass_confirmation'];
			$password = (string) $password;
			$_SESSION['password'] = $password;
			require_once("../model/model_change_password.php");
			print("Reset confirmed");
		}
		//Else if it fail print Error message
		else{
			print("Error can't change the password");
		}
	}
}

?>