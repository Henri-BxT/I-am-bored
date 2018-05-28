<?php
$search = $_GET['search'];
$format = $_GET['format'];

function quick_search($search, $format){
	try{
		//Connecting to MySQL
		$db = new PDO('mysql:host=localhost;dbname=im_bored;charset=utf8', 'root', '');
	}
	
	catch(Exception $e){
		//In case of error print message and stop
		die('Erreur : '.$e -> getMessage());
	}
	
	//Fetching the search
	$sql = $db -> query('SELECT t1.image, t1.title, t2.grade FROM '.$format.' AS t1 INNER JOIN listed_'.$format.' AS t2 ON t1.id_'.$format.' = t2.id_'.$format.' WHERE title = '.$search;.'%');
	$req = mysqli_query($db, $sql);

	$media_list = mysqli_fetch_array($req, MYSQLI_NUM);

	return $media_list;
}	
?>
	