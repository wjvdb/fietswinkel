				<?php echo ("
                <p class='lead'>
                    ingelogd als $gbnaam
                </p>"); 
				
				$sql = "SELECT * FROM bestellingen WHERE gebruiker_id='$gb' AND besteldatum='$datum' ";
				$resultaat = mysqli_query($verbinding, $sql) or die(mysqli_error());
				$rij = mysqli_fetch_array($resultaat, MYSQL_ASSOC);
				$aantal_rij = mysqli_num_rows($resultaat);
				$id = $rij['bestelnummer'];
				$query = "SELECT aantalbesteld, bestellingen_bestelnummer, artikelen_artikelnumer FROM bestelgegevens WHERE bestellingen_bestelnummer='$id'";
				$resultaat = mysqli_query($verbinding, $sql) or die(mysqli_error());
				echo ("<table padding='2px'>");
				echo ("<tr bgcolor='CCCCCC'>");
				echo ("<td>order id </td><td> besteldatum </td><td> status </td><td> gebruiker_id </td>");

				echo ("</tr>");
				while($rij = mysqli_fetch_array($resultaat, MYSQL_ASSOC)){
				//PRINT RIJ
				echo ("<tr bgcolor='lightblue'>");
				while (list($key, $value) = each($rij)){
					echo ("<td>".$value."</td>");
				}
				}
				?>