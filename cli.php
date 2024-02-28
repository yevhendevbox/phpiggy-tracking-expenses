<?php
include __DIR__ . '/src/Framework/Database.php';

use Framework\Database;

$db = new Database(
  'mysql',
  [
    'host' => '127.0.0.1',
    'port' => '3308',
    'dbname' => 'phpiggy'
  ],
  'root',
  ''
);

$search = "Shirts";
$query = "SELECT * FROM products WHERE name=:name";
$stmt = $db->connection->prepare($query);
$stmt->bindParam('name', $search, PDO::PARAM_STR);
$stmt->execute();

var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
