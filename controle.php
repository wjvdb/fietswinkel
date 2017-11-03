<?php
session_start();

echo ("<p align='right'>ingelogde gebruiker".$_SESSION['gbnaam']."|". $_SESSION['rechten']."|". $_SESSION['gebruiker_id']. "<a href='uitloggen.php'>afmelden</a>");


if ($_SESSION['gbnaam']==""){
	header("location: index.php");
}


?>