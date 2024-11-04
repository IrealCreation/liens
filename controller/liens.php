<?php 
/**
 * Récupération des Liens d'un utilisateur
 */

verificationConnecte();

$liens = Lien::selectByUtilisateur($_SESSION["utilisateur_id"]);