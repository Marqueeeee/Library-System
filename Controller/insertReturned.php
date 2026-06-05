<?php

require_once "../Config/connDB.php";
$conn = $connDB->getConn();

$id = $_POST["returnID"];
$name = $_POST["name"];
$title = $_POST["title"];
$borrowDate = $_POST["borrowDate"];
$dueDate = $_POST["dueDate"];
$overDue = $_POST["overDue"];
$fine = "₱ " . $overDue * 10;

try {
    $sql = "INSERT INTO tblreturnedlist (Member, BookTitle, BorrowedDate, ReturnedDate, Fine) VALUES (?, ?, ?, ?, ?)";
    // Prepare the SQL query template
    $stmt = $conn->prepare($sql);
    // Execute with values
    $stmt->execute([$name, $title, $borrowDate, $dueDate, $fine]);


    $sql = "DELETE FROM tblborrowedlist WHERE BorrowID=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    header("Location: ../View/dashboard.php?msg=added");
    exit();
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();

    header("Location: ../View/dashboard.php?msg=error");
    exit();
}


?>