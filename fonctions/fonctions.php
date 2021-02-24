<?php


function pdo(){
 return new PDO("mysql:host=localhost;dbname=ilci_hotellerie", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
 ]);
}

function connexion($login, $mdp){

  $query = "SELECT * FROM personnel WHERE login = :login AND mot_de_passe = :mdp";

  $result = pdo()->prepare($query);

  $result->execute(["login" => $login, "mdp" => $mdp]);

  if( $result->rowCount() != 0 ){

    $perso = $result->fetch();
    $_SESSION['personnel'] = $perso;

    setcookie("login", $perso['login'], time()+365*24*3600, '/', '', true, true);

    header("location: index.php");
    exit();
  }
}



function addRoom(){
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

  $insert = pdo()->prepare($query);

  $insert->execute([
    "prix"     => $_POST['prix'],
    "superficie" => $_POST['superficie'],
    "lit"     => $_POST['lits'],
    "perso"     => $_POST['personnes'],
    "img"     => $nomImage,
    "descrip"     => $_POST['description']
  ]);

  if($insert){
    header("location: .");
  }else{
    echo "erreur";
  }
}



function listeChambre(){

  $query = pdo()->prepare('SELECT numChambre, image FROM chambre');
  $query->execute();

  return $query->fetchAll();
}


function delete($id){

  $query = pdo()->prepare("DELETE FROM chambre WHERE numChambre = ?");
  $query->execute(array($id));

  $fichier_sup = "image/".$_GET['imgChambre'];

  if( file_exists($fichier_sup) ){
    unlink($fichier_sup);
  }

  if( $query->rowCount() ){
    $_SESSION['message'] = "La suppression a réussie";
  }else{
    $_SESSION['message'] = "La suppression a échoué";
  }
  header("location: .");

}


function getChambre($id){
  $query = pdo()->prepare("SELECT * FROM chambre WHERE numChambre = ?");
  $query->execute([$id]);

  return $query->fetch();
}


function update(){

  $query = "UPDATE chambre
            SET prix = :prix,
                superficie = :sup,
                nbreLits = :lit,
                nbrePers = :perso,
                image = :img,
                description = :descript
            WHERE numChambre = :idChambre";

  $query = pdo()->prepare($query);

  $query->execute([
                    "prix"      => $_POST['prix'],
                    "sup"       => $_POST['superficie'],
                    "lit"       => $_POST['lits'],
                    "perso"     => $_POST['personnes'],
                    "img"       => $_POST['image_actuelle'],
                    "descript"  => $_POST['description'],
                    "idChambre" => $_POST['numRoom']
                  ]);
}
