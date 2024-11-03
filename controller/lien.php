<?php
/**
 * Création / Modification / Suppression d'un lien
 */

require_once "../inc/functions.php";

$erreur = null;

if(!isset($_POST["action"])) {
    // Ouverture initiale de la page 
    
    if(!isset($_GET["id"])) {
        // Affichage du formulaire pour création d'un lien vide
        $page_titre = "Création d'un Lien";
        $lien = new Lien;
    }
    else {
        // Affichage du formulaire pour mise à jour d'un lien existant
        $page_titre = "Modification d'un Lien";
        $lien = Lien::selectById($_GET["id"]);
        if($lien == null) {
            $erreur = "Id du Lien inconnu";
        }
    }
}
else {
    // Envoi du formulaire
    
    if(!isset($_POST["id"])) {
        // Création d'un nouveau lien
        $lien = new Lien;
        $lien->nom = $_POST["nom"];
        $lien->date_debut = $_POST["date_debut"];
        $lien->couleur = $_POST["couleur"];
        $lien->insert();
    }
    else {
        // Modification d'un lien existant
        $page_titre = "Modification d'un Lien";
        $lien = Lien::selectById($_GET["id"]);
        if($lien == null) {
            $erreur = "Id du Lien inconnu";
        }
        else {
            $lien->nom = $_POST["nom"];
            $lien->date_debut = $_POST["date_debut"];
            $lien->couleur = $_POST["couleur"];
            $lien->update();
        }
    }

}

include ROOT . "/inc/meta.php";
include ROOT . "/inc/nav.php";
include ROOT . "/view/lien_formulaire.php";
include ROOT . "/inc/footer.php";