<?php
session_start();
require('../model/model_advanced_search.php');

$search = $_GET['search'];
$format = $_GET['format'];
$filter = $_GET['filter'];

$liste = mysqli_fetch_all(advanced_search($search, $format, $filter), MYSQLI_NUM);
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