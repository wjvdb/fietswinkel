
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
echo ("<table style='background: red;border-radius:10px;-moz-border-radius:5px;-webkit-border-radius:5px;'>");
echo ("<tr style='color:white' >");
echo ("<td><a style='color:white' href='artikelen.php'>artikelnummer</a></td>
<td><a style='color:white' href='artikelen_n.php'>artikelnaam</a></td>
<td><a style='color:white' href='artikelen_c.php'>categorie</a></td>
<td><a style='color:white' href='artikelen_m.php'>merk</a></td>
<td><a style='color:white' href='artikelen_p.php'>prijs</a></td>");

echo ("</tr>");

while($rij = mysqli_fetch_array($resultaat, MYSQL_ASSOC)){
	//PRINT RIJ
	echo ("<tr bgcolor='white'>");
	while (list($key, $value) = each($rij)){
		echo ("<td>".$value."</td>");
	}
	$gebruiker_id = $rij['artikelnummer'];
}
echo ("</table>");
?>

</p>