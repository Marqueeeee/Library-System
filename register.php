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
    <link rel="stylesheet" href="View/register.css">

</head>

<body>

    <div class="container">

        <form action="Controller/registrationController.php" method="POST">
            <div class="icon-box">
                <h4>Create an Account</h4>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-text p-3 opacity-75">FN</div>
                <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name"
                required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-text p-3 opacity-75">LN</div>
                <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name"
                required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-text p-3 opacity-75">@</div>
                <input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com" required>
            </div>
            <div class="input-group mb-3">
                <input type="password" name="pass" id="pass" class="form-control" placeholder="Password" required
                    minlength="8" maxlength="20" pattern="[A-Za-z0-9]{8,20}">
                    <span class="input-group-text p-3 opacity-75"><i class="bi bi-lock"></i></span>
                <input type="password" name="confirmPass" id="confirmPass" class="form-control" placeholder="Confirm Password" required
                    minlength="8" maxlength="20" pattern="[A-Za-z0-9]{8,20}">
            </div>
            <div class="form-floating">
                <div class="form-text">
                    * Your password must be 8-20 characters and must contain letters and numbers.
                </div>
            </div>
            <button class="btn btn-primary btn-md" type="submit">Register</button>
            <footer>
                <p class="register">Already have an account? <a href="index.php">Login</a></p>

            </footer>
            
        </form>
    </div>


            <div class="modal fade" id="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: green;">
                        </div>
                        <div class="modal-body" style="text-align: center; background-color: green; color: #f8e7c9;" id="message">

                            </div>
                        <form>
                            <div class="modal-footer" style="background-color: green;">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php if (isset($_GET['msg'])): if ($_GET['msg'] && $_GET['msg'] == "taken"): ?>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        document.getElementById("message").innerHTML = "The email is already taken, please try again!";
                        const el = document.getElementById('modal');
                        
                        if (!el) return;
                        const modal = new bootstrap.Modal(el);
                        modal.show();
                    });
                </script>
            <?php endif; endif; ?>

            <?php if (isset($_GET['msg'])): if ($_GET['msg'] && $_GET['msg'] == "mismatch"): ?>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        document.getElementById("message").innerHTML = "Password and Confirm Password do not match, please try again!";
                        const el = document.getElementById('modal');
                        
                        if (!el) return;
                        const modal = new bootstrap.Modal(el);
                        modal.show();
                    });
                </script>
            <?php endif; endif; ?>


        
    </div>




</body>

</html>