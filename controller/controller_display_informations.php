<?php
session_start();
require_once("../view/view_display_informations.html");

$db_connect = mysqli_connect("localhost", "root", "", "im_bored") or die ("Error can't connect to the database");
require("../model/model_display_informations.php");
$data = mysqli_fetch_all(display_info($db_connect,$_REQUEST['media'],$_REQUEST['id']), MYSQLI_NUM);
if(!empty($data)){
    foreach($data as $infos){
        echo "<center><img src=".$infos[2]." width='200px' height='200px'><br>"." Title : ".$infos[0]."<br>Date : ".$infos[1]."<br>Synopsis : ".$infos[3]."<p></center>";
   }
    require("../model/model_registration_id_search.php");
    $id_member = mysqli_fetch_array(id_search($db_connect, $_SESSION['id']), MYSQLI_NUM);
    $data = mysqli_fetch_array(search_list($db_connect,$_REQUEST['media'],$_REQUEST['id'],$id_member[0]), MYSQLI_NUM);
    if(!empty($data)){
        $data = mysqli_fetch_array(search_favorit($db_connect,$_REQUEST['media'],$_REQUEST['id'],$id_member[0]), MYSQLI_NUM);
        if(!empty($data[0])){
            echo "<center>Déjà dans vos Favoris !<center>";
        }else{
            echo "<center>Déjà dans votre liste !<center>";
        }
    }
}else{
    print("Not found");
}
?>