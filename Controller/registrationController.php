<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "../Config/connDB.php";
    $conn = $connDB->getConn();

    if ($_POST['confirmPass'] == $_POST['pass']) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);

        try {
            $sql = "SELECT email from accounts WHERE email = " . "'$email'";
            $result = $conn->query($sql);
            if ($result->rowCount() > 0) {
                header("Location: ../register.php?msg=taken");
                exit();
            } else {
                unset($result);
                $sql = "INSERT INTO accounts (accountType, firstName, lastName, email, password) VALUES (?, ?, ?, ?, ?)";
                // Prepare the SQL query template
                $stmt = $conn->prepare($sql);
                // Execute with values
                $stmt->execute(["User", $firstName, $lastName, $email, $password]);

                header("Location: ../index.php?msg=success");
                exit();
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    } else {
        header("Location: ../register.php?msg=mismatch");
        exit();
    }
}
?>