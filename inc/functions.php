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

// Démarrage de la session
session_start();

$mysqli = new mysqli("localhost", DB_USER, DB_PASSWORD, DB_NAME);
if($mysqli == false) {
    http_response_code(500); // Internal error
    echo "Erreur de connexion à la base de données";
    exit;
}
$mysqli->set_charset("utf8mb4"); // Nécessaire à la bonne gestion des accents
$mysqli->query("SET NAMES utf8mb4"); // Nécessaire à la bonne gestion des emojis


// --- Global functions ---

/**
 * Exécution de requête préparée
 * 
 * Exécute une requête MySQL à destination de la BdD sous forme de requête préparée, protégeant ainsi des injections SQL. Doit être préférée à ExecRequete() chaque fois que possible.
 *
 * @param string $requete - Requête SQL où les arguments sont remplacés par le placeholder "?"
 * @param array $params - Tableau de paramètres en string
 * @param bool $fetch - True s'il est nécessaire de récupérer des résultats, false sinon
 * @param string $class - Nom de la classe sous laquelle renvoyer les résultats, stdClass par défaut
 * @return array Résultat de la requête sous forme de tableau contenant des objets
 */
function query(string $sql, array $params, bool $fetch = true, string $class = "stdClass"): array {
    // Récupération de la connexion globale mysqli
    global $mysqli;

	// Préparation du statement
	$stmt = $mysqli->prepare($sql);
	
	// PHP >= 8.1
	$success = $stmt->execute($params);

	// Mettons fin à la fonction si aucune donnée ne doit être récupérée
	if(!$fetch)
		return [];

	if($success) {
		// Récupération et renvoi des résultats sous forme de tableau associatif
		$result = $stmt->get_result();
        $data = [];
        while ($row = $result->fetch_object($class))
            $data[] = $row;
		return $data;
	}
	elseif(ENV != "PROD") {
		echo "Erreur dans l'ex&eacute;cution de la requ&ecirc;te <br>'$sql'<br>";
		echo $mysqli->error . "<br/>";
		exit;
	}
}

function toSafeValue(string $string) : string {
	$string = str_replace(" ", "&nbsp;", $string);
	$string = str_replace("\"", "&quot;", $string);
	$string = str_replace("<", "&lt;", $string);
	$string = str_replace(">", "&gt;", $string);
	return $string;
}