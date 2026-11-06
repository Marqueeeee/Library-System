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

    tbody td form button {
        color: #0B5ED7;
        padding: 4px 12px;
        font-size: 1.2rem;
        border: none;
        background-color: transparent;

    }

    tbody td button:nth-child(2) {
        color: #FF4444;
        padding: 4px 14px;
        font-size: 1.2rem;
        border: none;
        background-color: transparent;

    }

    tbody td form .bi-printer{
        color: #111113;
        padding: 4px 12px;
        font-size: 1.2rem;
        border: none;
        background-color: transparent;
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

    function showMembers($conn, $type)
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
                    <th>Account ID</th>
                    <th>Timestamp</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>';
                // Output data of each row
                while ($row = $result->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row['accountID'] . "</td>";
                    echo "<td>" . $row['accountID'] . "</td>";     //update to timestamp
                    echo "<td>" . $row['firstName'] . "</td>";
                    echo "<td>" . $row['lastName'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";          //update to contact
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>";

                    echo "<form action='updateAccount.php' method='POST' style='display:inline;'>";
                    echo "<input type='hidden' name='accountID' value='" . htmlspecialchars($row['accountID']) . "'>";
                    echo "<input type='hidden' name='firstName' value='" . htmlspecialchars($row['firstName']) . "'>";
                    echo "<input type='hidden' name='lastName' value='" . htmlspecialchars($row['lastName']) . "'>";
                    echo "<input type='hidden' name='email' value='" . htmlspecialchars($row['email']) . "'>";
                    echo "<button type='submit'><i class='bi bi-pencil-square'></i></button>";
                    echo "</form>";
                    if ($type == "Admin") {
                        echo "<button onclick='confirmDelete(" . $row['accountID'] . ",1 )'><i class='bi bi-trash3-fill'></i></button>";
                    }
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
                    <th>Contact</th>
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
                    echo "<td>" . $row['email'] . "</td>";          //update to contact
                    echo "<td>";

                    echo "<form action='updateAccount.php' method='POST' style='display:inline;'>";
                    echo "<input type='hidden' name='accountID' value='" . htmlspecialchars($row['accountID']) . "'>";
                    echo "<input type='hidden' name='firstName' value='" . htmlspecialchars($row['firstName']) . "'>";
                    echo "<input type='hidden' name='lastName' value='" . htmlspecialchars($row['lastName']) . "'>";
                    echo "<input type='hidden' name='email' value='" . htmlspecialchars($row['email']) . "'>";
                    echo "<button type='submit'><i class='bi bi-pencil-square'></i></button>";
                    echo "</form>";
                    echo "<button onclick='confirmDelete(" . $row['accountID'] . ",1 )'><i class='bi bi-trash3-fill'></i></button>";
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

    function showBooks($conn, $type)
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
                    <th>Accession No.</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Copyright</th>
                    <th>Publisher</th>
                    <th>Remarks</th>
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
                    echo "<td>" . $row['Quantity'] . "</td>";    //update to copyright
                    echo "<td>" . $row['Genre'] . "</td>";      //update to publisher
                    echo "<td>" . $row['Quantity'] . "</td>";   //update to remarks


                                                                //status: Available, Borrowed, Lost, Damaged
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
                    echo "<button type='submit'><i class='bi bi-pencil-square'></i></button>";
                    echo "</form>";
                    if ($type == "Admin") {
                        echo "<button onclick='confirmDelete(" . $row['BookID'] . ",2 )'><i class='bi bi-trash3-fill'></i></button>";
                    }
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
            $sql = "SELECT BorrowID, Name, MembershipID, BookTitle, BookID, DateBorrowed, DueDate, DATEDIFF(CURRENT_DATE, DueDate) FROM tblborrowedlist";
            // Execute the SQL query
            $result = $conn->query($sql);
            // Process the result set
            if ($result->rowCount() > 0) {
                echo                              //Status: Borrowed, Pending, Returned         //Action: Edit, Delete, Print Receipt           
                    '<thead>                
                <tr>
                    <th>Borrow ID</th>
                    <th>Timestamp</th>
                    <th>Book Title</th>
                    <th>Accession No.</th>
                    <th>Borrower</th>
                    <th>Account ID</th>
                    <th>Date Borrowed</th>
                    <th>Due Date</th>
                    <th>Overdue Days </th>
                    <th>Status </th>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>';
                // Output data of each row
                while ($row = $result->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row['BorrowID'] . "</td>";
                    echo "<td>" . $row['BorrowID'] . "</td>";           //update to timestamp/
                    echo "<td>" . $row['BookTitle'] . "</td>";
                    echo "<td>" . $row['MembershipID'] . "</td>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['BookID'] . "</td>";
                    echo "<td>" . $row['DateBorrowed'] . "</td>";
                    echo "<td>" . $row['DueDate'] . "</td>";
                    echo "<td>" . $row['DATEDIFF(CURRENT_DATE, DueDate)'] . " days</td>";


                    // switch ($row['Status']) {
                    //     case "Overdue":
                    //         echo '<td><span class="badge-status badge-overdue">Overdue</span></td>';
                    //         break;
                    //     case "Borrowed":
                    //         echo '<td><span class="badge-status badge-borrowed">Borrowed</span></td>';
                    //         break;
                    // }

                    // echo "<td>";
                    // echo "<button type='submit'><i class='bi bi-pencil-square'></i></button>";
                    // echo "<button type='submit'><i class='bi bi-trash3-fill'></i></button>";
                    // echo "<button type='submit'><i class='bi bi-printer'></i></button>";
                    // echo "</td>";

                    echo"</tr>";
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



    // function showToReturn($conn)
    
    // {
    //     try {
    //         $sql = "SELECT BorrowID, Name, MembershipID, BookTitle, BookID, DateBorrowed, DueDate, DATEDIFF(DueDate, CURRENT_DATE) FROM tblborrowedlist";
    //         // Execute the SQL query
    //         $result = $conn->query($sql);
    //         // Process the result set
    //         if ($result->rowCount() > 0) {
    //             echo
    //                 '<thead>
    //             <tr>
    //                 <th>Borrow ID</th>
    //                 <th>Borrower Name</th>
    //                 <th>Account ID</th>
    //                 <th>Book Title</th>
    //                 <th>Book ID</th>
    //                 <th>Date Borrowed</th>
    //                 <th>Due Date</th>
    //                 <th>Days Overdue</th>
    //             </tr>
    //         </thead>
    //         <tbody>';
    //             // Output data of each row
    //             while ($row = $result->fetch()) {
    //                 echo "<tr>";
    //                 echo "<td>" . $row['BorrowID'] . "</td>";
    //                 echo "<td>" . $row['Name'] . "</td>";
    //                 echo "<td>" . $row['MembershipID'] . "</td>";
    //                 echo "<td>" . $row['BookTitle'] . "</td>";
    //                 echo "<td>" . $row['BookID'] . "</td>";
    //                 echo "<td>" . $row['DateBorrowed'] . "</td>";
    //                 echo "<td>" . $row['DueDate'] . "</td>";

    //                 if ($row['DATEDIFF(DueDate, CURRENT_DATE)'] <= 0) {
    //                     echo '<td>0 days</td>';
    //                 } else {
    //                     echo '<td><span class="badge-status badge-overdue">' . $row['DATEDIFF(DueDate, CURRENT_DATE)'] . ' day/s</span></td>';
    //                 }

    //                 echo "</tr>";
    //             }
    //             echo "</tbody>";
    //             unset($result);
    //         } else {
    //             echo "No records found.";
    //         }

    //     } catch (PDOException $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }

   

    //showTable for activity logs
    function showReturned($conn, $type)
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
                    <th>ID</th>
                    <th>Timestamp</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Purpose</th>
                    <th>Book Title</th>
                    <th>Status</th>

                    
                </tr>
            </thead>
            <tbody>';
                // Output data of each row
                while ($row = $result->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row['ReturnID'] . "</td>";
                    echo "<td>" . $row['ReturnID'] . "</td>";       //update to timestamp
                    echo "<td>" . $row['Member'] . "</td>";         //update to borrower email
                    echo "<td>" . $row['BorrowedDate'] . "</td>";   //update to borrower contact                    
                    echo "<td>" . $row['BookTitle'] . "</td>";      //update to purpose: borrow/return  
                    echo "<td>" . $row['BookTitle'] . "</td>";      //update to book title
                    echo "<td>" . $row['BookTitle'] . "</td>";      //update to status: success/failed
                    
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

    //supposed showTable for deleteRecently

    // function showdeletedRecently($conn, $type)
    // {
    //     try {
    //         $sql = "SELECT ReturnID, Member, BookTitle, BorrowedDate, ReturnedDate, Fine FROM tblreturnedlist";
    //         // Execute the SQL query
    //         $result = $conn->query($sql);
    //         // Process the result set
    //         if ($result->rowCount() > 0) {
    //             echo
    //                 '<thead>
    //             <tr>
    //                 <th>ID</th>
    //                 <th>Timestamp</th>
    //                 <th>Email</th>
    //                 <th>Contact</th>
    //                 <th>Purpose</th>
    //                 <th>Book Title</th>
    //                 <th>Status</th>
    //                 <th>Action</th>

                    
    //             </tr>
    //         </thead>
    //         <tbody>';
    //             // Output data of each row
    //             while ($row = $result->fetch()) {
    //                 echo "<tr>";
    //                 echo "<td>" . $row['ReturnID'] . "</td>";
    //                 echo "<td>" . $row['ReturnID'] . "</td>";       //update to timestamp
    //                 echo "<td>" . $row['Member'] . "</td>";         //update to borrower email
    //                 echo "<td>" . $row['BorrowedDate'] . "</td>";   //update to borrower contact                    
    //                 echo "<td>" . $row['BookTitle'] . "</td>";      //update to purpose: borrow/return  
    //                 echo "<td>" . $row['BookTitle'] . "</td>";      //update to book title
    //                 echo "<td>" . $row['BookTitle'] . "</td>";      //update to status: success/failed
    //                 echo "<td><button class='btn btn-outline-success'><i class='bi bi-arrow-counterclockwise'></i> Restore</button></td>";
    //                 echo "</tr>";

    //             }
    //             echo "</tbody>";
    //             unset($result);
    //         } else {
    //             echo "No records found.";
    //         }

    //     } catch (PDOException $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }



    
    //supposedshowTable for reports 

    // function showBorrowed($conn)
    // {
    //     try {
    //         $sql = "SELECT BorrowID, Name, MembershipID, BookTitle, BookID, DateBorrowed, DueDate, DATEDIFF(CURRENT_DATE, DueDate) FROM tblborrowedlist";
    //         // Execute the SQL query
    //         $result = $conn->query($sql);
    //         // Process the result set
    //         if ($result->rowCount() > 0) {
    //             echo                              //Status: Borrowed, Pending, Returned         //Action: Edit, Delete, Print Receipt           
    //                 '<thead>                
    //             <tr>
    //                 <th>Timestamp</th>
    //                 <th>Borrow ID</th>
    //                 <th>Book Title</th>
    //                 <th>Accession No.</th>
    //                 <th>Borrower</th>
    //                 <th>Account ID</th>
    //                 <th>Date Borrowed</th>
    //                 <th>Due Date</th>
    //                 <th>Overdue Days </th>
    //                 <th>Status </th>
    //                 <th>Action</th> 
    //             </tr>
    //         </thead>
    //         <tbody>';
    //             // Output data of each row
    //             while ($row = $result->fetch()) {
    //                 echo "<tr>";
    //                 echo "<td>" . $row['BorrowID'] . "</td>";           //update to timestamp/
    //                 echo "<td>" . $row['BorrowID'] . "</td>";
    //                 echo "<td>" . $row['BookTitle'] . "</td>";
    //                 echo "<td>" . $row['MembershipID'] . "</td>";
    //                 echo "<td>" . $row['Name'] . "</td>";
    //                 echo "<td>" . $row['BookID'] . "</td>";
    //                 echo "<td>" . $row['DateBorrowed'] . "</td>";
    //                 echo "<td>" . $row['DueDate'] . "</td>";
    //                 echo "<td>" . $row['DATEDIFF(CURRENT_DATE, DueDate)'] . " days</td>";


    //                 // switch ($row['Status']) {
    //                 //     case "Overdue":
    //                 //         echo '<td><span class="badge-status badge-overdue">Overdue</span></td>';
    //                 //         break;
    //                 //     case "Borrowed":
    //                 //         echo '<td><span class="badge-status badge-borrowed">Borrowed</span></td>';
    //                 //         break;
    //                 // }

    //                 // echo "<td>";
    //                 // echo "<button type='submit'><i class='bi bi-pencil-square'></i></button>";
    //                 // echo "<button type='submit'><i class='bi bi-trash3-fill'></i></button>";
    //                 // echo "<button type='submit'><i class='bi bi-printer'></i></button>";
    //                 // echo "</td>";

    //                 echo"</tr>";
    //             }
    //             echo "</tbody>";
    //             unset($result);
    //         } else {
    //             echo "No records found.";
    //         }

    //     } catch (PDOException $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }


    ?>
</body>

</html>