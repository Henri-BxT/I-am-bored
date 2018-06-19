<?php
function add_grade_movie($media,$grade,$id_works){
	
	session_start();
	$host = "localhost";
	$user = "root";
	$bdd = "im_bored";
	$password = "";

	$db_connexion = mysqli_connect($host, $user, $password, $bdd) or die ("Error can't connect to the database");
	$REQ = mysqli_query($db_connexion, 'SELECT id_member FROM members WHERE login like "'.$_SESSION["id"].'"');
	$tmp = mysqli_fetch_array($REQ, MYSQLI_NUM);
	mysqli_free_result($REQ);
	$REQ = mysqli_query($db_connexion, 'UPDATE listed_'.$media.'s SET grade = "'.$grade.'" WHERE id_'.$media.' = "'.$id_works.'" AND id_member = "'.$tmp[0].'"');
}

function get_grade($media,$id_works) {
	
	$host = "localhost";
	$user = "root";
	$bdd = "im_bored";
	$password = "";

	$db_connexion = mysqli_connect($host, $user, $password, $bdd) or die ("Error can't connect to the database");
	$REQ = mysqli_query($db_connexion, 'SELECT id_member FROM members WHERE login like "'.$_SESSION["id"].'"');
	$tmp = mysqli_fetch_array($REQ, MYSQLI_NUM);
	mysqli_free_result($REQ);
	$REQ = mysqli_query($db_connexion, 'SELECT grade FROM listed_'.$media.'s WHERE id_'.$media.' = "'.$id_works.'" AND id_member = "'.$tmp[0].'"');
	$tmp = mysqli_fetch_array($REQ, MYSQLI_NUM);
	return $tmp[0];
}
?>

