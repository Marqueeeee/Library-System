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

    <div class="container">

        <form action="Controller/registrationController.php" method="POST">
            <div class="icon-box">
                <h4>Update a Book</h4>
            </div>
            <div class="form-floating">
                <input type="text" name="title" id="title" class="form-control" placeholder="Title"
                    required>
                <label for="title" class="form-label">Title:</label>
            </div>
            <div class="form-floating">
                <input type="text" name="author" id="author" class="form-control" placeholder="Author" required>
                <label for="author" class="form-label">Author:</label>
            </div>
            <div class="form-floating">
                <input type="text" name="genre" id="genre" class="form-control" placeholder="Genre" required>
                <label for="genre" class="form-label">Genre:</label>
            </div>
            <div class="form-floating">
                <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Quantity" min="1" required>
                <label for="quantity" class="form-label">Quantity:</label>
                <button class="btn btn-primary btn-md" type="submit">Update book</button>
            </div>


        </form>
    </div>




</body>

</html>