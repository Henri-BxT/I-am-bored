<?php
//Information search on the media
function display_info($db_connect, $media, $id){
    $sql = mysqli_query($db_connect, 'SELECT t1.title, t1.date_diffusion, t1.image, t1.synopsis, t2.grade
                                        FROM '.$media.'s t1
                                        JOIN LISTED_'.$media.'s t2 ON t1.id_'.$media.' = t2.id_'.$media.' 
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