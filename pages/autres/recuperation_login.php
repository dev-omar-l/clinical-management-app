<?php
include '../outils/connexion.php';

    if(isset($_POST['submit'])){
    $email=UCFIRST(STRTOLOWER($_POST['email']));
    $num_tel=$_POST['num_tel'];


    //Insertion dans la base de données
    $sql="INSERT INTO `demande_recuperation` (email,num_tel) values('$email','$num_tel')";

   $result=mysqli_query($con,$sql);
    if($result){
		echo 'Demande envoyée';
    }else{
      	die(mysqli_erro($con));
    }
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Recupération Login - GCM</title>
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
    width:50%;
  }

/* Large desktop */
@media (min-width: 1200px) { 
      #champs_responsive{
    width:40%;
  }
}

/* Portrait tablet to landscape and desktop */
@media and (max-width: 979px) { 
     #champs_responsive{
     	width: 55%;
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
				<center><h2 id="titre2">Recuperation des informations de connexion</h2></center>

				<div class="row" style="margin-bottom:6px">
					<div class ="col" id="champs_responsive">
						<center>Veuillez entrer vos informations pour recevoir</br> votre identifiant ou mot de passe oublié.</center>
					</div>
				</div>

				<div class="row" style="margin-bottom:6px">
					<div class ="col" id="champs_responsive">
						<center>
							<div class="col" style="background-color:#EFEFEF;padding:16px;border-radius:9px" id="champs_responsive">
								<form method="POST">
								 	<label>Adresse Email:</label><br/>
									<input style="width:70%" type="text" name="email"><br/>
									<label>Numero de Telephone:</label><br/>
									<input style="width:70%" type="text" name="num_tel"> </br>
									<button type="submit" id="button_action" name="submit">Envoyer</button>
								</form>
							</div>
						</center>
					</div>
				</div>

				<div class="row" style="margin-bottom:6px">
					<div class ="col">
						<center>
							<div class="col" style="background-color:#EFEFEF;padding:16px;border-radius:9px" id="champs_responsive">
								Si vous avez encore de problemes.</br> 
								Veuillez nous contacter:<br/>
								Numero telephone: 06.12.34.56.78<br/>
								Email: cab-medi123@gmail.com<br/>
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

	<!--Bootstrap Script -->
		<script src="../../assets/bootstrap/js/bootstrap.bundle.js">
		</script>
		
	</div>

</body>
</html>