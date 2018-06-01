<?php

function quick_search($search, $format){
	$db_connect = mysqli_connect("localhost", "root", "", "im_bored") or die ("Error can't connect to the database");

	//Fetching the search
	$sql = 'SELECT t1.image, t1.title, t1.id_'.$format.' 
			FROM '.$format.'s t1 
			INNER JOIN listed_'.$format.'s t2 ON t1.id_'.$format.' = t2.id_'.$format.' 
			WHERE title LIKE "'.$search.'%"
			ORDER BY t1.title ASC';
		
	$req = mysqli_query($db_connect, $sql);

	return $req;
}	
?>
	
