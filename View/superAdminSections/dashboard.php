<?php /* Dashboard stats cards - included by adminDash.php ($conn is available here) */ ?>
            <!-- ============== DASHBOARD SECTION ============== -->

            <!-- take-home books -->
            <div id="section-dashboard" class="section active">
                <div class="row">
                <div class="col-sm-2 ">
                        <div class="btn stat-card bg-primary" data-section="books" onclick="showSection(this);">
                            <i class="bi bi-stack stat-icon"></i>
                            <div>
                                <?php countBooks($conn); ?>
                                <div class="stat-label">Total Books</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="btn stat-card bg-success" data-section="books" onclick="showSection(this);">
                            <i class="bi bi-book-half stat-icon"></i>
                            <div>
                                <?php countBooks($conn); ?>
                                <div class="stat-label">Available</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="btn stat-card bg-info" data-section="members" onclick="showSection(this);">
                            <i class="bi bi-people-fill stat-icon"></i>
                            <div>
                                <?php countMembers($conn); ?>
                                <div class="stat-label">Members</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="btn stat-card bg-secondary" data-section="faculty" onclick="showSection(this);">
                            <i class="bi bi-person-badge stat-icon"></i>
                            <div>
                                <?php countFaculty($conn); ?>
                                <div class="stat-label">Library Staff</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="btn stat-card bg-warning" data-section="borrowed" onclick="showSection(this);">
                            <i class="bi bi-bag-plus-fill stat-icon"></i>
                            <div>
                                <?php countBorrowedBooks($conn); ?>
                                <div class="stat-label">Borrowed</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="btn stat-card bg-danger" data-section="returned" onclick="showSection(this);">
                            <i class="bi bi-back stat-icon"></i>
                            <div>
                                <?php countReturnedBooks($conn); ?>
                                <div class="stat-label">Returning</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- mini-table for activity logs (activity in last 7 days,  month, year) -->
            <!-- book circulation analytics -->