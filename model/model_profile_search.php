<?php

function type_movie_search($media){
	
	$db_connect = mysqli_connect("localhost", "root", "", "im_bored") or die ("Error can't connect to the database");
	
	$login = $_SESSION['id'];
	
	$SQL = 'SELECT id_member FROM members WHERE login = "'.$login.'"';
	$REQ = mysqli_query($db_connect, $SQL);
	
	$tmp = mysqli_fetch_array($REQ, MYSQLI_NUM);
	
	$SQL = 'SELECT DISTINCT Types.name
	FROM listed_'.$media.'s 
	JOIN members ON listed_'.$media.'s.id_member = members.id_member 
	JOIN '.$media.'s ON listed_'.$media.'s.id_'.$media.' = '.$media.'s.id_'.$media.'
	JOIN '.$media.'_types ON '.$media.'_types.id_'.$media.' = '.$media.'s.id_'.$media.'
	JOIN types ON '.$media.'_types.id_type = types.id_type
	WHERE  members.id_member = "'.$tmp[0].'"
	ORDER BY Types.name ASC';
	
	$REQ = mysqli_query($db_connect, $SQL);
	return $REQ;
}

function movie_profil_search($db_connect, $search, $asc_desc, $type, $name_grade, $media){

	$req = "listed_".$media."s.favorit DESC, ".$name_grade." ".$asc_desc;
	if(empty($type)){
		$types_name = "";
	}else{
		$types_name = "AND Types.name = ";
	}
	
	$login = $_SESSION['id'];
	
	$SQL = 'SELECT id_member FROM members WHERE login = "'.$login.'"';
	$REQ = mysqli_query($db_connect, $SQL);

	$tmp = mysqli_fetch_array($REQ, MYSQLI_NUM);
	$SQL = 'SELECT DISTINCT '.$media.'s.image, '.$media.'s.title, listed_'.$media.'s.grade, '.$media.'s.id_'.$media.'
	FROM listed_'.$media.'s 
	JOIN members ON listed_'.$media.'s.id_member = members.id_member 
	JOIN '.$media.'s ON listed_'.$media.'s.id_'.$media.' = '.$media.'s.id_'.$media.'
	JOIN '.$media.'_types ON '.$media.'_types.id_'.$media.' = '.$media.'s.id_'.$media.'
	JOIN types ON '.$media.'_types.id_type = types.id_type
	WHERE '.$media.'s.title LIKE "%'.$search.'%"
	AND members.id_member = "'.$tmp[0].'" 
	'.$types_name.' "'.$type.'"
	ORDER BY '.$req.' ';
	
	
	$REQ = mysqli_query($db_connect, $SQL);
	return $REQ;
}
?>
