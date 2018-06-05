<?php
session_start();

require_once("../view/view_quick_search.html");

$db_connect = mysqli_connect("localhost", "root", "", "im_bored") or die ("Error can't connect to the database");

if(!empty($_REQUEST['search'])){
/*	$search = $_REQUEST[$_REQUEST['media'].'_search'];
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
    */
	require_once('../model/model_website_search.php');
	$asc_desc = "";
	$type = "";
	$name_grade = "";
	$liste = mysqli_fetch_all(quick_search($db_connect,$_REQUEST['search'],$asc_desc, $type, $name_grade, $_REQUEST['media']), MYSQLI_NUM);
    if(!empty($liste)){
        echo "<center><table border='1'><tr>";
        foreach($liste as $array){
            echo "<td><a href='controller_display_informations.php?id=".$array[2]."&media=".$_GET['media']."'><img src=".$array[0]." width='100' height='100px'></a></td><td><a href='controller_display_informations.php?id=".$array[2]."&media=".$_GET['media']."'>".$array[1]."</a></td><td>".$array[3]."</td></tr>";
        }
        echo "</center></table>";
    }else{
        echo '<center>No result found.</br></center>';
    }
}else{
	require("../model/model_website_list.php");
	$select = "t1.image,t1.title, t1.id_".$_REQUEST['media'];
	$table = strtoupper($_REQUEST['media'].'s');
	$column = "id_".$_REQUEST['media'];

	$liste = mysqli_fetch_all(website_list($db_connect,$select,$table,$column), MYSQLI_NUM);
		
	if(!empty($liste)){
        	echo "<center><table border='1'><tr>";
        	foreach($liste as $array){
            	echo "<td><a href='controller_display_informations.php?id=".$array[2]."&media=".$_GET['media']."'><img src=".$array[0]." width='100' height='100px'></a></td><td><a href='controller_display_informations.php?id=".$array[2]."&media=".$_GET['media']."'>".$array[1]."</a></td><td>".$array[3]."</td></tr>";
        	}
        	echo "</center></table>";
    	}else{
        	echo '<center>No result found.</br></center>';
    	}
}
	
mysqli_close($db_connect);
echo "</TABLE></CENTER><BR><a href='controller_member_home_page.php'>Retour</a></BODY></HTML>";

?>
