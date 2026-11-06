<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="section.js"></script>

    
    <?php
    require_once "../Config/connDB.php";
    require_once "../Controller/showTables.php";
    require_once "../Controller/dashboardStats.php";

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

    session_start();
    $currentUserId = $_SESSION['user_id'] ?? null;
    $currentAccount = $_SESSION['accountType'];
    if ($currentUserId === null || $currentAccount != "Admin") {
        header("Location: ../index.php?msg=denied");
        exit();
    }
    ?>


    <?php if (isset($_SESSION['name'])): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.getElementById("currentName").innerHTML = <?= json_encode($_SESSION['name']) ?>;
            });
        </script>
    <?php endif; ?>

    <?php if (isset($_SESSION['email'])): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.getElementById("currentEmail").innerHTML = <?= json_encode($_SESSION['email']) ?>;
            });
        </script>
    <?php endif; ?>
</head>

<body>



    <!-- ============== SIDEBAR ============== -->
    <div class="sidebar d-none d-md-block">
        <nav class="nav flex-column">

            <!-- System Abbreviation: LMS (Library Management System) -->
            <div class="card" id="brand">
                    <img src="../View/SPIST_logo.jpg" alt="SPIST_logo">
            </div>

            <!-- User Information Section -->
            <div class="sidebar-user">
                <i class="bi bi-person-bounding-box avatar"></i>
                <div class="user-info">
                    <div>
                        <span class="status-dot"></span>
                        <span class="label-active">active</span>
                    </div>
                    <div class="label-name" id="currentName"></div>


                </div>
            </div>

            <button class="nav-link nav-item-lms active" data-section="dashboard" onclick="showSection(this);">
                <span class="icon"><i class="bi bi-house"></i></span>
                <span class="description">Dashboard</span> <span class="right-align"> > </span>
            </button>

        
            <p class="sidebar-section-category">User Management</p>
            
            <button class="nav-link nav-item-lms" data-section="members" onclick="showSection(this);">
                <span class="icon"><i class="bi bi-people"></i></span>
                <span class="description">Borrower</span> <span class="right-align"> > </span>
            </button>
            

            <button class="nav-link nav-item-lms" data-section="faculty" onclick="showSection(this);">
                <span class="icon"><i class="bi bi-person-badge"></i></span>
                <span class="description">Admin</span> <span class="right-align"> > </span>
            </button>

            <p class="sidebar-section-category">Book Management</p>

            <button class="nav-link nav-item-lms" data-section="books" onclick="showSection(this);">
                <span class="icon"><i class="bi bi-book"></i></i></span>
                <span class="description">Book Accessions</span> <span class="right-align"> > </span>
            </button>

            <button class="nav-link nav-item-lms" data-section="borrowed" onclick="showSection(this);">
                <span class="icon"> <i class="bi bi-bag"></i></span>
                <span class="description">Borrow/Return</span> <span class="right-align"> > </span>
            </button>
            
            <p class="sidebar-section-category">Activities and Reports</p>
            
            <button class="nav-link nav-item-lms" data-section="deleted" onclick="showSection(this);">
                <span class="icon"><i class="bi bi-trash3"></i></span>
                <span class="description">Deleted Recently</span> <span class="right-align"> > </span>
            </button>

            <button class="nav-link nav-item-lms" data-section="activity" onclick="showSection(this);">
                <span class="icon"><i class="bi bi-file-text"></i></span>
                <span class="description">Activity Log</span> <span class="right-align"> > </span>
            </button>
            
            <button class="nav-link nav-item-lms" data-section="reports" onclick="showSection(this);">
                <span class="icon"><i class="bi bi-flag"></i></i></span>
                <span class="description">Reports</span> <span class="right-align"> > </span>
            </button>
            
            <!-- <button class="nav-link nav-item-lms" data-section="settings" onclick="showSection(this);">
                <span class="icon"><i class="bi bi-gear"></i></i></span>
                <span class="description">Settings</span> <span class="right-align"> > </span>
            </button> -->

        </nav>

        <div class="sidebar-footer">
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exitModal">Exit System
                <i class="bi bi-box-arrow-left ms-1"></i>
            </button>
        </div>
    </div>

    <!-- MOBILE  SIDEBAR VIEW -->
    <div class="offcanvas offcanvas-start" id="mobileSidebar" tabindex="-1" aria-labelledby="mobileSidebarLabel"
        style="width: 260px; background-color: #1a5c2a ">


        <div class="offcanvas-header" style="background-color: #1a5c2a; border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                padding: 14px 16px;">
            <span id="mobileSidebarLabel"
                style="color: #fff; font-size: 1.1rem; font-weight: 700; letter-spacing: 2px;">LMS</span>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>

        <div class="offcanvas-body p-0 d-flex flex-column">
            <div class="sidebar-user" style="background-color:#EBE1E1;">
                <div class="avatar"><i class="bi bi-person-bounding-box"></i></div>
                <div class="user-info">
                    <div>
                        <span class="status-dot"></span>
                        <span class="label-active">active</span>
                    </div>
                    <span class="label-name" id="currentName"></span>
                    <div class="btn-group" role="group"></div>
                </div>
            </div>

            <nav class="nav flex-column flex-grow-1">
                <button class="nav-link nav-item-lms active" data-section="dashboard"
                    onclick="showSection(this); closeOffcanvas();">
                    <span class="icon"><i class="bi bi-house"></i></span>
                    <span class="description">Dashboard</span> <span class="right-align"> > </span>
                </button>

                <button class="nav-link nav-item-lms" data-section="members"
                    onclick="showSection(this); closeOffcanvas();">
                    <span class="icon"><i class="bi bi-people"></i></span>
                    <span class="description">User Management</span> <span class="right-align"> > </span>
                </button>

                <button class="nav-link nav-item-lms" data-section="faculty"
                    onclick="showSection(this); closeOffcanvas();">
                    <span class="icon"><i class="bi bi-person-badge"></i></span>
                    <span class="description">Faculty</span> <span class="right-align"> > </span>
                </button>

                <button class="nav-link nav-item-lms" data-section="books"
                    onclick="showSection(this); closeOffcanvas();">
                    <span class="icon"><i class="bi bi-book"></i></span>
                    <span class="description">Book Accessions</span> <span class="right-align"> > </span>
                </button>

                <button class="nav-link nav-item-lms" data-section="borrowed"
                    onclick="showSection(this); closeOffcanvas();">
                    <span class="icon"><i class="bi bi-bag"></i></span>
                    <span class="description">Borrowed List</span> <span class="right-align"> > </span>
                </button>

                <button class="nav-link nav-item-lms" data-section="toreturn"
                    onclick="showSection(this); closeOffcanvas();">
                    <span class="icon"><i class="bi bi-back"></i></span>
                    <span class="description">To Return List</span> <span class="right-align"> > </span>
                </button>

                <button class="nav-link nav-item-lms" data-section="returned"
                    onclick="showSection(this); closeOffcanvas();">
                    <span class="icon"><i class="bi bi-arrow-return-left"></i></span>
                    <span class="description"> Returned List</span> <span class="right-align"> > </span>
                </button>
            </nav>


            <div class="sidebar-footer pb-4">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exitModal"
                    data-bs-dismiss="offcanvas">Logout
                    <i class="bi bi-box-arrow-left ms-1"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- ============== MAIN CONTENT ============== -->
    <div class="main-content">
        <div class="top-header d-flex justify-content-baseline align-items-center">
            <button class="btn-hamburger d-md-none" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar"
                aria-controls="mobileSidebar" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
            <div class="sys-sch">
                <span>Library Management System</span>
                <p> Southern Philippines Institute of Science and Technology</p>
            </div>

            <div class="date-time">
                <div class="date">Monday, December 2, 2026</div>
                <div class="time">| 12:30 PM</div>
            </div>
        </div>
        <div class="page-body">

            <!-- ============== DASHBOARD SECTION ============== -->

            <!-- take-home books -->
            <div id="section-dashboard" class="section active">
                <div class="row">
                <div class="col-md-4">
                        <div class="btn stat-card" data-section="books" onclick="showSection(this);">
                            <div>
                                <?php countBooks($conn); ?>
                                <div class="stat-label">Book Accessions</div>
                            </div>
                            <i class="bi bi-book stat-icon"></i>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="btn stat-card" data-section="members" onclick="showSection(this);">
                            <div>
                                <?php countMembers($conn); ?>
                                <div class="stat-label">Registered Borrowers</div>
                            </div>
                            <i class="bi bi-people stat-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="btn stat-card" data-section="faculty" onclick="showSection(this);">
                            <div>
                                <?php countFaculty($conn); ?>
                                <div class="stat-label">Library Staff</div>
                            </div>
                            <i class="bi bi-person-badge stat-icon"></i>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="btn stat-card" data-section="borrowed" onclick="showSection(this);">
                            <div>
                                <?php countBorrowedBooks($conn); ?>
                                <div class="stat-label">Total Borrowed Books</div>
                            </div>
                            <i class="bi bi-bag stat-icon"></i>
                        </div>
                    </div>
                    <!-- <div class="col-md-4">
                        <div class="btn stat-card" data-section="toreturn" onclick="showSection(this);">
                            <div>
                                <?php countBorrowedBooks($conn); ?>
                                <div class="stat-label">To Return Books</div>
                            </div>
                            <i class="bi bi-back stat-icon"></i>
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <div class="btn stat-card" data-section="returned" onclick="showSection(this);">
                            <div>
                                <?php countReturnedBooks($conn); ?>
                                <div class="stat-label">Total Returned Books</div>
                            </div>
                            <i class="bi bi-arrow-left stat-icon"></i>
                        </div>
                    </div>
                </div>
            </div>


            <!-- mini-table for activity logs (activity in last 7 days,  month, year) -->
            <!-- book circulation analytics -->

            <!-- ============== BORROWERS SECTION ============== -->
            <div id="section-members" class="section">
                <div class="panel">
                    <div class="section-heading">
                        <div class="icon-box">
                            <i class="bi bi-people-fill"></i>
                            <h5>Borrower Section</h5>
                        </div>
                    </div>
                    <hr>

                    <div class="toolbar">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" name="member-search" id="member-search" class="form-control"
                            placeholder="Search name, email, ..." oninput="filterTable('booksTable', this.value)">
                            <button class="btn btn-success btn-md me-1  " onclick="toggleForm('memberForm')"><i
                            class="bi bi-plus-lg border-opacity-10"></i> Add new Borrower</button>
                            <button class="btn btn-secondary btn-md" onclick="toggleForm('memberForm')"><i class="bi bi-filetype-xls"></i> Download</button>

                            <!-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checkDefault">
                                <label class="form-check-label" for="checkDefault">
                                    Select All
                                </label>
                            </div> -->

                            <!-- <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle ms-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-filter"></i>Filter</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Ascending</a></li>
                                    <li><a class="dropdown-item" href="#">Descending</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                




                    <div class="table-responsive">
                        <table class="table lms-table table-striped" id="membersTable">

                            <?php showMembers($conn, "Admin") ?>


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

                    <div class="form-section" id="updateMember">
                        <h6><i class="bi bi-person-plus me-2"></i>Update Member</h6>

                        <div class="row g-3">
                            <form action="../Controller/updateMember.php" method="post">
                                <input type="hidden" name="membershipID" id="membershipID">
                                <div class="col-md-4">
                                    <label class="form-label">First Name:</label>
                                    <input type="text" class="form-control form-control-md" id='firstName'
                                        name="firstName" required placeholder=>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Last Name:</label>
                                    <input type="text" class="form-control form-control-md" id='lastName'
                                        name="lastName" required placeholder=>
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
        </div>

        
        <!-- ============== LIBRARY STAFF SECTION ============== -->
        <div id="section-faculty" class="section">
            <div class="panel">
                <div class="section-heading">
                    <div class="icon-box">
                        <i class="bi bi-people-fill"></i>
                        <h5>Admin Section</h5>
                    </div>
                </div>
                <div class="toolbar">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" name="member-search" id="member-search" class="form-control"
                            placeholder="Search name, email, ..." oninput="filterTable('booksTable', this.value)">
                            <a href="createBook.php">
                                <button class="btn btn-success btn-md me-1  " onclick="toggleForm('memberForm')"><i
                                class="bi bi-plus-lg border-opacity-10"></i> Add new Admin</button>
                            </a>
                            <button class="btn btn-secondary btn-md" onclick="toggleForm('memberForm')"><i class="bi bi-filetype-xls"></i> Download</button>

                            <!-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checkDefault">
                                <label class="form-check-label" for="checkDefault">
                                    Select All
                                </label>
                            </div> -->

                            <!-- <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle ms-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-filter"></i>Filter</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Ascending</a></li>
                                    <li><a class="dropdown-item" href="#">Descending</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>

                <div class="table-responsive">
                    <table class="table lms-table table-striped" id="membersTable">

                        <?php showFaculty($conn) ?>


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
                                    <input type="number" class="form-control form-control-sm" required name="contact">
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


    </div>
        <!-- ============== BOOKS SECTION ============== -->
        <div id="section-books" class="section">
            <div class="panel">
                <div class="section-heading">
                    <div class="icon-box">
                        <i class="bi bi-book-half"></i>
                        <h5>Book Accessions Section</h5>
                    </div>
                </div>


                <div class="toolbar">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" name="member-search" id="member-search" class="form-control"
                            placeholder="Search name, email, ..." oninput="filterTable('booksTable', this.value)">
                            <a href="createBook.php">
                                <button class="btn btn-success btn-md me-1  " onclick="toggleForm('memberForm')"><i
                                class="bi bi-plus-lg border-opacity-10"></i> Add new Book</button>
                            </a>
                            <button class="btn btn-secondary btn-md" onclick="toggleForm('memberForm')"><i class="bi bi-filetype-xls"></i> Download</button>

                            <!-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checkDefault">
                                <label class="form-check-label" for="checkDefault">
                                    Select All
                                </label>
                            </div> -->

                            <!-- <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle ms-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-filter"></i>Filter</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Ascending</a></li>
                                    <li><a class="dropdown-item" href="#">Descending</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>


                <div class="table-responsive">
                    <table class="table lms-table table-striped " id="booksTable">
                        <?php showBooks($conn, "Admin") ?>
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

                            <div class="col-12 d-flex gap-3">
                                <button class="btn btn-success btn-sm" type="submit"><i
                                        class="bi bi-bookmark-plus me-2"></i>Add
                                    book
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="  toggleForm('bookForm')"><i
                                        class="bi bi-backspace me-2"></i>Cancel
                                </button>
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
                                        class="bi bi-bag-plus me-2"></i>Borrow
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="toggleForm('borrowForm')"><i
                                        class="bi bi-backspace me-2"></i>Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- ================= UPDATE BOOK FORM ================= -->
                <div class="form-section" id="updateBookForm">
                    <h6><i class="bi bi-bookmark-plus me-2"></i>Update Book</h6>
                    <form action="../Controller/updateBook.php" method="post">
                        <input type="hidden" name="bookID" id="bookID">
                        <div class="row g-6">
                            <div class="col-md-6">
                                <label class="form-label">Title:</label>
                                <input type="text" class="form-control form-control-md" name="title" required
                                    id="bookTitle">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Author:</label>
                                <input type="text" class="form-control form-control-md" name="author" required
                                    id="bookAuthor">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Genre:</label>
                                <select class="form-select form-select-xs" name="genre" required id="bookGenre">
                                    <option value="Fiction">Fiction</option>
                                    <option value="Non-Fiction">Non-Fiction</option>
                                    <option value="Drama">Drama</option>
                                    <option value="Poetry">Poetry</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 d-flex gap-3" style="margin-top: 1.2rem;">
                            <button class="btn btn-success btn-sm" type="submit"><i
                                    class="bi bi-bookmark-plus me-2"></i>Update
                                book</button>
                            <button class="btn btn-secondary btn-sm" onclick="toggleForm('updateBookForm')"><i
                                    class="bi bi-backspace me-2"></i>Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============== BORROWING/RETURNS SECTION ============== -->
        <div id="section-borrowed" class="section">
            <div class="panel">
                <div class="section-heading">
                    <div class="icon-box">
                        <i class="bi bi-bag-plus-fill"></i>
                        <h5>Borrowing/Returns Section</h5>
                    </div>
                </div>

                <div class="toolbar">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" name="member-search" id="member-search" class="form-control"
                            placeholder="Search name, email, ..." oninput="filterTable('booksTable', this.value)">
                            <a href="createBook.php">
                                <button class="btn btn-success btn-md me-1  " onclick="toggleForm('memberForm')"><i
                                class="bi bi-plus-lg border-opacity-10"></i> Add new Borrow</button>
                            </a>
                            <a href="createBook.php">
                                <button class="btn btn-warning btn-md me-1  " onclick="toggleForm('memberForm')"><i
                                class="bi bi-plus-lg border-opacity-10"></i> Add new Return</button>
                            </a>
                            <button class="btn btn-secondary btn-md" onclick="toggleForm('memberForm')"><i class="bi bi-filetype-xls"></i> Download</button>

                            <!-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checkDefault">
                                <label class="form-check-label" for="checkDefault">
                                    Select All
                                </label>
                            </div> -->

                            <!-- <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle ms-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-filter"></i>Filter</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Ascending</a></li>
                                    <li><a class="dropdown-item" href="#">Descending</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>

                <div class="table-responsive">
                    <table class="table lms-table table-striped" id="borrowedTable">
                        <?php showBorrowed($conn); ?>
                    </table>
                </div>

            </div>
        </div>

        <!-- ============== ACTIVITY LOG SECTION ============== -->
        <div id="section-activity" class="section">
            <div class="panel">
                <div class="section-heading">
                    <div class="icon-box">
                        <i class="bi bi-file-text"></i>
                        <h5>Activity Log Section</h5>
                    </div>
                </div>

                <div class="toolbar">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" name="member-search" id="member-search" class="form-control"
                            placeholder="Search name, email, ..." oninput="filterTable('booksTable', this.value)">
                            <button class="btn btn-secondary btn-md" onclick="toggleForm('memberForm')"><i class="bi bi-filetype-xls"></i> Download</button>

                            <!-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checkDefault">
                                <label class="form-check-label" for="checkDefault">
                                    Select All
                                </label>
                            </div> -->

                            <!-- <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle ms-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-filter"></i>Filter</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Ascending</a></li>
                                    <li><a class="dropdown-item" href="#">Descending</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                

                <div class="table-responsive">
                    <table class="table lms-table table-striped" id="returnedTable">
                        <?php showReturned($conn, "Admin") ?>
                    </table>
                </div>
            </div>
        </div>

        <!-- ============== DELETED RECENTLY SECTION  ============== -->
        <div id="section-deleted" class="section">
            <div class="panel">
                <div class="section-heading">
                    <div class="icon-box">
                        <i class="bi bi-trash3-fill"></i>
                        <h5>Deleted Recently Section </h5>
                    </div>
                </div>

                <div class="toolbar">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" name="member-search" id="member-search" class="form-control"
                        placeholder="Search name, email, ..." oninput="filterTable('booksTable', this.value)">
                        <button class="btn btn-secondary btn-md" onclick="toggleForm('memberForm')"><i class="bi bi-filetype-xls"></i> Download</button>

                        <!-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkDefault">
                            <label class="form-check-label" for="checkDefault">
                                Select All
                            </label>
                        </div> -->

                        <!-- <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle ms-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-filter"></i>Filter</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Ascending</a></li>
                                <li><a class="dropdown-item" href="#">Descending</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table lms-table table-striped" id="returnedTable">
                        <?php showReturned($conn, "Admin") ?>
                    </table>
                </div>

                <form action="../Controller/insertReturned.php" method="POST" id="toReturn">
                    <input type="hidden" id="toReturnID" name="returnID">
                    <input type="hidden" id="memberName" name="name">
                    <input type="hidden" id="returnedBookName" name="title">
                    <input type="hidden" id="dateBorrowed" name="borrowDate">
                    <input type="hidden" id="returnDueDate" name="dueDate">
                    <input type="hidden" id="overDue" name="overDue">

                </form>

                <div class="table-responsive">
                    <table class="table lms-table table-striped" id="toDelRecentTable">

                        <!-- <?php // deleteRecently($conn); ?>  Deleted Recently Logs -->
                                        
                    </table>
                </div>
            </div>
        </div>

        <!-- ============== REPORTS SECTION  ============== -->
        <div id="section-reports" class="section">
            <div class="panel">
                <div class="section-heading">
                    <div class="icon-box">
                        <i class="bi bi-flag-fill"></i>
                        <h5>Reports Section </h5>
                    </div>
                </div>

                    <h6>File Selection:</h6>

                    <input type="file" name="" id="fileInput" hidden>
                    <button type="button" class="btn btn-outline-primary" id="exportBtn">Export file</button>
                    <button type="button" class="btn btn-outline-dark" id="importBtn">Import file</button>


                <form action="../Controller/insertReturned.php" method="POST" id="toReturn">
                    <input type="hidden" id="toReturnID" name="returnID">
                    <input type="hidden" id="memberName" name="name">
                    <input type="hidden" id="returnedBookName" name="title">
                    <input type="hidden" id="dateBorrowed" name="borrowDate">
                    <input type="hidden" id="returnDueDate" name="dueDate">
                    <input type="hidden" id="overDue" name="overDue">

                </form>

                <div class="table-responsive">
                    <table class="table lms-table table-striped" id="toReportsTable">

                    <!-- activity log + dashboard analytics -->
                        <!-- <?php // showBorrowLog($conn); ?> Summarize reports -->
                        <?php showReturned($conn, "Admin"); ?>
                                        
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









</body>

</html>