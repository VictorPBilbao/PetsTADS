<?php
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

// Fetch all dog images
$result = $db->query("SELECT image FROM dog")[0]['result'];

// Shuffle the array to get a random image
shuffle($result);

// Select the first image after shuffling
$randomDogImage = $result[0]['image'];

// Redirect to the random dog's image
header('Location: ' . $randomDogImage);
