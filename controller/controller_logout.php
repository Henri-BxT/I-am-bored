<?php
if(!isset($_POST['delete'])){
    session_start();
}
unset($_SESSION['id']);
unset($_SESSION['id2']);
session_destroy();
require("controller_home_page.php");
?>