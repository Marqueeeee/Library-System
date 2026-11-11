<?php

require_once "../Config/connDB.php";
$conn = $connDB->getConn();

$bookID = $_POST["bookID"];
$title = $_POST["title"];
$author = $_POST["author"];
$copyright = $_POST["copyright"];
$publisher = $_POST["publisher"];
$remarks = $_POST["remarks"];


try {
    $sql = "UPDATE tblbooks SET Title=?, Author=?, Copyright=?, Publisher=?, Remarks=? WHERE BookID=?";
    // Prepare the SQL query template
    $stmt = $conn->prepare($sql);
    // Execute with values
    $stmt->execute([$title, $author, $copyright, $publisher, $remarks, $bookID]);

    header("Location: ../View/superAdmin.php?msg=updated");
    exit();
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();

    header("Location: ../View/superAdmin.php?msg=error");
    exit();
}


?>