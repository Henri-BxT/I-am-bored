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
<form name="list_movies" id="list_movies" action="../controller/controller_profile_media.php" method="POST">
<img src="..\ressources\icons\movie.png" onClick="document.getElementById('list_movies').submit()" name="list_movies" width=250 height=250 title="supprimer"><input type="hidden" name="media" value="movie">
</form>
<br>
<br>
<form name="list_music" id="list_music" action="../controller/controller_profile_media.php" method="POST">
<img src="..\ressources\icons\music.png" onClick="document.getElementById('list_music').submit()" name="list_music" width=250 height=250 title="supprimer"><input type="hidden" name="media" value="movie">
<input type="hidden" name="media" value="music">
</form>
</div>

</body>
</html>
