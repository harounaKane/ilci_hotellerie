<?php

session_start();

include "fonctions/fonctions.php";

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

if( isset($_POST['reserver']) ) {
  echo "reservation OK";
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
