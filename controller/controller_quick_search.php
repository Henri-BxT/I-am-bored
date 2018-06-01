<?php
session_start();
require_once("../view/view_quick_search.html");
require('../model/model_quick_search.php');

$search = $_GET['search'];
$format = $_GET['format'];

$liste = mysqli_fetch_all(quick_search($search, $format), MYSQLI_NUM);
if(!empty($liste)){
    echo "<center><table border='1'><tr>";
    foreach($liste as $array){
            echo "<td><a href='controller_display_informations.php?id=".$array[2]."&media=".$format."'>".$array[0]."</a></td><td><a href='controller_display_informations.php?id=".$array[2]."&media=".$format."'>".$array[1]."</a></td></tr>";
        }
    echo "</center></table>";
}else{
    echo '<center>No result found.</br></center>';
}
?>
