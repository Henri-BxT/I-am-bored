<?php
session_start();
require_once("../view/view_profile_list.html");
$db_connect = mysqli_connect("localhost", "root", "", "im_bored");
require("../model/model_profile_list.php");
$select = "title";
$table = "MUSICS";
$column = "id_music";
$id = $_SESSION['id'];
$liste = mysqli_fetch_all(profile_list($db_connect,$select,$table,$column,$id), MYSQLI_NUM);
if(!empty($liste)){
    echo "<tr>";
    foreach($liste as $array){
        foreach($array as $music){
            echo "<td>".$music."</td></tr>";
        }
    };
}else{
    echo "Your list is empty.<BR>";
}
mysqli_close($db_connect);
echo "</TABLE></CENTER><BR><a href='controller_profil.php'>Retour</a></BODY></HTML>"
?>