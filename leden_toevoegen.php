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
	
	
	$sql = "INSERT INTO gebruiker(mail, pass, voorletter, tussenvoegsel, naam, adres, huisnummer, postcode, woonplaats, telefoon, mobiel, geslacht, geb_datum, access_rechten) 
	VALUES ('$mail', '$ww','$vl','$tv','$an','$ad','$hsnr','$pc','$wp','$tel','$mb','$geslacht','$gb','$access')";
	
	$resultaat = mysqli_query($verbinding, $sql) or die (mysqli_error());
	
	echo ("<p><h2> uw account is geactiveerd met de volgende gegevens:</h2>");
	echo ("naam: <b>".$vl. " " . $tv."". $an."</b><br>");
	echo ("adres en huisnummer: <b>".$ad."".$hsnr."</b><br>");
	echo ("postcode en woonplaats: <b>".$pc. " " . $wp."</b><br>");
	echo ("telefoonnummer: <b>".$tel. "</b><br>");
	echo ("mobiel: <b>".$mb."</b><br>");
	echo ("geboortedatum:<b>".$gb."</b><br>");
	echo ("geslacht:<b>".$geslacht."</b><br>");
	echo ("emailadres: <b>".$mail."</b><br>");
	echo ("rechten: <b>".$access."</b><br>");

	
}
else{

?>


<h2> account aanmaken</h2>
	<fieldset><legend>vul de onderstaande gegevens in:</legend>
	<form method="post" action="<?php echo($_SERVER["PHP_SELF"]);?>">;
		<table>
			<tr>
				<td> voorletters</td>
				<td><input type="text" name="vl" required size="30"></td>
			</tr>
			<tr>
				<td> tussenvoegsel</td>
				<td><input type="text" name="tv" size="30"></td>
			</tr>
			<tr>
				<td> achternaam</td>
				<td><input type="text" name="an" required size="30"></td>
			</tr>
			<tr>
				<td> adres</td>
				<td><input type="text" name="ad" required size="30"></td>
			</tr>
			<tr>
				<td> huisnummer</td>
				<td><input type="text" name="hsnr" required size="30"></td>
			</tr>
			<tr>
				<td> woonplaats</td>
				<td><input type="text" name="wp" required size="30"></td>
			</tr>
			<tr>
				<td> postcode</td>
				<td><input type="text" name="pc" required size="30"></td>
			</tr>
			<tr>
				<td> telefoon</td>
				<td><input type="text" name="tel" required size="30"></td>
			</tr>
			<tr>
				<td> mobiel</td>
				<td><input type="text" name="mb" size="30"></td>
			</tr>
			<tr>
				<td>emailadres</td>
				<td><input type="text" name="mail" required size="30"></td>
			</tr>
			<tr>
				<td> wachtwoord</td>
				<td><input type="password" name="ww" required size="30"></td>
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
				<td></td>
				<td>
					<input type='hidden' name='access' value='Leden'>
					
				</td>
			</tr>
					<tr>
				
				
			
				
				</td>
			</tr>
			
		</table>
		<hr>
		<input type="submit" value="aanmaken"><input type="button" style="width: 120px" name="cancel" value="annuleren" onclick="onclick=history.go(-1)" /><br>
	</form>
</fieldset>

<?php } ?>