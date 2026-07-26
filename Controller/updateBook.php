<?php

require_once "../Config/connDB.php";
$conn = $connDB->getConn();

$bookID = $_POST["bookID"];
$title = $_POST["title"];
$author = $_POST["author"];
$genre = $_POST["genre"];
$quantity = $_POST["quantity"];


try {
    $sql = "UPDATE tblbooks SET Title=?, Author=?, Genre=?, Quantity=? WHERE BookID=?";
    // Prepare the SQL query template
    $stmt = $conn->prepare($sql);
    // Execute with values
    $stmt->execute([$title, $author, $genre, $quantity, $bookID]);

    header("Location: ../View/adminDash.php?msg=updated");
    exit();
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();

    header("Location: ../View/adminDash.php?msg=error");
    exit();
}


?>