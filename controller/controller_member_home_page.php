<?php
session_start();
if(!isset($_SESSION['id'])){
$_SESSION['id'] = $id;
}
require_once("../view/view_member_home_page.html");
?>