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
    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $email = $_POST['email'] ?? '';
    $accountID = $_POST['accountID'] ?? '';
    ?>


    <div class="container">
        <form action="../Controller/updateMember.php" method="POST">
        <button class="btn"><a href="../View/superAdmin.php"><i class="bi bi-x-lg"></i></a></button>
            
        <div class="header">
            <img src="../View/SPIST_logo.jpg" alt="SPIST_logo">
            <h6 class="me-6">Southern Philippines Institute <br>of Science and Technology</h6>
            
        </div>

        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <div class="icon-box">
                        <i class="bi bi-pencil-square me-4 "></i>
                        <h4>Update Member Account</h4>
                    </div>
                </div>

                <div class="card-subtitle"></div>
                <div class="card-text"></div>
                
                
                <div class="form-field">
                    <label for="Copyright" class="form-label">First Name *</label>
                    <input type="hidden" name="accountID" value="<?= htmlspecialchars($accountID) ?>">
                    <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name" required
                    value="<?= htmlspecialchars($firstName) ?>">
                </div>
                
                <div class="form-field">
                    <label for="Publisher" class="form-label">Last Name *</label>
                    <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name" required
                    value="<?= htmlspecialchars($lastName) ?>">
                </div>
                
                <div class="form-field">
                    <label for="Title" class="form-label">Email *</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="example@gmail.com" required
                    value="<?= htmlspecialchars($email) ?>">
                </div>
                
                

            <div class="addBook">
                    <!-- <i class="bi bi-plus-circle me-3"></i>
                    <label for="quantity">10</label> -->
                <button class="btn btn-md" type="submit"><i class="bi bi-save2 me-2"></i> Save changes</button>
            </div>

            </div>
        </div>

        </form>
    </div>





</body>

</html>