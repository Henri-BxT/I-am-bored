<?php

$login = $_SESSION['id'];

function movie_profil_search($SESSION, $POST){

	$host = "localhost";
	$user = "root";
	$bdd = "im_bored";
	$password = "";

	$db_connexion = mysqli_connect($host, $user, $password, $bdd) or die ("Error can't connect to the database");
	
	$SQL = 'SELECT id_member FROM members WHERE login = "'.$login.'"';
	$REQ = mysqli_query($db_connexion, $SQL);

	$tmp = mysqli_fetch_array($REQ, MYSQLI_NUM);

	mysqli_free_result($REQ);
	
	$SQL = 'SELECT listed_movies.id_movie, movies.title, movies.image, listed_movies.grade FROM listed_movies JOIN members ON listed_movies."'.$tmp[0].'" = members."'.$tmp[0].'" JOIN movies ON listed_movies.id_movie = movies.id_movies';
	$REQ = mysqli_query($db_connexion, $SQL);

	$movies = mysqli_fetch_array($REQ, MYSQLI_NUM);

	mysqli_free_result($REQ);
}

function music_profil_search($SESSION, $POST){

	$host = "localhost";
	$user = "root";
	$bdd = "im_bored";
	$password = "";

	$db_connexion = mysqli_connect($host, $user, $password, $bdd) or die ("Error can't connect to the database");
	
	$SQL = 'SELECT id_member FROM members WHERE login = "'.$login.'"';
	$REQ = mysqli_query($db_connexion, $SQL);

	$tmp = mysqli_fetch_array($REQ, MYSQLI_NUM);

	mysqli_free_result($REQ);
	
	$SQL = 'SELECT listed_musics.id_music, musics.title, musics.image, listed_musics.grade FROM listed_musics JOIN members ON listed_musics."'.$tmp[0].'" = members."'.$tmp[0].'" JOIN musics ON listed_musics.id_musics = musics.id_musics';
	$REQ = mysqli_query($db_connexion, $SQL);

	$musics = mysqli_fetch_array($REQ, MYSQLI_NUM);

	mysqli_free_result($REQ);
}

?>