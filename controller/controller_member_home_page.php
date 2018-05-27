<?php
if(!isset($_SESSION['id'])){
    session_start();
}
require_once("../view/view_member_home_page.html");
?>