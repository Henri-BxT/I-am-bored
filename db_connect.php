<?php
function db_connect(){
    $host = "localhost";
    $id = "root";
    $mdp = "";
    $nomDB = "im_bored";
    $db_connect = mysqli_connect($host, $id, $mdp, $nomDB) or die ("Error can't connect to the database");

    return $db_connect;
}
?>