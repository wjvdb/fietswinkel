<?php
session_start();
// (c) Xavier Nicolay
// Exemple de g�n�ration de devis/facture PDF

require('invoice.php');

$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->AddPage();
$pdf->addSociete( "vanderwiel",
                  "straat\n" .
                  "75000 amsterdam\n".
                  "R.C.S. amsterdam B 000 000 007\n" );



$cols=array( "aantal"    => 23,
             "omschrijving"  => 78,
             "artikelnummer"     => 22,
             "prijs"      => 26,
             "totaal" => 30,
             "TVA"          => 11 );
$pdf->addCols( $cols);
$cols=array( "aantal"    => "L",
             "omschrijving"  => "L",
             "artikelnummer"     => "C",
             "prijs"      => "R",
             "totaal" => "R",
             "TVA"          => "C" );
$pdf->addLineFormat( $cols);
$pdf->addLineFormat($cols);



$y    = 109;
$localhost = "localhost";
$artikelen = "root";
$wachtwoord = "";
$db_naam = "vanderwiel";

$verbinding = mysqli_connect("$localhost","$artikelen","$wachtwoord") or die ("kon geen verbinding maken met de database. ".mysqli_error());
$db = mysqli_select_db($verbinding, "$db_naam") or die ("kon geen database selecteren. ".mysqli_error());
$gb = $_SESSION['gebruiker_id'];
$datum = date('Y-m-j');

$sql = "SELECT * FROM bestellingen  WHERE gebruiker_id='$gb' AND besteldatum='$datum' ";
$resultaat = mysqli_query($verbinding, $sql) or die(mysqli_error());
$rij = mysqli_fetch_array($resultaat, MYSQL_ASSOC);
$aantal_rij = mysqli_num_rows($resultaat);
$id = $rij['bestelnummer'];
$query = "SELECT * FROM bestelgegevens INNER JOIN artikelen ON bestelgegevens.artikelen_artikelnummer=artikelen.artikelnummer WHERE bestellingen_bestelnummer='$id' ";
$resultaat = mysqli_query($verbinding, $query) or die(mysqli_error());
while($rij = mysqli_fetch_array($resultaat, MYSQL_ASSOC)) {

    $Aantal = $rij['aantalbesteld'];
   $artikel = $rij['artikelnaam'];
    $nummer = $rij['artikelnummer'];


    $prijs = $rij['prijs'];
    $totaal = $Aantal * $prijs;
    $line = array("aantal" => "$Aantal",
        "omschrijving" => "$artikel",
        "artikelnummer" => "$nummer",
        "prijs" => "$prijs",
        "totaal" => "$totaal",
        "TVA" => "1");
    $size = $pdf->addLine($y, $line);
    $y += $size + 2;
}
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

        $totaal+=$totaal+$sub;




    }

}


$pdf->SetXY(100, 250);
$pdf->Write(0, 'TotaalPrijs incl btw ='.$totaal);
$btw = $totaal/100*21;
$pdf->SetXY(100, 255);
$pdf->Write(0, 'btw 21% ='.$btw);

$pdf->Output();
?>
