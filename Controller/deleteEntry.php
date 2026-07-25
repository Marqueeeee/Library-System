<?php

require_once "../Config/connDB.php";
$conn = $connDB->getConn();

$tableID = $_POST['tableID'];
$deleteID = $_POST['deleteID'];

try {
    switch ($tableID) {
        case 1:
            $sql = "DELETE FROM tblmembers WHERE MembershipID=?";
            // Prepare the SQL query template
            break;
        case 2:
            $sql = "DELETE FROM tblbooks WHERE BookID=?";
            // Prepare the SQL query template
            break;
        case 3:
            $sql = "DELETE FROM tblborrowedlist WHERE BorrowID=?";
            break;
        case 4:
            $sql = "DELETE FROM tblreturnedlist WHERE ReturnID=?";
            break;
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute([$deleteID]);

    header("Location: ../View/dashboard.php?msg=deleted");
    exit();

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();

    header("Location: ../View/dashboard.php?msg=error");
    exit();
}

?>