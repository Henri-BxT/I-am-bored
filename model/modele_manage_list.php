<?php
try{
    //Connecting to MySQL
    $bdd = mysqli_connect('localhost','root','','im_bored');
}
catch(Exception $e){
    //In case of error print message and stop
    die('Erreur : '.$e -> getMessage());
}

function id($ut) {
	global $bdd;
	$id_ut = mysqli_query($bdd,'SELECT id_member FROM members WHERE login = "'.$ut.'"');
	$id_ut = mysqli_fetch_array($id_ut, MYSQLI_NUM);
	return $id_ut;
}

function add_l($t_oeuvre, $ut, $id_oeu) {
	global $bdd;
	$id_ut = id($ut);
	mysqli_query($bdd,'INSERT INTO listed_'.$t_oeuvre.'s VALUES(NULL,'.$id_ut[0].','.$id_oeu.',NULL,NULL)');
}

function rem_l($t_oeuvre, $ut, $id_oeu) {
	global $bdd;
	$id_ut = id($ut);
	mysqli_query($bdd,'DELETE FROM listed_'.$t_oeuvre.'s WHERE id_member = '.$id_ut[0].' AND id_'.$t_oeuvre.' = '.$id_oeu);
}

function add_f($t_oeuvre, $ut, $id_oeu) {
	global $bdd;
	$id_ut = id($ut);
	mysqli_query($bdd,'UPDATE listed_'.$t_oeuvre.'s SET favorit = 1 WHERE id_member ='.$id_ut[0].' AND id_'.$t_oeuvre.'='.$id_oeu);
}

function rem_f($t_oeuvre, $ut, $id_oeu) {
	global $bdd;
	$id_ut = id($ut);	
	mysqli_query($bdd,'UPDATE listed_'.$t_oeuvre.'s SET favorit = 0 WHERE id_member ='.$id_ut[0].' AND id_'.$t_oeuvre.'='.$id_oeu);
}
?>