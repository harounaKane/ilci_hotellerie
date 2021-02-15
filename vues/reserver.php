<?php ob_start(); ?>

  <h2 class="text-center">Réservation</h2>
  <form action="" method="post" id="formReserver" novalidate>
    <div class="row">
      <div class="form-group col-12 col-sm-6">
        <label for="">Nom</label>
        <input type="text" name="nom" placeholder="Votre nom" class=" form-control noChiffre" required minlength="2" maxlength="20">
      </div>
      <div class="form-group col-12 col-sm-6">
        <label for="">Prénom</label>
        <input type="text" name="prenom" placeholder="Votre prénom" class="form-control noChiffre" minlength="2" maxlength="20" required>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-12 col-sm-6">
        <label for="">Téléphone</label>
        <input type="text" name="telephone" placeholder="Votre téléphone" class="form-control" required>
      </div>

      <div class="form-group col-12 col-sm-6">
        <label for="">Mail</label>
        <input type="email" name="mail" placeholder="Votre mail" class="form-control" required minlength="5" maxlength="30">
      </div>
      </div>
    <div class="row">
      <div class="form-group col-12 col-sm-6">
      <label for="">Adresse</label>
      <input type="text" name="adresse" placeholder="Votre adresse" class="form-control">
      </div>
      <div class="form-group col-12 col-sm-6">
        <label for="">Code postal</label>
        <input type="text" name="cp" placeholder="Votre code postal" class="form-control">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-12 col-sm-6">
      <label for="">Ville</label>
      <input type="text" name="ville" placeholder="Votre ville" class="form-control">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-12 col-sm-6">
        <label for="">Date arrivée</label>
        <input type="date" class="form-control" required min="<?= date('Y-m-d') ?>" id="date_debut">
      </div>
      <div class="form-group col-12 col-sm-6">
        <label for="">Date départ</label>
        <input type="date" class="form-control" required min="" id="date_fin" disabled>
      </div>
    </div>
    <input type="submit" class="btn btn-primary mt-2" name="reserver" >
  </form>

<?php $content = ob_get_clean();


include 'template.phtml';
