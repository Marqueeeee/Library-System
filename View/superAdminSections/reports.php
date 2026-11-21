<?php /* Reports section - included by adminDash.php ($conn is available here) */ ?>
        <!-- ============== REPORTS SECTION  ============== -->
        <div id="section-reports" class="section">
            <div class="panel">

            <div class="row">
                <div class="col-sm-2 ">
                        <div class="btn stat-card" data-section="books" onclick="showSection(this);" style="background-color: #045224;">
                            <i class="bi bi-stack stat-icon"></i>
                            <div>
                                <?php countBooks($conn); ?>
                                <div class="stat-label">Total Books</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="btn stat-card" data-section="books" onclick="showSection(this);" style="background-color: #116434;">
                            <i class="bi bi-book-half stat-icon"></i>
                            <div>
                                <?php countBooks($conn); ?>
                                <div class="stat-label">Available</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="btn stat-card" data-section="members" onclick="showSection(this);" style="background-color: #287936 ;">
                            <i class="bi bi-people-fill stat-icon"></i>
                            <div>
                                <?php countMembers($conn); ?>
                                <div class="stat-label">Members</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="btn stat-card" data-section="faculty" onclick="showSection(this);" style="background-color: #268d3c;">
                            <i class="bi bi-person-badge stat-icon"></i>
                            <div>
                                <?php countFaculty($conn); ?>
                                <div class="stat-label">Library Staff</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="btn stat-card" data-section="borrowed" onclick="showSection(this);" style="background-color: #40831a;">
                            <i class="bi bi-bag-plus-fill stat-icon"></i>
                            <div>
                                <?php countBorrowedBooks($conn); ?>
                                <div class="stat-label">Borrowed</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="btn stat-card" data-section="returned" onclick="showSection(this);" style="background-color: #34881b; ;">
                            <i class="bi bi-back stat-icon"></i>
                            <div>
                                <?php countReturnedBooks($conn); ?>
                                <div class="stat-label">Returning</div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="row g-3 mb-3 top-analytics">
                    <div class="col-lg-8">
                        <div class="card shadow-sm w-100">
                            <div class="card-body">
                                <h2 class="h6 card-title">Borrowing Activity</h2>
                                <span class="top-right">
                                    <select id="range" class="form-select-sm">
                                        <option value="7" selected>Last 7 Days</option>
                                        <option value="14">Last 14 Days</option>
                                        <option value="30">Last 30 Days</option>
                                    </select>
                                </span>
                                
                                <div class="chart-box"><canvas id="line"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card shadow-sm w-100">
                            <div class="card-body">
                            <h2 class="h6 card-title">Borrowed by Category</h2>
                            <div class="top-right">
                                <select id="range" class="form-select-sm">
                                    <option value="Reference">Reference</option>
                                    <option value="Fiction" selected>Fiction</option>
                                    <option value="History">History</option>
                                    <option value="Science">Science</option>
                                    <option value="Kids">Kids</option>
                                </select>
                                
                            </div>
                            <div class="chart-box"><canvas id="bar"></canvas></div>
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

            <div class="reports-toolbar">
                <div class="toolbar">
                    <div class="input-group ">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" name="member-search" id="member-search" class="form-control"
                        placeholder="Search anything ..." oninput="filterTable('booksTable', this.value)">

                        <button type="button" class="btn btn-light border-dark me-2 rounded-3" id="exportBtn"><i class="bi bi-download me-1"></i>Import</button>
                        <button type="button" class="btn btn-dark me-2 rounded-3" id="exportBtn"><i class="bi bi-upload me-1"></i>Export</button>
                    </div>
                </div>
            </div>


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