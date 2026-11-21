<?php /* Dashboard stats cards - included by adminDash.php ($conn is available here) */ ?>
            <!-- ============== DASHBOARD SECTION ============== -->

            <!-- take-home books -->
            <div id="section-dashboard" class="section active">
            <!-- Toolbar -->
                <!-- <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                    <h1 class="h4 mb-0">Dashboard</h1>
                    
                </div> -->
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
                        <div class="btn stat-card" data-section="borrowed" onclick="showSection(this);" style="background-color: #58a32d;">
                            <i class="bi bi-bag-plus-fill stat-icon"></i>
                            <div>
                                <?php countBorrowedBooks($conn); ?>
                                <div class="stat-label">Borrowed</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="btn stat-card" data-section="returned" onclick="showSection(this);" style="background-color: #41ac26; ;">
                            <i class="bi bi-back stat-icon"></i>
                            <div>
                                <?php countReturnedBooks($conn); ?>
                                <div class="stat-label">Returning</div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Charts -->
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
                    <!-- <div class="col-lg-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                            <h2 class="h6 card-title">Book Categories</h2>
                            <div class="chart-box"><canvas id="bar"></canvas></div>
                            </div>
                        </div>
                    </div>-->
                </div>

                        <!-- Library table -->
                         <div class="row">
                            <div class="col-lg-6">
                                <div class="card shadow-sm bot-analytics w-100">
                                    <div class="card-body">
                                        <h2 class="h6 card-title">Library Monitoring </h2>
                                        <div class="top-right">
                                        
                                        <span class="view-details"><a href="">View Details <i class=" bi bi-arrow-right  "></i></a></span>
                                    </div>
                                        <div class="table-responsive">
                                            <table class="table lms-table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Book</th>
                                                        <th>Member</th>
                                                        <th>Borrow & Due date</th>
                                                        <th>Return Date</th>
                                                        <th>Fine</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="book-transaction-log">
                                                    <tr>
                                                        <td>Atomic Habits</td>
                                                        <td>Fernando Basibas</td>
                                                        <td>January 23 - 26, 2025</td>
                                                        <td>January 26, 2025</td>
                                                        <td> ----- </td>
                                                        <td class="badge-status badge-returned">Returned</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Library table -->
                            <div class="col-lg-6">
                                <div class="card shadow-sm bot-analytics w-100">
                                    <div class="card-body">
                                        <h2 class="h6 card-title">Recent Activities</h2>
                                        <div class="top-right">
                                        
                                        <span class="view-details"><a href="">View Details <i class=" bi bi-arrow-right  "></i></a></span>
                                    </div>
                                        <div class="table-responsive">
                                            <table class="table lms-table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Book</th>
                                                        <th>Member</th>
                                                        <th>Borrow & Due date</th>
                                                        <th>Return Date</th>
                                                        <th>Fine</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="book-transaction-log">
                                                    <tr>
                                                        <td>Atomic Habits</td>
                                                        <td>Fernando Basibas</td>
                                                        <td>January 23 - 26, 2025</td>
                                                        <td>January 26, 2025</td>
                                                        <td> ----- </td>
                                                        <td class="badge-status badge-returned">Returned</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                <div id="tip" class="badge text-dark fs-6 fw-normal"></div>
            </div>



            <!-- mini-table for activity logs (activity in last 7 days,  month, year) -->
            <!-- book circulation analytics -->