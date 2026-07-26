<!DOCTYPE html>
<html lang="en">

<?php
require '../View/header.php';
?>

</html>
<style>
    tbody td form:nth-last-of-type(1) {
        margin: auto;
    }

    tbody td button:nth-child(1) {
        background-color: #0B5ED7;
        color: white;
        border: 0.5px solid #fff;
        border-radius: 5px;
        font-family: 'Poppins', sans-serif;
        padding: 4px 12px;
        font-weight: 500;
        margin: 0 0 0 1.2rem;

    }

    tbody td button:nth-child(2) {
        background-color: #FF4444;
        color: white;
        border: 0.5px solid #fff;
        border-radius: 5px;
        font-family: 'Poppins', sans-serif;
        padding: 4px 14px;
        font-weight: 500;
        margin: 0 0 0 1.2rem;

    }

    tbody td button:nth-child(1):hover {
        background-color: #fff;
        color: #0B5ED7;
    }

    tbody td button:nth-child(2):hover {
        background-color: #fff;
        color: #FF4444;
    }

    #borrowedTable tbody td button:nth-child(1),
    #toReturnTable tbody td button:nth-child(1),
    #returnedTable tbody td button:nth-child(1) {
        opacity: 0;
        font-size: 2px;

    }
</style>
</head>

<body>

<script>
  function confirmDelete(entryID, tableID) {
    const ok = confirm("Do you want to delete entry ID:" + entryID + "?");
    if (ok) {
      window.location.href = `../Controller/deleteEntry.php?entryID=${encodeURIComponent(entryID)}&tableID=${encodeURIComponent(tableID)}`;
    }
  }
</script>

    <?php

    function showMembers($conn)
    {
        // $actionButtons = '<button class="btn btn-primary btn-sm"><i class="bi bi-pencil-square" id="btnEdit"></i></button>
        //                   <button class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill" id="btnDelete"></i></button>';
        try {
            $sql = "SELECT accountID, firstName, lastName, email FROM accounts where accountType='User'";
            // Execute the SQL query
            $result = $conn->query($sql);
            // Process the result set
            if ($result->rowCount() > 0) {
                echo
                    '<thead>
                <tr>
                    <th>Membership ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>';
                // Output data of each row
                while ($row = $result->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row['accountID'] . "</td>";
                    echo "<td>" . $row['firstName'] . "</td>";
                    echo "<td>" . $row['lastName'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>";

                    echo "<form action='updateAccount.php' method='POST' style='display:inline;'>";
                    echo "<input type='hidden' name='accountID' value='" . htmlspecialchars($row['accountID']) . "'>";
                    echo "<input type='hidden' name='firstName' value='" . htmlspecialchars($row['firstName']) . "'>";
                    echo "<input type='hidden' name='lastName' value='" . htmlspecialchars($row['lastName']) . "'>";
                    echo "<input type='hidden' name='email' value='" . htmlspecialchars($row['email']) . "'>";
                    echo "<button type='submit'>Update</button>";
                    echo "</form>";
                    
                    echo "<button onclick='confirmDelete(".$row['accountID'].",1 )'>Delete</button>";
                    echo "</td>";
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

    function showFaculty($conn)
    {
        // $actionButtons = '<button class="btn btn-primary btn-sm"><i class="bi bi-pencil-square" id="btnEdit"></i></button>
        //                   <button class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill" id="btnDelete"></i></button>';
        try {
            $sql = "SELECT accountID, firstName, lastName, email FROM accounts where accountType='Faculty'";
            // Execute the SQL query
            $result = $conn->query($sql);
            // Process the result set
            if ($result->rowCount() > 0) {
                echo
                    '<thead>
                <tr>
                    <th>Account ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>';
                // Output data of each row
                while ($row = $result->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row['accountID'] . "</td>";
                    echo "<td>" . $row['firstName'] . "</td>";
                    echo "<td>" . $row['lastName'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>";

                    echo "<form action='updateAccount.php' method='POST' style='display:inline;'>";
                    echo "<input type='hidden' name='accountID' value='" . htmlspecialchars($row['accountID']) . "'>";
                    echo "<input type='hidden' name='firstName' value='" . htmlspecialchars($row['firstName']) . "'>";
                    echo "<input type='hidden' name='lastName' value='" . htmlspecialchars($row['lastName']) . "'>";
                    echo "<input type='hidden' name='email' value='" . htmlspecialchars($row['email']) . "'>";
                    echo "<button type='submit'>Update</button>";
                    echo "</form>";
                    
                    echo "<button onclick='confirmDelete(".$row['accountID'].",1 )'>Delete</button>";
                    echo "</td>";
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
            $sql = "SELECT BookID, Title, Author, Genre, Quantity, Status FROM tblbooks";
            // Execute the SQL query
            $result = $conn->query($sql);
            // Process the result set
            if ($result->rowCount() > 0) {
                echo
                    '<thead>
                <tr>
                    <th>Book ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>';
                // Output data of each row
                while ($row = $result->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row['BookID'] . "</td>";
                    echo "<td>" . $row['Title'] . "</td>";
                    echo "<td>" . $row['Author'] . "</td>";
                    echo "<td>" . $row['Genre'] . "</td>";
                    echo "<td>" . $row['Quantity'] . "</td>";


                    switch ($row['Status']) {
                        case "Available":
                            echo '<td><span class="badge-status badge-available">Available</span></td>';
                            break;
                        case "Borrowed":
                            echo '<td><span class="badge-status badge-borrowed">Out of Stock</span></td>';
                            break;
                    }
                    echo "<td>";

                    echo "<form action='updateBook.php' method='POST' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='" . htmlspecialchars($row['BookID']) . "'>";
                    echo "<input type='hidden' name='title' value='" . htmlspecialchars($row['Title']) . "'>";
                    echo "<input type='hidden' name='author' value='" . htmlspecialchars($row['Author']) . "'>";
                    echo "<input type='hidden' name='genre' value='" . htmlspecialchars($row['Genre']) . "'>";
                    echo "<input type='hidden' name='quantity' value='" . htmlspecialchars($row['Quantity']) . "'>";
                    echo "<button type='submit'>Update</button>";
                    echo "</form>";
                    
                    echo "<button onclick='confirmDelete(".$row['BookID'].",2 )'>Delete</button>";
                    echo "</td>";
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
                echo
                    '<thead>
                <tr>
                    <th>Borrow ID</th>
                    <th>Member Name</th>
                    <th>Membership ID</th>
                    <th>Book Title</th>
                    <th>Book ID</th>
                    <th>Date Borrowed</th>
                    <th>Due Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>';
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
                echo
                    '<thead>
                <tr>
                    <th>Borrow ID</th>
                    <th>Member Name</th>
                    <th>Membership ID</th>
                    <th>Book Title</th>
                    <th>Book ID</th>
                    <th>Date Borrowed</th>
                    <th>Due Date</th>
                    <th>Days Overdue</th>
                </tr>
            </thead>
            <tbody>';
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
                echo
                    '<thead>
                <tr>
                    <th>ReturnID</th>
                    <th>Member</th>
                    <th>Book Title</th>
                    <th>Date Borrowed</th>
                    <th>Return Date</th>
                    <th>Fine</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>';
                // Output data of each row
                while ($row = $result->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row['ReturnID'] . "</td>";
                    echo "<td>" . $row['Member'] . "</td>";
                    echo "<td>" . $row['BookTitle'] . "</td>";
                    echo "<td>" . $row['BorrowedDate'] . "</td>";
                    echo "<td>" . $row['ReturnedDate'] . "</td>";
                    echo "<td> ₱ " . $row['Fine'] . "</td>";
                    echo "<td>";
                    // echo "<button onclick='confirmDelete(".$row['ReturnID'].",4 )'>Delete</button>";
                    echo "<button onclick='confirmDelete(".$row['ReturnID'].", 4)' style=' opacity: 1; font-size: 14px'>Delete</button>";
                    echo "</td>";
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