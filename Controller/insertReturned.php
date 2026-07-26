<?php

require_once "../Config/connDB.php";
$conn = $connDB->getConn();

$id = $_POST["returnID"];
$name = $_POST["name"];
$title = $_POST["title"];
$borrowDate = $_POST["borrowDate"];
$dueDate = $_POST["dueDate"];
$overDue = $_POST["overDue"];
$membershipID = $_POST['membershipID'];
$bookID = $_POST['bookID'];

if ($overDue <= 0) {
    $overDue = 0;
}

$fine = "₱ " . $overDue * 10;

try {
    $sql = "INSERT INTO tblreturnedlist (Member, BookTitle, BorrowedDate, ReturnedDate, Fine, MembershipID) VALUES (?, ?, ?, ?, ?, ?)";
    // Prepare the SQL query template
    $stmt = $conn->prepare($sql);
    // Execute with values
    $stmt->execute([$name, $title, $borrowDate, $dueDate, $fine, $membershipID]);

    //insert update here for quantity +1
    $sql = "UPDATE tblbooks SET Quantity = Quantity + 1 WHERE BookID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$bookID]);

    $sql = "DELETE FROM tblborrowedlist WHERE BorrowID=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    header("Location: ../View/dashboardStud.php?msg=returnSuccess");
    exit();

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();

    // header("Location: ../View/dashboardStud.php?msg=returnError");
    // exit();
}


?>