<?php

require("C:\wamp\www\PI\VIEW\\view_logout.php");

if(isset($_POST['logout']))
{
	session_destroy();
	header("Location: view_accueil.php");
}
?>