<?php ob_start(); ?>
    <h2 class="bg-dark text-white p-2 text-center">Détail chambre</h2>
    <div>
      <div>Prix : 100 €</div>
      <div>lits : 1</div>
      <div>nombre personne: 1</div>
      <div>Superficie : 15m²</div>
      <div>Description ....</div>
      <a href="index.php?action=reserver" class="btn btn-primary mt-1">Réserver</a>

    </div>

<?php $content = ob_get_clean();

include 'template.phtml';
