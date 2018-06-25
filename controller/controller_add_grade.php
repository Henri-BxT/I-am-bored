<?php
session_start();
require("../model/model_add_rate.php");
require("../model/model_manage_list.php");
$verif = verif_l($_GET["media"], $_SESSION["id"], $_GET["id"]);
if(!isset($verif[0])) {	
	add_l($_GET["media"], $_SESSION["id"], $_GET["id"]);
}
add_grade_movie($_GET["media"], $_GET["grade"],$_GET["id"]);
header("Location: controller_display_informations.php?grade=".$_GET["grade"]."&media=".$_GET["media"]."&id=".$_GET['id']."");
?>