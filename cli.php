<?php

$driver = 'mysql';
$config = http_build_query(data: [
  'host' => 'localhost',
  'port' => '3306',
  'dbname' => 'phpiggy'
], arg_separator: ';');

$dsn = "{$driver}:{$config}";
$username = 'root';
$password = '';

$db = new PDO($dsn, $username, $password);
echo "Connected to database";

// $driver = 'mysql';
// $config = [
//   'host' => 'localhost',
//   'port' => '3306',
//   'dbname' => 'phpiggy'
// ];

// $dsn = "{$driver}:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";
// $username = 'root';
// $password = '';

// try {
//   $db = new PDO($dsn, $username, $password);
//   echo "Connected to database";
// } catch (PDOException $e) {
//   echo "Connection failed: " . $e->getMessage();
// }
