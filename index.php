<?php

session_start();

if( isset($_GET['action']) ){
  $action = $_GET['action'];

  if( $action == 'detail' ){
    include 'vues/chambre.php';

  }else if($action == "reserver"){
    include 'vues/reserver.php';

  }else if($action == "connexion"){
    if( isset($_SESSION['personnel']) ){
       header("location: index.php");
      exit();
    }
    require 'vues/connexion.php';

  }else if($action == "ajouter"){
    include 'vues/ajouter.php';

  }else if($action == "deconnexion"){
    session_destroy();
    header("location: index.php?action=connexion");
    exit();
  }
  else{
    echo "page 404"; //vue 404
  }
}else{
  include 'vues/accueil.phtml';
}

if( isset($_POST['reserver']) ) {
  echo "reservation OK";
}

if( !empty($_POST['login']) && !empty($_POST['mdp'])  ){
  $login = $_POST['login'];
  $mdp = $_POST['mdp'];

  $query = "SELECT * FROM personnel WHERE login = :login AND mot_de_passe = :mdp";

  $pdo = new PDO("mysql:host=localhost;dbname=ilci_hotellerie", "root", "");

  $result = $pdo->prepare($query);

  $result->execute(["login" => $login, "mdp" => $mdp]);

  if( $result->rowCount() != 0 ){

    $perso = $result->fetch();
    $_SESSION['personnel'] = $perso;

    header("location: index.php");
    exit();
  }

}

//ajout de chambre
if( !empty($_POST['prix']) ){

  $nomImage = "nom_par_défaut";

  if( $_FILES['image']['error'] == 0 ){
    $infoImage = pathinfo( $_FILES['image']['name'] );

    $extensions = ["jpg", "jpeg", "gif", "png"];

    if( in_array($infoImage['extension'], $extensions) && $_FILES['image']['size'] <= 1500000 ){

      $nomImage = $infoImage['basename'];
      move_uploaded_file($_FILES['image']['tmp_name'], "image/".$infoImage['basename']);
    }
  }

  $query = "INSERT INTO chambre VALUES(null, :prix, :superficie, :lit, :perso, :img, :descrip)";

  $pdo = new PDO("mysql:host=localhost;dbname=ilci_hotellerie", "root", "");

  $insert = $pdo->prepare($query);

  $insert->execute([
    "prix"     => $_POST['prix'],
    "superficie" => $_POST['superficie'],
    "lit"     => $_POST['lits'],
    "perso"     => $_POST['personnes'],
    "img"     => $nomImage,
    "descrip"     => $_POST['description']
  ]);

  if($insert){
    echo "Insertion réussie";
  }else{
    echo "erreur";
  }

}
// function connect(){
//   $pdo = new PDO("mysql:host=localhost;dbname=ilci_hotellerie", "root", "");

//   return $pdo;
// }
