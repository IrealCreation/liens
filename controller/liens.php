<?php 
/**
 * Récupération des Liens d'un utilisateur
 */

verificationConnecte();

$liens = Lien::selectByUtilisateur($_SESSION["utilisateur_id"]);

include ROOT . "/inc/header.php";
include ROOT . "/view/liens_liste.php";
include ROOT . "/inc/footer.php";