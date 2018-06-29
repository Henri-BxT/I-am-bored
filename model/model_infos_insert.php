<?php
function verif_actor($db_connect,$lastname,$firstname){
    $verif_actor = mysqli_query($db_connect, "SELECT last_name, first_name, id_actor
                                                FROM actors
                                                WHERE last_name = '".$lastname."' AND first_name = '".$firstname."';");
    return $verif_actor;
}
function insert_actor($db_connect,$lastname,$firstname){
    mysqli_query($db_connect, "INSERT INTO actors VALUES(NULL, '".$lastname."', '".$firstname."');");
}
function search_id_type($db_connect,$type){
    $id_type = mysqli_query($db_connect, "SELECT id_type
                                                FROM types
                                                WHERE name = '".$type."';");
    return $id_type;
}
function search_id_movie($db_connect,$movie){
    $id_movie = mysqli_query($db_connect, "SELECT id_movie
                                                FROM movies
                                                WHERE name = '".$movie."';");
    return $id_movie;
}
function insert_type($db_connect,$id_movie,$id_type){
    mysqli_query($db_connect, "INSERT INTO movie_types VALUES(NULL, '".$id_movie."', '".$id_type."');");
?>