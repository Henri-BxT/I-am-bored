<?php
//Information search on the media
function display_info_movie($db_connect, $media, $id){
    $sql = mysqli_query($db_connect, 'SELECT t1.title, t1.aired, t1.image, t1.synopsis, t3.first_name, t3.last_name
                                        FROM '.$media.'s t1
                                        JOIN directed as t2 ON t2.id_movie = "'.$id.'"
                                        JOIN directors as t3 ON t3.id_director = t2.id_director
                                        WHERE t1.id_'.$media.' = "'.$id.'"');
    return $sql;
}
function display_actors($db_connect, $media, $id){
    $sql = mysqli_query($db_connect, 'SELECT t3.first_name, t3.last_name
                                        FROM '.$media.'s t1
                                        JOIN PLAYED_MOVIES as t2 ON t2.id_movie = "'.$id.'"
                                        JOIN actors as t3 ON t3.id_actor = t2.id_actor
                                        WHERE t1.id_'.$media.' = "'.$id.'"');
    return $sql;
                                    
}
function display_info_music($db_connect, $media, $id){
    $sql = mysqli_query($db_connect, 'SELECT t1.title, t1.aired, t1.image, t3.name
                                        FROM '.$media.'s t1
                                        JOIN PLAYED_MUSICS as t2 ON t2.id_music = "'.$id.'"
                                        JOIN GROUPS as t3 ON t2.id_group = t3.id_group
                                        WHERE t1.id_'.$media.' = "'.$id.'"');
    return $sql;
}

//Search if the media is in the list of the user
function search_list($db_connect, $media, $id_media, $id_member){
    $sql = mysqli_query($db_connect, 'SELECT id_'.$media.'
                                        FROM listed_'.$media.'s
                                        WHERE id_'.$media.' = "'.$id_media.'"
                                        AND id_member = "'.$id_member.'"');
    return $sql;
}
//Search if the media is a favorit of the user
function search_favorit($db_connect, $media, $id_media, $id_member){
    $sql = mysqli_query($db_connect, 'SELECT favorit
                                        FROM listed_'.$media.'s
                                        WHERE id_'.$media.' = '.$id_media.'
                                        AND id_member = "'.$id_member.'"');
    return $sql;
}