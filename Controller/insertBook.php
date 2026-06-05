<?php
class insertEntry {
    //private variables here
    function __construct (//tablenumber
    ) {
        //initialize $_POST[] depending on the table number
    }

    function insertInto() {
        //sql insert here depending on table number
    }
}

require_once "../Config/connDB.php";
$conn = $connDB->getConn();

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
    $sql = "INSERT INTO tblbooks (Title, Author, Genre, Category, CreditsRequired) VALUES (?, ?, ?, ?, ?)";
    // Prepare the SQL query template
    $stmt = $conn->prepare($sql);
    // Execute with values
    $stmt->execute([$title, $author, $genre, $category, $credits]);

    header("Location: ../View/dashboard.php?msg=added");
    exit();
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();

    header("Location: ../View/dashboard.php?msg=error");
    exit();
}


?>