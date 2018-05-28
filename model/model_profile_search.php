<?php

$login = $_SESSION['id'];

function movie_profil_search($login, $search){

	$host = "localhost";
	$user = "root";
	$bdd = "im_bored";
	$password = "";

	$db_connexion = mysqli_connect($host, $user, $password, $bdd) or die ("Error can't connect to the database");
	
	$SQL = 'SELECT id_member FROM members WHERE login = "'.$login.'"';
	$REQ = mysqli_query($db_connexion, $SQL);

	$tmp = mysqli_fetch_array($REQ, MYSQLI_NUM);

	mysqli_free_result($REQ);
	
	$SQL = 'SELECT listed_movies.id_movie, movies.title, movies.image, listed_movies.grade 
	FROM listed_movies 
	JOIN members ON listed_movies.id_member = members.id_member 
	JOIN movies ON listed_movies.id_movie = movies.id_movie 
	WHERE movies.title LIKE "'.$search'"% 
	AND members.id_member = "'.$tmp[0].'"';
	
	$REQ = mysqli_query($db_connexion, $SQL);

	$movies = mysqli_fetch_array($REQ, MYSQLI_NUM);

	mysqli_free_result($REQ);
	return $movies;
}

function music_profil_search($login, $search){

	$host = "localhost";
	$user = "root";
	$bdd = "im_bored";
	$password = "";

	$db_connexion = mysqli_connect($host, $user, $password, $bdd) or die ("Error can't connect to the database");
	
	$SQL = 'SELECT id_member FROM members WHERE login = "'.$login.'"';
	$REQ = mysqli_query($db_connexion, $SQL);

	$tmp = mysqli_fetch_array($REQ, MYSQLI_NUM);

	mysqli_free_result($REQ);
	
	$SQL = 'SELECT listed_musics.id_music, musics.title, musics.image, listed_musics.grade 
			FROM listed_musics 
			JOIN members ON listed_musics.id_member = members.id_member 
			JOIN musics ON listed_musics.id_music = musics.id_music 
			WHERE musics.title LIKE "'.$search'"% 
			AND members.id_member = "'.$tmp[0].'"';
			
	$REQ = mysqli_query($db_connexion, $SQL);

	$musics = mysqli_fetch_array($REQ, MYSQLI_NUM);

	mysqli_free_result($REQ);
	return $musics;
}

?>