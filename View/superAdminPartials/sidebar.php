<?php /* Desktop sidebar + mobile offcanvas menu - included by adminDash.php ($conn is available here) */ ?>
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