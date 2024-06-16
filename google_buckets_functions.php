<?php
require_once 'vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;

putenv('GOOGLE_APPLICATION_CREDENTIALS=./credentials.json');
$storage = new StorageClient();

function uploadImageToBucket($imagePath, $imageName, $bucketName)
{
    global $storage;
    $bucket = $storage->bucket($bucketName);
    $imageResource = fopen($imagePath, 'r');
    $object = $bucket->upload($imageResource, [
        'name' => $imageName
    ]);
    return $object->name();
}

function retrieveImageFromBucket($imageName, $bucketName)
{
    // Assuming the bucket's files are publicly accessible, construct the URL
    return "https://storage.googleapis.com/$bucketName/$imageName";
}
