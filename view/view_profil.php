<!DOCTYPE HTML>

<html>
<head>
		<title>Profil</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
$(function() {
    if ($.browser.msie && $.browser.version.substr(0,1)<7)
    {
      $('.tooltip').mouseover(function(){
            $(this).children('span').show();
          }).mouseout(function(){
            $(this).children('span').hide();
          });
    }
});
</head>
<body>
<?php include("view_header.php");?>
<br>
<div align="center">
<a href="../controller/controller_profile_media.php?profil=list_movies&media=movie"><img src="..\ressources\icons\movie.png" width='150px' height='150px'></a>
<br>
<br>
<a href="../controller/controller_profile_media.php?profil=list_movies&media=music"><img src="..\ressources\icons\music.png" width='150px' height='150px'></a>
</form>
</div>
</body>
</html>
