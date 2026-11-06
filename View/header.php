
    <?php
    require_once "../Config/connDB.php";
    require_once "../Controller/showTables.php";
    require_once "../Controller/dashboardStats.php";

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

    $conn = $connDB->getConn();

    session_start();
    $currentUserId = $_SESSION['user_id'] ?? null;
    $currentAccount = $_SESSION['accountType'];
    if ($currentUserId === null || $currentAccount != "Admin") {
        header("Location: ../index.php?msg=denied");
        exit();
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
