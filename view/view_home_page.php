<!DOCTYPE HTML>

<html>
<head>
		<title>Home</title>
</head>
<body>

<div align="right">
<form action="../view/view_sign_in.html" method="POST">
<input align="right" type="submit" name="Sign In" value="Sign In">
</form>
</div>

<div align="right">
<form action="../view/view_registration.html" method="POST">
<input align="right" type="submit" name="Sign Up" value="Sign Up">
</form>
<div>
<div align="left">
<form action="../controller/controller_website_search.php" method="GET">
<select name="media">
	<option value="movie">Film</option> 
	<option value="music">Musique</option>
</select>
<input type="text" name="search" size="30">
<input type="submit" value="Search">
</form>
</div>

</body>
</html>