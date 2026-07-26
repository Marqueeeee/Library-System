<?php
function countMembers($conn)
{
    try {
        $sql = "SELECT count(accountID) as Count FROM accounts where accountType='User'";
        // Execute the SQL query
        $result = $conn->query($sql);
        // Process the result set
        if ($result->rowCount() > 0) {
            // Output data of each row
            while ($row = $result->fetch()) {
                echo '<div class="stat-num">' . $row['Count'] . '</div>';
            }
            unset($result);
        } else {
            echo '<div class="stat-num">0</div>';
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function countFaculty($conn)
{
    try {
        $sql = "SELECT count(accountID) as Count FROM accounts where accountType='Faculty'";
        // Execute the SQL query
        $result = $conn->query($sql);
        // Process the result set
        if ($result->rowCount() > 0) {
            // Output data of each row
            while ($row = $result->fetch()) {
                echo '<div class="stat-num">' . $row['Count'] . '</div>';
            }
            unset($result);
        } else {
            echo '<div class="stat-num">0</div>';
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function countBooks($conn)
{
    try {
        $sql = "SELECT count(BookID) as Count FROM tblbooks";
        // Execute the SQL query
        $result = $conn->query($sql);
        // Process the result set
        if ($result->rowCount() > 0) {
            // Output data of each row
            while ($row = $result->fetch()) {
                echo '<div class="stat-num">' . $row['Count'] . '</div>';
            }
            unset($result);
        } else {
            echo '<div class="stat-num">0</div>';
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function countBorrowedBooks($conn)
{
    try {
        $sql = "SELECT count(BorrowID) as Count FROM tblborrowedlist";
        // Execute the SQL query
        $result = $conn->query($sql);
        // Process the result set
        if ($result->rowCount() > 0) {
            // Output data of each row
            while ($row = $result->fetch()) {
                echo '<div class="stat-num">' . $row['Count'] . '</div>';
            }
            unset($result);
        } else {
            echo '<div class="stat-num">0</div>';
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function countReturnedBooks($conn)
{
    try {
        $sql = "SELECT count(ReturnID) as Count FROM tblreturnedlist";
        // Execute the SQL query
        $result = $conn->query($sql);
        // Process the result set
        if ($result->rowCount() > 0) {
            // Output data of each row
            while ($row = $result->fetch()) {
                echo '<div class="stat-num">' . $row['Count'] . '</div>';
            }
            unset($result);
        } else {
            echo '<div class="stat-num">0</div>';
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function countReturnedBooksStud($conn)
{
    try {
        $sql = "SELECT count(ReturnID) as Count FROM tblreturnedlist WHERE MembershipID =" . $_SESSION['user_id'];
        // Execute the SQL query
        $result = $conn->query($sql);
        // Process the result set
        if ($result->rowCount() > 0) {
            // Output data of each row
            while ($row = $result->fetch()) {
                echo '<div class="stat-num">' . $row['Count'] . '</div>';
            }
            unset($result);
        } else {
            echo '<div class="stat-num">0</div>';
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function countBorrowedBooksStud($conn)
{
    try {
        $sql = "SELECT count(BorrowID) as Count FROM tblborrowedlist WHERE MembershipID =" . $_SESSION['user_id'];
        // Execute the SQL query
        $result = $conn->query($sql);
        // Process the result set
        if ($result->rowCount() > 0) {
            // Output data of each row
            while ($row = $result->fetch()) {
                echo '<div class="stat-num">' . $row['Count'] . '</div>';
            }
            unset($result);
        } else {
            echo '<div class="stat-num">0</div>';
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>