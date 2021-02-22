<?php ob_start(); ?>
<form action="" method="post">
  <div class="row">
    <div class="form-group col-12 col-sm-6">
      <label for="">Login</label>
      <input type="text" name="login" class="form-control">
    </div>
    <div class="form-group col-12 col-sm-6">
      <label for="">Password</label>
      <input type="password" name="mdp" class="form-control">
    </div>
  </div>
  <input type="submit" class="btn btn-primary mt-3">
</form>
<?php $content = ob_get_clean();
include 'template.phtml';
