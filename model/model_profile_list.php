<?php
function profile_list($db_connect,$select,$table,$column,$id){
    $list =  mysqli_query($db_connect,"SELECT $select
                                        FROM $table
                                        INNER JOIN LISTED_$table LIST ON $table.$column = LIST.$column
                                        AND id_member = (SELECT id_member FROM MEMBERS WHERE login='$id')
                                        ORDER BY (SELECT favorit FROM LISTED_$table WHERE favorit='1')ASC, title ASC;");
    return $list;
}
?>