<?php
require("functions/controller_encrypt.php");
if(!empty($_POST['id']) and !empty($_POST['password'])){
    $id = $_POST['id'];
    $password = $_POST['password'];
    //Encrypt the received password and 
    //compare it to the password attached to the id in the database
    $password = encrypt($_POST['password'], "MyKeyIsUmbreakable");
    $db_connect = mysqli_connect("localhost", "root", "", "im_bored");
    require("../model/model_connection.php");
    $tmp = mysqli_fetch_array(connect($db_connect,$id,$password), MYSQLI_NUM);
    if(!empty($tmp)){
        //No errors
        if($id === $tmp[0] and $password === $tmp[1]){
            session_start();
            $_SESSION['id'] = $id;
            require_once("controller_member_home_page.php");
        } 
    //Error with the id or password
    mysqli_close($db_connect);
    } else {
        echo "Wrong id or password<br>";
        require_once("../view/view_sign_in.html");
    }
} else {
    echo "One of the fields is empty<br>";
    require_once("../view/view_sign_in.html");
}
?>