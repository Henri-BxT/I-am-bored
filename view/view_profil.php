<!DOCTYPE HTML>

<html>
<head>
		<title>Profil</title>
</head>
<body>


<div align="right">
Welcome <?php echo $_SESSION['id']; ?></a>
<a href="../controller/controller_member_home_page.php">Return</a>
<a href="controller_logout.php">Logout</a>
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
