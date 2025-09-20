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

 if ($user_type != '1')
  {
    header('location:../../index.php');
  }
/* -------------------------------------------------------- */

  $sql ="SELECT * from `cab_info`";
  $result=mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($result);
  $nom_medecin=$row['nom_medecin'];
  $specialite=$row['specialite'];
  $adresse=$row['adresse'];
  $horaire_lundi_vendredi=$row['horaire_lundi_vendredi'];
  $horaire_samedi=$row['horaire_samedi'];
  $num_tel=$row['num_tel'];
  $num_tel_fixe=$row['num_tel_fixe'];
  $email=$row['email'];


    if(isset($_POST['submit'])){
    $nom_medecin=UCFIRST(STRTOLOWER($_POST['nom_medecin']));
    $specialite=UCFIRST(STRTOLOWER($_POST['specialite']));
    $adresse=UCFIRST($_POST['adresse']);
    $horaire_lundi_vendredi=$_POST['horaire_lundi_vendredi'];
    $horaire_samedi=$_POST['horaire_samedi'];
    $num_tel=$_POST['num_tel'];
    $num_tel_fixe=$_POST['num_tel_fixe'];
    $email=STRTOLOWER($_POST['email']);

    $sql="UPDATE `cab_info` set nom_medecin='$nom_medecin',specialite='$specialite',adresse='$adresse',horaire_lundi_vendredi='$horaire_lundi_vendredi',horaire_samedi='$horaire_samedi',num_tel='$num_tel',num_tel_fixe='$num_tel_fixe',email='$email'";     

    $result=mysqli_query($con,$sql);
    if($result){
      header('location:../../index.php');
    }else{
      die(mysqli_erro($con));
    }
}
?>

    <!----------------------- HTML ----------------------------->
    <!DOCTYPE html>
    <html>

    <head>
        <title>Modifier les informations du cabinet - GCM</title>
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
                <h3>Modification des informations du cabinet</h3>
            </center>

            <form method="post">

                <table>
                    <tr>
                        <td><label>Nom du medecin</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="nom_medecin" required value="<?php echo $nom_medecin ?>"></td>
                    </tr>
                    <tr>
                        <td><label>Specialité</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="specialite" required value="<?php echo $specialite ?>"></td>
                    </tr>
                    <tr>
                        <td><label>Adresse</label></td>
                        <td><textarea type="text" class="form-control" rows="3" name="adresse" value=<?php echo $adresse ?>><?php echo htmlspecialchars(
    $adresse, ENT_QUOTES, 'UTF-8') ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label>Horaire Lundi a Vendredi</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="horaire_lundi_vendredi" required value="<?php echo $horaire_lundi_vendredi ?>"></td>
                    </tr>
                    <tr>
                        <td><label>Horaire Samedi</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="horaire_samedi" required value="<?php echo $horaire_samedi ?>"></td>
                    </tr>
                    <tr>
                        <td><label>Numero mobile</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="num_tel" value="<?php echo $num_tel ?>"></td>
                    </tr>
                    <tr>
                        <td><label>Numero Fixe</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="num_tel_fixe" required value="<?php echo $num_tel_fixe ?>"></td>
                    </tr>
                    <tr>
                        <td><label>Email du cabinet</label></td>
                        <td><input type="text" class="form-control" autocomplete="off" name="email" value="<?php echo $email ?>"></td>
                    </tr>

                </table>
                <br/>

                <center>
                    <button type="submit" id="button_action" name="submit">Modifier</button>
                    <a href="../../index.php">Annuler</a></center>

            </form>

            <br/>

        </div>

    </body>

    </html>