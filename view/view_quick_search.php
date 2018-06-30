<!DOCTYPE HTML>

<HTML>
<?php include("view_header.php");?>
<HEAD><TITLE>Profile</TITLE>
</HEAD>
<BODY>
<div class="side_panel">
<?php
require_once("../model/model_profile_search.php");
$liste = mysqli_fetch_all(type_movie_advanced_search($_REQUEST['media']), MYSQLI_ASSOC);
echo "<table align='left'><form action='../controller/controller_advanced_website_search.php' method='POST''>";
echo "<tr><td><input type='text' name='".$_REQUEST['media']."_search' size='50px' placeholder='Title' class='search' '>";
echo "<tr><td><input type='radio' id='toggle3' class='toggle toggle-left' name='name_grade' value='".$_REQUEST['media']."s.title' checked><label for='toggle3' class='btn'>Name</label><input type='radio' id='toggle4' class='toggle toggle-right' name='name_grade' value='grade'><label for='toggle4' class='btn'>Grade</label>";
echo "<tr><td><input type='radio' id='toggle1' class='toggle toggle-left' name='asc_desc' value='ASC' checked><label for='toggle1' class='btn'>↓</label><input type='radio' id='toggle2' class='toggle toggle-right' name='asc_desc' value='DESC'><label for='toggle2' class='btn'>↑</label>";
echo "<tr><td><select name='type' class='type' ><br>";
echo "<option value=''>Type</option>";
for($i = 0; $i<count($liste); $i++){
	echo "<option value=".$liste[$i]['name'].">".$liste[$i]['name'] = str_replace("_"," ", $liste[$i]['name'])."</option>;";
}
echo "</select>";
echo "<tr><td><input type='hidden' name='media' value='".$_REQUEST['media']."']>";
echo "<tr><td><input type='submit' name='list_movies' value='Search' class='go'>";
echo "</form></table>";
?>
</div>
