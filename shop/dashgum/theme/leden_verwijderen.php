<?php

include 'dbconnectie.php';

$gebruiker_id = $_GET['id'];

if($_GET['id']){
	$sql = "DELETE FROM gebruiker WHERE id='$gebruiker_id';";
	
	if(!mysqli_query($verbinding, $sql)){
		echo ("verwijderen van abonnee is mislukt");
		exit;
	}
	else{
		echo("<p><h2>abonnee is uitgeschreven</h2></p><hr>");
		include 'leden_overzicht.php';
	}
	
}
else{
	header("location: leden_overzicht.php");
}

?>