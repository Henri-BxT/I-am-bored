<?php
session_start();
require_once("../view/view_profile_list.html");
$db_connect = mysqli_connect("localhost", "root", "", "im_bored");
require("../model/model_profile_list.php");
$select = "title";
$table = "MUSICS";
$column = "id_music";
$id = $_SESSION['id'];
$liste = mysqli_fetch_array(profile_list($db_connect,$select,$table,$column,$id), MYSQLI_NUM);
if(!empty($liste)){
    foreach($liste as $music){
        echo $music;
    };
}else{
    echo "Your list is empty.<BR>";
}
echo "</TABLE></CENTER><BR><a href='controller_member_home_page.php'>Retour</a></BODY></HTML>"
?>