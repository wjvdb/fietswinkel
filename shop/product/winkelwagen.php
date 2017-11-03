<?php
session_start();
$gbnaam = $_SESSION['gbnaam'];
$gb = $_SESSION['gebruiker_id'];
include 'dbconnectie.php';
$datum = date('Y-m-j');
$product = $_POST['product'];
$status = 'gereserveerd';
$aantal = $_POST['aantal'];

$sql = "SELECT * FROM bestellingen WHERE gebruiker_id='$gb' AND besteldatum='$datum' ";
$resultaat = mysqli_query($verbinding, $sql) or die(mysqli_error());
	$rij = mysqli_fetch_array($resultaat, MYSQL_ASSOC);
	$aantal_rij = mysqli_num_rows($resultaat);
$id = $rij['bestelnummer'];

if ($aantal_rij>0){
	$sql = "INSERT INTO bestelgegevens(aantalbesteld, bestellingen_bestelnummer, artikelen_artikelnummer) VALUES ('$aantal','$id','$product')";
	
		$resultaat = mysqli_query($verbinding, $sql) or die(mysqli_error()); 
	
}

else{
	$sql = "INSERT INTO bestellingen (bestelnummer, besteldatum, status, gebruiker_id) VALUES('','$datum','$status','$gb')";
			$resultaat = mysqli_query($verbinding, $sql) or die(mysqli_error());
	
}
echo ("<br>");
include 'startbootstrap-blog-home-1.0.4/index.php'
?>