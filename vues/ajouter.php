<?php ob_start(); ?>
<form action="index.php" method="post">
  <div class="row">
    <div class="form-group col-12 col-sm-3">
      <label for="">Prix</label>
      <input type="number" name="prix" class="form-control">
    </div>
     <div class="form-group col-12 col-sm-3">
      <label for="">Superficie</label>
      <input type="number" name="superficie" class="form-control">
    </div>
     <div class="form-group col-12 col-sm-3">
      <label for="">Nombre lits</label>
      <input type="number" name="lits" class="form-control">
    </div>
     <div class="form-group col-12 col-sm-3">
      <label for="">Nombre personnes</label>
      <input type="number" name="personnes" class="form-control">
    </div>
    <div class="form-group col-12 col-sm-6">
      <label for="">Image</label>
      <input type="file" name="image" class="form-control">
    </div>
    <div class="form-group col-12 col-sm-6">
      <label for="">Description</label>
      <textarea name="description" class="form-control" cols="30" rows="4">Lorem, ipsum dolor sit amet.</textarea>
    </div>
  </div>
  <input type="submit" class="btn btn-primary mt-3">
</form
<?php $content = ob_get_clean();
include 'template.phtml';
