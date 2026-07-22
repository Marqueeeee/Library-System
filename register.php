<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="View/register.css">

    <?php

    if (isset($_GET['msg'])) {
        if ($_GET['msg'] == 'failed') {
            echo '<script> alert("Incorrect username or password"); </script>';
        }
    } 
    ?>
</head>

<body>

    <div class="container w3-container w3-center w3-animate-right">

        <form action="Controller/loginController.php" method="POST">
            <div class="icon-box">
                <h4>Create an Account</h4>
            </div>
            <div class="form-floating">
                <input type="text" name="user" id="user" class="form-control" placeholder="User" required>
                <label for="user" class="form-label">Username:</label>

            </div>
            <div class="form-floating">
                <input type="password" name="pass" id="pass" class="form-control" placeholder="Pass" required>
                <label for="psw" class="form-label">Password:</label>

                <button class="btn btn-primary btn-md" type="submit">Register</button>
            </div>

            <div class="footer">
                <p class="register">Already have an account? <a href="index.html">Login.</a></p>
            </div>

        </form>
    </div>



</body>

</html>