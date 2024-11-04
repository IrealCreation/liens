<?php 
/**
 * Formulaire de l'objet Souvenir
 * 
 * Formulaire permettant la création et la mise à jour d'un Souvenir
 */

?>
<div class="container-fluid">

    <div class="card">
        <h2 class="card-header">
            <?= $page_titre ?>
        </h2>

        <form action="/souvenirs/formulaire/" method="POST" class="card-body">
            <div class="row mb-3">
                <div class="col-sm-8">
                    <label for="form-souvenir-nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="form-souvenir-nom" <?= formDefaultValue($souvenir->titre) ?>>
                </div>
                <div class="col-sm-4">
                    <label for="form-souvenir-date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="form-souvenir-date" <?= formDefaultValue($souvenir->date) ?>>
                </div>
            </div>
            <div class="mb-2">
                <button type="submit" class="btn btn-primary" name="action" value="save">Enregistrer</button>
            </div>
            <?php if(isset($souvenir->id) && $souvenir->id != 0) { ?>
                <input type="hidden" name="id" value="<?= $souvenir->id ?>">

                <div class="mb-2">
                    <button type="submit" class="btn btn-danger" name="action" value="delete">Supprimer</button>
                </div>
            <?php } ?>
        </form>
        
    </div>

</div>