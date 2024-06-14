<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Dog</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <h1>Add a New Dog</h1>
    <form action="save_dog.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Dog's Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="picture">Picture:</label>
            <input type="file" id="picture" name="picture" accept="image/*" required>
        </div>
        <button type="submit">Add Dog</button>
    </form>
</body>

</html>