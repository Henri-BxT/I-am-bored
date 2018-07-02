<?php
if(!empty($_POST['password']) and !empty($_POST['id']) and !empty($_POST['password2'])){
    if(isset($_REQUEST['privacypolicies'])){
        //If the two passwords aren't the same
        if($_POST['password'] !== $_POST['password2']){
            echo "<center><b><font color='red'>The passwords are differents</font></b><p></center>";
            require_once("../view/view_registration.html");
            exit();
        } else if(strlen($_POST['id'])<3){
            echo "<center><b><font color='red'>Is that really your name ?</font></b><p></center>";
            require_once("../view/view_registration.html");
            exit();
        } else if(strlen($_POST['id'])>20){
            echo "There is no way I can remember that.</font></b><p></center>";
            require_once("../view/view_registration.html");
            exit();
        } else if(strlen($_POST['password'])<6){
            echo "<center><b><font color='red'>Size is still important.</font></b><p></center>";
            require_once("../view/view_registration.html");
            exit();
        } else if(strlen($_POST['password'])>14){
            echo "<center><b><font color='red'>I-impossible, it will never fit in.</font></b><p></center>";
            require_once("../view/view_registration.html");
            exit();
        } else if (strstr($_POST['password'], ".") or strstr($_POST['id'],".")){
            echo "<center><b><font color='red'>Please de not use '.'.</font></b><p></center>";
            require_once("../view/view_registration.html");
            exit();
        } else {
            require_once("../db_connect.php");
            $db_connect = db_connect();
            //exit if fail to connect DB
            if (mysqli_connect_errno()) {
                printf("Échec de la connexion : %s\n", mysqli_connect_error());
                exit();
            }
            //search the database to see if the id already exist
            require("../model/model_registration_id_search.php");
            $id = $_POST['id'];
            $id = strtoupper($id);
            for($i=0;$i<strlen($id);$i++){
                if(ord($id[$i])<65 or ord($id[$i])>90){
                    if(ord($id[$i])<47 or ord($id[$i])>57){
                        if(ord($id[$i]) !== 39 or ord($id[$i]) !== 45){
                            echo "<center><b><font color='red'>Unauthorized special caracter detected</font></b><p></center>";
                            require_once("../view/view_registration.html");
                            exit();
                        }
                    }
                }
            }
            $id = str_replace( "'",".",$id);
            $tmp = mysqli_fetch_array(idsearch($db_connect,$id), MYSQLI_NUM);
            if($tmp[0] === $id){
                //ID already exists
                echo "<center><b><font color='red'>ID already exists</font></b><p></center>";
                require_once("../view/view_registration.html");
                exit();
            }
            //No errors, the user is registred
            require("functions/controller_encrypt.php");
            $password = encrypt($_POST['password'], "MyKeyIsUmbreakable");
            require("../model/model_registration_insert.php");
            registration_insert($db_connect,$id,$password);
            echo "<center><b><font color='red'>You have been registered</font></b><p></center>";
            require_once("controller_home_page.php");
            mysqli_close($db_connect);
        }
    }else {
        echo "<center><font color='red'><b>You MUST read the chart of privacy policies</font></b><p></center>";
        require_once("../view/view_registration.html");
        exit();
    }
//if a field is empty
} else {
    require_once("../view/view_registration.html");
}
?>