<?php
/*session_start();

$_SESSION['naam']="pietje puk";

echo ("uw gebruikersnaam voor deze sessie is: ".$_SESSION['naam']);*/
session_start();


$tijd = date('H:i');
$datum = date('j F Y');
echo ("<p align='right'>$tijd | $datum <hr>");



if($_SERVER['REQUEST_METHOD']=='POST'){
	if (!empty ($_POST['gbnaam']) && !empty($_POST['ww'])){
		
/* 		$localhost = "localhost";
		$gebruiker = "root";
		$wachtwoord = "";
		$db_naam = "test";
		
		$verbinding = mysqli_connect("$localhost","$gebruiker","$wachtwoord") or die ("kan geen verbinding maken".mysqli.error());
		$db = mysqli_select_db($verbinding, "$db_naam"); */

		include 'dbconnectie.php';
		
		$gbnaam = $_POST['gbnaam'];
		$ww = md5($_POST['ww']);
		
		$sql = "SELECT * FROM gebruiker WHERE mail='$gbnaam' AND pass='$ww'";
		$resultaat = mysqli_query($verbinding, $sql);
		$rij = mysqli_fetch_array($resultaat, MYSQL_ASSOC);
		
		if (!$rij){
			echo("<p style='color: #FF0000'>u heeft niet de juiste inloggegevens ingevuld</p>");
		}
		else{
			$_SESSION['gbnaam']=$rij['voorletter']." ".$rij['tussenvoegsel']." ".$rij['naam'];
			$_SESSION['gebruiker_id']=$rij['id'];
			$_SESSION['rechten']=$rij['access_rechten'];
			
			header("Location: shop/login.php");
		}
	}
	else{
		echo("<p style='color: #FF0000'>u heeft niet genoeg dingen ingevuld</p>");
	}
	
	
}

?>



	
	
	<form name="inlog" method="post" action="<?php echo ($_SERVER['PHP_SELF']);?>">
		<table align=center>
			<tr><td>gebruikersnaam:</td><td><input name="gbnaam" type="text"></td></tr>
			<tr><td>wachtwoord:</td><td><input name="ww" type="password"></td></tr>

		</table><hr>

	<input type="submit" name="submit" value="inloggen" class="submit-btn">
	</form>
						<a href="leden_toevoegen.php" align=center>geen lid?</a>
	

