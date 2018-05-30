<?php
session_start();

require_once("../view/view_profile_list.html");

$db_connect = mysqli_connect("localhost", "root", "", "im_bored") or die ("Error can't connect to the database");

if(isset($_REQUEST[$_REQUEST['media'].'_search'])){
	$search = $_REQUEST[$_REQUEST['media'].'_search'];
	$search = (string) $search;
	
	if(!isset($_REQUEST['name_grade'])){
		$name_grade = "";
	}
	else if(empty($_REQUEST[$_REQUEST['media'].'_search'])){
		$name_grade = $_REQUEST['media'].'s.title';
	} else {
		$name_grade = $_REQUEST['name_grade'];
	}
	if(!isset($_REQUEST['asc_desc'])){
		$asc_desc = "";
	} else if(empty($_REQUEST['asc_desc'])){
		$name_grade = 'ASC';
	} else{
		$asc_desc = $_REQUEST['asc_desc'];
	}
	$type = $_REQUEST['type'];
	
	require_once("../model/model_profile_search.php");
	
	$liste = mysqli_fetch_all(movie_profil_search($db_connect,$search,$asc_desc, $type, $name_grade,$_REQUEST['media']), MYSQLI_NUM);
	
	if(!empty($liste)){
		echo "<tr>";
		foreach($liste as $array){
			foreach($array as $media){
				echo "<td>".$media."</td>";
			}
			echo "</tr>";
		}
	}else{
		print("Not found");
	}
}else{
	require("../model/model_profile_list.php");
	$select = "title";
	$table = strtoupper($_REQUEST['media'].'s');
	$column = "id_".$_REQUEST['media'];
	$id = $_SESSION['id'];
		
	$liste = mysqli_fetch_all(profile_list($db_connect,$select,$table,$column,$id), MYSQLI_NUM);
		
	if(!empty($liste)){
		echo "<tr>";
		foreach($liste as $array){
			foreach($array as $media){
				echo "<td>".$media."</td>";
			}
		echo "</tr>";
		}
	}else{
		echo "Your list is empty.<BR>";
	}
}
	
mysqli_close($db_connect);
echo "</TABLE></CENTER><BR><a href='controller_profil.php'>Retour</a></BODY></HTML>";
?>