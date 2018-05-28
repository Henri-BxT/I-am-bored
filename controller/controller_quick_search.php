<?php
session_start();
require('../model/model_quick_search.php');

$search = $_GET['search'];
$format = $_GET['format'];

$liste = mysqli_fetch_all(quick_search($search, $format), MYSQLI_NUM);
if(!empty($liste)){
    echo '<tr>';
    foreach($liste as $array){
        foreach($array as $media){
            echo '<td>'.$media.'</td></tr>';
        }
    }
}else{
    echo 'No result found.</br>';
}
?>
