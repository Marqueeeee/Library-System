<?php

function exploreBooks($conn)
{
    try {
        $sql = "SELECT BookID, Title, Author, Genre FROM tblbooks where Quantity>1";
        // Execute the SQL query
        $result = $conn->query($sql);
        // Process the result set
        if ($result->rowCount() > 0) {

            echo '<div class="row row-cols-1 row-cols-sm-6 g-3 flex-wrap">';
            while ($row = $result->fetch()) {

                $bookID = $row['BookID'];
                $title = $row['Title'];
                $author = $row['Author'];
                $genre = $row['Genre'];


                $abbr = '';
                $words = preg_split('/\s+/', trim($title));

                foreach ($words as $w) {
                    if ($w === '')
                        continue;
                    $abbr .= strtoupper($w[0]);
                    if (strlen($abbr) >= 5)
                        break; // max 5 letters
                }

                echo '<div class="col">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<div class="book-front" style="background-color: #1a5c2a;">';
                echo '<h3 class="bookTitle">' . $abbr . '</h3>';
                echo '</div>';
                echo '<span class="badge text-bg-primary" class="non-fiction" id="non-fiction">' . $genre . '</span>';
                echo '<h5 class="card-title">' . $title . '</h5>';
                echo '<p class="card-text">' . $author . '</p>';


                echo "<form action='../Controller/insertBorrowed.php' method='POST' style='display:inline;'>";
                echo "<input type='hidden' name='bookID' value='" . htmlspecialchars($bookID) . "'>";
                echo "<input type='hidden' name='title' value='" . htmlspecialchars($title) . "'>";
                echo "<input type='hidden' name='membershipID' value='" . htmlspecialchars($_SESSION['user_id']) . "'>";
                echo '<button class="btn btn-success btn-sm borrow-btn" type="submit">Borrow</button>';
                echo "</form>";

                echo '</div> </div> </div>';
            }
            echo "</div>";
            unset($result);
        } else {
            echo "No records found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function borrowingBooks($conn)
{
    try {
        $sql = "SELECT BorrowID, Name, BookID, BookTitle, DateBorrowed, DueDate, DATEDIFF(DateBorrowed, DueDate) FROM tblborrowedlist where MembershipID=" . $_SESSION['user_id'];
        // Execute the SQL query
        $result = $conn->query($sql);
        // Process the result set
        if ($result->rowCount() > 0) {

            echo '<div class="row row-cols-1 row-cols-md-4 g-3 flex-wrap">';
            while ($row = $result->fetch()) {

                $borrowID = $row['BorrowID'];
                $name = $row['Name'];
                $bookID = $row['BookID'];
                $title = $row['BookTitle'];
                $dateBorrowed = $row['DateBorrowed'];
                $dueDate = $row['DueDate'];
                $overDue = $row['DATEDIFF(DateBorrowed, DueDate)'];


                $abbr = '';
                $words = preg_split('/\s+/', trim($title));

                foreach ($words as $w) {
                    if ($w === '')
                        continue;
                    $abbr .= strtoupper($w[0]);
                    if (strlen($abbr) >= 5)
                        break; // max 5 letters
                }

                echo '<div class="col">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<div class="book-front" style="background-color: #1a5c2a;">';
                echo '<h3 class="bookTitle">' . $abbr . '</h3>';
                echo '</div>';
                echo '<span class="badge text-bg-primary" class="non-fiction" id="non-fiction">Due Date: ' . $dueDate . '</span>';
                echo '<h5 class="card-title">' . $title . '</h5>';
                echo '<p class="card-text">Date Borrowed: ' . $dateBorrowed . '</p>';

                // $id = $_POST["returnID"];
                // $name = $_POST["name"];
                // $title = $_POST["title"];
                // $borrowDate = $_POST["borrowDate"];
                // $dueDate = $_POST["dueDate"];
                // $overDue = $_POST["overDue"];
                // $membershipID = $_POST['membershipID'];

                echo "<form action='../Controller/insertReturned.php' method='POST' style='display:inline;'>";
                echo "<input type='hidden' name='returnID' value='" . htmlspecialchars($borrowID) . "'>";
                echo "<input type='hidden' name='name' value='" . htmlspecialchars($name) . "'>";
                echo "<input type='hidden' name='bookID' value='" . htmlspecialchars($bookID) . "'>";
                echo "<input type='hidden' name='title' value='" . htmlspecialchars($title) . "'>";
                echo "<input type='hidden' name='borrowDate' value='" . htmlspecialchars($dateBorrowed) . "'>";
                echo "<input type='hidden' name='dueDate' value='" . htmlspecialchars($dueDate) . "'>";
                echo "<input type='hidden' name='overDue' value='" . htmlspecialchars($overDue) . "'>";
                echo "<input type='hidden' name='membershipID' value='" . htmlspecialchars($_SESSION['user_id']) . "'>";
                echo '<button class="btn btn-success btn-sm borrow-btn" type="submit">Return</button>';
                echo "</form>";

                echo '</div> </div> </div>';
            }
            echo "</div>";
            unset($result);
        } else {
            echo "No records found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function showReturnedBooks($conn)
{
    try {
        $sql = "SELECT ReturnID, BookTitle, BorrowedDate, ReturnedDate, Fine FROM tblreturnedlist WHERE MembershipID=" . $_SESSION['user_id'];
        // Execute the SQL query
        $result = $conn->query($sql);
        // Process the result set
        if ($result->rowCount() > 0) {
            echo
                '<thead>
                <tr>
                    <th>ReturnID</th>
                    <th>Book Title</th>
                    <th>Date Borrowed</th>
                    <th>Return Date</th>
                    <th>Fine</th>
                </tr>
            </thead>
            <tbody>';
            // Output data of each row
            while ($row = $result->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['ReturnID'] . "</td>";
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