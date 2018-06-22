<!DOCTYPE HTML>

<html>
<head>
		<title>Edit Profile</title>
</head>
<body>
<?php include("view_header.php");?>
<br>
<h2 align="left">Password Change</h2>
<table>
<form action="../controller/controller_change_password.php" method="POST"></td></tr>
<tr><td>New Password <input type="password" name="password" value=""> <font color="red" size="1">Required between 6 and 14 characters</font></td></tr>
<tr><td>Re-type Password <input type="password" name="pass_confirmation" value=""></td></tr>
<tr><td><input type="submit" name="validation" value="Reset Password"></td></tr>
</form>
<br>
</body>
</html>