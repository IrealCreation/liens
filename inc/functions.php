<?php 
/**
 * Global functions file, included in every page
 */

 
// --- Initialisation ---

// Environnement
define("ENV", "DEV");

// Affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// --- Autoloader des classes ---
// Permet de charger automatiquement les classes depuis un fichier portant le même nom dans le répertoire /classes
spl_autoload_register(function ($class_name) {
    require __DIR__ . "/class/" . lcfirst($class_name) . '.php';
});

// Fichier de configuration
require __DIR__ . "/inc/conf.php";

// Connexion à la base de données
$pdo = new PDO('mysql:dbname=' . DB_NAME . ';host=localhost', DB_USER, DB_PASSWORD);


// --- Global functions ---

function toSafeValue(string $string) : string {
	$string = str_replace(" ", "&nbsp;", $string);
	$string = str_replace("\"", "&quot;", $string);
	$string = str_replace("<", "&lt;", $string);
	$string = str_replace(">", "&gt;", $string);
	return $string;
}