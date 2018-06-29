<?php
function advanced_search($db_connect, $search, $asc_desc, $type, $name_grade, $media){

	if($name_grade == "grade")
	{
		$name_grade = '(SELECT AVG(grade) FROM listed_'.$media.'s WHERE id_'.$media.' = '.$media.'s.id_'.$media.')';
	}
	$req = "".$name_grade." ".$asc_desc;
	if(empty($type)){
		$types_name = "";
	}else{
		$types_name = "AND Types.name = ";
	}

	$SQL = 'SELECT DISTINCT '.$media.'s.image, '.$media.'s.title,(SELECT AVG(grade) FROM listed_'.$media.'s WHERE id_'.$media.' = '.$media.'s.id_'.$media.'), '.$media.'s.id_'.$media.'
	FROM '.$media.'s 
	JOIN '.$media.'_types ON '.$media.'_types.id_'.$media.' = '.$media.'s.id_'.$media.'
	JOIN types ON '.$media.'_types.id_type = types.id_type
	WHERE '.$media.'s.title LIKE "%'.$search.'%"
	'.$types_name.' "'.$type.'"
	ORDER BY '.$req.' ';
	
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
	if(isset($_SESSION['id'])){
		$SQL = 'SELECT id_member FROM members WHERE login = "'.$_SESSION['id'].'"';
		$REQ = mysqli_query($db_connect, $SQL);
		$tmp = mysqli_fetch_array($REQ, MYSQLI_NUM);
	}

	$SQL = 'SELECT DISTINCT t1.image, t1.title, t1.id_'.$media.', (SELECT AVG(grade) FROM listed_'.$media.'s WHERE id_'.$media.' = t1.id_'.$media.') 
			FROM '.$media.'s AS t1 
			WHERE t1.title LIKE "%'.$search.'%" 
			ORDER BY t1.title ASC;';
	
	$REQ = mysqli_query($db_connect, $SQL);
	return $REQ;
}	
?>
	
