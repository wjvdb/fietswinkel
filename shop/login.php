<?php
session_start();
//include 'controle.php';
include 'dbconnectie.php';
echo ("<p align='right'>ingelogd als".$_SESSION['gbnaam']."|". $_SESSION['rechten']."|". $_SESSION['gebruiker_id']. "<a href='uitloggen.php'>afmelden</a>");


/* if ($_SESSION['gbnaam']==""){
	header("location: ..");
} */


?>



<?php
if ($_SESSION['rechten']=='Administrator'){
header ("location: dashgum/theme/basic_table.php");
} ?>

<?php
if ($_SESSION['rechten']=='Medewerker'){
include 'shop.php';
} 
?>

<?php
if ($_SESSION['rechten']=='Leden'){

include 'shop.php';

} ?>

<?php
if ($_SESSION['rechten']=='VIP'){
include 'shop.php';
 } ?>