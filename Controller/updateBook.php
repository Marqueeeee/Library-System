<?php

require_once "../Config/connDB.php";
$conn = $connDB->getConn();

$bookID = $_POST["bookID"];
$title = $_POST["title"];
$author = $_POST["author"];
$genre = $_POST["genre"];
$category = $_POST["category"];

switch ($category) {
    case "Reference":
        $credits = 0;
        break;
    case "Textbook":
        $credits = 5;
        break;
    case "Special":
        $credits = 10;
        break;
    case "Exclusive":
        $credits = 15;
        break;
}

try {
    $sql = "UPDATE tblbooks SET Title=?, Author=?, Genre=?, Category=?, CreditsRequired=? WHERE BookID=?";
    // Prepare the SQL query template
    $stmt = $conn->prepare($sql);
    // Execute with values
    $stmt->execute([$title, $author, $genre, $category, $credits, $bookID]);

    header("Location: ../View/dashboard.php?msg=updated");
    exit();
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();

    header("Location: ../View/dashboard.php?msg=error");
    exit();
}


?>