<?php /* Dashboard stats cards - included by adminDash.php ($conn is available here) */ ?>
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