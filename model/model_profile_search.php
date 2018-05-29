<?php

function type_movie_search(){
	
	$db_connect = mysqli_connect("localhost", "root", "", "im_bored") or die ("Error can't connect to the database");
	
	$login = $_SESSION['id'];
	
	$SQL = 'SELECT id_member FROM members WHERE login = "'.$login.'"';
	$REQ = mysqli_query($db_connect, $SQL);
	
	$tmp = mysqli_fetch_array($REQ, MYSQLI_NUM);
	
	$SQL = 'SELECT DISTINCT Types.name
	FROM listed_movies 
	JOIN members ON listed_movies.id_member = members.id_member 
	JOIN movies ON listed_movies.id_movie = movies.id_movie 
	JOIN movie_types ON movie_types.id_movie = movies.id_movie
	JOIN types ON movie_types.id_type = types.id_type
	WHERE  members.id_member = "'.$tmp[0].'"
	ORDER BY Types.name ASC';
	
	$REQ = mysqli_query($db_connect, $SQL);
	return $REQ;
}

function movie_profil_search($db_connect, $search, $order){
	
	$login = $_SESSION['id'];
	
	$SQL = 'SELECT id_member FROM members WHERE login = "'.$login.'"';
	$REQ = mysqli_query($db_connect, $SQL);

	$tmp = mysqli_fetch_array($REQ, MYSQLI_NUM);

	$SQL = 'SELECT DISTINCT movies.image, movies.title, listed_movies.grade
	FROM listed_movies 
	JOIN members ON listed_movies.id_member = members.id_member 
	JOIN movies ON listed_movies.id_movie = movies.id_movie 
	JOIN movie_types ON movie_types.id_movie = movies.id_movie
	JOIN types ON movie_types.id_type = types.id_type
	WHERE movies.title LIKE "'.$search.'%"
	AND members.id_member = "'.$tmp[0].'"
	ORDER BY '.$column.' '.$order.' ';
	
	
	$REQ = mysqli_query($db_connect, $SQL);
	return $REQ;
}
/*
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
			WHERE musics.title LIKE $search% 
			AND members.id_member = $tmp[0]';
			
	$REQ = mysqli_query($db_connexion, $SQL);

	$musics = mysqli_fetch_array($REQ, MYSQLI_NUM);

	mysqli_free_result($REQ);
	return $musics;
}
*/
?>