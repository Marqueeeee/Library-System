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
    <link rel="stylesheet" href="../View/login.css">
    <?php
    session_start();
    session_destroy();

    ?>
</head>

<body>

    <div class="container">

        <form action="Controller/loginController.php" method="POST">

            <div class="icon-box">
                <img src="../View/SPIST_logo.jpg" alt="Logo" class="img-fluid">
                <h3>Reset Password Successfully</h3>
            </div>
            
            <p class="text-center">Your password has been successfully reset. </p>
            <button class="btn btn-md btn-login mt-3" type="submit">Go back to Login <i class ="bi bi-arrow-bar-right ms-2"></i></button>



            <div class="modal fade" id="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <i class="bi bi-exclamation-diamond me-2"></i>
                            <h5 style="color: red;">Login Error</h5>
                        </div>
                        <div class="modal-body"
                            style="text-align: center; background-color:  white; color: rgba(226, 11, 11, 0.952);"
                            id="message">

                        </div>
                        <form>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">OK</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalSuccess" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Login</h5>
                        </div>
                        <div class="modal-body" style="text-align: center; background-color: white; color: #1a5c2a;"
                            id="messageSuccess">

                        </div>
                        <form>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php if (isset($_GET['msg'])):
                if ($_GET['msg'] && $_GET['msg'] == "failed"): ?>
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

            <?php if (isset($_GET['msg'])):
                if ($_GET['msg'] && $_GET['msg'] == "success"): ?>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            document.getElementById("messageSuccess").innerHTML = "Account successfully created!";
                            const el = document.getElementById('modalSuccess');

                            if (!el) return;
                            const modal = new bootstrap.Modal(el);
                            modal.show();
                        });
                    </script>
                <?php endif; endif; ?>

            <?php if (isset($_GET['msg'])):
                if ($_GET['msg'] && $_GET['msg'] == "denied"): ?>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            document.getElementById("message").innerHTML = "Access denied";
                            const el = document.getElementById('modal');

                            if (!el) return;
                            const modal = new bootstrap.Modal(el);
                            modal.show();
                        });
                    </script>
                <?php endif; endif; ?>
        </form>
    </div>



</body>

</html>