<!----------------------- SECTION PHP -------------------------->
<?php
session_start(); // demarrer la session

// Tester si l'utilisateur n'est pas deja connecté et l'envoyer a page login
if (!isset($_SESSION['user_id'])) {
    header("location:../login.php");
    exit;
}

// Inclure connexion a la base de donnees et fonctions
include("../outils/connexion.php");
include("../outils/fonctions.php");

$query ="SELECT * FROM `demande_recuperation` ORDER BY 'date_demande' DESC";
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

 if ($user_type != '1')
 	{
 		header('location:../../index.php');
 	}
?>

<!----------------------- HTML ----------------------------->
    <!DOCTYPE html>
    <html>

    <head>
        <title>Afficher les demandes de recuperation du Login - GCM</title>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <!-- Google Opensans Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

        <!-- Page Icon -->
        <link rel="icon" type="image/png" href="../media/icon.png">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.css">
        <!-- DataTables -->
        <link rel="stylesheet" type="text/css" href="../../assets/DataTables/datatables.min.css" />
        <script type="text/javascript" src="../../assets/DataTables/datatables.min.js"></script>

        <!-- JQuery + DataTables -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

        <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">

        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

        <!--Style sheet personelle -->
        <link rel="stylesheet" href="../../style1.css">

         <style>

          #wrapper{
            font-size:1.6em;
            height:800px;
            }
            
          #website_logo {
            margin-top:3px;
            margin-left:10px;
            font-size:3.9em;

          }
            
      		#banner {
      			padding-left:4px;
      			padding-right:4px;
      		}
      		#menu_barre{
      			padding-right:3px;
      			padding-left:3px;
      		}
      		a {
      			text-decoration:none;
      			color:white;
      		}
      
      		a:hover {
      			text-decoration:none;
      			color:white;
      		}
            
            
            /*Buttons*/
            	#gestion_button{
              		float:left;
              	}
          
              	#button_action {
              		font-size:0.7em;
              		margin:3px;
              	}
              	#button_action3 {
              		font-size:0.7em;
              		margin:3px;
              		padding:3px;
              	}
              	#button_action4 {
              		font-size:0.7em;
              		margin:3px;
              	}
                #button_action5 {
                  border-radius:3px;
                  padding-top:0px;
                  padding-bottom:0px;
                }
                        
            
            /* -----------Media Queries -------------- */
            
              		@media (max-width: 767px) {
            
                  #wrapper {
                  	width:100%;
                  }

                  #button_action6 {
                    font-size:0.8em;
                  }

                  #website_logo {
                    font-size:3em;
                  }

                  .table-responsive {
                    font-size:0.7em;

                  }
            
            
              	}
            
              	@media (max-width: 400px) {
            
              	#gestion_button{
              		float:right;
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
                         <div>
                            <a href="../outils/logout.php" style="float:right;margin-right:-15px"><button id="button_action5">Deconnexion</button></a>
                        </div>
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

            <center>
                <h2>Demandes de recuperation du Login</h2>
            </center>

            <hr>

            <div>
                <a href="../consulter_info/info_patients.php" id="gestion_button">
                    <button id="button_action6">
					Gerer les informations des patients		
				</button>
                </a>
            </div>

             <br>
             <br>
             <br>
             <br>
             <br>


            <hr>

            <!-- Demandes de recuperations -->

            <div class="table-responsive">
                <table class="table table-striped " id="users" > 
                    <thead>
                        <tr>
                            <th scope="col">Email</th>
                            <th scope="col">Numero Telephone</th>
                            <th scope="col">Date Demande</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
$sql="SELECT * FROM `demande_recuperation` ORDER BY date_demande DESC ";
$result = mysqli_query($con, $sql);
if($result)
{
	while($row=mysqli_fetch_assoc($result))
	{
		$email=$row['email'];
		$num_tel=$row['num_tel'];
		$date_demande=$row['date_demande'];

		echo '<tr>
		      <td>'.$email.'</td>
		      <td>'.$num_tel.'</td>
		      <td>'.$date_demande.'</td>
		    </tr>';
	}
}

		  	?>
                </table>

            </div>

        </div>

    </body>

    </html>