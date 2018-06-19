<?php
if(!isset($_SESSION['id'])){
    session_start();
}
require_once("../view/view_display_informations.html");

$db_connect = mysqli_connect("localhost", "root", "", "im_bored") or die ("Error can't connect to the database");
require("../model/model_display_informations.php");
if($_REQUEST['media'] === "movie"){
    $select = "t1.image, t1.synopsis";
}else if($_REQUEST['media'] === "music"){
    $select = "t1.image";
}
$data = mysqli_fetch_all(display_info($db_connect,$_REQUEST['media'],$_REQUEST['id'],$select), MYSQLI_NUM);
if(!empty($data)){
    foreach($data as $infos){
        echo "<img src=".$infos[2]." width='200px' height='200px'><br>"." Title : ".$infos[0]."<br>Date : ".$infos[1]."<br>Note : ";
		if(isset($_REQUEST['grade'])) {
			$grade = $_REQUEST['grade'];
		} else {
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
        }
		echo "<br>";
        if($_REQUEST['media'] === "movie"){
            echo "Synopsis : ".$infos[3]."<p>";
        }
    }
    require("../model/model_registration_id_search.php");
    if(isset( $_SESSION['id'])){
        $id_member = mysqli_fetch_array(id_search($db_connect, $_SESSION['id']), MYSQLI_NUM);
        $data = mysqli_fetch_array(search_list($db_connect,$_REQUEST['media'],$_REQUEST['id'],$id_member[0]), MYSQLI_NUM);
        if(!empty($data)){
            $data = mysqli_fetch_array(search_favorit($db_connect,$_REQUEST['media'],$_REQUEST['id'],$id_member[0]), MYSQLI_NUM);
            if(!empty($data[0])){
                echo "<br><a href='controller_manage_list.php?favorit=remove&id=".$_REQUEST['id']."&media=".$_REQUEST["media"]."'><img src='../ressources/icons/unfavorit.png' width='50px' height='50px'></a>";
            }else{
                echo "<br><a href='controller_manage_list.php?list=remove&id=".$_REQUEST['id']."&media=".$_REQUEST["media"]."'><img src='../ressources/icons/X.png' width='50px' height='50px'></a>";
                echo "<br><a href='controller_manage_list.php?favorit=add&id=".$_REQUEST['id']."&media=".$_REQUEST["media"]."'><img src='../ressources/icons/favorit.png' width='50px' height='50px'></a>";
            }
        }else{
            echo "<br><a href='controller_manage_list.php?list=add&id=".$_REQUEST['id']."&media=".$_REQUEST["media"]."'><img src='../ressources/icons/add.png' width='50px' height='50px'></a>";
        }
    }
}else{
    print("Not found");
}
?>
