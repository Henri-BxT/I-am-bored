<!DOCTYPE HTML>

<html>
<head>
		<title>Edit Profile</title>
</head>
<body>

<div align="right">
<h4>Welcome <?php echo $_SESSION['id']; ?></h4>
<a href="../controller/controller_profil.php"><img src='..\ressources\icons\Profile.png' width='30px' height='30px'></a><br>
<a href="../controller/controller_logout.php"><img src='..\ressources\icons\Logout.png' width='30px' height='30px'></a>
</div>
<br><br>

<h2 align="left">Password Change</h2>

<form action="../controller/controller_change_password.php" method="POST">
New Password <input type="password" name="password" value=""> Required between 6 and 14 characters
<br>
Re-type Password <input type="password" name="pass_confirmation" value="">
<br>
<input type="submit" name="validation" value="Reset Password"><br>
</form>
<br>
<a href="../controller/controller_member_home_page.php"><img src='..\ressources\icons\Return.png' width='30px' height='30px'></a>
</body>
</html>