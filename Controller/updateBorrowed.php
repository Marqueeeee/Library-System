<?php

require_once "../Config/connDB.php";
$conn = $connDB->getConn();

$borrowedID = $_POST['borrowedID'];
$memberName = $_POST['memberName'];
$membershipID = $_POST['nenversguoUD'];
$bookTitle = $_POST['bookTitle'];
$bookID = $_POST['bookID'];
$date = $_POST['date'];
$dueDate = $_POST['dueDate'];
$status = $_POST['status'];

try {
    $sql = "UPDATE tblborrowedlist SET BookID=?, MembershipID=?, Name=?, BookTitle=?, DateBorrowed=?, DueDate=?, Status=? WHERE BookID=?";
    // Prepare the SQL query template
    $stmt = $conn->prepare($sql);
    // Execute with values
    $stmt->execute([$bookID, $membershipID, $memberName, $bookTitle, $date, $dueDate, $status, $borrowedID]);

    header("Location: ../View/dashboard.php?msg=updated");
    exit();
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();

    header("Location: ../View/dashboard.php?msg=error");
    exit();
}


?>