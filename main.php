<?php
function runDbCommand($sqlCommand)
{
    // Initialize a cURL session
    $curl = curl_init();
    // Set the URL to send the request to
    curl_setopt($curl, CURLOPT_URL, "https://surrealdb-deploy.fly.dev/sql");
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    // Follow redirects
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    // Set the method to POST
    curl_setopt($curl, CURLOPT_POST, true);
    // Set the headers
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        "Accept: application/json",
        "NS: main",
        "DB: main",
        "Content-Type: text/plain",
        "Authorization: Basic cm9vdDpyb290"
    ));
    // Set the POST data to the SQL command
    curl_setopt($curl, CURLOPT_POSTFIELDS, $sqlCommand);
    // Return the transfer as a string instead of outputting it
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // Execute the request and store the response
    $response = curl_exec($curl);
    if (curl_errno($curl)) {
        echo 'Error:' . curl_error($curl);
        curl_close($curl);
        return null; // Return null in case of an error
    } else {
        // Convert JSON response to PHP object
        $data = json_decode($response);
        // Optionally, check if the conversion was successful
        if (json_last_error() === JSON_ERROR_NONE) {
            // Close the cURL session
            curl_close($curl);
            // Return the result
            return $data[0]->result;
        } else {
            echo "Error decoding JSON: " . json_last_error_msg();
            curl_close($curl);
            return null; // Return null if JSON decoding fails
        }
    }
}
