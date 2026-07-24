<!DOCTYPE html>
<html lang="en">

<?php 
    require '../View/header.php';
?>

<body>
    
<?php

function showMembers($conn)
{
    $actionButtons = '<button class="btn btn-primary btn-sm"><i class="bi bi-pencil-square" id="btnEdit"></i></button>
                      <button class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill" id="btnDelete"></i></button>';
    try {
        $sql = "SELECT MembershipID, FirstName, LastName, ContactNo, Actions FROM tblmembers";
        // Execute the SQL query
        $result = $conn->query($sql);
        // Process the result set
        if ($result->rowCount() > 0) {
            echo '<thead>
                        <tr>
                            <th>Membership ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Contact Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>';
            // Output data of each row
            while ($row = $result->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['MembershipID'] . "</td>";
                echo "<td>" . $row['FirstName'] . "</td>";
                echo "<td>" . $row['LastName'] . "</td>";
                echo "<td>" . $row['ContactNo'] . "</td>";
                echo "<td>" . $row['Actions'] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>"; 
            unset($result);
        } else {
            echo "No records found.";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function showBooks($conn)
{
    try {
        $sql = "SELECT BookID, Title, Author, Genre, Genre, Category, CreditsRequired, Status FROM tblbooks";
        // Execute the SQL query
        $result = $conn->query($sql);
        // Process the result set
        if ($result->rowCount() > 0) {
            echo '<thead><tr><th>Book ID</th><th>Title</th><th>Author</th><th>Genre</th><th>Category</th><th>Credits Req.</th><th>Status</th></thead><tbody>';
            // Output data of each row
            while ($row = $result->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['BookID'] . "</td>";
                echo "<td>" . $row['Title'] . "</td>";
                echo "<td>" . $row['Author'] . "</td>";
                echo "<td>" . $row['Genre'] . "</td>";
                echo "<td>" . $row['Category'] . "</td>";
                echo "<td>" . $row['Actions'] . "</td>";

                switch ($row['Status']) {
                    case "Available":
                        echo '<td><span class="badge-status badge-available">Available</span></td>';
                        break;
                    case "Borrowed":
                        echo '<td><span class="badge-status badge-borrowed">Borrowed</span></td>';
                        break;
                }
                echo "</tr>";
            }
            echo "</tbody>";
            unset($result);
        } else {
            echo "No records found.";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function showBorrowed($conn)
{
    try {
        $sql = "SELECT BorrowID, Name, MembershipID, BookTitle, BookID, DateBorrowed, DueDate, Status FROM tblborrowedlist";
        // Execute the SQL query
        $result = $conn->query($sql);
        // Process the result set
        if ($result->rowCount() > 0) {
            echo '<thead><th>Borrow ID</th><th>Member Name</th><th>Membership ID</th><th>Book Title</th><th>Book ID</th><th>Date Borrowed</th><th>Due Date</th><th>Status</th></thead><tbody>';
            // Output data of each row
            while ($row = $result->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['BorrowID'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['MembershipID'] . "</td>";
                echo "<td>" . $row['BookTitle'] . "</td>";
                echo "<td>" . $row['BookID'] . "</td>";
                echo "<td>" . $row['DateBorrowed'] . "</td>";
                echo "<td>" . $row['DueDate'] . "</td>";

                switch ($row['Status']) {
                    case "Overdue":
                        echo '<td><span class="badge-status badge-overdue">Overdue</span></td>';
                        break;
                    case "Borrowed":
                        echo '<td><span class="badge-status badge-borrowed">Borrowed</span></td>';
                        break;
                }
                echo "</tr>";
            }
            echo "</tbody>";
            unset($result);
        } else {
            echo "No records found.";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function showToReturn($conn)
{
    try {
        $sql = "SELECT BorrowID, Name, MembershipID, BookTitle, BookID, DateBorrowed, DueDate, DATEDIFF(DateBorrowed, DueDate) FROM tblborrowedlist";
        // Execute the SQL query
        $result = $conn->query($sql);
        // Process the result set
        if ($result->rowCount() > 0) {
            echo '<thead><th>Borrow ID</th><th>Member Name</th><th>Membership ID</th><th>Book Title</th><th>Book ID</th><th>Date Borrowed</th><th>Due Date</th><th>Days Overdue</th></thead><tbody>';
            // Output data of each row
            while ($row = $result->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['BorrowID'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['MembershipID'] . "</td>";
                echo "<td>" . $row['BookTitle'] . "</td>";
                echo "<td>" . $row['BookID'] . "</td>";
                echo "<td>" . $row['DateBorrowed'] . "</td>";
                echo "<td>" . $row['DueDate'] . "</td>";

                if ($row['DATEDIFF(DateBorrowed, DueDate)'] <= 0) {
                    echo '<td>0 days</td>';
                } else {
                    echo '<td><span class="badge-status badge-overdue">' . $row['DATEDIFF(DateBorrowed, DueDate)'] . ' day/s</span></td>';
                }
                echo "</tr>";
            }
            echo "</tbody>";
            unset($result);
        } else {
            echo "No records found.";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function showReturned($conn)
{
    try {
        $sql = "SELECT ReturnID, Member, BookTitle, BorrowedDate, ReturnedDate, Fine FROM tblreturnedlist";
        // Execute the SQL query
        $result = $conn->query($sql);
        // Process the result set
        if ($result->rowCount() > 0) {
            echo '<thead><tr><th>ReturnID</th><th>Member</th><th>Book Title</th><th>Date Borrowed</th><th>Return Date</th><th>Fine</th></tr></thead><tbody>';
            // Output data of each row
            while ($row = $result->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['ReturnID'] . "</td>";
                echo "<td>" . $row['Member'] . "</td>";
                echo "<td>" . $row['BookTitle'] . "</td>";
                echo "<td>" . $row['BorrowedDate'] . "</td>";
                echo "<td>" . $row['ReturnedDate'] . "</td>";
                echo "<td> ₱ " . $row['Fine'] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            unset($result);
        } else {
            echo "No records found.";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


?>
</body>
</html>