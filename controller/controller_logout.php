<?php
unset($_SESSION['id']);
session_destroy();
header("location: controller_home_page.php");
?>