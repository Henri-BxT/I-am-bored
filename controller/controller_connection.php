<?php
require("functions/controller_encrypt.php");
if(!empty($_POST['id']) and !empty($_POST['password'])){
    $id = $_POST['id'];
    $password = $_POST['password'];
    //Encrypt the received password and 
    //compare it to the password attached to the id in the database
    $password = encrypt($_POST['password'], "MyKeyIsUmbreakable");
    $id = str_replace( "'",".",$id);
    require_once("../db_connect.php");
    $db_connect = db_connect();
    require("../model/model_connection.php");

    $tmp = mysqli_fetch_array(connect($db_connect,$id,$password), MYSQLI_NUM);
    if(!empty($tmp)){
        //No errors
        if(strtolower($id) === strtolower($tmp[0]) and $password === $tmp[1]){
            session_start();
            $_SESSION['id'] = $tmp[0];
            $_SESSION['id2'] = str_replace(".","'",$_SESSION['id']);
            require_once("controller_member_home_page.php");
        } 
    //Error with the id or password
    mysqli_close($db_connect);
    } else {
        require_once("../view/view_sign_in.html");
        echo "<font color='red'>Wrong id or password</font>";
    }
} else {
    require_once("../view/view_sign_in.html");
    echo "<font color='red'><b><center>Fill the requiered fileds to connect</font></b></center>";
}
?>