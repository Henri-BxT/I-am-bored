<?php
function advanced_search($media){
	
	$db_connect = mysqli_connect("localhost", "root", "", "im_bored") or die ("Error can't connect to the database");
	$REQ = mysqli_query($db_connect, $SQL);
	
	$tmp = mysqli_fetch_array($REQ, MYSQLI_NUM);
	$SQL = 'SELECT DISTINCT t4.name
		FROM listed_'.$media.'s AS t1
		INNER JOIN '.$media.'s AS t2 ON t1.id_'.$media.' = t2.id_'.$media.'
		INNER JOIN '.$media.'_types AS t3 ON t3.id_'.$media.' = t2.id_'.$media.'
		INNER JOIN types AS t4 ON t3.id_type = t4.id_type
		ORDER BY t4.name ASC';
	
	$REQ = mysqli_query($db_connect, $SQL);
	return $REQ;
}

function quick_search($db_connect, $search, $asc_desc, $type, $name_grade, $media){	
	$req = "listed_".$media."s.favorit DESC ".$name_grade." ".$asc_desc;
	if(empty($type)){
		$types_name = "";
	}else{
		$types_name = "AND Types.name = ";
	}
	//Fetching the search
	$SQL = 'SELECT id_member FROM members WHERE login = "'.$_SESSION['id'].'"';
	$REQ = mysqli_query($db_connect, $SQL);
	$tmp = mysqli_fetch_array($REQ, MYSQLI_NUM);
	$SQL = 'SELECT t1.image, t1.title, t1.id_'.$media.'
			FROM '.$media.'s AS t1 
			INNER JOIN '.$media.'_types AS t2 ON t1.id_'.$media.' = t2.id_'.$media.' 
			INNER JOIN types AS t3 ON t2.id_type = t3.id_type 
			WHERE t1.title LIKE "%'.$search.'%"';
		
	$REQ = mysqli_query($db_connect, $SQL);
	return $REQ;
}	
?>
	
