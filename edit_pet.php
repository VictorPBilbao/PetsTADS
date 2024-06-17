<?php
$result = runDbCommand("SELECT * FROM Pets WHERE image LIKE " . $_GET['imageUrl']);

if ($result && count($result) > 0) {
  $pet = $result[0];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Dog</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
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
        <!-- Form Section -->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="fw-bolder">Edite as informações do seu Pet! 🐶🐈</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <form action="edit_pet_database.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="OldImageUrl" value="<?php echo htmlspecialchars($_GET['imageUrl']); ?>">
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Nome do Pet</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($pet) ? htmlspecialchars($pet->name) : ''; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Descrição:</label>
                                <textarea class="form-control" id="description" name="description" required maxlength="300" oninput="updateCounter()">
                                  <?php echo isset($pet) ? htmlspecialchars($pet->description) : ''; ?>
                                </textarea>
                                <small id="counter" class="form-text text-muted">300</small>
                            </div>
                            <script>
                                function updateCounter() {
                                    const textarea = document.getElementById('description');
                                    const counter = document.getElementById('counter');
                                    const remainingChars = 300 - textarea.value.length;
                                    counter.textContent = `${remainingChars}`;
                                }
                            </script>
                            <div class="form-group mb-3">
                                <label for="picture" class="form-label">Imagem:</label>
                                <input type="file" class="form-control" id="picture" name="picture" accept="image/*" required>
                            </div>
                            <button type="submit" class="btn btn-primary" required>Salvar alterações</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer (You can copy the footer from index.php or customize as needed) -->
    <footer class="bg-white py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0">Copyright &copy; TADS 2024</div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>