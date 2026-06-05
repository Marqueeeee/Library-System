function toggleForm(id) {
    document.getElementById(id).classList.toggle('show');
    document.getElementById(id).scrollIntoView(
        {
            behavior: 'smooth'

        });
}


let selectedRow = null;

function enableRowButtons() {
    document.querySelectorAll(".btn-action-row").forEach((btn) => (btn.disabled = false));
}

function disableRowButtons() {
    document.querySelectorAll(".btn-action-row").forEach(btn => (btn.disabled = true));
}

function initTableSelection(tableId) {
    const rows = document.querySelectorAll("#" + tableId + " tbody tr");
    rows.forEach((row) => {
        row.addEventListener("click", function(){
            if(selectedRow === this) {
                this.classList.remove("selected");
                selectedRow = null;
                disableRowButtons();
                return;
            }
            if (selectedRow) selectedRow.classList.remove("selected");
            this.classList.add("selected");
            selectedRow = this;
            enableRowButtons();  
        });
    });
}

function filterTable(tableId, query) { 
    const q = query.toLowerCase();
    document.querySelectorAll("#" + tableId + " tbody tr").forEach((row) => {
        row.style.display = row.textContent.toLowerCase().includes(q) ? "" : "none";
    });
}

function clearState() {
    document.getElementById('bookDelete').disabled = true;
    document.getElementById('bookUpdate').disabled = true;
    document.getElementById('deleteConfirmation').innerHTML = "Are you sure you want to delete it?";
}

//event listener for members
document.addEventListener('DOMContentLoaded', function () {
    const table = document.getElementById('membersTable');
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

        const columnNames = ['ID', 'fName', 'lName', 'contact', 'creditPoints'];
        const rowData = {};
        columnNames.forEach((name, index) => {
            rowData[name] = cellValues[index];
        });

        document.getElementById("membershipID").value = rowData['ID'];
        document.getElementById("firstName").value = rowData['fName'];
        document.getElementById("lastName").value = rowData['lName'];
        document.getElementById("contact").value = rowData['contact'];
        //document.getElementById("creditPoints").value = rowData['creditPoints'];

        document.getElementById('memberDelete').disabled = false;
        document.getElementById('memberUpdate').disabled = false;

        document.getElementById("deleteID").value = rowData['ID'];
        document.getElementById("tableID").value = 1;
        document.getElementById('deleteConfirmation').innerHTML = "Are you sure you want to delete the member: " + rowData['lName'] + ", " + rowData['fName'] + "?";
        alert("Currently Selecting Member ID: " + rowData['ID']);
    }
});

//event listener for borrowed table
document.addEventListener('DOMContentLoaded', function () {
    const table = document.getElementById('borrowedTable');
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

        const columnNames = ['ID', 'Name', 'MembershipID', 'Title', 'BookID', 'Date', 'DueDate', 'Status'];
        const rowData = {};
        columnNames.forEach((name, index) => {
            rowData[name] = cellValues[index];
        });

        document.getElementById("borrowedID").value = rowData['ID'];
        document.getElementById("borrowerName").value = rowData['Name'];
        document.getElementById("borrowerID").value = rowData['MembershipID'];
        document.getElementById("borrowedBookTitle").value = rowData['Title'];
        document.getElementById("borrowedBookID").value = rowData['BookID'];
        document.getElementById("borrowedDate").value = rowData['Date'];
        document.getElementById("borrowedDueDate").value = rowData['DueDate'];
        document.getElementById("borrowedStatus").value = rowData['Status'];


        document.getElementById('borrowedDelete').disabled = false;
        document.getElementById('borrowedUpdate').disabled = false;

        document.getElementById("deleteID").value = rowData['ID'];
        document.getElementById("tableID").value = 3;
        document.getElementById('deleteConfirmation').innerHTML = "Are you sure you want to delete entry Borrow ID: " + rowData['ID'] + "?";
        alert("Currently Selecting Entry ID: " + rowData['ID']);
    }
});

//event listener for books
document.addEventListener('DOMContentLoaded', function () {
    const table = document.getElementById('booksTable');
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

        const columnNames = ['ID', 'Title', 'Author', 'Genre', 'Category'];
        const rowData = {};
        columnNames.forEach((name, index) => {
            rowData[name] = cellValues[index];
        });

        document.getElementById("bookID").value = rowData['ID'];
        document.getElementById("bookTitle").value = rowData['Title'];
        document.getElementById("bookAuthor").value = rowData['Author'];
        document.getElementById("bookGenre").value = rowData['Genre'];
        document.getElementById("bookCategory").value = rowData['Category'];

        document.getElementById('bookDelete').disabled = false;
        document.getElementById('bookUpdate').disabled = false;

        document.getElementById("deleteID").value = rowData['ID'];
        document.getElementById("tableID").value = 2;
        document.getElementById('deleteConfirmation').innerHTML = "Are you sure you want to delete the book: " + rowData['Title'] + "?";
        alert("Currently Selecting Book ID: " + rowData['ID']);
    }
});

//event listener for to return list 
document.addEventListener('DOMContentLoaded', function () {
    const table = document.getElementById('toReturnTable');
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

        const columnNames = ['ID', 'Name', 'MemID', 'Title', 'BookID', 'DateBorrowed','DueDate', 'OverDue'];
        const rowData = {};
        columnNames.forEach((name, index) => {
            rowData[name] = cellValues[index];
        });

        document.getElementById("toReturnID").value = rowData['ID'];
        document.getElementById("memberName").value = rowData['Name'];
        document.getElementById("returnedBookName").value = rowData['Title'];
        document.getElementById("dateBorrowed").value = rowData['DateBorrowed'];
        document.getElementById("returnDueDate").value = rowData['DueDate'];
        document.getElementById("overDue").value = rowData['OverDue'];

        document.getElementById('toReturnDelete').disabled = false;
        document.getElementById('toMarkReturned').disabled = false;

        document.getElementById("deleteID").value = rowData['ID'];
        document.getElementById("tableID").value = 3;
        document.getElementById('deleteConfirmation').innerHTML = "Are you sure you want to delete the entry: " + rowData['ID'] + " " +rowData['Name'] + "?";
        alert("Currently Selecting Entry ID: " + rowData['ID']);
    }
});

//event listener for returned list
document.addEventListener('DOMContentLoaded', function () {
    const table = document.getElementById('returnedTable');
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

        const columnNames = ['ID'];
        const rowData = {};
        columnNames.forEach((name, index) => {
            rowData[name] = cellValues[index];
        });

        document.getElementById('returnedDelete').disabled = false;

        document.getElementById("deleteID").value = rowData['ID'];
        document.getElementById("tableID").value = 4;
        document.getElementById('deleteConfirmation').innerHTML = "Are you sure you want to delete the entry: " + rowData['ID'] + "?";
        alert("Currently Selecting Return ID: " + rowData['ID']);
    }
});

document.getElementById("importBtn").addEventListener("click", () => {
    document.getElementById("fileInput").click();
});

function refreshMembersTable() {
    fetch('../Controller/getMembers.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('membersTable').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}

function refreshBooksTable() {
    fetch('../Controller/getBooks.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('booksTable').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}

function refreshBorrowedTable() {
    fetch('../Controller/getBorrowed.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('borrowedTable').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}