<?php
session_start();
require_once("../view/view_profile_list.html");
$db_connect = mysqli_connect("localhost", "root", "", "im_bored") or die ("Error can't connect to the database");

if(isset($_REQUEST['movie_search'])){
	if(empty($_REQUEST['movie_search']) || $_REQUEST['movie_search'] == " "){	
		require("../model/model_profile_list.php");
		$select = "title";
		$table = "MOVIES";
		$column = "id_movie";
		$id = $_SESSION['id'];
		$liste = mysqli_fetch_all(profile_list($db_connect,$select,$table,$column,$id), MYSQLI_NUM) or die ("Error can't connect to the database");
		if(!empty($liste)){
			echo "<tr>";
			foreach($liste as $array){
				foreach($array as $movie){
					echo "<td>".$movie."</td></tr>";
				}
			};
		}else{
			echo "Your list is empty.<BR>";
		}
	}else if(isset($_REQUEST['movie_search'])){
		$search = $_REQUEST['movie_search'];
<<<<<<< HEAD
		$search = (string) $search;
		$order = $_REQUEST['sort'];
		print("$order");
		require_once("../model/model_profile_search.php");
		$movies = mysqli_fetch_all(movie_profil_search($search, $order), MYSQLI_NUM);
		print_r($movies);
=======
		$search = (string) $search;	
		require_once("../model/model_profile_search.php");
		$liste = mysqli_fetch_all(movie_profil_search($search,$db_connect), MYSQLI_NUM);
		if(!empty($liste)){
			echo "<tr>";
			foreach($liste as $array){
				$compt = 0;
				foreach($array as $movie){
					echo "<td>".$movie."</td>";
				}
			echo "</tr>";
			}
		}else{
			echo "Your list is empty.<BR>";
		}
>>>>>>> 59a8e115c6df38fe9609a1adfcd14f387a99b565
	}else{
		print("Not found");
	}
}else {
	require("../model/model_profile_list.php");
	$select = "title";
	$table = "MOVIES";
	$column = "id_movie";
	$id = $_SESSION['id'];
	$liste = mysqli_fetch_all(profile_list($db_connect,$select,$table,$column,$id), MYSQLI_NUM) or die ("Error can't connect to the database");
	if(!empty($liste)){
		echo "<tr>";
		foreach($liste as $array){
			foreach($array as $movie){
				echo "<td>".$movie."</td>";
			}
		echo "</tr>";
		};
	}else{
		echo "Your list is empty.<BR>";
	}
}
mysqli_close($db_connect);
echo "</TABLE></CENTER><BR><a href='controller_profil.php'>Retour</a></BODY></HTML>"
?>