<?php

require_once "../Config/connDB.php";
$conn = $connDB->getConn();

$memberName;
$membershipID = $_POST["membershipID"];
$bookTitle;
$bookID = $_POST["bookID"];

//retrieve the member name from tblmembers:
try {
    $sql = "SELECT FirstName, LastName FROM tblmembers WHERE MembershipID='" . $membershipID . "'";
    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            $memberName = $row['FirstName'] . ' ' . $row['LastName'];
        }
        unset($result);
    }

    $sql = "SELECT Title FROM tblbooks WHERE BookID='" . $bookID . "'";
    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            $bookTitle = $row['Title'];
        }
        unset($result);
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

//insert into borrowed after getting all necessary info
try {
    $sql = "INSERT INTO tblborrowedlist (BookID, MembershipID, Name, BookTitle) VALUES (?, ?, ?, ?)";
    // Prepare the SQL query template
    $stmt = $conn->prepare($sql);
    // Execute with values
    $stmt->execute([$bookID, $membershipID, $memberName, $bookTitle]);

    header("Location: ../View/dashboard.php?msg=added");
    exit();

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();

    header("Location: ../View/dashboard.php?msg=error");
    exit();
}


?>