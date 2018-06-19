<?php
require("../model/model_add_rate.php");
add_grade_movie($_GET["media"], $_GET["grade"],$_GET["id"]);
header("Location: controller_display_informations.php?grade=".$_GET["grade"]."&media=".$_GET["media"]."&id=".$_GET['id']."");
?>