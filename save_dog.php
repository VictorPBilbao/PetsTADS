<?php
require_once 'vendor/autoload.php';

// Assuming you have a function to connect to your database
$db = new Surreal\Surreal();
$db->connect("http://localhost:8000", [
    "namespace" => "main",
    "database" => "main"
]);
$db->signin([
    "user" => "root",
    "pass" => "root"
]);

// Process form data
$name = $_POST['name'];
$description = $_POST['description'];
$picture = $_FILES['picture'];

// Validate and move the uploaded file
$targetDirectory = "./uploads/";
$targetFile = $targetDirectory . basename($picture['name']);
move_uploaded_file($picture['tmp_name'], $targetFile);

// Save data to the database
$query = "CREATE dog CONTENT {
    name: '$name',
    image: '$targetFile',
    description: '$description'
}";
$db->query($query);

echo "Dog added successfully!";
