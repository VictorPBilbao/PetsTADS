<?php
require_once 'main.php'; // Include the main.php file to use the runDbCommand function
require_once 'google_buckets_functions.php'; // Include the Google Cloud Storage functions

// Check if the 'OldImageUrl' POST parameter is set and not empty
if (isset($_POST['OldImageUrl']) && !empty($_POST['OldImageUrl'])) {
    $oldImageUrl = $_POST['OldImageUrl']; // Get the old image URL from the POST parameter
    $name = $_POST['name']; // Get the pet's name from the form
    $description = $_POST['description']; // Get the pet's description from the form
    $picture = $_FILES['picture']; // Get the uploaded picture file

    // Generate unique file name for the uploaded file
    $extension = pathinfo($picture['name'], PATHINFO_EXTENSION);
    $uniqueFileName = uniqid() . '.' . $extension;

    // Upload to Google Cloud Storage
    $bucketName = 'pets_uploads'; // Your Google Cloud Storage Bucket Name
    $uploadedImageName = uploadImageToBucket($picture['tmp_name'], $uniqueFileName, $bucketName);

    if ($uploadedImageName) {
        $newImagePath = retrieveImageFromBucket($uploadedImageName, $bucketName);
        // Assuming runDbCommand is a function that can execute prepared statements
        $command = "
            UPDATE Pets
            SET name = '$name', image = '$newImagePath', description = '$description'
            WHERE image = '$oldImageUrl'
        ";

        $result = runDbCommand($command);
        // Check if the update was successful
        if ($result) {
            echo "Pet updated successfully.";
        } else {
            echo "Error updating pet.";
        }
    } else {
        echo "Failed to upload image.";
    }
} else {
    echo "Old image URL not specified.";
}
// Redirect back to the index page after updating
header('Location: index.php');
exit();
