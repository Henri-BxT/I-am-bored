<!DOCTYPE HTML>

<HTML>
<HEAD><TITLE>Profile</TITLE>
<style>
body {
    background-color: #282828;
}
</style>
</HEAD>
<BODY>
<div align="center">
<h1>I'm Bored</h1></div>
</div>

<div align="right">
    <?php if(isset($_SESSION["id"])){echo'<h4>Welcome '.$_SESSION["id2"]."</h4>";}?>
	<?php if(isset($_SESSION["id"])){echo'<a href="../controller/controller_profil.php"><img src="..\ressources\icons\list.png" width="30px" height="30px"></a>';}?>
    <a href=<?php if(isset($_SESSION['id'])){echo'"../controller/controller_member_home_page.php"';}else{echo'"../controller/controller_home_page.php"';}?>><img src="..\ressources\icons\return.png" width="30px" height="30px"></a>
    <?php if(isset($_SESSION["id"])){echo'<a href="../controller/controller_logout.php"><img src="..\ressources\icons\logout.png" width="30px" height="30px"></a>';}?>
</div>    
</body>
</html>
