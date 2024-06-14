<?php
// Assuming you're using SurrealDB or another database, adjust the connection details accordingly
require_once 'vendor/autoload.php';
$db = new Surreal\Surreal();
$db->connect("http://localhost:8000", [
    "namespace" => "main",
    "database" => "main"
]);
$db->signin([
    "user" => "root",
    "pass" => "root"
]);

// Query to count the number of dogs in the database
$result = $db->query("SELECT * FROM dog")[0]['result'];
$total_dogs = count($result);
