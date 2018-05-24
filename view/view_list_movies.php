<?php
$login = $_SESSION['id'];
?>

<!DOCTYPE HTML>

<html>
<head>
		<title>List Movies</title>
</head>

<body>
<div align="right">
Welcome <?php print("$login"); ?></a>
<a href="../controller/controller_profil.php">Return</a>
<a href="controller_logout.php">Logout</a>
</div>

</body>
</html>