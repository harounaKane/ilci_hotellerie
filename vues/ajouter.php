<?php ob_start(); ?>
<form action="index.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="numRoom" value="<?= $chambre['numChambre'] ?? 0; ?>">
  <div class="row">
    <div class="form-group col-12 col-sm-3">
      <label for="">Prix</label>
      <input type="number" name="prix" value="<?= $chambre['prix'] ?? ""; ?>" class="form-control">
    </div>
     <div class="form-group col-12 col-sm-3">
      <label for="">Superficie</label>
      <input type="number" name="superficie" value="<?= $chambre['superficie'] ?? ""; ?>" class="form-control">
    </div>
     <div class="form-group col-12 col-sm-3">
      <label for="">Nombre lits</label>
      <input type="number" name="lits" value="<?= $chambre['nbreLits'] ?? ""; ?>" class="form-control">
    </div>
     <div class="form-group col-12 col-sm-3">
      <label for="">Nombre personnes</label>
      <input type="number" name="personnes" value="<?= $chambre['nbrePers'] ?? ""; ?>" class="form-control">
    </div>
    <div class="form-group col-12 col-sm-6">
      <label for="">Image</label>
      <input type="file" name="image" class="form-control">
      <?php if( !empty($chambre['image']) ): ?>
        <img src="image/<?= $chambre['image'] ?>" alt="">
        <input type="hidden" name="image_actuelle" value="<?= $chambre['image']; ?>">
      <?php endif; ?>
    </div>
    <div class="form-group col-12 col-sm-6">
      <label for="">Description</label>
      <textarea name="description" class="form-control" cols="30" rows="4"><?= $chambre['description'] ?? "Texte par default"; ?></textarea>
    </div>
  </div>
  <input type="submit" class="btn btn-primary mt-3" name="<?= isset($chambre) ? "update" : "ajouter" ?>" value="<?= isset($chambre) ? "update" : "ajouter" ?>">
</form
<?php $content = ob_get_clean();
include 'template.phtml';
