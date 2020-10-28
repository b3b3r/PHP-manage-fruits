<?php
  require_once("./class/format.class.php");
  include("./common/header.php");
  include("./common/menu.php");
?>
<div class="container">
  <?php echo FormatTitle::levelOne("Bienvenu sur le site"); ?>
  <div class="row">
    <div class="col">
      <h2 class="text-center">Gestion fruits</h2>
      <div class="mx-auto" style="width:150px"><a class="btn btn-outline-primary" href="displayFruits.php" role="button">Voir les fruits</a></div>
    </div>
    <div class="col">
      <h2 class="text-center">Gestion paniers</h2>
      <div class="mx-auto" style="width:150px"><a class="btn btn-outline-primary" href="displayCarts.php" role="button">Voir les paniers</a></div>
    </div>
  </div>
</div>
<?php
  include("./common/footer.php");
?>