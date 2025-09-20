<!--
Developped ~17/06/2022 -- 01/07/2022.
Academic Project.
-->

<!----------------------- SECTION PHP -------------------------->
<?php

//Demarrer session
session_start();
$_SESSION;
//Inclure connexion a la base de données + fonctions.
include("./pages/outils/connexion.php");
include("./pages/outils/fonctions.php");

$user_data = check_login($con);

//Lire user id depuis la base de données
$user_id = $_SESSION['user_id'];

//Lire user type depuis la base de données
$sql = "SELECT user_type,prenom,nom from `users` where user_id = '$user_id'";
//Mettre user type (et nom) dans la variable row
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {
    $user_type = $row['user_type'];
    $prenom = $row['prenom'];
    $nom = $row['nom'];
}

?>

    <!----------------------- HTML ----------------------------->
    <!DOCTYPE html>
    <html>

    <head>
        <title>Accueil - GCM</title>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <!-- Google Opensans Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

        <!-- Page Icon -->
        <link rel="icon" type="image/png" href="./media/icon.png">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
        <!--Style sheet personelle -->
        <link rel="stylesheet" href="style1.css">

        <!----------------------- STYLE ----------------------------->
        <style>
            #button_action5 {
                          		border-radius:3px;
                          		padding-top:0px;
                          		padding-bottom:0px;
                          		margin-right:-7px;
                          	}
        </style>

    </head>

    <body class="">
        <div class="" id="wrapper">

            <!-- Couverture + Logo !-->
            <div class="row" id="banner">
                <div class="row align-items-center">

                    <div class="col">
                        <a href="index.php">
                            <h1 id="website_logo">GCM</h1>
                        </a>
                    </div>

                    <div class="col text-end">
                        <div>
                            <a href="./pages/outils/logout.php" style="float:right;margin-right:-15px"><button id="button_action5">Deconnexion</button></a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Menu Barre -->
            <div class="row" id="menu_barre">

                <div class="col text-end">
                    <a href="index.php"><button id="menu_button">Accueil</button></a>
                    <a href="./pages/autres/contact.php"><button id="menu_button">Contact</button></a>
                </div>

            </div>

            <center>
                <h2>Accueil</h2>
            </center>
            <hr>

            <!-- Contenu de la page -->
            <div class="row" style="height:530px">

                <div class="col">
                    <center>
                        <!-- Donner a chaque utilisateur ses buttons basé sur user_type [privilege] -->
                        <?php if ($user_type == '1' || $user_type == '2')
						{ ?>
                        <a href="./pages/consulter_info/info_patients.php"><button id="menu_button" style="margin:2px">Informations des patients</button></a>
                        <?php } ?>

                        <?php if ($user_type == '1')
						{ ?>
                        <a href="./pages/consulter_info/info_infirmiers.php"><button id="menu_button" style="margin:2px">Informations des infirmiers</button></a>
                        <?php } ?>

                        <?php if ($user_type == '3')
						{ ?>
                        <a href="./pages/consulter_info/consulter_info_perso.php"><button id="menu_button" style="margin:2px">Consulter rendez-vous et informations personnelles</button></a>
                        <?php } ?>

                        <?php if ($user_type == '1')
						{ ?>
                        <a href="./pages/modifier_info/modifier_cab_info.php"><button id="menu_button" style="margin:2px">Modifier les informations du cabinet</button></a>
                        <?php } ?>

                        <?php if ($user_type == '1')
                        { ?>
                        <a href="./pages/consulter_info/consulter_demande_recuperation.php"><button id="menu_button" style="margin:2px">Demandes recuperation du Login</button></a>
                        <?php } ?>

                        <hr>

                        <h3>
                            <?php echo "Bonjour",", ",$prenom," ",$nom;?>
                        </h3>

                    </center>
                </div>

            </div>

            <!-- Pieds de la page !-->
            <div class="row" id="pied_page">
                <div class="col">
                    GCM - Tout Droits Reservés © 2022</br>
                    dev-omar-l</br>
                    </br>
                </div>
                <div class="col text-end">
                    <a style="font-weight:600" href="./pages/autres/a_propos.php"><u>À propos</u></a>

                </div>
            </div>

            <!----------------------- SCRIPTS ----------------------------->
            <!--Bootstrap Script -->
            <script src="./assets/bootstrap/js/bootstrap.bundle.js">
            </script>

        </div>

    </body>

    </html>