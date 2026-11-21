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
                        <div class="btn stat-card" data-section="returned" onclick="showSection(this);" style="background-color: #3cac20; ;">
                            <i class="bi bi-back stat-icon"></i>
                            <div>
                                <?php countReturnedBooks($conn); ?>
                                <div class="stat-label">Returning</div>
                            </div>
                        </div>
                    </div>
                </div>

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


                <!-- Charts -->
                <div class="row g-3 mb-3 top-analytics">
                    <div class="col-lg-5">
                        <div class="card shadow-md w-100 chart-card">
                            <div class="card-body">
                                <h2 class="h6 card-title">Borrowing Activity</h2>
                                <span class="top-right">
                                    <select id="range-activity" class="form-select-sm">
                                        <option value="7" selected>Last 7 Days</option>
                                        <option value="14">Last 14 Days</option>
                                        <option value="30">Last 30 Days</option>
                                    </select>
                                </span>
                                
                                <div class="chart-box">
                                    <!-- <canvas id="line"></canvas> -->
                                
                                    <svg class="line-chart" viewBox="0 0 600 260" role="img" aria-label="Books borrowed per day, last 7 days">
                                        <!-- grid lines + y labels -->
                                        <g class="grid">
                                            <line x1="40" y1="20"  x2="580" y2="20"/>
                                            <line x1="40" y1="60"  x2="580" y2="60"/>
                                            <line x1="40" y1="100" x2="580" y2="100"/>
                                            <line x1="40" y1="140" x2="580" y2="140"/>
                                            <line x1="40" y1="180" x2="580" y2="180"/>
                                            <line x1="40" y1="220" x2="580" y2="220"/>
                                        </g>
                                        <g class="axis-text" text-anchor="end">
                                            <text x="32" y="24">30</text>
                                            <text x="32" y="64">24</text>
                                            <text x="32" y="104">18</text>
                                            <text x="32" y="144">12</text>
                                            <text x="32" y="184">6</text>
                                            <text x="32" y="224">0</text>
                                        </g>
                                        <!-- area + line -->
                                        <polygon class="line-area" points="40,140 130,100 220,120 310,60 400,87 490,33 580,73 580,220 40,220"/>
                                        <polyline class="line-path" points="40,140 130,100 220,120 310,60 400,87 490,33 580,73"/>
                                        <!-- points (hover for a tooltip) -->
                                        <g class="line-dots">
                                            <circle cx="40"  cy="140" r="5"><title>Mon: 12 books</title></circle>
                                            <circle cx="130" cy="100" r="5"><title>Tue: 18 books</title></circle>
                                            <circle cx="220" cy="120" r="5"><title>Wed: 15 books</title></circle>
                                            <circle cx="310" cy="60"  r="5"><title>Thu: 24 books</title></circle>
                                            <circle cx="400" cy="87"  r="5"><title>Fri: 20 books</title></circle>
                                            <circle cx="490" cy="33"  r="5"><title>Sat: 28 books</title></circle>
                                            <circle cx="580" cy="73"  r="5"><title>Sun: 22 books</title></circle>
                                        </g>
                                        <!-- x labels -->
                                        <g class="axis-text" text-anchor="middle">
                                            <text x="40"  y="244">Mon</text>
                                            <text x="130" y="244">Tue</text>
                                            <text x="220" y="244">Wed</text>
                                            <text x="310" y="244">Thu</text>
                                            <text x="400" y="244">Fri</text>
                                            <text x="490" y="244">Sat</text>
                                            <text x="580" y="244">Sun</text>
                                        </g>
                                    </svg>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card shadow-md w-100 chart-card">
                            <div class="card-body">
                                <h2 class="h6 card-title">Borrowed by Category</h2>
                                <span class="top-right">
                                    <select id="borrowed-by-category" class="form-select-sm">
                                        <option value="Reference">Reference</option>
                                        <option value="Fiction" selected>Fiction</option>
                                        <option value="History">History</option>
                                        <option value="Science">Science</option>
                                        <option value="Kids">Kids</option>
                                    </select>
                                    </span>

                                <div class="chart-box">
                                    <div class="bar-chart" role="img" aria-label="Books borrowed by category">
                                        <div class="bar-col">
                                            <div class="bar-track" style="--h: 40%;" title="Reference: 40">
                                                <span class="bar-value">40</span>
                                                <span class="bar-fill"></span>
                                            </div>
                                            <span class="bar-label">Reference</span>
                                        </div>
                                        <div class="bar-col">
                                            <div class="bar-track" style="--h: 85%;" title="Fiction: 85">
                                                <span class="bar-value">85</span>
                                                <span class="bar-fill"></span>
                                            </div>
                                            <span class="bar-label">Fiction</span>
                                        </div>
                                        <div class="bar-col">
                                            <div class="bar-track" style="--h: 55%;" title="History: 55">
                                                <span class="bar-value">55</span>
                                                <span class="bar-fill"></span>
                                            </div>
                                            <span class="bar-label">History</span>
                                        </div>
                                        <div class="bar-col">
                                            <div class="bar-track" style="--h: 70%;" title="Science: 70">
                                                <span class="bar-value">70</span>
                                                <span class="bar-fill"></span>
                                            </div>
                                            <span class="bar-label">Science</span>
                                        </div>
                                        <div class="bar-col">
                                            <div class="bar-track" style="--h: 30%;" title="Kids: 30">
                                                <span class="bar-value">30</span>
                                                <span class="bar-fill"></span>
                                            </div>
                                            <span class="bar-label">Kids</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 ">
                        <div class="card border-0 w-100 h-100">
                                <div class="card-body p-2 most-borrowed-body">
                                        <h2 class="h6 card-title">Most Borrowed Book</h2>
                                        <select id="range" class="form-select-sm most-borrowed-toolbar">
                                            <option value="this-week" selected>This week</option>
                                            <option value="this-month" >This month</option>
                                            <option value="this-last-month" >Last month</option>
                                            <option value="this-year">This year</option>
                                        </select>

                                    <div class="card-body most-borrowed-book">
                                        <img src="../View/wh.jpg" alt="book-img">

                                        <div class="most-borrowed-title">
                                            <p class="card-text author"> Emily Brontë</p>
                                            <h6 class="card-title">Wuthering Heights</h6>
                                        </div>

                                        <div class="most-borrowed-details">
                                            <p><span>Accession No:</span> 1234 </p>
                                            <p><span>Borrowers:</span> 15</p>
                                        </div>
                                    </div>

                                    <div class="card-body most-borrowed-book">
                                        <img src="../View/wh.jpg" alt="book-img">

                                        <div class="most-borrowed-title">
                                            <p class="card-text author"> Emily Brontë</p>
                                            <h6 class="card-title">Wuthering Heights</h6>
                                        </div>

                                        <div class="most-borrowed-details2">
                                            <p><span>Accession No:</span> 1234 </p>
                                            <p><span>Borrowers:</span> 15</p>
                                        </div>

                                    </div>
                                </div>
                        </div>
                    </div>
                    


                </div>

                        <!-- Library table -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card shadow-md bot-analytics w-100">
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
                                <div class="card shadow-md bot-analytics w-100">
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