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

                
                echo "<form action='updateAccount.php' method='POST' style='display:inline;'>";
                echo "<input type='hidden' name='accountID' value='" . htmlspecialchars($row['accountID']) . "'>";
                echo "<input type='hidden' name='firstName' value='" . htmlspecialchars($row['firstName']) . "'>";
                echo "<input type='hidden' name='lastName' value='" . htmlspecialchars($row['lastName']) . "'>";
                echo "<input type='hidden' name='email' value='" . htmlspecialchars($row['email']) . "'>";
                echo '<button class="btn btn-success btn-sm borrow-btn" type="submit">Borrow</button>';
                echo "</form>";

                echo '</div> </div> </div>';
                // echo "<tr>";
                // echo "<td>" . $row['accountID'] . "</td>";
                // echo "<td>" . $row['firstName'] . "</td>";
                // echo "<td>" . $row['lastName'] . "</td>";
                // echo "<td>" . $row['email'] . "</td>";
                // echo "<td>";

                // echo "<form action='updateAccount.php' method='POST' style='display:inline;'>";
                // echo "<input type='hidden' name='accountID' value='" . htmlspecialchars($row['accountID']) . "'>";
                // echo "<input type='hidden' name='firstName' value='" . htmlspecialchars($row['firstName']) . "'>";
                // echo "<input type='hidden' name='lastName' value='" . htmlspecialchars($row['lastName']) . "'>";
                // echo "<input type='hidden' name='email' value='" . htmlspecialchars($row['email']) . "'>";
                // echo "<button type='submit'>Update</button>";
                // echo "</form>";

                // echo "<button onclick='confirmDelete(" . $row['accountID'] . ",1 )'>Delete</button>";
                // echo "</td>";
                // echo "</tr>";
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

?>