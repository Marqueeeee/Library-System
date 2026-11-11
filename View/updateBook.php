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
    <link rel="stylesheet" href="libraryAdd.css">

</head>

<body>

    <?php
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $copyright = $_POST['copyright'] ?? '';
    $publisher = $_POST['publisher'] ?? '';
    $remarks = $_POST['remarks'] ?? '';
    $bookID = $_POST['id'] ?? '';
    ?>


    <div class="container">
        <form action="../Controller/updateBook.php" method="POST">
        <button class="btn"><a href="../View/superAdmin.php"><i class="bi bi-x-lg"></i></a></button>
            
        <div class="header">
            <img src="../View/SPIST_logo.jpg" alt="SPIST_logo">
            <h6 class="me-6">Southern Philippines Institute <br>of Science and Technology</h6>
            
        </div>

        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <div class="icon-box">
                        <i class="bi bi-people-fill me-4 "></i>
                        <h4>Update Library Book</h4>
                    </div>
                </div>

                <div class="card-subtitle"></div>
                <div class="card-text"></div>
            

        <div class="form-field">
            <label for="Title" class="form-label">Book Title *</label>
            <input type="hidden" name="bookID" value="<?= htmlspecialchars($bookID) ?>">
                <input type="text" name="title" id="title" class="form-control" placeholder="Title" required
                    value="<?= htmlspecialchars($title) ?>">
        </div>
        
        
        <div class="form-field">
            <label for="Author" class="form-label">Author *</label>
            <input type="text" name="author" id="author" class="form-control" placeholder="e.g., John Doe" required
                    value="<?= htmlspecialchars($author) ?>">
        </div>
        
        <div class="form-field">
            <label for="Copyright" class="form-label">Copyright *</label>
            <input type="text" name="copyright" id="copyright" class="form-control" placeholder="1907" required
                    value="<?= htmlspecialchars($copyright) ?>">
        </div>
        
        <div class="form-field">
            <label for="Publisher" class="form-label">Publisher *</label>
            <input type="text" name="publisher" id="publisher" class="form-control" placeholder="Sterling Publishing" required
                    value="<?= htmlspecialchars($publisher) ?>">
        </div>

        <div class="form-field">
            <label for="Remarks" class="form-label">Remarks *</label>

            <select class="form-control form-select" name="remarks" id="remarks">
                <option value="">--- Select remarks --- <?= htmlspecialchars($remarks) ?></option>
                <option value="Available">Available</option>
                <option value="Borrowed">Borrowed</option>
                <option value="Lost">Lost</option>
                <option value="Damaged">Damaged</option>
            </select>
        </div>


            <div class="addBook">
                    <!-- <i class="bi bi-plus-circle me-3"></i>
                    <label for="quantity">10</label> -->
                <button class="btn btn-md" type="submit"><i class="bi bi-save2 me-2"></i>Save changes</button>
            </div>

            </div>
        </div>

        </form>
    </div>




</body>

</html>