<?php ob_start(); ?>

  <h2 class="text-center">Réservation</h2>
  <form action="">
    <div class="row">
      <div class="form-group col-12 col-sm-6">
        <label for="">Nom</label>
        <input type="text" name="nom" placeholder="Votre nom" class=" form-control">
      </div>
      <div class="form-group col-12 col-sm-6">
        <label for="">Prénom</label>
        <input type="text" name="prenom" placeholder="Votre prénom" class="form-control">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-12 col-sm-6">
        <label for="">Téléphone</label>
        <input type="text" name="telephone" placeholder="Votre téléphone" class="form-control">
      </div>

      <div class="form-group col-12 col-sm-6">
        <label for="">Mail</label>
        <input type="email" name="mail" placeholder="Votre mail" class="form-control">
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
        <input type="date" class="form-control">
      </div>
      <div class="form-group col-12 col-sm-6">
        <label for="">Date départ</label>
        <input type="date" class="form-control">
      </div>
    </div>
    <input type="submit" class="btn btn-primary mt-2">
  </form>


<?php $content = ob_get_clean();


include 'template.phtml';
