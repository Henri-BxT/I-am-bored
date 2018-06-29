<?php

//VERIFICATION AGAINST DOUBLE
function verif_actor($db_connect,$lastname,$firstname){
    $verif_actor = mysqli_query($db_connect, "SELECT last_name, first_name, id_actor
                                                FROM actors
                                                WHERE last_name = '".$lastname."' AND first_name = '".$firstname."';");
    return $verif_actor;
}
function verif_director($db_connect,$lastname,$firstname){
    $verif_director = mysqli_query($db_connect, "SELECT last_name, first_name, id_director
                                                FROM directors
                                                WHERE last_name = '".$lastname."' AND first_name = '".$firstname."';");
    return $verif_director;
}

//ID SEARCH
function search_id_type($db_connect,$type){
    $id_type = mysqli_query($db_connect, "SELECT id_type
                                                FROM types
                                                WHERE name = '".$type."';");
    return $id_type;
}
function search_id_movie($db_connect,$movie){
    $id_movie = mysqli_query($db_connect, "SELECT id_movie
                                                FROM movies
                                                WHERE title = '".$movie."';");
    return $id_movie;
}
function search_id_actor($db_connect,$lastname,$firstname){
    $id_actor = mysqli_query($db_connect, "SELECT id_actor
                                            FROM actors
                                            WHERE first_name = '".$firstname."' AND last_name = '".$lastname."';");
    return $id_actor;
}
function search_id_director($db_connect,$lastname,$firstname){
    $id_director = mysqli_query($db_connect, "SELECT id_director
                                            FROM directors
                                            WHERE first_name = '".$firstname."' AND last_name = '".$lastname."';");
    return $id_director;
}

//INSERTS
function insert_actor($db_connect,$lastname,$firstname){
    echo "INSERT INTO actors VALUES(NULL, '".$lastname."', '".$firstname."');<br>";
    mysqli_query($db_connect, "INSERT INTO actors VALUES(NULL, '".$lastname."', '".$firstname."');");
}
function insert_director($db_connect,$lastname,$firstname){
    echo "INSERT INTO directors VALUES(NULL, '".$lastname."', '".$firstname."');<br>";
    mysqli_query($db_connect, "INSERT INTO directors VALUES(NULL, '".$lastname."', '".$firstname."');");
}

function insert_played($db_connect,$id_actor,$id_movie){
    echo "INSERT INTO played_movies VALUES(NULL, '".$id_actor."', '".$id_movie."');<br>";
    mysqli_query($db_connect, "INSERT INTO played_movies VALUES(NULL, '".$id_actor."', '".$id_movie."');");
}
function insert_directed($db_connect,$id_director,$id_movie){
    echo "INSERT INTO directed VALUES(NULL, '".$id_director."', '".$id_movie."');<br>";
    mysqli_query($db_connect, "INSERT INTO directed VALUES(NULL, '".$id_director."', '".$id_movie."');");
}

function insert_type($db_connect,$id_movie,$id_type){
    echo "INSERT INTO movie_types VALUES(NULL, '".$id_movie."', '".$id_type."');<br>";
    mysqli_query($db_connect, "INSERT INTO movie_types VALUES(NULL, '".$id_movie."', '".$id_type."');");
}
function insert_movie($db_connect, $title, $date, $image, $plot){
    echo 'INSERT INTO movies VALUES(NULL, "'.$title.'", "'.$date.'", "'.$image.'", "'.$plot.'");<br>';
    mysqli_query($db_connect, 'INSERT INTO movies VALUES(NULL, "'.$title.'", "'.$date.'", "'.$image.'", "'.$plot.'");');
}
?>