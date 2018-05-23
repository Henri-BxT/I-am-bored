<?php
$host = "localhost";
$user = "root";
$bdd = "im_bored";
$password = "";

$db_connexion = mysqli_connect($host, $user, $password, $bdd) or die ("Error can't connect to the database");

require("functions/controller_encrypt.php");

$login = $_SESSION['id'];
$password = $_SESSION['password'];

$SQL = 'SELECT id_member FROM members WHERE login = "'.$login.'"';
$REQ = mysqli_query($db_connexion, $SQL);

$tmp = mysqli_fetch_array($REQ, MYSQLI_NUM);

mysqli_free_result($REQ);

$password = encrypt($password, "MyKeyIsUmbreakable");

$SQL = 'UPDATE members SET password = "'.$password.'" WHERE id_member = "'.$tmp[0].'"';
$REQ = mysqli_query($db_connexion, $SQL);

unset($_SESSION['password']);

mysqli_close($db_connexion);

?>