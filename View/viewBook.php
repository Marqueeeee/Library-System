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
</head>

<body>
    <div class="card book-details-card">
        <div class="card-body">
            <img src="../View/wh.jpg" alt="book-img" class="mb-3">
            <h5 class="card-title">Wuthering Heights</h5>
            <div class="book-details">
                <p class="card-text author"> Emily Brontë</p>
                <p class="card-text copyright"> &copy; 1847</p>
            </div>
            <div class="book-details-publisher">
                <p class="card-text published"> Published by: </p>
                <p class="card-text publisher"> Harpers and Brothers of New York</p>
            </div>
            <p class="card-text description"> Wuthering Heights is a Gothic tragedy set on the isolated West Yorkshire moors. It explores obsession, revenge, social class, and the destructive legacy of two interconnected families: the Earnshaws and the Lintons.</p>
        </div>
    </div>

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

            <div id="section-borrowed" class="section">
                <div class="panel">
                    <div class="section-heading">
                        <div class="icon-box">
                            <i class="bi bi-bag-plus-fill"></i>
                            <span>Borrowing/Returns Section</span>
                        </div>
                    </div>
    
                    <div class="toolbar">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-search"></i></span>
                                <input type="text" name="member-search" id="member-search" class="form-control"
                                placeholder="Search name, email, ..." oninput="filterTable('booksTable', this.value)">
                                <a href="addBorrow.php">
                                    <button class="btn btn-success btn-md me-2 rounded-0" onclick="toggleForm('memberForm')"><i
                                    class="bi bi-bag-plus  rounded-0 "></i> Borrowing book</button>
                                </a>
                                <a href="addReturn.php">
                                    <button class="btn btn-warning btn-md rounded-0  me-5" onclick="toggleForm('memberForm')"><i
                                    class="bi bi-arrow-left rounded-0"></i> Returning book</button>
                                </a>
                                <button class="btn btn-outline-secondary btn-md rounded-0" onclick="toggleForm('memberForm')"><i class="bi bi-filetype-xls  rounded-0"></i> Download</button>
    
                                <!-- <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkDefault">x
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
    
    
                    <nav class="page-separator">
                        <ul class="pagination">
                            <li class="page-item"><a href="#" class="page-link">Prev</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-current="page">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
    
                </div>
            </div>

        </div>
    </div>

        

    
    
</body>

</html>