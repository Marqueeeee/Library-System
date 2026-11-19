<?php /* Reports section - included by adminDash.php ($conn is available here) */ ?>
        <!-- ============== REPORTS SECTION  ============== -->
        <div id="section-reports" class="section">
            <div class="panel">
                <div class="section-heading">
                    <div class="icon-box">
                        <i class="bi bi-flag-fill"></i>
                        <span>Reports Section </span>
                    </div>
                </div>


                    <h6>File Selection:</h6>

                    <input type="file" name="" id="fileInput" hidden>
                    <button type="button" class="btn btn-outline-primary" id="exportBtn">Export file</button>
                    <button type="button" class="btn btn-outline-dark" id="importBtn">Import file</button>

                <div class="row">
                    <div class="col-sm-2">
                        <div class="btn stat-card" data-section="books" onclick="showSection(this);">
                            <div>
                                <?php countBooks($conn); ?>
                                <div class="stat-label">Book Accessions</div>
                            </div>
                            <i class="bi bi-book stat-icon"></i>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="btn stat-card" data-section="members" onclick="showSection(this);">
                            <div>
                                <?php countMembers($conn); ?>
                                <div class="stat-label">Registered Members</div>
                            </div>
                            <i class="bi bi-people stat-icon"></i>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="btn stat-card" data-section="faculty" onclick="showSection(this);">
                            <div>
                                <?php countFaculty($conn); ?>
                                <div class="stat-label">Library Staff</div>
                            </div>
                            <i class="bi bi-person-badge stat-icon"></i>
                        </div>
                    </div>

            
                    <div class="col-sm-3">
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
                    <div class="col-sm-3">
                        <div class="btn stat-card" data-section="returned" onclick="showSection(this);">
                            <div>
                                <?php countReturnedBooks($conn); ?>
                                <div class="stat-label">Total Returned Books</div>
                            </div>
                            <i class="bi bi-arrow-left stat-icon"></i>
                        </div>
                    </div>
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
                    <table class="table lms-table table-striped" id="toReportsTable">

                    <!-- activity log + dashboard analytics -->
                        <!-- <?php // showBorrowLog($conn); ?> Summarize reports -->
                        <?php showReturned($conn, "Admin"); ?>
                                        
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