<!----------------------- SECTION PHP -------------------------->
<?php
session_start(); // demarrer la session

// Tester si l'utilisateur n'est pas deja connecté et l'envoyer a page login
if (!isset($_SESSION['user_id'])) {
    header("location: ../login.php");
    exit;
}

//

  include '../outils/connexion.php';

    if(isset($_POST['submit'])){
    $nom=UCFIRST(STRTOLOWER($_POST['nom']));
    $prenom=UCFIRST(STRTOLOWER($_POST['prenom']));
    $age=$_POST['age'];
    $sexe=UCFIRST(STRTOLOWER($_POST['sexe']));
    $num_tel=$_POST['num_tel'];
    $email=STRTOLOWER($_POST['email']);
    $adresse=STRTOUPPER($_POST['adresse']);
    $nationalite=UCFIRST(STRTOLOWER($_POST['nationalite']));
    $cin=STRTOUPPER($_POST['cin']);
    $passport_num=STRTOUPPER($_POST['passport_num']);
    $salaire=$_POST['salaire'];
    $username=STRTOLOWER($_POST['username']);
    $password=$_POST['password'];


    //Lire informations depuis la base de données
    $sql="SELECT * FROM `users` where username='$username'";
    $result = mysqli_query($con,$sql);
    $num_rows = mysqli_num_rows($result);


    //Insertion dans la base de données
    $sql="INSERT INTO `users` (nom,prenom,age,sexe,num_tel,email,adresse,nationalite,cin,passport_num,salaire,username,password,user_type) values('$nom','$prenom','$age','$sexe','$num_tel','$email','$adresse','$nationalite','$cin','$passport_num','$salaire','$username','$password','2')";

    $result=mysqli_query($con,$sql);
    if($result){
      header('location:../consulter_info/info_infirmiers.php');
    }else{
      die(mysqli_erro($con));
    }
}

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

 if ($user_type == '2' || $user_type == '3')
  {
    header('location:../../index.php');
  }
/* -------------------------------------------------------- */
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Informations des infirmiers - GCM</title>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <!-- Google Opensans Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
        <!-- Page Icon -->
        <link rel="icon" type="image/png" href="../../media/icon.png">
        <!--Style sheet personelle -->
        <link rel="stylesheet" href="../../style1.css">

        <style>
            body{
                background-color:#F1F7F9;
              }
            
              #wrapper {
                background-color:#F1F7F9;
              }
            
              h3{
                margin:20px;
                font-weight:700;
                font-size:1.6em;
                }  
            
              a {
                margin-left:5px;
                font-size:1.1em;
                color:#8A8A8A;
                font-weight:700;
            
              }
              a:hover {
                color:#646464;
            
              }
            
              table {
                width:45%;
                margin:auto;
                border:1px white solid;
                padding:9px;
                border-radius:5px;
                background-color:white;
              }
              td {
                width:50%;
              }
            
              button{
                font-size:1.3em;
                height:33px;
              }
              button:hover{
                cursor:pointer;
              }
            
            
            /* ------------MEDIA QUERIES---------------*/
            
            @media (max-width: 979px) { 
                  table {
                width:70%;
                margin:auto;
                border:1px #CECECE solid;
                padding:7px;
                border-radius:5px;
              }
            
            @media (max-width: 767px) { 
                  h3{
                font-size: 1.6em;
                margin:30px;
                    }
            
                   table {
                width:100%;
                margin:auto;
                border:1px #CECECE solid;
                padding:7px;
                border-radius:5px;
              }
            
              td {
                height:50px;
              }
            
              button{
                font-size:1.3em;
                height:33px;
              }
              button:hover{
                cursor:pointer;
              }
            
              textarea {
                width:90%;
              }
            
                input{
                height:35px;
              }
            
            }
        </style>

    </head>

    <body class="container">

        <div id="wrapper">

            <center>
                <h3>Ajout d'un(e) infirmier(e)</h3>
            </center>

            <form method="post">

                <table>
                    <tr>
                        <td><label>Prenom</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="prenom" required></td>
                    </tr>
                    <tr>
                        <td><label>Nom</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="nom" required></td>
                    </tr>
                    <tr>
                        <td><label>Age</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="age" required></td>
                    </tr>
                    <tr>
                        <td><label>Sexe</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="sexe" required></td>
                    </tr>
                    <tr>
                        <td><label>Numero Telephone</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="num_tel" required></td>
                    </tr>
                    <tr>
                        <td><label>Adresse email</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="email"></td>
                    </tr>
                    <tr>
                        <td><label>Adresse</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="adresse"></td>
                    </tr>
                    <tr>
                        <td><label>Nationalité</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="nationalite"></td>
                    </tr>
                    <tr>
                        <td><label>CIN</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="cin"></td>
                    </tr>
                    <tr>
                        <td><label>Passport Numero</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="passport_num"></td>
                    </tr>
                    <tr>
                        <td><label>Salaire en Dirhame</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="assurance"></td>
                    </tr>
                    <td><label>Identifiant</label></td>
                    <td><input type="text" class="form-control" autocomplete="off" name="username"></td>
                    </tr>
                    <tr>
                        <td><label>Mot de passe</label></td>
                        <td><input type="password" class="form-control" autocomplete="new-password" name="password"></td>
                    </tr>

                </table>
                <br/>

                <center>
                    <button type="submit" id="button_action" name="submit">Ajouter</button>
                    <a href="../consulter_info/info_infirmiers.php">Annuler</a></center>

            </form>

            <br/>
        </div>

    </body>

    </html>