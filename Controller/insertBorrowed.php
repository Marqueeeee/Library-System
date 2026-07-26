<?php

require_once "../Config/connDB.php";
$conn = $connDB->getConn();

$memberName;
$membershipID = $_POST["membershipID"];
$bookTitle = $_POST['title'];
$bookID = $_POST["bookID"];

//retrieve the member name from tblmembers:
try {
    $sql = "SELECT firstName, lastName FROM accounts WHERE accountID='" . $membershipID . "'";
    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            $memberName = $row['firstName'] . ' ' . $row['lastName'];
        }
        unset($result);
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

try {
    $sql = "SELECT * FROM tblborrowedlist WHERE MembershipID='" . $membershipID . "' and BookID='" . $bookID . "'";
    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            header("Location: ../View/dashboardStud.php?msg=borrowFail1");
            exit();
        }
        unset($result);
    } else {
        $sql = "SELECT * FROM tblborrowedlist WHERE MembershipID='" . $membershipID . "'";
        $result = $conn->query($sql);

        if ($result->rowCount() >= 4) {
            while ($row = $result->fetch()) {
                header("Location: ../View/dashboardStud.php?msg=borrowFail2");
                exit();
            }
        } else {
            $sql = "INSERT INTO tblborrowedlist (BookID, MembershipID, Name, BookTitle) VALUES (?, ?, ?, ?)";
            // Prepare the SQL query template
            $stmt = $conn->prepare($sql);
            // Execute with values
            $stmt->execute([$bookID, $membershipID, $memberName, $bookTitle]);

            //insert update here for quantity -1
            $sql = "UPDATE tblbooks SET Quantity = Quantity - 1 WHERE BookID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$bookID]);

            header("Location: ../View/dashboardStud.php?msg=borrowSuccess");
            exit();
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();

    header("Location: ../View/dashboardStud.php?msg=borrowError");
    exit();
}



?>