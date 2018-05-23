<?php
require("controller_encrypt.php");
if(!empty($_POST['id']) and !empty($_POST['password'])){
    $id = $_POST['id'];
    $password = $_POST['password'];
    $password = encrypt($_POST['password'], "MyKeyIsUmbreakable");
    $db_connect = mysqli_connect("localhost", "root", "", "im_bored");
    $id_search = mysqli_query($db_connect, "SELECT login, password
                                        FROM MEMBERS
                                        WHERE login = '$id' 
                                        AND password = '$password';");
    $tmp = mysqli_fetch_array($id_search, MYSQLI_NUM);
    mysqli_free_result($id_search);
    if(!empty($tmp)){
        if($id === $tmp[0] and $password === $tmp[1]){
            require_once("controller_member_home_page.php");
        } 
    } else {
        echo "Wrong id or password<br>";
        require_once("../view/view_home_page.html");
    }
} else {
    echo "One of the fields is empty<br>";
    require_once("../view/view_home_page.html");
}
?>