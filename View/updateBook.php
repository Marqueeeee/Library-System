<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="register.css">

</head>

<body>

    <?php
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $genre = $_POST['genre'] ?? '';
    $quantity = $_POST['quantity'] ?? '';
    $bookID = $_POST['id'] ?? '';
    ?>

    <div class="container">

        <form action="../Controller/updateBook.php" method="POST">
            <div class="icon-box">
                <h4>Update a Book</h4>
            </div>


            <div class="input-group mb-3">
                <!-- bookID passed but not auto-filled -->
                <div class="input-group-text p-3 opacity-75">Title: </div>
                <input type="hidden" name="bookID" value="<?= htmlspecialchars($bookID) ?>">
                <input type="text" name="title" id="title" class="form-control" placeholder="Title" required
                    value="<?= htmlspecialchars($title) ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-text p-3 opacity-75">Author: </div>
                <input type="text" name="author" id="author" class="form-control" placeholder="Author" required
                    value="<?= htmlspecialchars($author) ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-text p-3 opacity-75">Genre: </div>
                <input type="text" name="genre" id="genre" class="form-control" placeholder="Genre" required
                    value="<?= htmlspecialchars($genre) ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-text p-3 opacity-75">Quantity: </div>
                <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Quantity" min="1"
                    required value="<?= htmlspecialchars($quantity) ?>">
                <button class="btn btn-primary btn-md" type="submit">Update book</button>
            </div>


        </form>
    </div>




</body>

</html>