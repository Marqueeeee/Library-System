<?php
// Runs before any HTML is sent so the redirect below can work.
require_once "../Config/connDB.php";
require_once "../Controller/showTables.php";
require_once "../Controller/dashboardStats.php";

$conn = $connDB->getConn();

//session_start(); 
$currentUserId = $_SESSION['user_id'] ?? null;
$currentAccount = $_SESSION['accountType'] ?? null;
if ($currentUserId === null || $currentAccount != "Admin") {
    header("Location: ../index.php?msg=denied");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="section.js"></script>

    
    <?php
    if (isset($_GET['msg'])) {
        if ($_GET['msg'] == 'added') {
            echo '<script> alert("Entry successfully added!"); </script>';
        } elseif ($_GET['msg'] == 'updated') {
            echo '<script> alert("Entry successfully updated!"); </script>';
        } elseif ($_GET['msg'] == 'deleted') {
            echo '<script> alert("Entry successfully deleted!"); </script>';
        } elseif ($_GET['msg'] == 'error') {
            echo '<script> alert("An unknown error has occurred!"); </script>';
        }
    }
    ?>


    <?php if (isset($_SESSION['name'])): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.getElementById("currentName").innerHTML = <?= json_encode($_SESSION['name']) ?>;
            });
        </script>
    <?php endif; ?>

    <?php if (isset($_SESSION['email'])): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.getElementById("currentEmail").innerHTML = <?= json_encode($_SESSION['email']) ?>;
            });
        </script>
    <?php endif; ?>
</head>

<body>

    <?php require_once __DIR__ . '/superAdminPartials/sidebar.php'; ?>        

    <!-- ============== MAIN CONTENT ============== -->
    <div class="main-content">
        <div class="top-header d-flex justify-content-baseline align-items-center">
            <button class="btn-hamburger d-md-none" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar"
                aria-controls="mobileSidebar" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
            <div class="sys-sch">
                <span>Library Management System</span>
                <p> Southern Philippines Institute of Science and Technology</p>
            </div>

            <div class="date-time">
                <div class="date">Monday, December 2, 2026</div>
                <div class="time">| 12:30 PM</div>
            </div>
        </div>
        <div class="page-body">

            <?php
            // Each section is its own file. Add/remove/reorder lines here.
            $sections = ['dashboard','members','faculty','books','borrowed','deleted','activity','reports'];
            foreach ($sections as $s) {
                require __DIR__ . "/superAdminsections/{$s}.php";
            }
            ?>

        </div>
    </div>

    <?php require_once __DIR__ . '/superAdminPartials/modals.php'; ?>

    <script src="script.js"></script>


</body>

</html>