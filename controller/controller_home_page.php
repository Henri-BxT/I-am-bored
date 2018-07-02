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
    echo "<div align='left'><font color='red' face='arial'>Top movies suggestions :<p></font></div><table><tr>";
    for($i = 0; $i<5;$i++){
        echo "<td><a href='controller_display_informations.php?id=".$list[$i]['id_movie']."&media=movie'><img src=".$list[$i]['image']." width='150' height='250px'></a></td>";
    }
    echo "</tr><tr>";
    for($i = 0; $i<5;$i++){
        echo "<td width='10%'><a href='controller_display_informations.php?id=".$list[$i]['id_movie']."&media=movie'>".$list[$i]["title"]."</a></td>";
    }
    echo "</tr><tr>";
    for($i = 0; $i<5;$i++){
        echo "<td>";
        for($j=0;$j<5;$j++){
            if($j<=$list[$j]['grade']){
                echo"<img src='../ressources/icons/full_star.png' width='20px' height='20px'>";
            }else{
                echo"<img src='../ressources/icons/empty_star.png' width='20px' height='20px'>";
            }
        }
        echo "</td>";
    }
}
echo "</tr></table>";
echo "<hr color='red'>";

$list = suggestion_non_co($db_connect, "music");
if(!empty($list)){
    echo "<div align='left'><font color='red' face='arial'>Top musics suggestions :<p></font></div><table><tr>";
    for($i = 0; $i<5;$i++){
        echo "<td><a href='controller_display_informations.php?id=".$list[$i]['id_music']."&media=music'><img src=".$list[$i]['image']." width='150' height='150px'></a></td>";
    }
    echo "</tr><tr>";
    for($i = 0; $i<5;$i++){
        echo "<td width='10%'><a href='controller_display_informations.php?id=".$list[$i]['id_music']."&media=music'>".$list[$i]["title"]."</a></td>";
    }
    echo "</tr><tr>";
    for($i = 0; $i<5;$i++){
        echo "<td>";
        for($j=0;$j<5;$j++){
            if($j<=$list[$j]['grade']){
                echo"<img src='../ressources/icons/full_star.png' width='20px' height='20px'>";
            }else{
                echo"<img src='../ressources/icons/empty_star.png' width='20px' height='20px'>";
            }
        }
        echo "</td>";
    }
}
echo "</tr></table>";

/*
$list = suggestion_non_co($db_connect, "movie");
if(!empty($list)){
    echo "<div align='left'><font color='red' face='arial'>movies suggestions :</font></div>";
    echo "<center>";
    echo "<td class='class_table2'><a href='controller_display_informations.php?id=".$list[$i]['id_movie']."&media=movie'><img src=".$list[$i]['image']." width='150' height='150px'></a><br><a href='controller_display_informations.php?id=".$list[$i]['id_movie']."&media=movie'>".$list[$i]["title"]."</a><br>";
    for($i=0;$i<5;$i++){
        if($i<=$list[$i]['grade']){
            echo"<img src='../ressources/icons/full_star.png' width='20px' height='20px'>";
        }else{
            echo"<img src='../ressources/icons/empty_star.png' width='20px' height='20px'>";
        }
    }
    echo "</td></tr></center>";	
}*/
?>