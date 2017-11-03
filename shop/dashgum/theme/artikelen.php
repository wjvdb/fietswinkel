
<h2 align=center> artikelen lijst </h2>



<p align=center>

<?php
include 'dbconnectie.php';


/* artikelnummer
artikelnaam
categorieen_categorie
merken_merken
prijs */


$c = ("artikelnummer");

$query = "SELECT artikelnummer, artikelnaam, categorieen_categorie, merken_merken, prijs FROM artikelen ORDER BY $c ASC";
$resultaat = mysqli_query($verbinding, $query) or die (mysql_error());
echo ("<table>");
echo ("<tr>");
echo ("<td>artikelnummer</td>
<td>artikelnaam</td>
<td>categorie</td>
<td>merk</td>
<td>prijs</a>");

echo ("</tr>");

while($rij = mysqli_fetch_array($resultaat, MYSQL_ASSOC)){
	//PRINT RIJ
	echo ("<tr>");
	while (list($key, $value) = each($rij)){
		echo ("<td>".$value."</td>");
	}
	$gebruiker_id = $rij['artikelnummer'];
}
echo ("</table>");
?>

</p>