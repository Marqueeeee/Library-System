<?php

require_once "../Config/connDB.php";
$conn = $connDB->getConn();

$membershipID = $_POST['membershipID'];
$fName = $_POST['firstName'];
$lName = $_POST['lastName'];
$contact = $_POST['contact'];
//$creditPoints;


try {
    $sql = "UPDATE tblmembers SET FirstName=?, LastName=?, ContactNo=? WHERE MembershipID=?";
    // Prepare the SQL query template
    $stmt = $conn->prepare($sql);
    // Execute with values
    $stmt->execute([$fName, $lName, $contact, $membershipID]);

    header("Location: ../View/dashboard.php?msg=updated");
    exit();
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();

    header("Location: ../View/dashboard.php?msg=error");
    exit();
}


?>