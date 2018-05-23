<?php

require_once("C:\wamp\www\PI\MODEL\FUNCTIONS\db_connect.php");
require("C:\wamp\www\PI\CONTROLLER\FUNCTIONS\controller_crypt.php");

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