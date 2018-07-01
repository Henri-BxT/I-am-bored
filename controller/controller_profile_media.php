<?php
session_start();
require_once("../view/view_profile_list.html");
require_once("../db_connect.php");
$db_connect = db_connect();
if(isset($_REQUEST[$_REQUEST['media'].'_search'])){
	$search = $_REQUEST[$_REQUEST['media'].'_search'];
	$search = (string) $search;
	
	if(!isset($_REQUEST['name_grade'])){
		$name_grade = $_REQUEST['media'].'s.title';
	} else {
		$name_grade = $_REQUEST['name_grade'];
	}
	if(!isset($_REQUEST['asc_desc'])){
		$asc_desc = "ASC";
	} else{
		$asc_desc = $_REQUEST['asc_desc'];
	}
	$type = $_REQUEST['type'];
	
	require_once("../model/model_profile_search.php");
	
	$liste = mysqli_fetch_all(movie_profil_search($db_connect,$search,$asc_desc, $type, $name_grade, $_REQUEST['media']), MYSQLI_NUM);
	
	if(!empty($liste)){
		echo "<table><tr>";
		foreach($liste as $array){
			if($array[2]===null){
				$array[2] = "Pas de note";
			}	
			echo "<td><a href='controller_display_informations.php?id=".$array[3]."&media=".$_REQUEST['media']."'><img src=".$array[0]." width='100' height='100px'></a></td><td><a href='controller_display_informations.php?id=".$array[3]."&media=".$_REQUEST['media']."'>".$array[1]."</a></td><td>";
			for($i=1;$i<6;$i++){
				if($i<=$array[2]){
					echo"<img src='../ressources/icons/full_star.png' width='20px' height='20px'>";
				}else{
					echo"<img src='../ressources/icons/empty_star.png' width='20px' height='20px'>";
				}
			}
			echo "</td>";
			if($array[4] === "1"){
				echo "<td><img src='../ressources/icons/unfavorit.png' width='20px' height='20px'></td></tr>";
			}else{
				echo "<td><img src='../ressources/icons/favorit.png' width='20px' height='20px'></td></tr>";
			}
	
		}
		echo "</center></table>";
	}else{
		echo"Not found</center>";
	}
}else{
	require("../model/model_profile_list.php");
	$select = ' '.$_REQUEST['media'].'s.id_'.$_REQUEST['media'].', image, title, LIST.grade, LIST.favorit';
	$table = strtoupper($_REQUEST['media'].'s');
	$column = "id_".$_REQUEST['media'];
	$id = $_SESSION['id'];
		
	$liste = mysqli_fetch_all(profile_list($db_connect,$select,$table,$column,$id), MYSQLI_NUM);
		
	if(!empty($liste)){
		echo "<center><table><tr>";
		foreach($liste as $array){
			echo "<td><a href='controller_display_informations.php?id=".$array[0]."&media=".$_REQUEST['media']."'><img src=".$array[1]." width='100' height='100px'></a></td><td><a href='controller_display_informations.php?id=".$array[0]."&media=".$_REQUEST['media']."'>".$array[2]."</a></td><td>";
			for($i=1;$i<6;$i++){
				if($i<=$array[3]){
					echo"<img src='../ressources/icons/full_star.png' width='20px' height='20px'>";
				}else{
					echo"<img src='../ressources/icons/empty_star.png' width='20px' height='20px'>";
				}
			}

			echo "</td>";
			if($array[4] === "1"){
				echo "<td><img src='../ressources/icons/unfavorit.png' width='20px' height='20px'></td></tr>";
			}else{
				echo "<td><img src='../ressources/icons/favorit.png' width='20px' height='20px'></td></tr>";
			}
		}
		echo "</center></table>";

	}else{
		echo "Your list is empty.<br>";
	}
}
	
mysqli_close($db_connect);
?>
