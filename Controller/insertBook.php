<?php

require_once "../Config/connDB.php";
$conn = $connDB->getConn();

$title = $_POST["title"];
$author = $_POST["author"];
$genre = $_POST["genre"];
$quantity= $_POST["quantity"];


try {
    $sql = "INSERT INTO tblbooks (Title, Author, Genre, Quantity) VALUES (?, ?, ?, ?)";
    // Prepare the SQL query template
    $stmt = $conn->prepare($sql);
    // Execute with values
    $stmt->execute([$title, $author, $genre, $quantity]);

    header("Location: ../View/adminDash.php?msg=added");
    exit();
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();

    header("Location: ../View/adminDash.php?msg=error");
    exit();
}


?>