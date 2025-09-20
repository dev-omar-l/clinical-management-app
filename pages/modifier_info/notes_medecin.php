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

 if ($user_type == '2' || $user_type == '3')
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
  $notes=$row['notes'];





    if(isset($_POST['submit'])){
    $nom=$row['nom'];
    $notes=$_POST['notes'];


    $sql="UPDATE `users` set user_id='$user_id',notes='$notes' WHERE user_id=$user_id";

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
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.css">
        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="../../assets/DataTables/datatables.min.css" />
        <!--Style sheet personelle -->
        <link rel="stylesheet" href="../../style1.css">

        <style>
            input {
                  height:450px;
                }
        </style>

    </head>

    <body class="container">

        <div class="container" id="wrapper">

            <center>
                <h2>Notes du patient:</h2>

                <h3>
                    <?php echo $prenom;
        echo " ";
        echo $nom;
      ?>
                </h3>
            </center>

            <form method="post">
                <div>
                    <label>Notes</label>
                    <textarea style="width:100%" name="notes" rows="17" cols="150"><?php echo htmlspecialchars(
    $notes, ENT_QUOTES, 'UTF-8') ?></textarea>
                </div>

                <button type="submit" id="button_action" name="submit" style="margin-top:5px">Enregistrer</button>
                <a href="../consulter_info/info_patients.php" id="button_action5">Annuler</a>
            </form>

            <!----------------------- SCRIPTS ----------------------------->
            <!--Bootstrap Script -->
            <script src="../../assets/bootstrap/js/bootstrap.bundle.js"></script>
            <!--DataTables Script -->
            <script type="text/javascript" src="../../assets/DataTables/datatables.min.js"></script>

        </div>

    </body>

    </html>