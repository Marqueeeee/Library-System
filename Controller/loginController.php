<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    if ($username == "admin" && $password == "test1234") {
        header("Location: ../View/dashboard.php");
    } else {

        header("Location: ../index.php?msg=failed");
    }
}

?>