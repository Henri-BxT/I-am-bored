<?php 
$login = $_SESSION['id'];
?>

<div align="right">
Welcome <?php print("$login"); ?></a>
<a href="../controller/controller_member_home_page.php">Return</a>
<a href="controller_logout.php">Logout</a>
</div>