<?php 
session_start();
$login = $_SESSION['id']
?>

<!DOCTYPE HTML>

<html>
<head>
		<title>Edit Profile</title>
</head>
<body>


<h4 align="right">Welcome <?php print("$login");?>
<br><br>

<h2 align="left">Password Change</h2>

<form action="../controller/controller_change_password.php" method="POST">
New Password <input type="password" name="password" value=""> Required between 6 and 14 characters
<br>
Re-type Password <input type="password" name="pass_confirmation" value="">
<br>
<input type="submit" name="validation" value="Reset Password"><br>
</form>
<a href="../controller/controller_member_home_page.php">Retour</a>
</body>
</html>