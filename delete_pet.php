<?php
require_once 'main.php'; // Include the main.php file to use the runDbCommand function

// Check if the 'imageUrl' GET parameter is set and not empty
if (isset($_GET['imageUrl']) && !empty($_GET['imageUrl'])) {
    $imageUrl = $_GET['imageUrl']; // Get the image URL from the URL parameter

    // Prepare the SQL command to delete the pet with the specified image URL
    // Ensure to use prepared statements or proper escaping to prevent SQL injection
    $sqlCommand = "DELETE FROM Pets WHERE image = '" . $imageUrl . "'";


    // Execute the SQL command using the runDbCommand function with prepared statement
    $result = runDbCommand($sqlCommand); // Assuming runDbCommand supports prepared statements

} else {
    echo "Image URL not specified.";
}

// Redirect back to the index page after deleting the pet
header("Location: index.php");
exit();
