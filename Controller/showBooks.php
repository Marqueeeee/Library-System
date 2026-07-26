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

?>