<?php
session_start();
require_once("../view/view_quick_search.php");
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
	
	require_once("../model/model_website_search.php");
	
	$liste = mysqli_fetch_all(advanced_search($db_connect,$search,$asc_desc, $type, $name_grade, $_REQUEST['media']), MYSQLI_NUM);
	
	if(!empty($liste)){
		echo "<center><table><tr class='table_profil'>";
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
			echo "</td></tr>";
		}
		echo "</center></table>";
	}else{
		echo"<center>Not found</center>";
	}
}
	
mysqli_close($db_connect);
?>
