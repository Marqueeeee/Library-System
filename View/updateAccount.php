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
    <link rel="stylesheet" href="updateAcc.css">

</head>

<body>

    <?php
    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $email = $_POST['email'] ?? '';
    $accountID = $_POST['accountID'] ?? '';
    ?>

    <div class="container">

        <form action="../Controller/updateMember.php" method="POST">
            <div class="icon-box">
                <h4>Update an Account</h4>
            </div>

            <div class="input-group mb-3">
                <!-- bookID passed but not auto-filled -->
                <div class="input-group-text p-3 opacity-75">FN</div>
                <input type="hidden" name="accountID" value="<?= htmlspecialchars($accountID) ?>">
                <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name" required
                    value="<?= htmlspecialchars($firstName) ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-text p-3 opacity-75">LN</div>
                <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name" required
                    value="<?= htmlspecialchars($lastName) ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-text p-3 opacity-75">@</div>
                <input type="text" name="email" id="email" class="form-control" placeholder="Email" required
                    value="<?= htmlspecialchars($email) ?>">
                <button class="btn btn-primary btn-md" type="submit">Update account</button>
            </div>


        </form>
    </div>




</body>

</html>