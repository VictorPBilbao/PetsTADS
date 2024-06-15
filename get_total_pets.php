<?php
// Assuming you're using SurrealDB or another database, adjust the connection details accordingly
require_once 'vendor/autoload.php';
require_once 'main.php';

$result = runDbCommand("SELECT * FROM Pets");
$total_pets = count($result);
