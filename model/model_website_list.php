<?php
function website_list($db_connect,$select,$table,$column){
    $list =  mysqli_query($db_connect,"SELECT $select
                                        FROM $table AS t1
                                        ORDER BY t1.title ASC;");
    return $list;
}
?>
