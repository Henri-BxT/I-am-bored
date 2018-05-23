<?php
function registration_insert($db_connect,$id,$password){
    mysqli_query($db_connect, "INSERT INTO MEMBERS VALUES (NULL,'$id','$password');");
}
?>