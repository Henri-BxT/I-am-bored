<?php
if(!empty($_POST['password']) and !empty($_POST['id']) and !empty($_POST['password2'])){
    if(isset($_REQUEST['privacypolicies'])){
        //If the two passwords aren't the same
        if($_POST['password'] !== $_POST['password2']){
            echo "The passwords are differents<br>";
            require_once("../view/view_registration.html");
            exit();
        } else if(strlen($_POST['id'])<3){
            echo "Is that really your name ?<br>";
            require_once("../view/view_registration.html");
            exit();
        } else if(strlen($_POST['id'])>20){
            echo "There is no way I can remember that.<br>";
            require_once("../view/view_registration.html");
            exit();
        } else if(strlen($_POST['password'])<6){
            echo "Size is still important.<br>";
            require_once("../view/view_registration.html");
            exit();
        } else if(strlen($_POST['password'])>14){
            echo "I-impossible, it will never fit in.<br>";
            require_once("../view/view_registration.html");
            exit();
        } else if (strstr($_POST['password'], ".") or strstr($_POST['id'],".")){
            echo "Please de not use '.'.<br>";
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
            require("../model/model_registration_id_search.php");
            $id = $_POST['id'];
            $id = str_replace( "'",".",$id);
            $tmp = mysqli_fetch_array(idsearch($db_connect,$id), MYSQLI_NUM);
            if(!empty($tmp)){
                if($tmp[0] === $_POST['id']){
                    //ID already exists
                    echo "ID already exists<br>";
                    require_once("../view/view_registration.html");
                    exit();
                }
            }
            //No errors, the user is registred
            require("functions/controller_encrypt.php");
            $password = encrypt($_POST['password'], "MyKeyIsUmbreakable");
            require("../model/model_registration_insert.php");
            registration_insert($db_connect,$id,$password);
            echo "You were registred with the id : ".$_POST['id'].", and the password : ".$_POST['password'];
            echo "<br><a href='../view/view_home_page.php'>Retour</a>";

            mysqli_close($db_connect);
        }
    }else {
        echo "You MUST read the chart of privacy policies";
        require_once("../view/view_registration.html");
        exit();
    }
//if a field is empty
} else {
    echo "One of the fields is empty";
    require_once("../view/view_registration.html");
}
?>