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

$sqlFile = file_get_contents('./database.sql');

$db->query($sqlFile);
// try {
//   $db->connection->beginTransaction();
//   $db->connection->query("INSERT INTO products VALUES(99, 'Gloves')");

//   $search = "Gloves";
//   $query = "SELECT * FROM products WHERE name=:name";
//   $stmt = $db->connection->prepare($query);

//   $stmt->bindParam('name', $search, PDO::PARAM_STR);
//   $stmt->execute();

//   var_dump($stmt->fetchAll(PDO::FETCH_OBJ));

//   $db->connection->commit();
// } catch (Exception $error) {
//   if ($db->connection->inTransaction()) {
//     $db->connection->rollBack();
//   }

//   echo "Transaction failed";
// }
