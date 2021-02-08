<?php


if( isset($_GET['action']) ){
  $action = $_GET['action'];

  if( $action == 'detail' ){
    include 'vues/chambre.php';
  }else if($action == "reserver"){
    include 'vues/reserver.php';
  }else if($action == "connexion"){
    require 'vues/connexion.php';
  }else if($action == "ajouter"){
    include 'vues/ajouter.php';
  }
  else{
    echo "page 404"; //vue 404
  }
}else{
  include 'vues/accueil.phtml';
}
