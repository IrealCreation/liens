<?php 
/**
 * Affichage du détail d'un Souvenir
 * 
 * Affiche le contenu d'un souvenir (métadonnées, textes et images)
 */

?>
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h2><?= $souvenir->titre; ?></h2>
            <p><?= dateLisible($souvenir->date); ?></p>
        </div>

        <div class="card-body">
            <h3>Textes</h3>
            <?php $texte_utilisateur = false; // L'utilisateur a-t-il déjà écrit un texte pour ce souvenir ?
            if(count($souvenir->textes) > 0) { ?>
                <div class="accordion" id="textes-accordion">
                    <?php foreach($souvenir->textes as $texte) { ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-<?= $texte->id ?>">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $texte->id ?>" aria-expanded="true" aria-controls="collapse-<?= $texte->id ?>">
                                    <?= $texte->utilisateur_nom; ?>
                                </button>
                            </h2>
                            <div id="collapse-<?= $texte->id ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?= $texte->id ?>" data-bs-parent="#textes-accordion">
                                <div class="accordion-body">
                                    <?= $texte->contenu; ?>
                                    <?php if($texte->utilisateur_id == $_SESSION["utilisateur_id"]) {
                                        $texte_utilisateur = true; ?>
                                        <a href="/textes/<?= $texte->id ?>"><button class="btn btn-primary" title="Modifier"><span class="bi bi-pencil-fill"></span></button></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            
            <?php if(!$texte_utilisateur) { ?>
                <a href="/souvenirs/<?= $souvenir->id ?>/texte"><button class="btn btn-success">Ajouter un texte</button></a>
            <?php } ?>
        </div>
    </div>
</div>