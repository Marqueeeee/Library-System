<?php

require_once "../Config/connDB.php";
$conn = $connDB->getConn();

$accountID = $_POST['accountID'];
$fName = $_POST['firstName'];
$lName = $_POST['lastName'];
$email = $_POST['email'];
//$creditPoints;


try {
    $sql = "UPDATE accounts SET firstName=?, lastName=?, email=? WHERE accountID=?";
    // Prepare the SQL query template
    $stmt = $conn->prepare($sql);
    // Execute with values
    $stmt->execute([$fName, $lName, $email, $accountID]);

    header("Location: ../View/superAdmin.php?msg=updated");
    exit();
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();

    header("Location: ../View/superAdmin.php?msg=error");
    exit();
}


?>