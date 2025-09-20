<?php
session_start(); // demarrer la session

// Tester si l'utilisateur n'est pas deja connecté et l'envoyer a page login
if (!isset($_SESSION['user_id'])) {
    header("location: ../login.php");
    exit;
}

	include '../outils/connexion.php';

/* -------------------PRIVILEGE CHECK------------------- */
$query ="SELECT * FROM `users` ORDER BY 'user_id' DESC";
$result = mysqli_query($con, $query); 

//Lire user type depuis la base de données
$user_id = $_SESSION['user_id'];  

//Lire informations depuis la base de données
$sql = "SELECT user_type from `users` where user_id = '$user_id'";
$result = $con->query($sql);

//Mettre les informations dans la variable "row"
while ($row = $result->fetch_assoc()) {
    $user_type = $row['user_type'];
}

 if ($user_type == '3' || $user_type == '2')
  {
    header('location:../../index.php');
  }
/* -------------------------------------------------------- */

	if(isset($_GET['deleteid'])){
		$user_id=$_GET['deleteid'];


		$sql="DELETE FROM `users` where user_id=$user_id";
		$result=mysqli_query($con,$sql);

		if($result){
			header('location:../consulter_info/info_infirmiers.php');
		}
		else{
			die(mysqli_error($con));
		}
	}