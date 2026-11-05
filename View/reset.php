<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../View/login.css">
</head>
<body>
    <div class="container">
        <form action="" method="">

            <div class="icon-box">
                <img src="../View/SPIST_logo.jpg" alt="Logo" class="img-fluid">
                <h3>Reset Password</h3>
            </div>
            
            <div class="input-group mb-4">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
            </div>
            
            <button class="btn btn-md btn-login" type="submit">Send OTP</button>

            <footer> <p class="register">Remember your password? <a href="index.php">Login</a></p></footer>


            <div class="modal fade" id="modalSuccess" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Reset Password</h5>
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
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <?php if (isset($_GET['msg'])):
                if ($_GET['msg'] && $_GET['msg'] == "success"): ?>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            document.getElementById("messageSuccess").innerHTML = " The 6-digit code has been sent to your email.";
                            const el = document.getElementById('modalSuccess');

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