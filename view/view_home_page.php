<HTML>
<HEAD><TITLE>Connexion</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../ressources/stylesheet.css"/>
</HEAD>
<div align="right">
<form action="../view/view_sign_in.html" method="POST">
<input align="right" type="submit" name="Log in" value="Log in">
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