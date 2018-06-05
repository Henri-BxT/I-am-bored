<?php
function website_list($db_connect,$select,$table,$column){
    $list =  mysqli_query($db_connect,"SELECT $select
                                        FROM $table AS t1
                                        INNER JOIN LISTED_$table AS t2 ON t1.$column = t2.$column
                                        ORDER BY t1.title ASC;");
    return $list;
}
?>
