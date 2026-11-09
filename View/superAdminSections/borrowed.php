<?php /* Borrow / Return section - included by adminDash.php ($conn is available here) */ ?>
        <!-- ============== BORROWING/RETURNS SECTION ============== -->
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
                            <a href="addBorrowing.php">
                                <button class="btn btn-success btn-md me-2 rounded-0" onclick="toggleForm('memberForm')"><i
                                class="bi bi-bag-plus  rounded-0 "></i> Borrowing book</button>
                            </a>
                            <a href="addReturning.php">
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

            </div>
        </div>