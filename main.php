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

// // create a new table
// $db->query("DEFINE TABLE IF NOT EXISTS dog SCHEMAFULL");

// // insert schema
// $db->query("
//     DEFINE FIELD name ON TABLE dog TYPE string;
//     DEFINE FIELD image ON TABLE dog TYPE string;
//     DEFINE FIELD description ON TABLE dog TYPE string;
// ");

// // insert data

// $db->query("
//     CREATE dog CONTENT {
//         name: 'Dog 1',
//         image: 'https://www.google.com',
//         description: 'This is a dog'
//     }
// ");

// $db->query("
//     CREATE dog CONTENT {
//         name: 'Dog 2',
//         image: 'https://www.google.com',
//         description: 'This is yet another dog'
//     }
// ");

// $db->query("
//     CREATE dog CONTENT {
//         name: 'Dog 3',
//         image: 'https://www.google.com',
//         description: 'This is also another dog'
//     }
// ");

// // Create a new person in the database with a custom id.
// $person = $db->create("dog", [
//     "name" => "Dog 4",
//     "image" => "https://www.google.com",
//     "description" => "This is also another dogggg"
// ]);

$total_dogs = $db->query("SELECT name FROM dog")[0]['result'];

print_r($total_dogs);
echo "Total dogs: " . count($total_dogs) . "\n";


echo "Connected to the database\n";
