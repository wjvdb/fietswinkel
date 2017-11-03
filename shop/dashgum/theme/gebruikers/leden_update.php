
<?php
include 'dbconnectie.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
	$gebruiker_id = $_POST['id'];
	$vl = $_POST['vl'];
	$tv = $_POST['tv'];
	$an = $_POST['an'];
	$ad = $_POST['ad'];
	$wp = $_POST['wp'];
	$hsnr = $_POST['hsnr'];
	$pc = $_POST['pc'];
	$tel = $_POST['tel'];
	$mb = $_POST['mb'];
	$mail = $_POST['mail'];
	$ww = $_POST['ww'];
	$gb = $_POST['gb'];
	$geslacht = $_POST['geslacht'];
	$access = $_POST['access'];
	$ab = $_POST['ab'];
	
	$sql = "UPDATE gebruiker SET mail ='$mail', pass='$ww', voorletter='$vl', tussenvoegsel='$tv', naam='$an', adres='$ad', huisnummer='$hsnr',
	postcode='$pc',woonplaats='$wp', telefoon='$tel', mobiel='$mb', geb_datum='$gb', geslacht='$geslacht', access_rechten='$access', abbonnement_ab_naam='$ab' WHERE id='$gebruiker_id' ";
	
	
	if(!mysqli_query($verbinding, $sql)){
		echo ("wijzigen van gegevens is mislukt");
	}
	else{
		echo ("<h2> de gegevens van $vl $tv $an zijn gewijzigd</h2><hr>");
		include '..\responsive_table.php';
	}
	
}
?>