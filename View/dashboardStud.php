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
    require_once "../Controller/dashboardStats.php";
    require_once "../Controller/showBooks.php";

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

    session_start();
    $currentUserId = $_SESSION['user_id'] ?? null;

    if ($currentUserId === null) {
        header("Location: ../index.php");
        exit();
    }

    $conn = $connDB->getConn();
    ?>


</head>

<body>

    <script src="https://cdn.botpress.cloud/webchat/v3.6/inject.js"></script>
    <script src="https://files.bpcontent.cloud/2026/07/20/14/20260720142656-SUXDOZ17.js" defer></script>

    <!-- ============== SIDEBAR ============== -->
    <div class="sidebar d-none d-md-block">
        <nav class="nav flex-column">

            <!-- System Abbreviation: LMS (Library Management System) -->
            <div class="card" id="brand">
                <h3 class="card-title">LMS</h3>
            </div>

            <!-- User Information Section -->
            <div class="sidebar-user">
                <div class="avatar"><i class="bi bi-person-fill"></i></div>
                <div class="user-info">
                    <div>
                        <span class="status-dot"></span>
                        <span class="label-active">active</span>
                    </div>
                    <div class="label-name">Student</div>
                    <div class="stud-email">basibasfernando@gmail.com </div>
                </div>
            </div>

            <!-- Sidebar navigation buttons -->
            <button class="nav-link nav-item-lms active" data-section="dashboard" onclick="showSection(this);">
                <span class="icon"><i class="bi bi-house"></i></span>
                <span class="description">Dashboard</span> <span class="right-align"> > </span>
            </button>

            <button class="nav-link nav-item-lms" data-section="explore" onclick="showSection(this);">
                <span class="icon"><i class="bi bi-search"></i></span>
                <span class="description">Explore Books</span> <span class="right-align"> > </span>
            </button>

            <button class="nav-link nav-item-lms" data-section="borrowing" onclick="showSection(this);">
                <span class="icon"><i class="bi bi-bag-plus"></i></span>
                <span class="description">Borrowing Books</span> <span class="right-align"> > </span>
            </button>

            <button class="nav-link nav-item-lms" data-section="readBooks" onclick="showSection(this);">
                <span class="icon"><i class="bi bi-book-half"></i></span>
                <span class="description">Read Books</span> <span class="right-align"> > </span>
            </button>

            <button class="nav-link nav-item-lms" data-section="penalty" onclick="showSection(this);">
                <span class="icon"><i class="bi bi-pen"></i></span>
                <span class="description">Return History</span> <span class="right-align"> > </span>
            </button>

            <button class="nav-link nav-item-lms" data-section="faqs" onclick="showSection(this);">
                <span class="icon"><i class="bi bi-question-circle"></i></span>
                <span class="description">FAQs</span> <span class="right-align"> > </span>
            </button>
            <!-- <button class="nav-link nav-item-lms" data-section="database" onclick="showSection(this);">
                <span class="icon"><i class="bi bi-database"></i></span>
                <span class="description">Database Record</span>>
            </button> -->

        </nav>

        <div class="sidebar-footer">
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exitModal">Logout
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
                <div class="avatar"><i class="bi bi-person-fill"></i></div>
                <div class="user-info">
                    <div>
                        <span class="status-dot"></span>
                        <span class="label-active">active</span>
                    </div>
                    <span class="label-name">Student</span>
                    <div class="stud-email">basibasfernando@gmail.com</div>
                </div>
            </div>

            <nav class="nav flex-column flex-grow-1">
                <button class="nav-link nav-item-lms active" data-section="dashboard"
                    onclick="showSection(this); closeOffcanvas();">
                    <span class="icon"><i class="bi bi-house"></i></span>
                    <span class="description">Dashboard</span> <span class="right-align"> > </span>
                </button>

                <button class="nav-link nav-item-lms" data-section="explore"
                    onclick="showSection(this); closeOffcanvas();">
                    <span class="icon"><i class="bi bi-search"></i></span>
                    <span class="description">Explore Books</span> <span class="right-align"> > </span>
                </button>

                <button class="nav-link nav-item-lms" data-section="borrowing"
                    onclick="showSection(this); closeOffcanvas();">
                    <span class="icon"><i class="bi bi-bag-plus"></i></span>
                    <span class="description">Borrowing Books</span> <span class="right-align"> > </span>
                </button>

                <button class="nav-link nav-item-lms" data-section="readBooks"
                    onclick="showSection(this); closeOffcanvas();">
                    <span class="icon"><i class="bi bi-book-half"></i></span>
                    <span class="description">Read Books</span> <span class="right-align"> > </span>
                </button>

                <button class="nav-link nav-item-lms" data-section="penalty"
                    onclick="showSection(this); closeOffcanvas();">
                    <span class="icon"><i class="bi bi-pen"></i></span>
                    <span class="description">Return History</span> <span class="right-align"> > </span>
                </button>

                <button class="nav-link nav-item-lms" data-section="faqs"
                    onclick="showSection(this); closeOffcanvas();">
                    <span class="icon"><i class="bi bi-question-circle"></i></span>
                    <span class="description">FAQs</span> <span class="right-align"> > </span>
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


    <!-- ========== MAIN CONTENT ========== -->
    <div class="main-content">
        <div class="top-header d-flex justify-content-center align-items-center">
            <button class="btn-hamburger d-md-none" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar"
                aria-controls="mobileSidebar" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
            <span>Library Management System</span>
        </div>
        <div class="page-body">

            <!-- ============== DASHBOARD SECTION ============== -->
            <div id="section-dashboard" class="section active">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn stat-card" data-section="explore" onclick="showSection(this);">
                            <div>
                                <?php countBooks($conn); ?>
                                <div class="stat-label">Explore Books</div>
                            </div>
                            <i class="bi bi-search stat-icon"></i>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="btn stat-card" data-section="readBooks" onclick="showSection(this);">
                            <div>
                                <?php countBooks($conn); ?>
                                <div class="stat-label">Read Books</div>
                            </div>
                            <i class="bi bi-book-half stat-icon"></i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="btn stat-card" data-section="borrowing" onclick="showSection(this);">
                            <div>
                                <?php countBorrowedBooks($conn); ?>
                                <div class="stat-label">Borrowing Books</div>
                            </div>
                            <i class="bi bi-bag-plus stat-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="btn stat-card" data-section="penalty" onclick="showSection(this);">
                            <div>
                                <?php countReturnedBooks($conn); ?>
                                <div class="stat-label">Penalty History</div>
                            </div>
                            <i class="bi bi-pen stat-icon"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ============== EXPLORE SECTION ============== -->
            <div id="section-explore" class="section">
                <div class="panel">
                    <div class="section-heading">
                        <div class="icon-box">
                            <i class="bi bi-search"></i>
                            <h5>Explore Books</h5>
                        </div>
                    </div>
                    <!-- <div class="toolbar">
                        <input type="text" class="form-control" name="member-search" id="member-search"
                            class="form-control" placeholder="Quick Search"
                            oninput="filterTable('membersTable', this.value)">
                    </div> -->

                    <!-- <div class="pref-genre">
                        <div class="pref-row">
                            <div class="pref-label">GENRES:</div>
                            <button class="btn btn-secondary btn-md genre">Non-Fiction</button>
                            <button class="btn btn-secondary btn-md genre">Fiction</button>
                            <button class="btn btn-secondary btn-md genre">Poetry</button>
                            <button class="btn btn-secondary btn-md genre">Drama</button>
                        </div>
                    </div>

                    <nav aria-label="...">
                        <ul class="pagination pagination-md mt-3 justify-content-start">
                            <li class="page-item active">
                                <a class="page-link" aria-current="page">1</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#page-2">2</a></li>
                            <li class="page-item"><a class="page-link" href="#page-3">3</a></li>
                            <li class="page-item"><a class="page-link" href="#page-4">4</a></li>
                            <li class="page-item"><a class="page-link" href="#page-5">5</a></li>
                        </ul>
                    </nav> -->

                    <!-- EXPLORE BOOKS -->

                    <!-- <div class="row row-cols-1 row-cols-sm-6 g-3 flex-wrap">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #136AC0;">
                                        <h3 class="bookTitle">AT</h3>
                                    </div>
                                    <span class="badge text-bg-primary" class="non-fiction"
                                        id="non-fiction">Non-Fiction</span>
                                    <h5 class="card-title">Atomic Habits</h5>
                                    <p class="card-text">James Clear</p>
                                    <button class="btn btn-success btn-sm borrow-btn">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #212529;">
                                        <h3 class="bookTitle">SF</h3>
                                    </div>
                                    <span class="badge text-bg-dark" class="fiction" id="fiction">Fiction</span>
                                    <h5 class="card-title">A Song of Ice and Fire</h5>
                                    <p class="card-text">George R.R. Martin</p>
                                    <button class="btn btn-success btn-sm borrow-btn">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #212529;">
                                        <h3 class="bookTitle">PP</h3>
                                    </div>
                                    <span class="badge text-bg-dark" class="fiction" id="fiction">Fiction</span>
                                    <h5 class="card-title">Pride and Prejudice</h5>
                                    <p class="card-text">Jane Austen</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #212529;">
                                        <h3 class="bookTitle">TKM</h3>
                                    </div>
                                    <span class="badge text-bg-dark" class="fiction" id="fiction">Fiction</span>
                                    <h5 class="card-title">To Kill a Mockingbird</h5>
                                    <p class="card-text">Harper Lee</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #212529;">
                                        <h3 class="bookTitle">1984</h3>
                                    </div>
                                    <span class="badge text-bg-dark" class="fiction" id="fiction">Fiction</span>
                                    <h5 class="card-title">1984</h5>
                                    <p class="card-text">George Orwell</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #212529;">
                                        <h3 class="bookTitle">TGG</h3>
                                    </div>
                                    <span class="badge text-bg-dark" class="fiction" id="fiction">Fiction</span>
                                    <h5 class="card-title">The Great Gatsby</h5>
                                    <p class="card-text">F. Scott Fitzgerald</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #136AC0;">
                                        <h3 class="bookTitle">SJ</h3>
                                    </div>
                                    <span class="badge text-bg-primary" class="non-fiction"
                                        id="non-fiction">Non-Fiction</span>
                                    <h5 class="card-title">Steve Jobs</h5>
                                    <p class="card-text">Walter Isaacson</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #136AC0;">
                                        <h3 class="bookTitle">C</h3>
                                    </div>
                                    <span class="badge text-bg-primary" class="non-fiction"
                                        id="non-fiction">Non-Fiction</span>
                                    <h5 class="card-title">Cosmos</h5>
                                    <p class="card-text">Carl Sagan</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #136AC0;">
                                        <h3 class="bookTitle">TOS</h3>
                                    </div>
                                    <span class="badge text-bg-primary" class="non-fiction"
                                        id="non-fiction">Non-Fiction</span>
                                    <h5 class="card-title">The Origin of Species</h5>
                                    <p class="card-text">Charles Darwin</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #6C757D;">
                                        <h3 class="bookTitle">TO</h3>
                                    </div>
                                    <span class="badge text-bg-secondary" class="poetry" id="poetry">Poetry</span>
                                    <h5 class="card-title">The Odyssey</h5>
                                    <p class="card-text">Homer</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #6C757D;">
                                        <h3 class="bookTitle">TP</h3>
                                    </div>
                                    <span class="badge text-bg-secondary" class="poetry" id="poetry">Poetry</span>
                                    <h5 class="card-title">The Prophet</h5>
                                    <p class="card-text">Kahlil Gibran</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #DC3545;">
                                        <h3 class="bookTitle">H</h3>
                                    </div>
                                    <span class="badge text-bg-danger" class="drama" id="drama">Drama</span>
                                    <h5 class="card-title">Hamlet</h5>
                                    <p class="card-text">William Shakespeare</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #DC3545;">
                                        <h3 class="bookTitle">R & J</h3>
                                    </div>
                                    <span class="badge text-bg-danger" class="drama" id="drama">Drama</span>
                                    <h5 class="card-title">Romeo and Juliet</h5>
                                    <p class="card-text">William Shakespeare</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #DC3545;">
                                        <h3 class="bookTitle">TT</h3>
                                    </div>
                                    <span class="badge text-bg-danger" class="drama" id="drama">Drama</span>
                                    <h5 class="card-title">The Tempest</h5>
                                    <p class="card-text">William Shakespeare</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #DC3545;">
                                        <h3 class="bookTitle">OR</h3>
                                    </div>
                                    <span class="badge text-bg-danger" class="drama" id="drama">Drama</span>
                                    <h5 class="card-title">Oedipus Rex</h5>
                                    <p class="card-text">Sophocles</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #DC3545;">
                                        <h3 class="bookTitle">F</h3>
                                    </div>
                                    <span class="badge text-bg-danger" class="drama" id="drama">Drama</span>
                                    <h5 class="card-title">Fences</h5>
                                    <p class="card-text">August Wilson</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #136AC0;">
                                        <h3 class="bookTitle">CT 01</h3>
                                    </div>
                                    <span class="badge text-bg-primary" class="non-fiction"
                                        id="non-fiction">Non-Fiction</span>
                                    <h5 class="card-title">Capstone IT</h5>
                                    <p class="card-text">Salazar et al.</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #DC3545;">
                                        <h3 class="bookTitle">P</h3>
                                    </div>
                                    <span class="badge text-bg-danger" class="drama" id="drama">Drama</span>
                                    <h5 class="card-title">Pygmalion</h5>
                                    <p class="card-text">George Bernard Shaw</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #DC3545;">
                                        <h3 class="bookTitle">LJN</h3>
                                    </div>
                                    <span class="badge text-bg-danger" class="drama" id="drama">Drama</span>
                                    <h5 class="card-title">Long Day's Journey Into Night</h5>
                                    <p class="card-text">Eugene O'Neill</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #6C757D;">
                                        <h3 class="bookTitle">ALA</h3>
                                    </div>
                                    <span class="badge text-bg-secondary" class="poetry" id="poetry">Poetry</span>
                                    <h5 class="card-title">A Light in the Attic</h5>
                                    <p class="card-text">Shel Silverstein</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #136AC0;">
                                        <h3 class="bookTitle">N</h3>
                                    </div>
                                    <span class="badge text-bg-primary" class="non-fiction"
                                        id="non-fiction">Non-Fiction</span>
                                    <h5 class="card-title">Night</h5>
                                    <p class="card-text">Elie Wiesel</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #136AC0;">
                                        <h3 class="bookTitle">SG</h3>
                                    </div>
                                    <span class="badge text-bg-primary" class="non-fiction"
                                        id="non-fiction">Non-Fiction</span>
                                    <h5 class="card-title">The Selfish Gene</h5>
                                    <p class="card-text">Richard Dawkins</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #136AC0;">
                                        <h3 class="bookTitle">SS</h3>
                                    </div>
                                    <span class="badge text-bg-primary" class="non-fiction"
                                        id="non-fiction">Non-Fiction</span>
                                    <h5 class="card-title">Silent Spring</h5>
                                    <p class="card-text">Rachel Carson</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #136AC0;">
                                        <h3 class="bookTitle">B</h3>
                                    </div>
                                    <span class="badge text-bg-primary" class="non-fiction"
                                        id="non-fiction">Non-Fiction</span>
                                    <h5 class="card-title">Becoming</h5>
                                    <p class="card-text">Michelle Obama</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>


                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #136AC0;">
                                        <h3 class="bookTitle">ICB</h3>
                                    </div>
                                    <span class="badge text-bg-primary" class="non-fiction"
                                        id="non-fiction">Non-Fiction</span>
                                    <h5 class="card-title">In Cold Blood</h5>
                                    <p class="card-text">Truman Capote</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #136AC0;">
                                        <h3 class="bookTitle">AW</h3>
                                    </div>
                                    <span class="badge text-bg-primary" class="non-fiction"
                                        id="non-fiction">Non-Fiction</span>
                                    <h5 class="card-title">The Art of War</h5>
                                    <p class="card-text">Sun Tzu</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #136AC0;">
                                        <h3 class="bookTitle">MSM</h3>
                                    </div>
                                    <span class="badge text-bg-secondary" class="non-fiction"
                                        id="non-fiction">Non-Fiction</span>
                                    <h5 class="card-title">Man's Search for Meaning</h5>
                                    <p class="card-text">Viktor Frankl</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #212529;">
                                        <h3 class="bookTitle">M</h3>
                                    </div>
                                    <span class="badge text-bg-dark" class="fiction" id="fiction">Fiction</span>
                                    <h5 class="card-title">Maus</h5>
                                    <p class="card-text">Art Spiegelman</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #136ac0;">
                                        <h3 class="bookTitle">CW</h3>
                                    </div>
                                    <span class="badge text-bg-dark" class="fiction" id="fiction">Fiction</span>
                                    <h5 class="card-title">Charlotte's Web</h5>
                                    <p class="card-text">E.B. White</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #136AC0;">
                                        <h3 class="bookTitle">CT 010</h3>
                                    </div>
                                    <span class="badge text-bg-primary" class="non-fiction"
                                        id="non-fiction">Non-Fiction</span>
                                    <h5 class="card-title">Capstone IT</h5>
                                    <p class="card-text">Basibas et al.</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #136AC0;">
                                        <h3 class="bookTitle">NGA</h3>
                                    </div>
                                    <span class="badge text-bg-primary" class="non-fiction"
                                        id="non-fiction">Non-Fiction</span>
                                    <h5 class="card-title">National Geographic Atlas</h5>
                                    <p class="card-text">National Geographic Society</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #136AC0;">
                                        <h3 class="bookTitle">TPP</h3>
                                    </div>
                                    <span class="badge text-bg-primary" class="non-fiction"
                                        id="non-fiction">Non-Fiction</span>
                                    <h5 class="card-title">The Pragmatic Programmer</h5>
                                    <p class="card-text">Andrew Hunt, David Thomas</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #136AC0;">
                                        <h3 class="bookTitle">EP</h3>
                                    </div>
                                    <span class="badge text-bg-primary" class="non-fiction"
                                        id="non-fiction">Non-Fiction</span>
                                    <h5 class="card-title">The Encyclopedia of Philosophy</h5>
                                    <p class="card-text">James Paul</p>
                                    <button class="btn btn-success btn-sm">Borrow</button>
                                </div>
                            </div>
                        </div>


                    </div> -->

                    <!-- <div class="table-responsive">
                        <table class="table table-bordered lms-table table-striped table-hover" id="membersTable">

                            
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
                            </tbody>
                        </table>
                    </div> -->

                    <?php exploreBooks($conn); ?>
                </div>


            </div>

            <!-- ============== BORROWING SECTION ============== -->
            <div id="section-borrowing" class="section">
                <div class="panel">
                    <div class="section-heading">
                        <div class="icon-box">
                            <i class="bi bi-bag-plus-fill"></i>
                            <h5>Borrowing Books</h5>
                        </div>
                    </div>

                    <button class="btn btn-danger btn-md opacity-0" data-bs-toggle="modal" data-bs-target="#delModal"
                        disabled id="bookDelete"><i class="bi bi-trash3-fill" id="btnDelete"></i>
                    </button>
                    <button class="btn btn-primary btn-md opacity-0" onclick="toggleForm('updateBookForm')" disabled
                        id="bookUpdate"><i class="bi bi-pencil-square" id="btnEdit"></i>
                    </button>


                    <div class="row row-cols-1 row-cols-md-4 g-3 flex-wrap">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #136ac0;">
                                        <h3 class="bookTitle">AT</h3>
                                    </div>
                                    <span class="badge text-bg-primary" class="non-fiction"
                                        id="non-fiction">Non-Fiction</span>
                                    <h5 class="card-title">Atomic Habits</h5>
                                    <p class="card-text">James Clear</p>
                                    <button class="btn btn-success btn-sm borrow-btn">Return</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #212529;">
                                        <h3 class="bookTitle">SF</h3>
                                    </div>
                                    <span class="badge text-bg-dark" class="fiction" id="fiction">Fiction</span>
                                    <h5 class="card-title">A Song of Ice and Fire</h5>
                                    <p class="card-text">George R.R. Martin</p>
                                    <button class="btn btn-success btn-sm borrow-btn">Return</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #212529;">
                                        <h3 class="bookTitle">PP</h3>
                                    </div>
                                    <span class="badge text-bg-dark" class="fiction" id="fiction">Fiction</span>
                                    <h5 class="card-title">Pride and Prejudice</h5>
                                    <p class="card-text">Jane Austen</p>
                                    <button class="btn btn-success btn-sm">Return</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #212529;">
                                        <h3 class="bookTitle">SF</h3>
                                    </div>
                                    <span class="badge text-bg-dark" class="fiction" id="fiction">Fiction</span>
                                    <h5 class="card-title">To Kill a Mockingbird</h5>
                                    <p class="card-text">Harper Lee</p>
                                    <button class="btn btn-success btn-sm">Return</button>
                                </div>
                            </div>
                        </div>




                    </div>

                    <!-- <div class="table-responsive">
                        <table class="table table-bordered lms-table table-striped table-hover" id="booksTable"> -->


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

                    <!-- </table>
                    </div> -->

                </div>
            </div>

            <!-- ============== READ BOOKS SECTION ============== -->
            <div id="section-readBooks" class="section">
                <div class="panel">
                    <div class="section-heading">
                        <div class="icon-box">
                            <i class="bi bi-book-half"></i>
                            <h5>Read Books</h5>
                        </div>
                    </div>
                    <!-- <div class="toolbar">
                        <input type="text" class="form-control" name="member-search" id="member-search"
                            class="form-control" placeholder="Quick Search"
                            oninput="filterTable('membersTable', this.value)">
                    </div> -->

                    <!-- <div class="pref-genre">
                        <div class="pref-row">
                            <div class="pref-label">GENRES:</div>
                            <button class="btn btn-secondary btn-md genre">Non-Fiction</button>
                            <button class="btn btn-secondary btn-md genre">Fiction</button>
                            <button class="btn btn-secondary btn-md genre">Poetry</button>
                            <button class="btn btn-secondary btn-md genre">Drama</button>
                        </div>
                    </div> -->

                    <div class="row row-cols-1 row-cols-sm-6 g-3 flex-wrap">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #136ac0;">
                                        <h3 class="bookTitle">AT</h3>
                                    </div>
                                    <h5 class="card-title">Atomic Habits</h5>
                                    <p class="card-text">James Clear</p>
                                    <div class="card-footer">
                                        <small class="text-body-secondary">Read 2 days ago</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #212529;">
                                        <h3 class="bookTitle">SF</h3>
                                    </div>
                                    <h5 class="card-title">A Song of Ice and Fire</h5>
                                    <p class="card-text">George R.R. Martin</p>
                                    <div class="card-footer">
                                        <small class="text-body-secondary">Read 2 weeks ago</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #212529;">
                                        <h3 class="bookTitle">PP</h3>
                                    </div>
                                    <h5 class="card-title">Pride and Prejudice</h5>
                                    <p class="card-text">Jane Austen</p>
                                    <div class="card-footer">
                                        <small class="text-body-secondary">Read 2 weeks ago</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="book-front" style="background-color: #212529;">
                                        <h3 class="bookTitle">SF</h3>
                                    </div>
                                    <h5 class="card-title">To Kill a Mockingbird</h5>
                                    <p class="card-text">Harper Lee</p>
                                    <div class="card-footer">
                                        <small class="text-body-secondary">Read 2 weeks ago</small>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="table-responsive">
                        <table class="table table-bordered lms-table table-striped table-hover" id="returnedTable">
                        </table>
                    </div>
                </div>
            </div>

            <!-- ============== PENALTY SECTION ============== -->
            <div id="section-penalty" class="section">
                <div class="panel">
                    <div class="section-heading">
                        <div class="icon-box">
                            <i class="bi bi-pen-fill"></i>
                            <h5>Return History</h5>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-bordered lms-table table-striped table-hover" id="toReturnTable">

                            <thead>
                                <tr>
                                    <th>Book ID</th>
                                    <th>Book Title</th>
                                    <th>Borrowed Date</th>
                                    <th>Due Date</th>
                                    <th>Days Overdue</th>
                                    <th>Penalty Fee</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>B001</td>
                                    <td>Dune</td>
                                    <td>2025-05-08</td>
                                    <td>2025-05-10</td>
                                    <td>5 day/s</td>
                                    <td>50.00</td>
                                </tr>
                                <tr>
                                    <td>B002</td>
                                    <td>To Kill a Mockingbird</td>
                                    <td>2025-05-03</td>
                                    <td>2025-05-05</td>
                                    <td>5 days/</td>
                                    <td>50.00</td>
                                </tr>
                                <tr>
                                    <td>B003</td>
                                    <td>1984</td>
                                    <td>2025-04-23</td>
                                    <td>2025-05-25</td>
                                    <td>6 day/s</td>
                                    <td>60.00</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>

            <!-- ============== FAQs SECTION ============== -->
            <div id="section-faqs" class="section">
                <div class="panel">
                    <div class="section-heading">
                        <div class="icon-box">
                            <i class="bi bi-question-circle"></i>
                            <h5>Frequently Asked Questions</h5>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 g-3 flex-wrap">
                        <div class="accordion mb-4" id="accordionExample">
                            <h5 class="accordion-title ms-3 mb-3 opacity-75">About Library System</h5>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        What is the library management system?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Project SIA - One.</strong> Library Management System is an web
                                        application designed by the team SIA - One.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        What does the library management system do?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Library management.</strong> Library Management System manages the
                                        operations of a library, including book inventory, member management, and
                                        transaction handling.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        How to register as a library member?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Via email account.</strong> To register as a member, just register your
                                        email account to the system and you will be automatically registered as a member
                                        of the library.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion mb-4" id="accordionExample3">
                            <h5 class="accordion-title ms-3 mb-3 opacity-75">Book Management</h5>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSeven" aria-expanded="true"
                                        aria-controls="collapseSeven">
                                        What will happen after the book was returned?
                                    </button>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample3">
                                    <div class="accordion-body">
                                        <strong>System update.</strong> After the book was returned, the system will
                                        update the book's availability status and notify the member that the book is now
                                        available for borrowing.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseEight" aria-expanded="false"
                                        aria-controls="collapseEight">
                                        How many books can I borrow at a time?
                                    </button>
                                </h2>
                                <div id="collapseEight" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample3">
                                    <div class="accordion-body">
                                        <strong>Max of 3, 4 for necessary cases.</strong> You can borrow up to 4 books
                                        at a time. If you want to borrow more than 4 books, you have to return the
                                        borrowed books first before borrowing more books.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseNine" aria-expanded="false"
                                        aria-controls="collapseNine">
                                        How does the penalty fee work?
                                    </button>
                                </h2>
                                <div id="collapseNine" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample3">
                                    <div class="accordion-body">
                                        <strong>Penalty fee structure.</strong> The penalty fee is charged for each day
                                        the book is overdue. The fee is 10.00 per day.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion mb-4" id="accordionExample2">
                            <h5 class="accordion-title ms-3 mb-3 opacity-75">Borrowing Details</h5>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="true"
                                        aria-controls="collapseFour">
                                        How long can I borrow a book?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <strong>Can borrow for 3 days max.</strong> To borrow a book, you have to show
                                        what you want to borrow and the librarian will check if the book is available.
                                        If it is available, you can borrow it for 3 days -
                                        starting the day you borrowed the book.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">
                                        What happens if I return a book late?
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <strong>Penalty fee rule.</strong> If you return a book late, you will be
                                        charged a penalty fee of 10.00 for each day that the book is overdue.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        How do I return a book?
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <strong>In-person transaction.</strong> To return a book, you have to show the
                                        book you want to return and the librarian will check if the book is borrowed by
                                        you.
                                        If it is borrowed by you, you can return it and the librarian will check if
                                        there are any penalty fees that you need to pay.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion mb-4" id="accordionExample4">
                            <h5 class="accordion-title ms-3 mb-3 opacity-75">Technical Support</h5>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
                                        How will AI chatbot help me?
                                    </button>
                                </h2>
                                <div id="collapseTen" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample4">
                                    <div class="accordion-body">
                                        <strong>AI assistance.</strong> The AI chatbot can help you find books - based
                                        on your preferences.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseEleven" aria-expanded="false"
                                        aria-controls="collapseEleven">
                                        Can I check the books available in the library wherever I am?
                                    </button>
                                </h2>
                                <div id="collapseEleven" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample4">
                                    <div class="accordion-body">
                                        <strong>Availability.</strong> Absolutely! You can check the books available in
                                        the library wherever you are - as long as you have an internet connection.
                                        You can check the books available in the library through the system's website or
                                        browse book recommendations through the AI chatbot.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwelve" aria-expanded="false"
                                        aria-controls="collapseTwelve">
                                        Contacts for damaged/lost books.
                                    </button>
                                </h2>
                                <div id="collapseTwelve" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample4">
                                    <div class="accordion-body">
                                        <strong>Contact information.</strong> If you have any issues with damaged or
                                        lost books, please contact the library staff at the provided contact
                                        information.
                                        <br>
                                        <i>Contact Faculty: **** - **** - **** | Email: faculty@gmail.com </i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
            </div>

        </div>

        <!-- ============== DATABASE SECTION ============== -->

        <!-- <div id="section-database" class="section">
            <div class="panel">
                <div class="section-heading">
                    <div class="icon-box">
                        <i class="bi bi-database"></i>
                        <h5>Export</h5>
                    </div>
                </div>

                <h6>File Selection:</h6>

                <input type="file" name="" id="fileInput" hidden>
                <button type="button" class="btn btn-dark" id="importBtn">Import file</button>
                <button type="button" class="btn btn-primary" id="exportBtn">Export file</button>

            </div>
        </div> -->





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




    <script src="https://cdn.botpress.cloud/webchat/v3.6/inject.js"></script>
    <script src="https://files.bpcontent.cloud/2026/07/20/14/20260720142656-SUXDOZ17.js" defer></script>

</body>

</html>