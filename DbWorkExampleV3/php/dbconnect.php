<?php

$db = 'DbWorkExample';
$host = '127.0.0.1';
$username = 'root';
$password = '';




$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$options = [
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
];
try {
  $connection = new PDO($dsn, $username, $password, $options);
} catch (Exception $e) {
  error_log($e->getMessage());
  exit('Something weird happened'); 
}



function GetFromDBWithId($Id,$connectionIn) {
	$SQL = $connectionIn->prepare('SELECT * FROM article WHERE id = :NUMBER');
	$SQL->bindParam(':NUMBER', $Id, PDO::PARAM_INT);
	$SQL->execute();
	return $SQL->fetchAll();
}

function pdo_debugStrParams($stmt) {
  ob_start();
  $stmt->debugDumpParams();
  $r = ob_get_contents();
  ob_end_clean();
  return $r;
}


?>
