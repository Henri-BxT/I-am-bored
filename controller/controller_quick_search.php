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
            echo "<td>".$array[0]."</td><td>".$array[1]."</td></tr>";
        }
    echo "</center></table>";
}else{
    echo '<center>No result found.</br></center>';
}
?>
