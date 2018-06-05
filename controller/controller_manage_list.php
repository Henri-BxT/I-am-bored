<?php
session_start();
require("../model/model_manage_list.php");
if(isset($_REQUEST['list'])){
    if($_REQUEST['list'] === "add"){
        add_l($_REQUEST['media'], id($_SESSION['id']), $_REQUEST['id']);
        require("controller_display_informations.php");
        echo "<br>This has been added to your list";
    }else if($_REQUEST['list'] === "remove"){
        rem_l($_REQUEST['media'], id($_SESSION['id']), $_REQUEST['id']);
        require("controller_display_informations.php");
        echo "<br>This has been removed from your list";
    }
} else if(isset($_REQUEST['favorit'])){
    if($_REQUEST['favorit'] === "add"){
        add_f($_REQUEST['media'], id($_SESSION['id']), $_REQUEST['id']);
        require("controller_display_informations.php");
        echo "<br>This has been added to your list";
    }else if($_REQUEST['favorit'] === "remove"){
        rem_f($_REQUEST['media'], id($_SESSION['id']), $_REQUEST['id']);
        require("controller_display_informations.php");
        echo "<br>This has been removed from your list";
    }
}
?>