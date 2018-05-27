<?php

$login = $_SESSION['id'];

function add_grade_movie($SESSION,$POST){
	
	$host = "localhost";
	$user = "root";
	$bdd = "im_bored";
	$password = "";

	$db_connexion = mysqli_connect($host, $user, $password, $bdd) or die ("Error can't connect to the database");

	$SQL = 'SELECT id_member FROM members WHERE login = "'.$login.'"';
	$REQ = mysqli_query($db_connexion, $SQL);

	$tmp = mysqli_fetch_array($REQ, MYSQLI_NUM);

	mysqli_free_result($REQ);
	
	/*UPDATE listed_movies 
	JOIN members
	ON listed_movies.id_member = members.id_member
	AND "1" = listed_movies.id_movie
	SET listed_movies.grade = "5";
	*/
	
	$SQL = 'UPDATE listed_movies JOIN members ON listed_movies."'.$tmp[0].'" = members."'.$tmp[0].'"  AND "'.$id_works.'" = listed_movie."'.$id_works.'" SET listed_movies.grade = "'.$grade.'"';
	$REQ = mysqli_query($db_connexion, $SQL);


}

function add_grade_music($SESSION,$POST){
	
	$host = "localhost";
	$user = "root";
	$bdd = "im_bored";
	$password = "";

	$db_connexion = mysqli_connect($host, $user, $password, $bdd) or die ("Error can't connect to the database");

	$SQL = 'SELECT id_member FROM members WHERE login = "'.$login.'"';
	$REQ = mysqli_query($db_connexion, $SQL);

	$tmp = mysqli_fetch_array($REQ, MYSQLI_NUM);

	mysqli_free_result($REQ);
	
	/*UPDATE listed_musics 
	JOIN members
	ON listed_musics.id_member = members.id_member
	AND "1" = listed_musics.id_music
	SET listed_musics.grade = "5";
	*/
	
	$SQL = 'UPDATE listed_musics JOIN members ON listed_musics."'.$tmp[0].'" = members."'.$tmp[0].'"  AND "'.$id_works.'" = listed_music."'.$id_works.'" SET listed_musics.grade = "'.$grade.'"';
	$REQ = mysqli_query($db_connexion, $SQL);


}

?>

