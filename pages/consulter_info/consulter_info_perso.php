<!----------------------- SECTION PHP -------------------------->
<?php
session_start(); // demarrer la session

// Tester si l'utilisateur n'est pas deja connecté et l'envoyer a page login
if (!isset($_SESSION['user_id'])) {
    header("location: ../login.php");
    exit;
}

// Inclure connexion a la base de donnees et fonctions
include("../outils/connexion.php");
include("../outils/fonctions.php");

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

 if ($user_type == '1' || $user_type == '2')
  {
    header('location:../../index.php');
  }
/* -------------------------------------------------------- */


$query ="SELECT * FROM `users` ORDER BY 'user_id' DESC";
$result = mysqli_query($con, $query);

//Lire user type depuis la base de données
$user_id = $_SESSION['user_id'];

$sql = "SELECT user_type from `users` where user_id = '$user_id'";
$result = $con->query($sql);

while ($row = $result->fetch_assoc()) {
    $user_type = $row['user_type'];
}
?>

<!----------------------- HTML ----------------------------->
<!DOCTYPE html>
<html>
<head>
	<title>Informations personnelles - GCM</title>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1" name="viewport" />

<!-- Google Opensans Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

<!-- Page Icon -->
	<link rel="icon" type="image/png" href="../../media/icon.png">
<!-- Bootstrap -->
	<link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.css">
<!-- DataTables -->
	<script type="text/javascript" src="../../assets/DataTables/datatables.min.js"></script>

<!--Style sheet personelle -->
			<link rel="stylesheet" href="../../style1.css">

	<style>

		/* Landscape phones and down */
	@media (max-width: 480px) { 
    table{
    font-size: 0.9em;
    width:360px;
    height:1000px;
  }
		
	</style>




</head>


<body>

	<div class="" id="wrapper">
		<!-- Couverture + Logo !-->
			<div class="row" id="banner">
				<div class="row align-items-center">

					<div class="col">
						<a href="../../index.php">
							<h1 id="website_logo">GCM</h1>
						</a>
					</div>

					<div class="col text-end">
					<a href="#"><img id="res_social" width="25px" src="../../media/facebook.png" alt="Facebook"></a>
					<a href="#" style="margin-right:-15px"><img id="res_social" width="25px" src="../../media/instagram.png" alt="Instagram"></a>
					</div>
				</div>

			</div>

		<!-- Menu Barre -->		
			<div class="row" id="menu_barre">
				<div class="col text-end">
					<a href="../../index.php"><button id="menu_button">Accueil</button></a>
					<a href="../autres/contact.php"><button id="menu_button">Contact</button></a>
				</div>

			</div>

			<center><h2>Rendez Vous et informations personelles</h2></center>

			<hr>

<?php
$sql="SELECT * FROM `users` where user_id=$user_id";
$result = mysqli_query($con, $sql);

if($result)
{
	while($row=mysqli_fetch_assoc($result))
	{
		$user_id=$row['user_id'];
		$prenom=$row['prenom'];
		$nom=$row['nom'];
		$age=$row['age'];
		$sexe=$row['sexe'];
		$num_tel=$row['num_tel'];
		$email=$row['email'];
		$adresse=$row['adresse'];
		$nationalite=$row['nationalite'];
		$rdv_prochain_date=$row['rdv_prochain_date'];
    	$rdv_prochain_temps=$row['rdv_prochain_temps'];
		$cin=$row['cin'];
		$passport_num=$row['passport_num'];
		$assurance=$row['assurance'];
		$assurance_num=$row['assurance_num'];
		$date_ajout=$row['date_ajout'];
	}
}
?>

<!-- Rendez vous -->

	<center><h2 id="titre4">Prochain rendez-vous:</h2>
	<h3><?php 
	if ($rdv_prochain_date == '0000-00-00')
	{
		echo "Aucun.";
	}else
	{
		echo $rdv_prochain_date;
		echo " à ";
		echo $rdv_prochain_temps;
	} 
	?></h3>
	</center>

<!-- Tableux informations -->

<div class="row" style="margin-top:25px">
	<center>
		<div>
			<table class="table table-striped border">
				<tr>
					<th>Prenom</th>
					<td><?php echo $prenom ?></td>
				</tr>
					<th>Nom</th>
					<td><?php echo $nom ?></td>
				</tr>
					<th>Age</th>
					<td><?php echo $age ?></td>
				</tr>
					<th>Sexe</th>
					<td><?php echo $sexe ?></td>
				</tr>
					<th>Numero Telephone</th>
					<td><?php echo $num_tel ?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?php echo $email ?></td>
				</tr>
					<th>Adresse</th>
					<td><?php echo $adresse ?></td>
				<tr>
					<th>Nationalite</th>
					<td><?php echo $nationalite ?></td>
				</tr>
					<th>CIN</th>
					<td><?php echo $cin ?></td>
				<tr>
					<th>Numero Passport</th>
					<td><?php echo $passport_num ?></td>
				</tr>
				<tr>
					<th>Assurance</th>
					<td><?php echo $assurance ?></td>
				</tr>
				<tr>
					<th>Numero Assurance</th>
					<td><?php echo $assurance_num ?></td>
				</tr>
			</table>
		</center>
	</div>
</div>


</div>


</body>
</html>