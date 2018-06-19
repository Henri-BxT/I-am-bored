<!DOCTYPE HTML>

<html>
<head>
		<title>Home</title>
</head>
<body>

<div align="center">
<h1>I'm Bored</h1></div>
</div>

<div align="right">
<form action="../view/view_sign_in.html" method="POST">
<input align="right" type="submit" name="Log in" value="Sign In">
</form>
<form action="../view/view_registration.html" method="POST">
<input align="right" type="submit" name="Sign Up" value="Sign Up">
</form>
</div>

<div align="left">
<form action="../controller/controller_website_search.php" method="GET">
<select name="media">
	<option value="movie">Film</option> 
	<option value="music">Music</option>
</select>
<input type="text" name="search" size="30">
<input type="submit" value="Search">
</form>
</div>

</body>
</html>