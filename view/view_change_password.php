<!DOCTYPE HTML>

<html>
<head>
<?php include("view_header.php");?>
		<title>Edit Profile</title>
</head>
<body>
<br>
<table>
<tr><td><h2>Password Change</h2></td></tr>
<form action="../controller/controller_change_password.php" method="POST"></td></tr>
<tr><td>New Password <input type="password" name="password" value="" style="background-color: grey; color: white;"> <font color="red" size="1">Required between 6 and 14 characters</font></td></tr>
<tr><td>Re-type Password <input type="password" name="pass_confirmation" value="" style="background-color: grey; color: white;"></td></tr>
<tr><td><input type="submit" name="validation" value="Reset Password" class="button"></td></tr>
</form>
<br>
</body>
</html>