<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styles.css">

    <script src="section.js"></script>
    <?php
    require_once "../Config/connDB.php";
    require_once "../Controller/showTables.php";

    if (isset($_GET['msg'])) {
        if ($_GET['msg'] == 'added') {
            echo '<script> alert("Entry successfully added!"); </script>';
        } elseif ($_GET['msg'] == 'updated') {
            echo '<script> alert("Entry successfully updated!"); </script>';
        } elseif ($_GET['msg'] == 'deleted') {
            echo '<script> alert("Entry successfully deleted!"); </script>';
        } elseif ($_GET['msg'] == 'error') {
            echo '<script> alert("An unknown error has occurred!"); </script>';
        }
    }

    $conn = $connDB->getConn();
    ?>

</head>

<body>

    <!-- ============== SIDEBAR ============== -->
    <div class="sidebar">
        <nav class="nav flex-column">

            <div class="card" id="brand">
                <h3 class="card-title">LMS</h3>
            </div>

            <div class="sidebar-user">
                <div class="avatar"><i class="bi bi-person-circle"></i></div>
                <div>
                    <div><span class="status-dot"></span><span class="label-active">active</span></div>
                    <div class="label-name">Admin</div>
                </div>
            </div>

            <button class="nav-link nav-item-lms active" data-section="dashboard" onclick="showSection(this);">
                <span class="icon"><i class="bi bi-house"></i></span>
                <span class="description">Dashboard</span>>
            </button>

            <button class="nav-link nav-item-lms" data-section="members" onclick="showSection(this);">
                <span class="icon"><i class="bi bi-people"></i></span>
                <span class="description">Members Section</span>>
            </button>

            <button class="nav-link nav-item-lms" data-section="books" onclick="showSection(this);">
                <span class="icon"><i class="bi bi-book"></i></i></span>
                <span class="description">Books Section</span>>
            </button>

            <button class="nav-link nav-item-lms" data-section="borrowed" onclick="showSection(this);">
                <span class="icon"> <i class="bi bi-bag"></i></span>
                <span class="description">Borrowed List</span>>
            </button>

            <button class="nav-link nav-item-lms" data-section="toreturn" onclick="showSection(this);">
                <span class="icon"><i class="bi bi-back"></i></span>
                <span class="description">To Return List</span>>
            </button>

            <button class="nav-link nav-item-lms" data-section="returned" onclick="showSection(this);">
                <span class="icon"><i class="bi bi-arrow-return-left"></i></span>
                <span class="description">Returned List</span>>
            </button>

            <button class="nav-link nav-item-lms" data-section="database" onclick="showSection(this);">
                <span class="icon"><i class="bi bi-database"></i></span>
                <span class="description">Database Record</span>>
            </button>



        </nav>

        <div class="sidebar-footer">
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exitModal">Exit System
                <i class="bi bi-box-arrow-left me-1"></i>
            </button>

        </div>
    </div>

    <!-- ============== CONTAINER ============== -->
    <div class="main-content">
        <div class="top-header">Library Management System</div>
        <div class="page-body">
            <!-- ============== DASHBOARD SECTION ============== -->
            <div id="section-dashboard" class="section active">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn stat-card">
                            <div>
                                <div class="stat-num">23</div>
                                <div class="stat-label">Registered Members</div>
                            </div>
                            <i class="bi bi-people stat-icon"></i>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="btn stat-card">
                            <div>
                                <div class="stat-num">50</div>
                                <div class="stat-label">Book Collection</div>
                            </div>
                            <i class="bi bi-book stat-icon"></i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="btn stat-card">
                            <div>
                                <div class="stat-num">15</div>
                                <div class="stat-label">Total Borrowed Books</div>
                            </div>
                            <i class="bi bi-bag-check stat-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="btn stat-card">
                            <div>
                                <div class="stat-num">13</div>
                                <div class="stat-label">To Return Books</div>
                            </div>
                            <i class="bi bi-back stat-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="btn stat-card">
                            <div>
                                <div class="stat-num">10</div>
                                <div class="stat-label">Returned Books</div>
                            </div>
                            <i class="bi bi-arrow-return-left stat-icon"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ============== MEMBERS SECTION ============== -->
            <div id="section-members" class="section">
                <div class="panel">
                    <div class="section-heading">
                        <div class="icon-box">
                            <i class="bi bi-people-fill"></i>
                            <h5>Members Section</h5>
                        </div>
                    </div>
                    <div class="toolbar">
                        <input type="text" class="form-control" name="member-search" id="member-search"
                            class="form-control" placeholder="Quick Search"
                            oninput="filterTable('membersTable', this.value)">
                        <button class="btn btn-secondary btn-sm"><i class="bi bi-search"></i></button>

                    </div>

                    <button class="btn btn-success btn-md" onclick="toggleForm('memberForm')"><i
                            class="bi bi-plus-lg"></i> Add new</button>
                    <button class="btn btn-danger btn-md" data-bs-toggle="modal" data-bs-target="#delModal" disabled
                        id="memberDelete"><i class="bi bi-trash3-fill"></i></button>
                    <button class="btn btn-primary btn-md" onclick="toggleForm('updateMember')" disabled
                        id="memberUpdate"><i class="bi bi-pencil-square"></i></button>


                    <div class="table-responsive">
                        <table class="table table-bordered lms-table table-striped table-hover" id="membersTable">

                            <?php showMembers($conn) ?>
                            <!--
                            <thead>
                                <tr>
                                    <th>Membership ID</th>
                                    <th>Name (FN, LN)</th>
                                    <th>Contact Number</th>
                                    <th>Credit Points</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>1002</td>
                                    <td>Daenerys Targaryen</td>
                                    <td>09935150614</td>
                                    <td>10.00</td>
                                </tr>
                            </tbody>-->


                        </table>
                    </div>

                    <div class="form-section" id="memberForm">
                        <h6><i class="bi bi-person-plus me-2"></i>Add New Member</h6>

                        <form action="../Controller/insertMember.php" method="post">
                            <div class="row g-3">


                                <div class="col-md-4">
                                    <label class="form-label">First Name:</label>
                                    <input type="text" class="form-control form-control-md" name="firstName" required
                                        placeholder=>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Last Name:</label>
                                    <input type="text" class="form-control form-control-md" name="lastName" required
                                        placeholder=>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Contact:</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control form-control-sm" required
                                            name="contact">
                                    </div>
                                </div>
                                <br>
                                <div class="col-12 d-flex gap-3">
                                    <button class="btn btn-success btn-sm" type="submit"><i
                                            class="bi bi-person-plus me-1"></i>Add
                                        member</button>
                                    <button class="btn btn-secondary btn-sm" onclick="toggleForm('memberForm')"><i
                                            class="bi bi-backspace me-1"></i>Cancel</button>
                                </div>
                        </form>
                    </div>
                </div>

                <div class="form-section" id="updateMember">
                    <h6><i class="bi bi-person-plus me-2"></i>Update Member</h6>

                    <div class="row g-3">
                        <form action="../Controller/updateMember.php" method="post">
                            <input type="hidden" name="membershipID" id="membershipID">
                            <div class="col-md-4">
                                <label class="form-label">First Name:</label>
                                <input type="text" class="form-control form-control-md" id='firstName' name="firstName"
                                    required placeholder=>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Last Name:</label>
                                <input type="text" class="form-control form-control-md" id='lastName' name="lastName"
                                    required placeholder=>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Contact:</label>
                                <div class="input-group">
                                    <div class="input-group-text">09</div>
                                    <input type="number" class="form-control form-control-sm" id='contact' required
                                        name="contact">
                                </div>
                            </div>
                            <br>
                            <div class="col-12 d-flex gap-3">
                                <button class="btn btn-success btn-sm" type="submit"><i
                                        class="bi bi-person-plus me-1"></i>Update Member</button>
                                <button class="btn btn-secondary btn-sm" onclick="toggleForm('updateMember')"><i
                                        class="bi bi-backspace me-1"></i>Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============== BOOKS SECTION ============== -->
        <div id="section-books" class="section">
            <div class="panel">
                <div class="section-heading">
                    <div class="icon-box">
                        <i class="bi bi-book-half"></i>
                        <h5>Books Section</h5>
                    </div>
                </div>

                <div class="toolbar">

                    <input type="text" name="member-search" id="member-search" class="form-control"
                        placeholder="Quick Search" oninput="filterTable('booksTable', this.value)">
                    <button class="btn btn-secondary btn-sm"><i class="bi bi-search"></i></button>

                </div>

                <button class="btn btn-success btn-md" onclick="toggleForm('bookForm')"><i
                        class="bi bi-plus-lg me-1"></i>Add Book</button>
                <button class="btn btn-warning btn-md" onclick="toggleForm('borrowForm')"><i
                        class="bi bi-bag-check me-1"></i>Borrow</button>
                <button class="btn btn-danger btn-md" data-bs-toggle="modal" data-bs-target="#delModal" disabled
                    id="bookDelete"><i class="bi bi-trash3-fill" id="btnDelete"></i></button>
                <button class="btn btn-primary btn-md " onclick="toggleForm('updateBookForm')" disabled
                    id="bookUpdate"><i class="bi bi-pencil-square" id="btnEdit"></i></button>

                <div class="table-responsive">
                    <table class="table table-bordered lms-table table-striped table-hover" id="booksTable">


                        <?php showBooks($conn) ?>
                        <!--
                            <thead>
                                <tr>
                                    <th>Book ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Genre</th>
                                    <th>Category</th>
                                    <th>Credits Req.</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>B001</td>
                                    <td>The Great Gatsby</td>
                                    <td>F. Scott Fitzgerald</td>
                                    <td>Non-fiction</td>
                                    <td>Textbook</td>
                                    <td>10.00</td>
                                    <td><span class="badge-status badge-available">Available</span></td>
                                </tr>
                                <tr>
                                    <td>B001</td>
                                    <td>The Great Gatsby</td>
                                    <td>F. Scott Fitzgerald</td>
                                    <td>Non-fiction</td>
                                    <td>Textbook</td>
                                    <td>10.00</td>
                                    <td><span class="badge-status badge-borrowed">Borrowed</span></td>
                                </tr>
                            </tbody> -->



                    </table>
                </div>

                <!-- ================= ADD-BOOK FORM ================= -->
                <div class="form-section" id="bookForm">
                    <h6><i class="bi bi-bookmark-plus me-2"></i>Add New Book</h6>
                    <form action="../Controller/insertBook.php" method="post">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <label class="form-label">Title:</label>
                                <input type="text" class="form-control form-control-md" name="title" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Author:</label>
                                <input type="text" class="form-control form-control-md" name="author" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Genre:</label>
                                <select class="form-select form-select-xs" name="genre" required>
                                    <option value="Fiction">Fiction</option>
                                    <option value="Non-Fiction">Non-Fiction</option>
                                    <option value="Drama">Drama</option>
                                    <option value="Poetry">Poetry</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Category:</label>
                                <select class="form-select form-select-xs" name="category" required>
                                    <option value="Exclusive">Exclusive</option>
                                    <option value="Special">Special</option>
                                    <option value="Textbook">Textbook</option>
                                    <option value="Reference">Reference</option>
                                </select>
                            </div>

                            <div class="col-12 d-flex gap-3">
                                <button class="btn btn-success btn-sm" type="submit"><i
                                        class="bi bi-bookmark-plus me-2"></i>Add
                                    book</button>
                                <button class="btn btn-secondary btn-sm" onclick="  toggleForm('bookForm')"><i
                                        class="bi bi-backspace me-2"></i>Cancel</button>
                            </div>

                        </div>
                    </form>
                </div>

                <!-- ================= BORROW-BOOK FORM ================= -->
                <div class="form-section" id="borrowForm">
                    <h6><i class="bi bi-bag-plus me-2"></i>Borrow Book</h6>

                    <div class="row g-3">
                        <form action="../Controller/insertBorrowed.php" method="post">
                            <div class="col-md-4">
                                <label class="form-label">Book Number:</label>
                                <input type="text" class="form-control form-control-md" required name="bookID">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Membership Number:</label>

                                <input type="text" class="form-control form-control-md" required name="membershipID">

                            </div>
                            <br>
                            <div class="col-12 d-flex gap-3">
                                <button class="btn btn-warning btn-sm" type="submit"><i
                                        class="bi bi-bag-plus me-2"></i>Borrow</button>
                                <button class="btn btn-secondary btn-sm" onclick="toggleForm('borrowForm')"><i
                                        class="bi bi-backspace me-2"></i>Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- ================= UPDATE BOOK FORM ================= -->
                <div class="form-section" id="updateBookForm">
                    <h6><i class="bi bi-bookmark-plus me-2"></i>Update Book</h6>
                    <form action="../Controller/updateBook.php" method="post">

                        <input type="hidden" name="bookID" id="bookID">

                        <div class="col-md-4">
                            <label class="form-label">Title:</label>
                            <input type="text" class="form-control form-control-md" name="title" required
                                id="bookTitle">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Author:</label>
                            <input type="text" class="form-control form-control-md" name="author" required
                                id="bookAuthor">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Genre:</label>
                            <select class="form-select form-select-xs" name="genre" required id="bookGenre">
                                <option value="Fiction">Fiction</option>
                                <option value="Non-Fiction">Non-Fiction</option>
                                <option value="Drama">Drama</option>
                                <option value="Poetry">Poetry</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Category:</label>
                            <select class="form-select form-select-xs" name="category" required id="bookCategory">
                                <option value="Exclusive">Exclusive</option>
                                <option value="Special">Special</option>
                                <option value="Textbook">Textbook</option>
                                <option value="Reference">Reference</option>
                            </select>
                        </div>

                        <div class="col-12 d-flex gap-3">
                            <button class="btn btn-success btn-sm" type="submit"><i
                                    class="bi bi-bookmark-plus me-2"></i>Update
                                book</button>
                            <button class="btn btn-secondary btn-sm" onclick="toggleForm('updateBookForm')"><i
                                    class="bi bi-backspace me-2"></i>Cancel</button>
                        </div>

                </div>
                </form>
            </div>
        </div>
        <!-- ============== BORROWED SECTION ============== -->
        <div id="section-borrowed" class="section">
            <div class="panel">
                <div class="section-heading">
                    <div class="icon-box">
                        <i class="bi bi-bag-plus-fill"></i>
                        <h5>Borrowed List</h5>
                    </div>
                </div>
                <button class="btn btn-dark btn-md" onclick="toggleForm('printBorrowForm')"><i
                        class="bi bi-printer me-2"></i>Print</button>
                <button class="btn btn-danger btn-md" data-bs-toggle="modal" data-bs-target="#delModal"
                    id="borrowedDelete"><i class="bi bi-trash3-fill"></i></button>
                <button class="btn btn-primary btn-md" onclick="toggleForm('updateBorrowedForm')" disabled
                    id="borrowedUpdate"><i class="bi bi-pencil-square"></i></button>

                <div class="table-responsive">
                    <table class="table table-bordered lms-table table-striped table-hover" id="borrowedTable">


                        <?php showBorrowed($conn) ?>
                        <!--<thead>
                                <tr>
                                    <th>Borrow ID</th>
                                    <th>Member Name</th>
                                    <th>Book Title</th>
                                    <th>Date Borrowed</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>BR001</td>
                                    <td>Aegon Targaryen</td>
                                    <td>Dune</td>
                                    <td>2025-05-01</td>
                                    <td>2025-05-01</td>
                                    <td><span class="badge-status badge-overdue">Overdue</span></td>
                                </tr>
                                <tr>
                                    <td>BR002</td>
                                    <td>Jon Snow</td>
                                    <td>To Kill a Mockingbird</td>
                                    <td>2025-05-10</td>
                                    <td>2025-05-10</td>
                                    <td><span class="badge-status badge-borrowed">Borrowed</span></td>
                                </tr>
                                <tr>
                                    <td>BR003</td>
                                    <td>Sansa Stark</td>
                                    <td>1984</td>
                                    <td>2025-05-15</td>
                                    <td>2025-05-15</td>
                                    <td><span class="badge-status badge-borrowed">Borrowed</span></td>
                                </tr>
                            </tbody> -->
                    </table>
                </div>

                <div class="form-section" id="borrowForm">
                    <h6><i class="bi bi-bag-plus me-2"></i>Borrow Book</h6>

                    <div class="row g-3">
                        <form action="../Controller/insertBorrowed.php" method="post">
                            <div class="col-md-4">
                                <label class="form-label">Book Number:</label>
                                <input type="text" class="form-control form-control-md" required name="bookID">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Membership Number:</label>

                                <input type="text" class="form-control form-control-md" required name="membershipID">

                            </div>
                            <br>
                            <div class="col-12 d-flex gap-3">
                                <button class="btn btn-warning btn-sm" type="submit"><i
                                        class="bi bi-bag-plus me-2"></i>Borrow</button>
                                <button class="btn btn-secondary btn-sm" onclick="toggleForm('borrowForm')"><i
                                        class="bi bi-backspace me-2"></i>Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- ================= UPDATE BORROWED FORM ================= -->
                <div class="form-section" id="updateBorrowedForm">
                    <h6><i class="bi bi-bookmark-plus me-2"></i>Update Borrowed Book</h6>
                    <form action="../Controller/updateBorrowed.php" method="post">

                        <input type="hidden" name="borrowedID" id="borrowedID">

                        <div class="row g-3">

                            <div class="col-md-2">
                                <label class="form-label">Member Name:</label>
                                <input type="text" class="form-control form-control-md" name="memberName" required
                                    id="borrowerName">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Membership ID:</label>
                                <div class="input-group">
                                    <div class="input-group-text">100</div>
                                    <input type="text" class="form-control form-control-md" name="membershipID" required
                                        id="borrowerID">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Book Title:</label>
                                <input type="text" class="form-control form-control-md" name="bookTitle" required
                                    id="borrowedBookTitle">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Book ID:</label>
                                <input type="text" class="form-control form-control-md" name="bookID" required
                                    id="borrowedBookID">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Date Borrowed:</label>
                                <input type="text" class="form-control form-control-md" name="date" required
                                    id="borrowedDate">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Due Date:</label>
                                <input type="text" class="form-control form-control-md" name="dueDate" required
                                    id="borrowedDueDate">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Status:</label>
                                <select class="form-select form-select-xs" name="status" required id="borrowedStatus">
                                    <option value="Borrowed">Borrowed</option>
                                    <option value="Overdue">Overdue</option>
                                </select>
                            </div>
                            <div class="col-12 d-flex gap-3">
                                <button class="btn btn-success btn-sm" type="submit"><i
                                        class="bi bi-bookmark-plus me-2"></i>Update
                                    book</button>
                                <button class="btn btn-secondary btn-sm" onclick="toggleForm('updateBookForm')"><i
                                        class="bi bi-backspace me-2"></i>Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>




            </div>

            <!-- Borrow Receipt -->
            <div class="form-section-receipt" id="printBorrowForm">
                <div class="box">
                    <h3>Library Management System</h3>
                    <h5>Borrow Receipt</h5>
                    <p id="date-borrowed">03/06/2026</p>

                    <div class="receipt-details">
                        <div class="label">Borrow ID:</div>
                        <div class="value" id="borrow-id">.</div>

                        <div class="label">Book ID:</div>
                        <div class="value" id="book-id">.</div>

                        <div class="label">Title:</div>
                        <div class="value" id="title">.</div>

                        <div class="label">Membership Name:</div>
                        <div class="value" id="member-name">.</div>

                    </div>
                    <p class="dotted-top">Return date: <span class="return-date">2026-06-03</span></p>
                    <button class="btn btn-primary" onclick="toggleForm('printBorrowForm')">Done</button>
                </div>
            </div>

        </div>



        <!-- ============== TO RETURN SECTION ============== -->
        <div id="section-toreturn" class="section">
            <div class="panel">
                <div class="section-heading">
                    <div class="icon-box">
                        <i class="bi bi-back"></i>
                        <h5>To return List</h5>
                    </div>
                </div>

                <button class="btn btn-dark btn-md" onclick="toggleForm('printReturnForm')"><i
                        class="bi bi-printer me-2"></i>Print</button>
                <button class="btn btn-success btn-mark"><i class="bi bi-check-circle me-2"></i>Mark
                    returned</button>
                <button class="btn btn-danger btn-md" data-bs-toggle="modal" data-bs-target="#delModal"><i
                        class="bi bi-trash3-fill"></i></button>

                <div class="table-responsive">
                    <table class="table table-bordered lms-table table-striped table-hover" id="toReturnTable">

                        <?php showToReturn($conn); ?>
                        <!--<thead>
                                <tr>
                                    <th>Borrow ID</th>
                                    <th>Member Name</th>
                                    <th>Book Title</th>
                                    <th>Due Date</th>
                                    <th>Days Overdue</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>BR001</td>
                                    <td>Aegon Targaryen</td>
                                    <td>Dune</td>
                                    <td>2025-05-15</td>
                                    <td>14 day/s</span></td>
                                </tr>
                                <tr>
                                    <td>BR002</td>
                                    <td>Jon Snow</td>
                                    <td>To Kill a Mockingbird</td>
                                    <td>2025-05-10</td>
                                    <td>0 days/</span></td>
                                </tr>
                                <tr>
                                    <td>BR003</td>
                                    <td>Sansa Stark</td>
                                    <td>1984</td>
                                    <td>2025-05-15</td>
                                    <td>0 day/s</span></td>
                                </tr>
            
                            </tbody> -->
                    </table>
                </div>

                <!-- Return Receipt -->
                <div class="form-section-receipt" id="printReturnForm">
                    <div class="box">
                        <h3>Library Management System</h3>
                        <h5>Return Receipt</h5>
                        <p id="date-return">dd/mm/yyyy</p>

                        <div class="receipt-details">
                            <div class="label">Borrow ID:</div>
                            <div class="value" id="borrow-id">BR001</div>

                            <div class="label">Book ID:</div>
                            <div class="value" id="book-id">B004</div>

                            <div class="label">Membership ID:</div>
                            <div class="value" id="member-id">10018</div>

                            <div class="label">Date Borrowed:</div>
                            <div class="value" id="title">Dune</div>

                            <div class="label">Days Overdue:</div>
                            <div class="value" id="title">14</div>
                        </div>

                        <p class="dotted-top">Total: <span class="return-date"></span></p>
                        <button class="btn btn-primary">Done</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- ============== DATABASE SECTION ============== -->

        <div id="section-database" class="section">
            <div class="panel">
                <div class="section-heading">
                    <div class="icon-box">
                        <i class="bi bi-database"></i>
                        <h5>Database Section</h5>
                    </div>
                </div>

                <h6>File Selection:</h6>

                <input type="file" name="" id="fileInput" hidden>
                <button type="button" class="btn btn-dark" id="importBtn">Import file</button>
                <button type="button" class="btn btn-primary" id="exportBtn">Export file</button>




            </div>
        </div>

        <!-- ============== RETURNED SECTION ============== -->
        <div id="section-returned" class="section">
            <div class="panel">
                <div class="section-heading">
                    <div class="icon-box">
                        <i class="bi bi-arrow-return-left"></i>
                        <h5>Returned List</h5>
                    </div>
                </div>
                <button class="btn btn-danger btn-md" data-bs-toggle="modal" data-bs-target="#delModal"><i
                        class="bi bi-trash3-fill"></i></button>

                <div class="table-responsive">
                    <table class="table table-bordered lms-table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Borrow ID</th>
                                <th>Member</th>
                                <th>Book Title</th>
                                <th>Date Borrowed</th>
                                <th>Return Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>BR004</td>
                                <td>Daenerys Targaryen</td>
                                <td>Pride and Prejudice</td>
                                <td>2025-04-20</td>
                                <td>2025-05-03</td>
                                <td><span class="badge-status badge-returned">Returned</span></td>
                            </tr>
                            <tr>
                                <td>BR005</td>
                                <td>Gendry Baratheon</td>
                                <td>The Great Gatsby</td>
                                <td>2025-04-25</td>
                                <td>2025-05-08</td>
                                <td><span class="badge-status badge-returned">Returned</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>




        <!-- ============== EXIT SYSTEM ============== -->
        <div class="modal fade" id="exitModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgba(226, 11, 11, 0.952);">
                        <i class="bi bi-exclamation-diamond-fill  bi-exclamation-diamond-lg me-2"></i>
                        <h3 style="color: white;">Exit System</h3>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">Do you really want to exit the system?</div>
                    <form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary" formaction="../index.php">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- ============== DELETE CONFIRMATION ============== -->
        <div class="modal fade" id="delModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgba(226, 11, 11, 0.952);">
                        <i class="bi bi-exclamation-diamond-fill  bi-exclamation-diamond-lg me-2"></i>
                        <h3 style="color: white;">Delete</h3>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" id="deleteConfirmation">Are you sure you want to delete it?</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        <form action="../Controller/deleteEntry.php" method="post">
                            <button type="submit" class="btn btn-primary">Yes</button>
                            <input type="hidden" name="deleteID" id="deleteID">
                            <input type="hidden" name="tableID" id="tableID">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="script.js"></script>

    </div>





</body>

</html>