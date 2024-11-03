<?php 
/**
 * Formulaire de l'objet Lien
 * 
 * Formulaire permettant la création et la mise à jour d'un lien
 */


?>
<div class="container-fluid">

    <div class="card">
        <h3 class="card-header">
            <?= $page_titre ?>
        </h3>

        <form action="" method="POST">
            <div class="row mb-3">
                <div class="col-sm-5">
                    <label for="form-lien-nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="form-lien-nom" <?= formDefaultValue($lien->nom) ?>>
                </div>
                <div class="col-sm-5">
                    <label for="form-lien-date" class="form-label">Date de début</label>
                    <input type="date" class="form-control" id="form-lien-date" <?= formDefaultValue($lien->date_debut) ?>>
                </div>
                <div class="col-sm-2">
                    <label for="form-lien-couleur" class="form-label">Couleur</label>
                    <input type="color" class="form-control form-control-color" id="form-lien-couleur" <?= formDefaultValue($lien->couleur) ?>>
                </div>
            </div>
            <div class="mb-2">
                <button type="submit" class="btn btn-primary" name="action" value="save">Enregistrer</button>
            </div>
            <?php if(isset($lien->id) && $lien->id != 0) { ?>
                <input type="hidden" name="id" value="<?= $lien->id ?>">

                <div class="mb-2">
                    <button type="submit" class="btn btn-danger" name="action" value="delete">Supprimer</button>
                </div>
            <?php } ?>
        </form>
        
    </div>

</div>