<?php
require_once 'vendor/autoload.php';


// Make a new instance of the SurrealDB class. Use the ws or wss protocol for having WebSocket functionality.
$db = new Surreal\Surreal();

$db->connect("http://localhost:8000", [
    "namespace" => "main",
    "database" => "main"
]);

// We want to authenticate as a root user.
$token = $db->signin([
    "user" => "root",
    "pass" => "root"
]);

// create a new table
$db->query("DEFINE TABLE test");

echo "Connected to the database\n";
