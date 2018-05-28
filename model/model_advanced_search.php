<?php
function advanced_search($search, $format, $filter){
	try{
		//Connecting to MySQL
		$db = new PDO('mysql:host=localhost;dbname=im_bored;charset=utf8', 'root', '');
	}
	
	catch(Exception $e){
		//In case of error print message and stop
		die('Erreur : '.$e -> getMessage());
	}
	
	//Fetching the search
	if($filter = 'grade'){
		$sql = $db -> query('SELECT t1.image, t1.title, t2.grade 
							FROM '.$format.' AS t1 INNER JOIN listed_'.$format.' AS t2 ON t1.id_'.$format.' = t2.id_'.$format.' 
							WHERE t1.title = '.$search;.'% 
							ORDER BY t2.grade ASC');
	} else if($filter = 'name'){
		$sql = $db -> query('SELECT t1.image, t1.title, t2.grade 
							FROM '.$format.' AS t1 INNER JOIN listed_'.$format.' AS t2 ON t1.id_'.$format.' = t2.id_'.$format.' 
							WHERE t1.title = '.$search;.'% 
							ORDER BY t1.title ASC');
	} else if($filter = 'type'){
		$type = $_GET['type'];
		$sql = $db -> query('SELECT t1.image, t1.title, t2.grade 
							FROM '.$format.' AS t1 INNER JOIN listed_'.$format.' AS t2 ON t1.id_'.$format.' = t2.id_'.$format.'
							INNER JOIN '.$format.'_types AS t3 ON t1.id_'.$format.' = t3.id_'.$format.'
							INNER JOIN types AS t4 ON t3.id_type = t4.id_type 
							WHERE t1.title = '.$search;.'% 
							AND t4.type = '.$type);
	}
	
	$req = mysqli_query($db, $sql);

	$media_list = mysqli_fetch_array($req, MYSQLI_NUM);

	return $media_list;
}	
?>