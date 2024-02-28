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

echo "Connected to database";
