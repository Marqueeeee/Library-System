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
    <link rel="stylesheet" href="View/login.css">
    

</head>

<body>

    <div class="container">
        <form action="Controller/registrationController.php" method="POST">
            <div class="icon-box">
                <img src="View/SPIST_logo.jpg" alt="Logo" class="img-fluid">
                <h3>Create an Account</h3>
            </div>

            <div class="input-group mb-4">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name" maxlength="20" required>
                <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name" maxlength="20" required>
            </div>

            <div class="input-group mb-4">
                <span class="input-group-text"><i class="bi bi-mortarboard"></i></span>
                <input type="text" name="gradeLevel" id="gradeLevel" class="form-control" placeholder="Grade Level" maxlength="8" required>
                <input type="text" name="section" id="section" class="form-control" placeholder="Section" maxlength="12" required>
            </div>

            
            <div class="input-group mb-4">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" name="email" id="email" class="form-control" placeholder="example@spist.edu.ph" required>  <!--pattern="[a-zA-Z._]+@spist\.edu.ph"-->
            </div>

            <div class="input-group mb-4">
                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                <input type="tel" name="contact" id="contact" class="form-control" placeholder="09123456789" min-length="11" max-length="11" required>
            </div>

            <div class="input-group mb-3">
                <span class="span input-group-text "><i class="bi bi-lock"></i></span>
                <input type="password" name="pass" id="pass" class="form-control" placeholder="Password" required  minlength="8" maxlength="20" pattern="[A-Za-z0-9]{8,20}" >
                <input type="password" name="confirmPass" id="confirmPass" class="form-control" placeholder="Confirm Password" required  minlength="8" maxlength="20" pattern="[A-Za-z0-9]{8,20}">
            
                <i class="bi bi-eye-slash reg" id="togglePass"></i>
                
            </div>

            <p class="form-text">
                <span class="req">* </span>Use your SPIST valid email address. <br>
                <span class="req">* </span>Your password must have 8-20 characters. <br>
                <span class="req">* </span>Must contain letters [(A-Z)(a-z)].      <br>
                <span class="req">* </span>Must contain numbers [(0-9)].                            <br>
                <span class="req">* </span>Must have special symbol [(!@#$%^&*()-+)].       <br>
                <span class="req">* </span>Grade level for College student format (e.g., 1st-Year, 2nd-Year, etc.).
            </p>


            <button class="btn btn-md btn-register" type="submit">Register</button>

            <footer> <p class="register">Already have an account? <a href="index.php">Login</a></p></footer>
            
        </form>
    </div>


    


            <div class="modal fade" id="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <i class="bi bi-exclamation-diamond me-2"></i>
                        <h5 style="color: red;">Error</h5>
                        </div>
                        <div class="modal-body" style="text-align: center; background-color:  white; color: rgba(226, 11, 11, 0.952);" id="message">

                            </div>
                        <form>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">OK</button>
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



    <script src="View/script.js"></script>
</body>

</html>