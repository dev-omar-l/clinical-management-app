<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "cab_medi";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
	die("Probleme de connexion a la base de donnée.");
}