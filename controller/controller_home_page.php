<?php
require_once("../view/view_home_page.php");
if(isset($_POST['delete'])){
    echo "<center><font color='red'>Your account has been deleted</font></center>";
}
require_once("../db_connect.php");
$db_connect = db_connect();

require("../model/model_suggestion.php");
$list = suggestion_non_co($db_connect, "movie");
if(!empty($list)){
    echo "<div align='left'><font color='red' face='arial'>Movies suggestions :</font></div>";
    echo "<center>";
    echo "<td class='class_table2'><a href='controller_display_informations.php?id=".$list['id_movie']."&media=movie'><img src=".$list['image']." width='150' height='250px'></a><br><a href='controller_display_informations.php?id=".$list['id_movie']."&media=movie'>".$list["title"]."</a><br>";
    for($i=0;$i<5;$i++){
        if($i<=$list['grade']){
            echo"<img src='../ressources/icons/full_star.png' width='20px' height='20px'>";
        }else{
            echo"<img src='../ressources/icons/empty_star.png' width='20px' height='20px'>";
        }
    }
    echo "</td></tr></center>";	
}
echo "<hr color='red'>";
$list = suggestion_non_co($db_connect, "music");
if(!empty($list)){
    echo "<div align='left'><font color='red' face='arial'>Musics suggestions :</font></div>";
    echo "<center>";
    echo "<td class='class_table2'><a href='controller_display_informations.php?id=".$list['id_music']."&media=music'><img src=".$list['image']." width='150' height='150px'></a><br><a href='controller_display_informations.php?id=".$list['id_music']."&media=music'>".$list["title"]."</a><br>";
    for($i=0;$i<5;$i++){
        if($i<=$list['grade']){
            echo"<img src='../ressources/icons/full_star.png' width='20px' height='20px'>";
        }else{
            echo"<img src='../ressources/icons/empty_star.png' width='20px' height='20px'>";
        }
    }
    echo "</td></tr></center>";	
}
?>