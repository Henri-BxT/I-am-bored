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
    } else {
        $db_connect = mysqli_connect("localhost", "root", "", "im_bored");
        //exit if fail to connect DB
        if (mysqli_connect_errno()) {
            printf("Échec de la connexion : %s\n", mysqli_connect_error());
            exit();
        }
        //search the database to see if the id already exist
        $search = false;
        require("../model/model_registration_id_search.php");
        $tmp = mysqli_fetch_array(idsearch($db_connect,$_POST['id']), MYSQLI_NUM);
        mysqli_free_result(idsearch($db_connect,$_POST['id']));
        if(!empty($tmp)){
            foreach($tmp as $id){
                if($id === $_POST['id']){
                    //ID already exists
                    echo "ID already exists<br>";
                    require_once("../view/view_registration.html");
                    $search = true;
                }
            }
        }
        //No errors, the user is registred
        if($search !== true){
            $id = $_POST['id'];
            require("functions/controller_encrypt.php");
            $password = encrypt($_POST['password'], "MyKeyIsUmbreakable");
            require("../model/model_registration_insert.php");
            registration_insert($db_connect,$id,$password);
            echo "You were registred with the id : ".$_POST['id'].", and the password : ".$_POST['password'];
            echo "<br><a href='../view/view_home_page.html'>Retour</a>";
        }
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