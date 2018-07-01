<?php
session_start();

require_once("../view/view_quick_search.php");

require_once("../db_connect.php");
$db_connect = db_connect();

if(!empty($_REQUEST['search'])){
	require_once('../model/model_website_search.php');
	$asc_desc = "";
	$type = "";
	$name_grade = "";
	$liste = mysqli_fetch_all(quick_search($db_connect,$_REQUEST['search'],$asc_desc, $type, $name_grade, $_REQUEST['media']), MYSQLI_NUM);
}else{
	require("../model/model_website_list.php");
	$select = "t1.image,t1.title, t1.id_".$_REQUEST['media'].", (SELECT AVG(grade) FROM listed_".$_GET['media']."s WHERE id_".$_GET['media']." = t1.id_".$_GET['media'].")";
	$table = strtoupper($_REQUEST['media'].'s');
	$column = "id_".$_REQUEST['media'];
	$liste = mysqli_fetch_all(website_list($db_connect,$select,$table,$column), MYSQLI_NUM);
}
if(!empty($liste)){
    echo "<center><table border='1' class='class_table'><tr class='class_table'>";
    foreach($liste as $array){
		if($array[3]===null){
			$array[3] = "Pas de note";
		}
        echo "<td class='class_table'><a href='controller_display_informations.php?id=".$array[2]."&media=".$_GET['media']."'><img src=".$array[0]." width='100' height='100px'></a></td><td class='class_table'><a href='controller_display_informations.php?id=".$array[2]."&media=".$_GET['media']."'>".$array[1]."</a></td><td class='class_table'>";				
	for($i=0;$i<5;$i++){
		if($i<=$array[3]){
			echo"<img src='../ressources/icons/full_star.png' width='20px' height='20px'>";
		}else{
			echo"<img src='../ressources/icons/empty_star.png' width='20px' height='20px'>";
		}
	}
	echo "</td></tr>";	
}
    echo "</center></table>";
}else{
    echo '<center><font color="red">No result found.</font></br></center>';
}
	
mysqli_close($db_connect);

?>
