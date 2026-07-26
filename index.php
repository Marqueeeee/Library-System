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
    <link rel="stylesheet" href="View/login.css">

</head>

<body>

    <div class="container">

        <form action="Controller/loginController.php" method="POST">
            
            <div class="icon-box">
                <h4 class="top">Library </h4>
                <h4>Management System </h4>
            </div>
            <div class="form-floating">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                <label for="email" class="form-label">Email:</label>
            </div>
            <div class="form-floating">
                <input type="password" name="pass" id="pass" class="form-control" placeholder="Password" required>
                <label for="pass" class="form-label">Password:</label>

                <button class="btn btn-primary btn-md" type="submit">Login</button>
            </div>
                <!-- <p class="reset"><a href="reset.php">Forgot your password?</a></span></p> -->

            <footer>
                <p class="register">Don't have an account yet? <a href="register.php">Register.</a></p>

            </footer>
                

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

            <?php if (isset($_GET['msg'])): if ($_GET['msg'] && $_GET['msg'] == "failed"): ?>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        document.getElementById("message").innerHTML = "Incorrect email or password, please try again!";
                        const el = document.getElementById('modal');
                        
                        if (!el) return;
                        const modal = new bootstrap.Modal(el);
                        modal.show();
                    });
                </script>
            <?php endif; endif; ?>

            <?php if (isset($_GET['msg'])): if ($_GET['msg'] && $_GET['msg'] == "success"): ?>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        document.getElementById("message").innerHTML = "Account successfully created!";
                        const el = document.getElementById('modal');
                        
                        if (!el) return;
                        const modal = new bootstrap.Modal(el);
                        modal.show();
                    });
                </script>
            <?php endif; endif;?> 
        </form>
    </div>



</body>

</html>