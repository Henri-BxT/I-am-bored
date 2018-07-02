<?php
require_once("../db_connect.php");
$db_connect = db_connect();

if(!isset($_POST['delete'])){
	session_start();
	require_once("../view/view_settings.html");

	$tmp_password= "";
}
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
			require_once("../model/model_settings.php");
			change_password($db_connect);
			print("Reset confirmed");
		}
		//Else if it fail print Error message
		else{
			print("Error can't change the password");
		}
	}
}
if(isset($_POST['delete'])){
	session_start();
	require_once("../db_connect.php");
	$db_connect = db_connect();
	require_once("../model/model_settings.php");
	require_once("../model/model_registration_id_search.php");
	$id_user = mysqli_fetch_array(id_search($db_connect, $_SESSION['id']), MYSQLI_NUM);
	delete_user($db_connect, $id_user[0], $_SESSION['id']);
	require("controller_logout.php");
	
}
?>