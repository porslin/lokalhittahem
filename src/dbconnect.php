<?php

$host 	  = "localhost";
$database = "hittahem";
$user     = "root";
$password = "root";
$charset  = "utf8mb4";

$dns 	  = "mysql:host={$host};dbname={$database};charset={$charset}";

$options = [
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Error mode
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Fetch style, fetching associative array
];


// Upprätta en DB koppling
try {
	// Försök köra koden i try-blocket
	$pdo = new PDO($dns, $user, $password, $options);
} catch (\PDOException $e) {
	// Catch-blocket körs om något gick fel i try-blocket
	// echo $e->getMessage();
	// echo $e->getCode();
	throw new \PDOException($e->getMessage(), (int) $e->getCode());
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 