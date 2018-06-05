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
<form action="../controller/controller_profile_media.php" method="POST">
<input type="submit" name="list_movies" value="Movies">
<input type="hidden" name="media" value="movie">
</form>
<br>
<br>
<form action="../controller/controller_profile_media.php" method="POST">
<input type="submit" name="list_muscis" value="Musics">
<input type="hidden" name="media" value="music">
</form>
</div>

</body>
</html>
