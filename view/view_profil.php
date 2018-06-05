<!DOCTYPE HTML>

<html>
<head>
		<title>Profil</title>
</head>
<body>


<div align="right">
<h4>Welcome <?php echo $_SESSION['id']; ?></h4>
<a href="../controller/controller_member_home_page.php"><img src='..\ressources\icons\Return.png' width='30px' height='30px'></a>
<a href="../controller/controller_logout.php"><img src='..\ressources\icons\Logout.png' width='30px' height='30px'></a>
</div>

<br>
<div align="center">
<a href="../controller/controller_profile_media.php?profil=list_movies&media=movie"><img src="..\ressources\icons\movie.png" width='150px' height='150px'></a>
<br>
<br>
<a href="../controller/controller_profile_media.php?profil=list_movies&media=music"><img src="..\ressources\icons\music.png" width='150px' height='150px'></a>
</form>
</div>

</body>
</html>
