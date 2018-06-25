<?php
session_start();
require("../model/model_manage_list.php");
if(isset($_REQUEST['list'])){
    if($_REQUEST['list'] === "add"){
        add_l($_REQUEST['media'], $_SESSION['id'], $_REQUEST['id']);
        require("controller_display_informations.php");
    }else if($_REQUEST['list'] === "remove"){
        rem_l($_REQUEST['media'], $_SESSION['id'], $_REQUEST['id']);
        require("controller_display_informations.php");
    }
} else if(isset($_REQUEST['favorit'])){
    if($_REQUEST['favorit'] === "add"){
		$verif = verif_l($_GET["media"], $_SESSION["id"], $_GET["id"]);
		if(!isset($verif[0])) {	
			add_l($_GET["media"], $_SESSION["id"], $_GET["id"]);
		}
        add_f($_REQUEST['media'], $_SESSION['id'], $_REQUEST['id']);
        header("Location: controller_display_informations.php?media=".$_GET["media"]."&id=".$_GET['id']."");
    }else if($_REQUEST['favorit'] === "remove"){
        rem_f($_REQUEST['media'], $_SESSION['id'], $_REQUEST['id']);
        header("Location: controller_display_informations.php?media=".$_GET["media"]."&id=".$_GET['id']."");
    }
}
?>