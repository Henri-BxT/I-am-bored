<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['id2']);
session_destroy();
header("location: controller_home_page.php");
?>