<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    include "../Config/connDB.php";
    $conn = $connDB->getConn();

    try {
        $sql = "SELECT accountID, accountType, email, password from accounts where email = " . "'$email'";
        $result = $conn->query($sql);
        //check if email matches
        if ($result->rowCount() > 0) {
            $row = $result->fetch();
            //check if password matches
            if (password_verify($password, $row['password'])) {
                //check the account type (user, admin, or faculty)
                switch ($row['accountType']) {
                    case "User":
                        header("Location: ../View/dashboardStud.php");
                        break;
                    case "Faculty":

                        break;
                    case "Admin":
                        header("Location: ../View/dashboard.php");
                        break;
                }

            } else {
                header("Location: ../index.php?msg=failed");
                exit();
            }
        } else {
            header("Location: ../index.php?msg=failed");
            exit();
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}

?>