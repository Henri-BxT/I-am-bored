<?php
require_once("../db_connect.php");
$db_connect = db_connect();

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