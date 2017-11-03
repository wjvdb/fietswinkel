<style>
	td{
		padding: 5px;
	}
</style>

<?php


echo ("<h2>bibliotheek - leden administratie </h2><hr>");

include 'dbconnectie.php';



echo ("<h2> leden overzicht</h2>");

echo ("<p><a href='leden_toevoegen.php'><img src='img/useredit.png'>abonnee toevoegen </a></p><hr>");

$query = "SELECT id, mail, voorletter, tussenvoegsel, naam, adres, huisnummer, postcode, woonplaats, telefoon, mobiel FROM gebruiker ORDER BY naam ASC";
$resultaat = mysqli_query($verbinding, $query) or die (mysqli_error());
echo ("<table padding='2px'>");
echo ("<tr bgcolor='CCCCCC'>");
echo ("<td>lidnr</td><td>email</td><td>voorletters</td><td>tussenvoegsel</td><td>achternaam</td><td>adres</td><td>huisnummer</td><td>postcode</td><td>woonplaats</td><td>telefoonnr</td><td>mobiel</td>");
echo ("<td colspan='2'> aanpassen / verwijderen");
echo ("</tr>");

while($rij = mysqli_fetch_array($resultaat, MYSQL_ASSOC)){
	//PRINT RIJ
	echo ("<tr bgcolor='lightblue'>");
	while (list($key, $value) = each($rij)){
		echo ("<td>".$value."</td>");
	}
	$gebruiker_id = $rij['id'];
	echo ("<td align='center'><a href='leden_bewerken.php?id=$gebruiker_id'><img src='img/edit.png'></a></td>");
	echo ("<td align='center'><a href='leden_verwijderen.php?id=$gebruiker_id'><img src='img/empty.png'></a></td>");
	echo ("</tr>");
}
	
echo ("</table>");
?>