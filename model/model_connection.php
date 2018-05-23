<?php
function connect($db_connect,$id,$password){
    $connection = mysqli_query($db_connect, "SELECT login, password
                                            FROM MEMBERS
                                            WHERE login = '$id' 
                                            AND password = '$password';");
    return $connection;
}
?>