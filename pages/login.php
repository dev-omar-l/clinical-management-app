<?php
session_start();

if(isset($_SESSION['user_id']))
{
	header("location:../index.php");
}

include("./outils/connexion.php");
include("./outils/fonctions.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//Voir si informations sont envoyés
	$username = $_POST['username'];
	$password = $_POST['password'];


if(!empty($username) && !empty($password))
{

	//Lire les informations depuis la base de données
	$query = "SELECT * from users where username = '$username' limit 1";
	$result = mysqli_query($con, $query);

	if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
					{
					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
						{

						$_SESSION['user_id'] = $user_data['user_id'];
						header('location:../index.php');

						die;
					}
				}
			}
			$_SESSION['Error'] = "L'identifiant ou le mot de passe est incorrect";
		}else
		{
			$_SESSION['Error'] = "Veuillez remplir les deux champs!";
		}
	}
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Se Connecter - GCM</title>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <!-- Google Opensans Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

        <!-- Page Icon -->
        <link rel="icon" type="image/png" href="../media/icon.png">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
        <!--Style sheet personelle -->
        <link rel="stylesheet" href="../style1.css">

        <style>
            #button_action{
            			margin-top:10px;
            			font-size:0.9em;
            
            		}
            
            
            
            
            @media (max-width: 767px) { 
            		#button_action {
            			margin-top:20px;
            			margin-bottom:10px;
            			height:30px;
            		}
            }
            
            			#contact {
                  			text-decoration:underline;
                  			color:#337AB7;
                  		}
                  
                  		#contact:hover {
                  			text-decoration:underline;
                  			color:#286291;
                  		}
        </style>

    </head>

    <body>
        <div id="wrapper">
            <!-- Couverture + Logo !-->
            <div class="row" id="banner">
                <div class="row align-items-center">

                    <div class="col">
                        <a href="../index.php">
                            <h1 id="website_logo">GCM</h1>
                        </a>
                    </div>

                    <div class="col text-end">
                        <a href="#"><img id="res_social" width="25px" src="../media/facebook.png" alt="Facebook"></a>
                        <a href="#" style="margin-right:-15px"><img id="res_social" width="25px" src="../media/instagram.png" alt="Instagram"></a>
                    </div>
                </div>

            </div>

            <!-- Menu Barre -->
            <div class="row" id="menu_barre">
                <div class="col text-end">
                    <a href="./autres/contact.php"><button id="menu_button">Contact</button></a>
                </div>

            </div>

            <!-- Contenu de la page -->
            <div class="row justify-content-center">

                <center>
                    <h2 id="titre2">Bienvenue!</h2>

                    <div class="row justify-content-center" style="font-weight:600;color:red;font-size:1.3em;margin-bottom:30px">
                        <!--Message d'erreur concernant la connexion -->
                        <?php  

					if( isset($_SESSION['Error']) )
					{
		        	echo $_SESSION['Error'];

		       		unset($_SESSION['Error']);

					}

					?>

                    </div>

                </center>

                <!-- Login Box-->
                <div class="row justify-content-center" style="background-color:#EFEFEF;margin:10px;padding:16px;border-radius:3px;width:400px">
                    <center>
                        <h3 style="font-weight:600">Connexion</h3>
                    </center>
                    <div class="col-8 justify-content-center">

                        <form method="post">
                            <label type="text" name="username" id="titre1">Identifiant:</label><br/>
                            <input type="text" name="username" autocorrect="off" autocapitalize="none" style="width:100%"><br/>

                            <label id="titre1" name="password">Mot de passe:</label><br/>
                            <input type="password" name="password" style="width:100%"></br>

                            <center><button type="submit" id="button_action">Se Connecter</button></center>
                        </form>
                        <center><a href="./autres/recuperation_login.php" style="color:#3F8BC9;font-size:0.9em;font-weight:600">Mot de passe oublié?</a></center>
                    </div>
                </div>

                <div class="column" id="text_expand1">
                    <center>
                        Veuillez utiliser l'identifiant et le mot de passe fourni par votre infermier(e) ou bien le medecin pour acceder aux informations personnelles.<br/>

                        <h2 id="titre4" style="font-size:1.3em">Besoin d'aide?</h2>
                        <a href="./autres/contact.php" id="contact"><b id="titre2">Contactez-nous</b> </a>
                    </center>
                </div>

                <!-- Pieds de la page !-->
                <div class="row" id="pied_page" style="margin-top:140px">
                    <div class="col">
                        GCM - Tout Droits Reservés © 2022</br>
                        Web Master: dev-omar-l</br>
                        </br>
                    </div>
                    <div class="col text-end">
                        <a href="./autres/a_propos.php"><u>À propos</u></a>

                    </div>
                </div>

                <!----------------------- SCRIPTS ----------------------------->
                <!--Bootstrap Script -->
                <script src="../assets/bootstrap/js/bootstrap.bundle.js">
                </script>

            </div>

        </div>

        </div>
        </div>

    </body>

    </html>