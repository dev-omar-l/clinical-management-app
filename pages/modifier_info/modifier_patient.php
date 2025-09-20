<!----------------------- SECTION PHP -------------------------->
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

 if ($user_type == '3')
  {
    header('location:../../index.php');
  }
/* -------------------------------------------------------- */

  $user_id=$_GET['modifyid'];

  $sql ="SELECT * from `users` where user_id=$user_id";
  $result=mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($result);
  $nom=$row['nom'];
  $prenom=$row['prenom'];
  $age=$row['age'];
  $sexe=$row['sexe'];
  $num_tel=$row['num_tel'];
  $email=$row['email'];
  $adresse=$row['adresse'];
  $nationalite=$row['nationalite'];
  $cin=$row['cin'];
  $passport_num=$row['passport_num'];
  $assurance=$row['assurance'];
  $assurance_num=$row['assurance_num'];
  $username=$row['username'];
  $password=$row['password'];
  $rdv_prochain_date=$row['rdv_prochain_date'];
  $rdv_prochain_temps=$row['rdv_prochain_temps'];





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
    $assurance=STRTOUPPER($_POST['assurance']);
    $assurance_num=STRTOUPPER($_POST['assurance_num']);
    $username=STRTOLOWER($_POST['username']);
    $password=$_POST['password'];
    $rdv_prochain_date=$_POST['rdv_prochain_date'];
    $rdv_prochain_temps=$_POST['rdv_prochain_temps'];


    //Lire informations depuis la base de données
    $sql="SELECT * FROM `users` where username='$username'";
    $result = mysqli_query($con,$sql);
    $num_rows = mysqli_num_rows($result);


    $sql="UPDATE `users` set user_id='$user_id',nom='$nom',prenom='$prenom',age='$age',sexe='$sexe',num_tel='$num_tel',email='$email',adresse='$adresse',nationalite='$nationalite',cin='$cin',passport_num='$passport_num',assurance='$assurance',assurance_num='$assurance_num',username='$username',password='$password',rdv_prochain_date='$rdv_prochain_date',rdv_prochain_temps='$rdv_prochain_temps' WHERE user_id=$user_id";

    $result=mysqli_query($con,$sql);
    if($result){
      header('location:../consulter_info/info_patients.php');
    }else{
      die(mysqli_erro($con));
    }
}
?>

    <!----------------------- HTML ----------------------------->
    <!DOCTYPE html>
    <html>

    <head>
        <title>Informations des patients - GCM</title>
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
                width:50%;
                margin:auto;
                border:1px #CECECE solid;
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
            
              textarea {
                width:90%;
              }
            
                input{
                height:35px;
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
            
              input{
                height:40px;
              }
            
              button{
                font-size:1.2em;
                height:33px;
              }
            
            
              textarea {
                width:90%;
                height:100px;
              }
            
            }
        </style>

    </head>

    <body>

        <div id="wrapper">

            <center>
                <h3>Modification du patient</h3>
            </center>

            <form method="post">

                <table>
                    <tr>
                        <td><label>Prenom</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="prenom" required value=<?php echo $prenom ?>></td>
                    </tr>
                    <tr>
                        <td><label>Nom</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="nom" required value=<?php echo $nom ?>></td>
                    </tr>
                    <tr>
                        <td><label>Age</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="age" required value=<?php echo $age ?>></td>
                    </tr>
                    <tr>
                        <td><label>Sexe</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="sexe" required value=<?php echo $sexe ?>></td>
                    </tr>
                    <tr>
                        <td><label>Numero Telephone</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="num_tel" required value=<?php echo $num_tel ?>></td>
                    </tr>
                    <tr>
                        <td><label>Adresse email</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="email" value=<?php echo $email ?>></td>
                    </tr>
                    <tr>
                        <td><label>Adresse</label></td>
                        <td><textarea type="text" class="form-control" rows="3" name="adresse" value=<?php echo $adresse; ?>><?php echo htmlspecialchars(
    $adresse, ENT_QUOTES, 'UTF-8') ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label>Nationalité</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="nationalite" value=<?php echo $nationalite ?>></td>
                    </tr>
                    <tr>
                        <td><label>CIN</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="cin" value=<?php echo $cin ?>></td>
                    </tr>
                    <tr>
                        <td><label>Passport Numero</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="passport_num" value=<?php echo $passport_num ?>></td>
                    </tr>
                    <tr>
                        <td><label>Type Assurance</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="assurance" value=<?php echo $assurance ?>></td>
                    </tr>
                    <tr>
                        <td><label>Assurance Numero</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="assurance_num" value=<?php echo $assurance_num ?>></td>
                    </tr>
                    <tr>
                        <td><label>Identifiant</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="username" value=<?php echo $username ?>></td>
                    </tr>
                    <tr>
                        <td><label>Mot de passe</label></td>
                        <td><input type="password" class="form-control" autocomplete="new-password" name="password" value=<?php echo $password ?>></td>
                    </tr>
                    <tr>
                        <td><label>Rendez-vous</label></td>
                        <td><input type="date" name="rdv_prochain_date" value=<?php echo $rdv_prochain_date ?>><input type="time" name="rdv_prochain_temps" value=<?php echo $rdv_prochain_temps ?>><br/></td>
                    </tr>

                </table>
                <br/>

                <center>
                    <button type="submit" id="button_action" name="submit">Modifier</button>
                    <a href="../consulter_info/info_patients.php">Annuler</a></center>

            </form>

            <br/>

        </div>

    </body>

    </html>