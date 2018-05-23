<?php
if(!empty($_POST['password']) and !empty($_POST['id']) and !empty($_POST['password2'])){
    //If the two passwords aren't the same
    if($_POST['password'] !== $_POST['password2']){
        echo "The passwords are differents<br>";
        require_once("../view/view_registration.html");
        exit();
    } else {
        $db_connect = mysqli_connect("localhost", "root", "", "im_bored");
        //exit if fail to connect DB
        if (mysqli_connect_errno()) {
            printf("Échec de la connexion : %s\n", mysqli_connect_error());
            exit();
        }
        //search the database to see if the id already exist
        $search = false;
        $id_search = mysqli_query($db_connect, "SELECT login
                                                FROM MEMBERS
                                                WHERE login = '".$_POST['id']."';");
        $tmp = mysqli_fetch_array($id_search, MYSQLI_NUM);
        mysqli_free_result($id_search);
        if(!empty($tmp)){
            foreach($tmp as $id){
                if($id === $_POST['id']){
                    //ID already exists
                    echo"ID already exists<br>";
                    require_once("../view/view_registration.html");
                    $search = true;
                }
            }
        }
        //No errors, the user is registred
        if($search !== true){
            $id = $_POST['id'];
            require("controller_encrypt.php");
            $password = encrypt($_POST['password'], "MyKeyIsUmbreakable");
            $result = mysqli_query($db_connect, "INSERT INTO MEMBERS VALUES (NULL,'$id','$password');");
            echo "You were registred with the id : ".$_POST['id'].", and the password : ".$_POST['password'];
            echo "<br><a href='../view/view_home_page.html'>Retour</a>";
        }
        mysqli_close($db_connect);
    }
//if a field is empty
} else {
    echo "One of the fields is empty";
    require_once("../view/view_registration.html");
}
?>