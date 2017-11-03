<?php
$localhost = "localhost";
$artikelen = "root";
$wachtwoord = "";
$db_naam = "vanderwiel";

$verbinding = mysqli_connect("$localhost","$artikelen","$wachtwoord") or die ("kon geen verbinding maken met de database. ".mysqli_error());
$db = mysqli_select_db($verbinding, "$db_naam") or die ("kon geen database selecteren. ".mysqli_error());



?>