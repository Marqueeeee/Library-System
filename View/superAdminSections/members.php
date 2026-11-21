<?php /* Borrowers (members) section - included by adminDash.php ($conn is available here) */ ?>
            <!-- ============== MEMBERS SECTION ============== -->
            <div id="section-members" class="section">
                <div class="panel">
                    <div class="section-heading">
                        <div class="icon-box">
                            <i class="bi bi-people-fill"></i>
                            <span>Members Section</span>
                        </div>
                    </div>

                    <div class="toolbar">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" name="member-search" id="member-search" class="form-control"
                            placeholder="Search name, email, ..." oninput="filterTable('booksTable', this.value)">
                            <a href="addMember.php">
                                <button class="btn btn-success btn-md me-5">
                                    <i class="bi bi-plus-lg"></i> Add new Member
                                </button>
                            </a>
                            <button class="btn btn-dark btn-md dl-file rounded-3" onclick="toggleForm(' ')"><i class="bi bi-download me-1"></i> Download</button>

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


                    <nav class="page-separator">
                        <ul class="pagination">
                            <li class="page-item"><a href="#" class="page-link">Prev</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-current="page">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>


                    <!-- //To be discarded -->

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
            </div>
        </div>