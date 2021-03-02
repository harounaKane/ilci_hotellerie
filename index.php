<?php

session_start();

include "fonctions/fonctions.php";

if( isset($_POST['nom']) ) {
  $query = "INSERT INTO client VALUES(Null, :nom, :prenom, :tel, :adresse, :cp, :ville, :mail )";
  $connexion = pdo();
  $statement = $connexion->prepare($query);
  $statement->execute([
                      "nom" => $_POST['nom'],
                      "prenom" => $_POST['prenom'],
                      "tel" => $_POST['telephone'],
                      "adresse" => $_POST["adresse"],
                      "cp" => $_POST['cp'],
                      "ville" => $_POST['ville'],
                      "mail" => $_POST['mail']
                    ]);

  $id_client = $connexion->lastInsertId();
  // var_dump($id_client);
  $query = "INSERT INTO reserver VALUES(?, ?, ?, ?)";
  $statement = $connexion->prepare($query);
  $statement->execute(array($id_client, $_POST['idChambre'], $_POST['date_debut'], $_POST['date_fin']) );

  header("location: index.php");
  exit;
}

if( !empty($_POST['login']) && !empty($_POST['mdp'])  ){
  $login = $_POST['login'];
  $mdp = $_POST['mdp'];

  connexion($login, $mdp);
}

//ajout de chambre
if( !empty($_POST['prix']) && isset($_POST['ajouter']) ){
  addRoom();
}

if( !empty($_POST['prix']) && isset($_POST['update']) ){
  update();
}

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

  }elseif( $action == "delete" ){
    delete($_GET['idChambre']);

  }elseif ( $action == "update" ) {
    $chambre = getChambre($_GET['idChambre']);
    include "vues/ajouter.php";
    //update($_GET['idChambre']);
  }

  else{
    echo "page 404"; //vue 404
  }
}else{
  $chambres = listeChambre();
  include 'vues/accueil.phtml';
}
