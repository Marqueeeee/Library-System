<?php

require_once "../Config/connDB.php";
$conn = $connDB->getConn();

$firstname = $_POST["firstName"];
$lastname = $_POST["lastName"];
$contact =  $_POST["contact"];

try {
    $sql = "INSERT INTO tblmembers (FirstName, LastName, ContactNo) VALUES (?, ?, ?)";
    // Prepare the SQL query template
    $stmt = $conn->prepare($sql);
    // Execute with values
    $stmt->execute([$firstname, $lastname, $contact]);

    header("Location: ../View/dashboard.php?msg=added");
    exit();
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();

    header("Location: ../View/dashboard.php?msg=error");
    exit();
}


?>