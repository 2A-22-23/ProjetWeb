<!DOCTYPE html>
<html lang="en">
   <head>
   <style>
        form {
   margin-top: 150px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;

}
/* Style the label */
label {
            display: block;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Style the input */
        input[type=text] {
            font-size: 18px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        input[type=text]:focus {
            outline: none;
            border-color: #66afe9;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1), 0 0 8px rgba(102, 175, 233, 0.6);
        }
        button {
    margin-top: 90px;
    padding: 10px 20px;
    background-color: #498ee7;
    color: white;
    border: none;
    border-radius: 5px;
    margin-top: 20px;
    font-size: 30px;
    cursor: pointer;
  }
  
  button :hover {
    background-color: #498ee7;
  }
  .logo {
  float: left;
  width: 100px; /* adjust the width of the logo as needed */
  height: auto;
  margin-right: 10px; /* add some spacing between the logo and the header */
  margin-left: 20px;
}

header {
  overflow: hidden;
  background-color: #333;
  padding: 20px;
  color: white;
}



   </style>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>RecycleNow</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout inner_page">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <div class="header">
       <div class="logo">
       <a href="index.php"><img src="images/logo.png" alt="#" /></a>
        </div>
         <div class="container">
            <div class="row d_flex">
               <div class=" col-md-2 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">

                     </div>
                  </div>
               </div>
               <div class="col-md-8 col-sm-12">
                  <nav class="navigation navbar navbar-expand-md navbar-dark ">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                           <li class="nav-item active">
                              <a class="nav-link" href="index.php">Home</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="about.php">About-us</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="Points.php">Points</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="Pick up points.php">Pick up points</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="Rewards.php">Rewards</a>
                           </li>
                          
                           <li class="nav-item">
                              <a class="nav-link" href="contact.php">Contact Us</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="Profile.php">Profile</a>
                           </li>
                        </ul>
                     </div>
                  </nav>
               </div>
               </div>
               <div class="col-md-2  d_none">
                  <ul class="email text_align_right">
                     <li><a href="Javascript:void(0)"> <i class="fa fa-shopping-bag" aria-hidden="true"> <span>0</span></i>
                        </a>
                     </li>
                     <li><a href="Javascript:void(0)">Sign In
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!-- end header inner -->
      <!-- ajouter -->
      <div class="form-container">
      <form action="" method="POST" id="formAjout">
         <!-- form content here -->
         <label for="utilisateur">ID de l'utilisateur :</label>
        <input type="text" id="utilisateur" name="utilisateur">
        <label for="code">Code :</label>
        <input type="text" id="code" name="code">
        <br>
        
        <button type="button" id="ajouter">Ajouter</button>
    </form>
    <?php
include 'config.php';

if(isset($_POST['utilisateur']) && isset($_POST['code'])) {
    $utilisateur = $_POST['utilisateur'];
    $code = $_POST['code'];

    // Initialize the number of points to add to 0
    $points = 0;

    // Check that the length of the code is 8 characters long
    if(strlen($code) != 8) {
        echo "<p>Le code doit être composé de 8 chiffres.</p>";
        return;
    }

    // Vérifier le préfixe du code
    switch(substr($code, 0, 1)) {
        case 'P':
            // Si le code commence par un seul P, multiplier le dernier chiffre par 150
            if(substr($code, 0, 2) != 'PP') {
                $last_digit = substr($code, -1);
                $points += $last_digit * 15;
            }
            // Si le code commence par deux P, multiplier le dernier chiffre par 100
            else {
                $last_digit = substr($code, -1);
                $points += $last_digit * 10;
            }
            break;
        case 'M':
            // Si le code commence par M, multiplier le dernier chiffre par 200
            $last_digit = substr($code, -1);
            $points += $last_digit * 20;
            break;
        default:
            // Si le code ne commence ni par P ni par M, ne rien faire
            break;
    }

    // Mettre à jour le nombre de points de l'utilisateur correspondant dans la base de données
    $sql = "UPDATE gpoints SET points = points + :points WHERE id = :id";
    try {
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindParam(':points', $points);
        $query->bindParam(':id', $utilisateur);
        $query->execute();
        echo "success";
    } catch(Exception $e) {
        echo 'Error :' .$e->getMessage();
    }
}
?>
    <script>
// Récupération du formulaire
var formAjout = document.getElementById("formAjout");

// Ajout d'un écouteur d'événements pour la soumission du formulaire
formAjout.addEventListener("submit", function(event) {
    // Empêcher le comportement par défaut du formulaire (rechargement de la page)
    event.preventDefault();
});

// Récupération du bouton "Ajouter"
var ajouter = document.getElementById("ajouter");

// Ajout d'un écouteur d'événements pour le clic sur le bouton "Ajouter"
ajouter.addEventListener("click", function() {
    // Récupération des valeurs des champs du formulaire
    var utilisateur = document.getElementById("utilisateur").value;
    var code = document.getElementById("code").value;

    // Vérification de la longueur du code
    if (code.length !== 8) {
        console.log("Le code doit être composé de 8 chiffres.");
        return;
    }

    // Création d'un objet FormData pour envoyer les données au serveur
    var formData = new FormData();
    formData.append("utilisateur", utilisateur);
    formData.append("code", code);

    // Envoi des données au serveur avec une requête AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "ajouter.php");
    xhr.onload = function() {
        // Traitement de la réponse du serveur ici
        if(xhr.responseText === "success") {
            alert("Ajout effectué !");
        } else {
            alert("Ajout non effectué");
        }
    };
    xhr.send(formData);
});

    </script>
  </div>
 <div class="leaderboard-container">
    <?php 
    include 'Leaderboard.php'; 
    ?>
</div>



      <!-- end ajouter -->

      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="infoma text_align_left">
                        <h3>Choose.</h3>
                        <ul class="commodo">
                           <li>Commodo</li>
                           <li>consequat. Duis a</li>
                           <li>ute irure dolor</li>
                           <li>in reprehenderit </li>
                           <li>in voluptate </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6">
                     <div class="infoma">
                        <h3>Get Support.</h3>
                        <ul class="conta">
                           <li><i class="fa fa-map-marker" aria-hidden="true"></i>Address : Esprit 
                           </li>
                           <li><i class="fa fa-phone" aria-hidden="true"></i>Call : +216 56946318</li>
                           <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="Javascript:void(0)"> Email : Projet-web@esprit.tn</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="infoma">
                        <h3>Company.</h3>
                        <ul class="menu_footer">
                           <li><a href="index.php">Home</a></li>
                           <li><a href="about.php">About-us </a></li>
                           <li><a href="domain.php">Points</a></li>
                           <li><a href="hosting.php">Pick up points</a></li>
                           <li><a href="contact.php">Rewards</a></li>
                           <li><a href="contact.php">Contact-us</a></li>
                           <li><a href="contact.php">Profile</a></li>


                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-6">
                     <div class="infoma text_align_left">
                        <h3>Services.</h3>
                        <ul class="commodo">
                           <li>Commodo</li>
                           <li>consequat. Duis a</li>
                           <li>ute irure dolor</li>
                           <li>in reprehenderit </li>
                           <li>in voluptate </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>© 2023 All Rights Reserved. <a href="https://html.design/"> </a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <!-- sidebar -->
      <script src="js/custom.js"></script>
   </body>
</html>