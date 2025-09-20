<!----------------------- SECTION PHP -------------------------->
<?php
// Inclure connexion a la base de donnees et fonctions
include("../outils/connexion.php");
include("../outils/fonctions.php");

$query ="SELECT * FROM `cab_info`";
$result = mysqli_query($con, $query); 
 

//Mettre les informations dans la variable "row"
while ($row = $result->fetch_assoc()) {
    $nom_medecin = $row['nom_medecin'];
    $specialite = $row['specialite'];
    $adresse = $row['adresse'];
    $horaire_lundi_vendredi = $row['horaire_lundi_vendredi'];
    $horaire_samedi = $row['horaire_samedi'];
    $num_tel = $row['num_tel'];
    $num_tel_fixe = $row['num_tel_fixe'];
    $email = $row['email'];

}
?>

<!----------------------- HTML ----------------------------->
<!DOCTYPE html>
<html>
<head>
	<title>Contact - GCM</title>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1" name="viewport" />

<!-- Google Opensans Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

<!-- Page Icon -->
	<link rel="icon" type="image/png" href="../../media/icon.png">
<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.css">
<!--Style sheet personelle -->
	<link rel="stylesheet" href="../../style1.css">

	<style>

		#champs_responsive{
			width:40%;
		}

/* Portrait tablet to landscape and desktop */
@media (min-width: 768px) and (max-width: 979px) { 
     #champs_responsive{
     	width: 45%;
     }

}

		/* Landscape phone to portrait tablet */
@media (max-width: 767px) { 
	#champs_responsive{
		width:80%;
	}

}
 
/* Landscape phones and down */
@media only screen and (max-width: 480px) {
	#champs_responsive{
		width:100%;
	}

}

	</style>

</head>

<body>

	<div id="wrapper">
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
			<a href="contact.php"><button id="menu_button">Contact</button></a>
		</div>
	</div>

	<!-- Contenu de la page -->
			<div class="row justify-content-center">
				<center><h2 id="titre2">Contact et informations generales</h2></center>


				<div class="row" style="margin-bottom:6px">
					<div class ="col" id="champs_responsive">

						<hr>
						<center>
							<div class="col" style="background-color:#EFEFEF;padding:16px;border-radius:9px" id="champs_responsive">

								<div class="col text-center" style="padding:0px;width:90%;background-color:#EFEFEF;border-radius:3px">
							<h3>Informations Generales:</h3>
							<b id="titre2">Nom du Medecin:</b> <?php echo $nom_medecin ?><br/>
							<b id="titre2">Specialité: </b><?php echo $specialite ?><br/>
							<b id="titre2">Adresse:</b> <?php echo $adresse ?><br/>
							<b id="titre2">Horaire:</b>
							Lundi à Vendredi : <?php echo $horaire_lundi_vendredi ?><br/>
							Samedi : <?php echo $horaire_samedi ?>
								</div>
								
							</div>
						</center>
					</div>
				</div>

				<div class="row" style="margin-bottom:6px">
					<div class ="col" id="champs_responsive">
						<center>
							<div class="col" style="background-color:#EFEFEF;padding:16px;border-radius:9px" id="champs_responsive">

								<div class="col text-center" style="padding:0px;width:90%;background-color:#EFEFEF;border-radius:3px">
							<h3>Contactez-Nous:</h3>
							<b >Numero mobile:</b> <?php echo $num_tel ?><br/>
							<b >Numero fixe:</b><?php echo $num_tel_fixe ?><br/>
							<b >Email:</b> <?php echo $email ?> <br/>
								</div>
								
							</div>
						</center>
					</div>
				</div>

				<div class="row" style="margin-bottom:6px">
					<div class ="col" id="champs_responsive">
						<center>
							<div class="col" style="background-color:#EFEFEF;padding:16px;border-radius:9px" id="champs_responsive">

								<div class="col text-center" style="padding:0px;background-color:#EFEFEF;border-radius:3px">
							<a style="font-weight:700;color:#3F8BC9" href="a_propos.php"><h3 style="font-weight:700;">À Propos</h3></a>
								</div>
								
							</div>
						</center>
					</div>
				</div>

				
			</div>

	<!-- Pieds de la page !-->
		<div class="row" id="pied_page">
			<div class="col">
				GCM - Tout Droits Reservés © 2022</br>
				Web Master: dev-omar-l</br>
				</br>
			</div>

			<div class="col text-end">
				<a href="a_propos.php"><u>À propos</u></a>

			</div>	
		</div>

</body>
</html>

<!----------------------- SCRIPTS ----------------------------->
	<!--Bootstrap Script -->
		<script src="../../assets/bootstrap/js/bootstrap.bundle.js">
		</script>
		
	</div>