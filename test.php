<style>
    tbody tr:hover {
        background-color: #f5f5f5;
        cursor: pointer;
        /* Indicate row is clickable */
    }
</style>

<?php

require_once "Config/connDB.php";
$conn = $connDB->getConn();

try {
    $sql = "SELECT MembershipID, FirstName, ContactNo, CreditPoints FROM tblmembers";
    // Execute the SQL query
    $result = $conn->query($sql);
    // Process the result set
    if ($result->rowCount() > 0) {
        echo '<table id="userTable"><thead><tr><th>ID</th><th>Name</th><th>Contact Number</th><th>Credit Points</th></tr></thead><tbody>';
        // Output data of each row
        while ($row = $result->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['MembershipID'] . "</td>";
            echo "<td>" . $row['FirstName'] . "</td>";
            echo "<td>" . $row['ContactNo'] . "</td>";
            echo "<td>" . $row['CreditPoints'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
        unset($result);
    } else {
        echo "No records found.";
    }


} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
<br>
<input type="text" id="result">
<button onclick="">asdasd</button>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        const table = document.getElementById('userTable');
        const tbody = table.querySelector('tbody');
        const rows = tbody.rows;
        const rowArray = Array.from(rows);

        rowArray.forEach(row => {
            row.addEventListener('click', handleRowClick);
        });

        function handleRowClick(event) {
            const clickedRow = event.target.closest('tr');
            const cells = clickedRow.cells;
            const cellValues = [];

            for (let i = 0; i < cells.length; i++) {
                cellValues.push(cells[i].textContent.trim());
            }

            const columnNames = ['ID', 'Email', 'Role'];
            const rowData = {};
            columnNames.forEach((name, index) => {
                rowData[name] = cellValues[index];
            });

            document.getElementById("result").value = rowData['ID']; 
        }
    });
</script>