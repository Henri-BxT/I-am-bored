<HEADER>
<link rel="stylesheet" type="text/css" href="../ressources/stylesheet.css"/>
<div align="left" class="colonne1">
    <img src="../ressources/icons/logo.png" width='50%' height='30%'>
</div>

<div align="right" class="colonne2">
<table>
<tr><td>
<a href=<?php if(isset($_SESSION['id'])){echo'"../controller/controller_member_home_page.php"';}else{echo'"../controller/controller_home_page.php"';}?>><img src="..\ressources\icons\home.png" width="20px" height="20px"></a>
</td>
<td>
<form action='../controller/controller_connection.php' method='POST'>
    <input type='submit' value='Sign in'class='button2'>
</form>
</td>

<td>
<form action='../controller/controller_registration.php' method='POST'>
    <input type='submit' value='Sign up' class='button2'>
</form>    
</td></tr>
</table>

<form action="../controller/controller_website_search.php" method="GET">
    <select name="media" class="select">
            <option value="movie">Film</option> 
            <option value="music">Music</option>
    </select>    
    <input type="text" name="search" size="30" placeholder="Title" class="search">
    <input type="submit" value="GO" class="go">
</form>       
</div>
<br>
<p>
<p>
<br>
</HEADER>
<center>