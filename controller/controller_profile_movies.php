<?php
session_start();
require_once("../view/view_profile_list.html");
$db_connect = mysqli_connect("localhost", "root", "", "im_bored");
if(isset($_REQUEST['sort'])){
    if($_REQUEST['sort'] === "ASC"){
        $sort = "ASC";
    }else if($_REQUEST['sort'] === "DESC"){
        $sort = "DESC";
    }else if($_REQUEST['sort'] === "type"){
        $sort = "ASC";
    }else if($_REQUEST['sort'] === "recent"){
        $sort = "ASC";
    }else if($_REQUEST['sort'] === "old"){
        $sort = "DESC";
    }
}
require("../model/model_profile_list.php");
$select = "title";
$table = "MOVIES";
$column = "id_movie";
$id = $_SESSION['id'];
$liste = mysqli_fetch_all(profile_list($db_connect,$select,$table,$column,$id,$sort), MYSQLI_NUM);
if(!empty($liste)){
    echo "<tr>";
    foreach($liste as $array){
        foreach($array as $movie){
            echo "<td>".$movie."</td></tr>";
        }
    };
}else{
    echo "Your list is empty.<BR>";
}
mysqli_close($db_connect);
echo "</TABLE></CENTER><BR><a href='controller_member_home_page.php'>Retour</a></BODY></HTML>"
?>