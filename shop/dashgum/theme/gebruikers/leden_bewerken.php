<?php

include 'dbconnectie.php';

$gebruiker_id = $_GET['id'];

if($_GET['id']){
	
	$sql = "SELECT * FROM gebruiker WHERE id='$gebruiker_id';";
	$resultaat = mysqli_query($verbinding, $sql) or die (mysqli_error());
	$rij = mysqli_fetch_array($resultaat, MYSQL_ASSOC);
	
	
}



?>


<h2> gegevens van abonnee bewerken</h2>
	<fieldset><legend>pas de onderstaande gegevens aan:</legend>
	<form method="post" action="leden_update.php">
		<table>
			<tr>
				<td> lidnummer</td>
				<td><input type="text" name="id" size="30" readonly="readonly" style="background-color: #CCCCCC" value="<?php echo ($rij['id']);?>"></td>
			</tr>
			<tr>
				<td> voorletters</td>
				<td><input type="text" name="vl" size="30" value="<?php echo ($rij['voorletter']);?>"></td>
			</tr>
			<tr>
				<td> tussenvoegsel</td>
				<td><input type="text" name="tv" size="30" value="<?php echo ($rij['tussenvoegsel']);?>"></td>
			</tr>
			<tr>
				<td> achternaam</td>
				<td><input type="text" name="an" size="30" value="<?php echo ($rij['naam']);?>"></td>
			</tr>
			<tr>
				<td> adres</td>
				<td><input type="text" name="ad" size="30" value="<?php echo ($rij['adres']);?>"></td>
			</tr>
			<tr>
				<td> huisnummer</td>
				<td><input type="text" name="hsnr" size="30" value="<?php echo ($rij['huisnummer']);?>"></td>
			</tr>
			<tr>
				<td> woonplaats</td>
				<td><input type="text" name="wp" size="30" value="<?php echo ($rij['woonplaats']);?>"></td>
			</tr>
			<tr>
				<td> postcode</td>
				<td><input type="text" name="pc" size="30"value="<?php echo ($rij['postcode']);?>"></td>
			</tr>
			<tr>
				<td> telefoon</td>
				<td><input type="text" name="tel" size="30" value="<?php echo ($rij['telefoon']);?>"></td>
			</tr>
			<tr>
				<td> mobiel</td>
				<td><input type="text" name="mb" size="30" value="<?php echo ($rij['mobiel']);?>"></td>
			</tr>
			<tr>
				<td>emailadres</td>
				<td><input type="text" name="mail" size="30" value="<?php echo ($rij['mail']);?>"></td>
			</tr>
			<tr>
				<td> wachtwoord</td>
				<td><input type="password" name="ww" size="30" value="<?php echo ($rij['pass']);?>"></td>
			</tr>
			<tr>
				<td>geboortedatum</td>
				<td><input type="text" name="gb" size="30" value="<?php echo ($rij['geb_datum']);?>"></td>
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
			<td><input type="text" name="access" size="30" readonly="readonly" value="<?php echo ($rij['access_rechten']);?>"></td>
			<?php $gebruiker_id = $rij['id'];?>
			<td><a href="leden_bewerken_access.php?id=<?php echo $gebruiker_id; ?>"><img src="img/edit.png"></a></td>
			</tr>
					<tr>
				<td> abonnement</td>
				<td><input type="text" name="ab" size="30" readonly="readonly" value="<?php echo ($rij['abbonnement_ab_naam']);?>"></td>
				
				</td>
			</tr>
			
		</table>
		<hr>
		<input type="submit" value="wijzigen"><input type="button" style="width: 120px" name="cancel" value="annuleren" onclick="onclick=history.go(-1)" /><br>
	</form>
</fieldset>

<?php  ?>