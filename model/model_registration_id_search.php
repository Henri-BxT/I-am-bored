<?php 
function idsearch($db_connect,$id){
    $id_search = mysqli_query($db_connect, "SELECT login
                                            FROM MEMBERS
                                            WHERE login = '".$id."';");
    return $id_search;
}  
?>