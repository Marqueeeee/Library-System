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

    <div class="container">
        <form action="../Controller/insertMember.php" method="POST">
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
                        <h4>Create Account</h4>
                    </div>
                </div>

                <div class="card-subtitle"></div>
                <div class="card-text"></div>
            

        <div class="form-field">
            <label for="Title" class="form-label">Name <span class="req">*</span></label>
            <div class="input-group mb-4">
                <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name" maxlength="20" required>
                <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name" maxlength="20" required>
            </div>
        </div>

        <div class="form-field">
            <label for="grade-section" class="form-label">Grade & Section <span class="req">*</span> </label>
            <div class="input-group mb-4">
                <input type="text" name="gradeLevel" id="gradeLevel" class="form-control" placeholder="Grade Level" maxlength="8" required>
                <input type="text" name="section" id="section" class="form-control" placeholder="Section" maxlength="12" required>
            </div>
        </div>
        
        <div class="form-field">
            <label for="email" class="form-label">Email <span class="req">*</span></label>
            <input type="email" name="email" id="email" class="form-control" placeholder="example@spist.edu.ph" required>
        </div>
        
        <div class="form-field">
            <label for="contact" class="form-label">Contact <span class="req">*</span></label>
            <input type="text" name="contact" id="contact" class="form-control" placeholder="09123456789" required>
        </div>

        <div class="form-field">
            <label for="accountID" class="form-label">Student ID <span class="req">*</span></label>
            <input type="text" name="accountID" id="accountID" class="form-control" placeholder="2026******" required>
        </div>

        <div class="form-field fieldset">

            <ul>
                <h6>Select role <span class="req"> *</span></h6>
                <li><input type="radio" name="user-access" id="student" class="radio me-2" value="student" checked><span">Student</span></li>
                <li><input type="radio" name="user-access" id="student" class="radio me-2" value="student" ><span">Faculty</span></li>
                <li><input type="radio" name="user-access" id="staff" class="radio me-2" value="staff"><span">Staff</span></li>
            </ul>
      
            
        </div>

        

            <div class="addBook">
                    <!-- <i class="bi bi-plus-circle me-3"></i>
                    <label for="quantity">10</label> -->
                <button class="btn btn-md " type="submit"><i class="bi bi-plus-lg me-2"></i>Register Account</button>
            </div>

            </div>
        </div>

        </form>
    </div>




</body>

</html>