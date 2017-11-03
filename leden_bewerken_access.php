<?php
include 'dbconnectie.php';

$gebruiker_id = $_GET['id'];

if($_GET['id']){
	$sql = "SELECT * FROM gebruiker WHERE id='$gebruiker_id';";
	$resultaat = mysqli_query($verbinding, $sql) or die (mysqli_error());
	$rij = mysqli_fetch_array($resultaat, MYSQL_ASSOC);
}
?>

<h2>rechten van abonnee bewerken</h2>
	<fieldset><legend>pas de gegevens aan:</legend>
		<form method="post" action="leden_update_access.php">
			<table>
				<tr>
					<td> lidnummer</td>
					<td><input type="text" name="id" size="30" readonly="readonly" style="background-color: #CCCCCC" value="<?php echo ($rij['id']);?>"></td>
				</tr>
				<tr>
					<td> voorletters</td>
					<td><input type="text" name="vl" size="30" value="<?php echo ($rij['voorletter'].''.$rij['tussenvoegsel'].''.$rij['naam']);?>"></td>
				</tr>
				<tr>
				<td> rechten</td>
					<?php
						$sql = "SELECT rechten FROM  access";
						$resultaat = mysqli_query($verbinding, $sql);
						$gebruiker_access = $rij['access_rechten'];
					
					?>
				
				<td><select name="access" style="width: 150px">
				<?php
					while($rij = mysqli_fetch_array($resultaat)){
						if($rij['rechten']==$gebruiker_access){
							echo ("<option SELECTED>".$rij['rechten']."</option>");
						}
						else{
							echo ("<option>".$rij['rechten']."</option>");
						}
						echo ("<option>".$rij['rechten']."</option>");
					}
				
				?>
				
				</td>
			</tr>
		</table>
		<hr>
		<input type="submit" value="wijzig rechten">
		<input type="button" style="width: 120px" name="cancel" value="annuleren" onclick="onclick=history.go(-1)" /><br>
	</form>
	</fieldset>