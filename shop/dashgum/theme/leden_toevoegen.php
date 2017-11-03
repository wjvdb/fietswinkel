<?php
include 'dbconnectie.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
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
	$ww = md5($_POST['ww']);
	$gb = $_POST['gb'];
	$geslacht = $_POST['geslacht'];
	$access = $_POST['access'];
	
	
	$sql = "INSERT INTO gebruiker(mail, pass, voorletter, tussenvoegsel, naam, adres, huisnummer, postcode, woonplaats, telefoon, mobiel, geslacht, geb_datum, access_rechten, abbonnement_ab_naam) 
	VALUES ('$mail', '$ww','$vl','$tv','$an','$ad','$hsnr','$pc','$wp','$tel','$mb','$geslacht','$gb','$access',)";
	
	$resultaat = mysqli_query($verbinding, $sql) or die (mysqli_error());
	
	echo ("<p><h2> er is een nieuwe abonnee ingeschreven met de volgende gegevens:</h2>");
	echo ("naam: <b>".$vl. " " . $tv."". $an."</b><br>");
	echo ("adres en huisnummer: <b>".$ad."".$hsnr."</b><br>");
	echo ("postcode en woonplaats: <b>".$pc. " " . $wp."</b><br>");
	echo ("telefoonnummer: <b>".$tel. "</b><br>");
	echo ("mobiel: <b>".$mb."</b><br>");
	echo ("geboortedatum:<b>".$gb."</b><br>");
	echo ("geslacht:<b>".$geslacht."</b><br>");
	echo ("emailadres: <b>".$mail."</b><br>");
	echo ("rechten: <b>".$access."</b><br>");

	
	
	include 'leden_overzicht.php';
}
else{

?>


<h2> abonnee teovoegen</h2>
	<fieldset><legend>vul de onderstaande gegevens in:</legend>
	<form method="post" action="<?php echo($_SERVER["PHP_SELF"]);?>">;
		<table>
			<tr>
				<td> voorletters</td>
				<td><input type="text" name="vl" size="30"></td>
			</tr>
			<tr>
				<td> tussenvoegsel</td>
				<td><input type="text" name="tv" size="30"></td>
			</tr>
			<tr>
				<td> achternaam</td>
				<td><input type="text" name="an" size="30"></td>
			</tr>
			<tr>
				<td> adres</td>
				<td><input type="text" name="ad" size="30"></td>
			</tr>
			<tr>
				<td> huisnummer</td>
				<td><input type="text" name="hsnr" size="30"></td>
			</tr>
			<tr>
				<td> woonplaats</td>
				<td><input type="text" name="wp" size="30"></td>
			</tr>
			<tr>
				<td> postcode</td>
				<td><input type="text" name="pc" size="30"></td>
			</tr>
			<tr>
				<td> telefoon</td>
				<td><input type="text" name="tel" size="30"></td>
			</tr>
			<tr>
				<td> mobiel</td>
				<td><input type="text" name="mb" size="30"></td>
			</tr>
			<tr>
				<td>emailadres</td>
				<td><input type="text" name="mail" size="30"></td>
			</tr>
			<tr>
				<td> wachtwoord</td>
				<td><input type="password" name="ww" size="30"></td>
			</tr>
			<tr>
				<td>geboortedatum</td>
				<td><input type="text" name="gb" size="30"></td>
			</tr>
						<tr>
				<td>geslacht</td>
				<td><select name="geslacht" style="width:150px">
					<option>m</option>
					<option>v</option>
				</td>
			</tr>
			<tr>
				<td> rechten</td>
					<?php
						$sql = "SELECT rechten FROM  access";
						$resultaat = mysqli_query($verbinding, $sql);
					
					
					?>
				
				<td><select name="access" style="width: 150px">
				<?php
					while($rij = mysqli_fetch_array($resultaat)){
						echo ("<option>".$rij['rechten']."</option>");
					}
				
				?>
				
				</td>
			</tr>
					<tr>
				
				
			
				
				</td>
			</tr>
			
		</table>
		<hr>
		<input type="submit" value="toevoegen"><input type="button" style="width: 120px" name="cancel" value="annuleren" onclick="onclick=history.go(-1)" /><br>
	</form>
</fieldset>

<?php } ?>