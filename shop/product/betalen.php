<?php
require ('fpdf/fpdf.php');
session_start();
/* include 'dbconnectie.php'; */
$gb = $_SESSION['gebruiker_id'];
$datum = date('Y-m-j');
class PDF extends FPDF{
	function header(){
		$this->SetFont('Arial', 'i', 10);
		$this->Cell(0,10,'vanderwiel',0,1,'C');
	}
	/* function Footer(){
		$this->SetY(-15);
		$this->Image('img/magnetronbroodje.jpg',10,280,30,9);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'pagina'.$this->PageNo().'/[nb]',0,0,'R');
	} */
}


$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->Addpage();
$pdf->SetFont('Arial','B',14);

toonbestelling($pdf);
$pdf->output();

function toonbestelling($pdf){
$localhost = "localhost";
$artikelen = "root";
$wachtwoord = "";
$db_naam = "vanderwiel";

$verbinding = mysqli_connect("$localhost","$artikelen","$wachtwoord") or die ("kon geen verbinding maken met de database. ".mysqli_error());
$db = mysqli_select_db($verbinding, "$db_naam") or die ("kon geen database selecteren. ".mysqli_error());
$bestelling = $_POST['bestelnummer'];
$gb = $_POST['gebruiker'];

	$gb = $_SESSION['gebruiker_id'];
	$datum = date('Y-m-j');
	
	$sql = "SELECT * FROM bestellingen WHERE gebruiker_id='$gb' AND besteldatum='$datum' ";
	$resultaat = mysqli_query($verbinding, $sql) or die(mysqli_error());
	$rij = mysqli_fetch_array($resultaat, MYSQL_ASSOC);
	$aantal_rij = mysqli_num_rows($resultaat);
	$id = $rij['bestelnummer'];
	
	
	
$query="SELECT bestelgegevens.aantalbesteld, bestelgegevens.bestellingen_bestelnummer, artikelen.prijs FROM artikelen INNER JOIN bestelgegevens ON artikelen.artikelnummer=bestelgegevens.artikelen_artikelnummer WHERE bestelgegevens.bestellingen_bestelnummer='$bestelling'";
$resultaat = mysqli_query($verbinding, $query) or die(mysqli_error());
$aantal_rij = mysqli_num_rows($resultaat);



$i=0;
$totaal=0;

while($rij = mysqli_fetch_array($resultaat, MYSQL_ASSOC)){
	
	
		while(list($key, $value) = each($rij)){

		}
		$am = $rij['aantalbesteld'];
		$prijs = $rij['prijs'];
		$sub = $am * $prijs;

		$totaal=$totaal+$sub;
		

}

}


?>