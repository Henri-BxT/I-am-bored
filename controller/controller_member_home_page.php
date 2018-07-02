<?php
if(!isset($_SESSION['id'])){
    session_start();
}
require_once("../db_connect.php");
$db_connect = db_connect();

require_once("../view/view_member_home_page.html");
require("../model/model_registration_id_search.php");
require_once("../model/model_suggestion.php");

$id = mysqli_fetch_array(id_search($db_connect, $_SESSION['id']));
$liste = suggestion($db_connect, "movie", $id[0]);
if(!empty($liste)){
    echo "Suggestions :<p>";
    echo "<td class='class_table2'><a href='controller_display_informations.php?id=".$liste['id_movie']."&media=movie'><img src=".$liste['image']." width='150' height='250px'></a><br><a href='controller_display_informations.php?id=".$liste['id_movie']."&media=movie'>".$liste["title"]."</a><br>";
    for($i=0;$i<5;$i++){
        if($i<=$liste['grade']){
            echo"<img src='../ressources/icons/full_star.png' width='20px' height='20px'>";
        }else{
            echo"<img src='../ressources/icons/empty_star.png' width='20px' height='20px'>";
        }
    }
    echo "</td></tr></center>";	
}else {
    echo "No movie suggestions for now<p>";
}
echo "<hr color='red'>";
$id = mysqli_fetch_array(id_search($db_connect, $_SESSION['id']));
$liste = suggestion($db_connect, "music", $id[0]);
if(!empty($liste)){
    echo "<center>";
    echo "<td class='class_table2'><a href='controller_display_informations.php?id=".$liste['id_music']."&media=music'><img src=".$liste['image']." width='150' height='150px'></a><br><a href='controller_display_informations.php?id=".$liste['id_music']."&media=music'>".$liste["title"]."</a><br>";
    for($i=0;$i<5;$i++){
        if($i<=$liste['grade']){
            echo"<img src='../ressources/icons/full_star.png' width='20px' height='20px'>";
        }else{
            echo"<img src='../ressources/icons/empty_star.png' width='20px' height='20px'>";
        }
    }
    echo "</td></tr></center>";	
}else {
    echo "<p>No music suggestions for now";
}
?>