<?php
if(!isset($_SESSION['id'])){
    session_start();
}
require_once("../view/view_display_informations.html");

require_once("../db_connect.php");
$db_connect = db_connect();

require("../model/model_display_informations.php");
if($_REQUEST['media'] === "movie"){
    $data = mysqli_fetch_all(display_info_movie($db_connect,$_REQUEST['media'],$_REQUEST['id']), MYSQLI_NUM);
    $actors = mysqli_fetch_all(display_actors($db_connect,$_REQUEST['media'],$_REQUEST['id']), MYSQLI_NUM);
    $height = "300px";
}else if($_REQUEST['media'] === "music"){
    $data = mysqli_fetch_all(display_info_music($db_connect, $_REQUEST['media'], $_REQUEST['id']), MYSQLI_NUM);
    $height = "200px";
}
if(!empty($data)){
    foreach($data as $infos){
        echo "<img src=".$infos[2]." width='200px' height='".$height."'><table><tr></td><td>Title : </td><td>".$infos[0]."</td></tr><tr><td>Date : </td><td>".$infos[1]."</td></tr><tr><td>Note : </td><td>";
		if(isset($_REQUEST['grade'])) {
			$grade = $_REQUEST['grade'];
		}else {
            if(!isset($_SESSION['id'])){
                $query = explode("&",$_SERVER['QUERY_STRING']);
                $id = explode("=",$query[0]);
                $media = explode("=",$query[1]);
                require("../model/model_website_search.php");
                $search = "";
                $asc_desc = "";
                $type = "";
                $name_grade = "";
                $media = $media[1];
                $grade = mysqli_fetch_array(quick_search($db_connect, $search, $asc_desc, $type, $name_grade, $media), MYSQLI_NUM);
            }else{
                require("../model/model_add_rate.php");
                $grade = get_grade($_REQUEST['media'],$_REQUEST['id']);    
            }
        }
        if(isset($_SESSION['id'])){ 
            for($i = 1; $i < 6; $i++) {
                print ("<a href = 'controller_add_grade?grade=".$i."&media=".$_REQUEST["media"]."&id=".$_REQUEST['id']."'><img id = '".$i."' src='../ressources/icons/empty_star.png' width='20px' height='20px' data-grade = '".$grade."'></a>");
            }
        }else{
            for($i=0;$i<5;$i++){
				if($i<=$grade[3]){
					echo"<img src='../ressources/icons/full_star.png' width='20px' height='20px'>";
				}else{
					echo"<img src='../ressources/icons/empty_star.png' width='20px' height='20px'>";
				}
			}
			echo "</td></tr>";	
        }
        if($_REQUEST['media'] === "movie"){
        echo "<tr><td>Directed by : </td><td>".$infos[4]." ".$infos[5]."</td></tr>";
        echo "<tr><td>Actors : </td><td>";
        $i = 0;
        foreach($actors as $actor){
            if($i === 0){
                echo $actor[0]." ".$actor[1];
            }else{
                echo ", ".$actor[0]." ".$actor[1];
            }
            $i++;
        }
		echo "</tr></table>";
        echo "<tr><td width='10%'><button class='button'>Synopsis</button></td><td><p>".$infos[3]."</p><br>";
        }else {
            echo "<tr><td>Artist : </td><td>".$infos[3]."</td></tr>";
        }
    }
    require("../model/model_registration_id_search.php");
    if(isset( $_SESSION['id'])){
        $id_member = mysqli_fetch_array(id_search($db_connect, $_SESSION['id']), MYSQLI_NUM);
        $data = mysqli_fetch_array(search_list($db_connect,$_REQUEST['media'],$_REQUEST['id'],$id_member[0]), MYSQLI_NUM);
        echo "<table>";
        if(!empty($data)){
            $data = mysqli_fetch_array(search_favorit($db_connect,$_REQUEST['media'],$_REQUEST['id'],$id_member[0]), MYSQLI_NUM);
            if(!empty($data[0])){
				echo "<br><a href='controller_manage_list.php?list=remove&id=".$_REQUEST['id']."&media=".$_REQUEST["media"]."'><img id = 'l' src='../ressources/icons/add.png' width='50px' height='50px'></a>";
                echo "<a href='controller_manage_list.php?favorit=remove&id=".$_REQUEST['id']."&media=".$_REQUEST["media"]."'><img id = 'f' src='../ressources/icons/unfavorit.png' width='50px' height='50px'></a>";
            }else{
                echo "<br><a href='controller_manage_list.php?list=remove&id=".$_REQUEST['id']."&media=".$_REQUEST["media"]."'><img id = 'l' src='../ressources/icons/add.png' width='50px' height='50px'></a>";
                echo "<a href='controller_manage_list.php?favorit=add&id=".$_REQUEST['id']."&media=".$_REQUEST["media"]."'><img id = 'f' src='../ressources/icons/favorit.png' width='50px' height='50px'></a>";
            }
        }else{
            echo "<tr><td><a href='controller_manage_list.php?list=add&id=".$_REQUEST['id']."&media=".$_REQUEST["media"]."'><img id = 'l' src='../ressources/icons/X.png' width='50px' height='50px'></a></td>";
			echo "<td><a href='controller_manage_list.php?favorit=add&id=".$_REQUEST['id']."&media=".$_REQUEST["media"]."'><img id = 'f' src='../ressources/icons/favorit.png' width='50px' height='50px'></a></td></tr>";
        }
    }
}else{
    print("Not found");
}
echo "</table>";
?>
