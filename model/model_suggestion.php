<?php
$db_connect = mysqli_connect("localhost", "root", "", "im_bored") or die ("Error can't connect to the database");
// Single match
function match_value($db_connect, $media, $id_profil, $id_user){
    // Gets matching movies between connected user and a other user + the movies grade
    $common_req = "SELECT t1.id_".$media.", t1.grade, (SELECT t3.grade FROM listed_".$media."s AS t3 INNER JOIN ".$media."s AS t4 ON t3.id_".$media." = t4.id_".$media." WHERE t3.id_member = ".$id_user." AND t4.title = t2.title) AS grade2
                    FROM listed_".$media."s AS t1 
                    INNER JOIN ".$media."s AS t2 ON t1.id_".$media." = t2.id_".$media."
                    WHERE t1.id_member = ".$id_profil." AND t1.id_".$media." IN (SELECT t5.id_".$media." FROM listed_".$media."s AS t5 WHERE t5.id_member = ".$id_user.")";
    $result = mysqli_query($db_connect, $common_req);
    //$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    // Create matching movies array
    foreach($result as $key){
        $match_array[] = $key;
    }

    $match_len = count($match_array);
    $s = 0;

    // Substracting same movie grades
    for ($i=0; $i < $match_len; $i++){ 
        $grade = $match_array[$i]['grade'];
        $grade2 = $match_array[$i]['grade2'];
        
        $s += abs($grade - $grade2);
    }
    $match_value = $s / $match_len;

    return $match_value;
}

// Full match list
function match_list($db_connect, $media, $id_profil){
    $numb_user_req = "SELECT COUNT(id_member) AS numb_user FROM members"; // Counts the numbers of users
    $result = mysqli_query($db_connect, $numb_user_req);
    $numb_user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    for($i=1; $i <= $numb_user['numb_user']; $i++){
        if($i <> $id_profil){
            // Adds match value + profil id
            $match_list[] = array(match_value($db_connect, "movie", $id_profil, $i), $i);
        }
    }
    var_dump($match_list);
    return $match_list;
}

// Gives the profil with the best match value
function best_match($db_connect, $media, $id_profil){
    $match_list = match_list($db_connect, $media, $id_profil);
    $max = 0;
    foreach($match_list as $key) {
        if ($key[0] > $max) {
            $max = $key[1];
        }
    }
    $best_match = $max;
    echo "the best match profil id is : ".$best_match;
    return $best_match;
}

function suggestion($db_connect, $media, $id_profil){
    $best_match = best_match($db_connect, $media, $id_profil);
    $suggestion_req = "SELECT DISTINCT t3.image, t3.title, (SELECT AVG(t5.grade) FROM listed_".$media."s AS t5 WHERE t5.id_".$media." = t1.id_".$media.") AS grade
                        FROM listed_".$media."s AS t1 
                        JOIN members AS t2 ON t1.id_member = t2.id_member
                        JOIN ".$media."s AS t3 ON t1.id_".$media." = t3.id_".$media."
                        WHERE t2.id_member = ".$best_match." AND t3.id_".$media." NOT IN (SELECT t4.id_".$media." FROM listed_".$media."s AS t4 WHERE t4.id_member = ".$id_profil.")";

    $result = mysqli_query($db_connect, $suggestion_req);
    $REQ = mysqli_fetch_array($result, MYSQLI_ASSOC);
    var_dump($REQ);
    return $REQ;
}
?>