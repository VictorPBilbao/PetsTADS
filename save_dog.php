<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="css/styles.css" rel="stylesheet" />

<?php
require_once 'vendor/autoload.php';
require_once 'main.php';

// Process form data
$name = $_POST['name'];
$description = $_POST['description'];
$picture = $_FILES['picture'];

// Validate and move the uploaded file
$targetDirectory = "uploads/";
$extension = pathinfo($picture['name'], PATHINFO_EXTENSION);
$uniqueFileName = uniqid() . '.' . $extension;
$targetFile = $targetDirectory . $uniqueFileName;
move_uploaded_file($picture['tmp_name'], $targetFile);

runDbCommand("
CREATE Pets CONTENT {
    name: '$name',
    image: '$targetFile',
    description: '$description'
}");

?>

<!-- Display success message using Bootstrap alert -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Trabalho de Web 1</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column h-100 bg-light">
    <main class="flex-shrink-0">
        <!-- Navigation (You can copy the navigation bar from index.php or customize as needed) -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php"><span class="fw-bolder text-primary">Pets do TADS</span></a>
                <!-- Add other navigation links if necessary -->
            </div>
        </nav>
        <!-- Alert Section -->
        <div class="container px-5">
            <div class="alert alert-success" role="alert">
                Dog saved successfully!
            </div>
        </div>
    </main>
    <!-- Footer (You can copy the footer from index.php or customize as needed) -->
    <footer class="bg-white py-4 mt-auto">
        <div class="container px-5">
            <!-- Footer Content -->
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>

<!-- Redirect back to index.php -->
<script>
    setTimeout(() => {
        window.location.href = 'index.php';
    }, 5000);
</script>