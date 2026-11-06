<?php /* Borrow / Return section - included by adminDash.php ($conn is available here) */ ?>
        <!-- ============== BORROWING/RETURNS SECTION ============== -->
        <div id="section-borrowed" class="section">
            <div class="panel">
                <div class="section-heading">
                    <div class="icon-box">
                        <i class="bi bi-bag-plus-fill"></i>
                        <h5>Borrowing/Returns Section</h5>
                    </div>
                </div>

                <div class="toolbar">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" name="member-search" id="member-search" class="form-control"
                            placeholder="Search name, email, ..." oninput="filterTable('booksTable', this.value)">
                            <a href="createBook.php">
                                <button class="btn btn-success btn-md me-1  " onclick="toggleForm('memberForm')"><i
                                class="bi bi-plus-lg border-opacity-10"></i> Add new Borrow</button>
                            </a>
                            <a href="createBook.php">
                                <button class="btn btn-warning btn-md me-1  " onclick="toggleForm('memberForm')"><i
                                class="bi bi-plus-lg border-opacity-10"></i> Add new Return</button>
                            </a>
                            <button class="btn btn-secondary btn-md" onclick="toggleForm('memberForm')"><i class="bi bi-filetype-xls"></i> Download</button>

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
                    <table class="table lms-table table-striped" id="borrowedTable">
                        <?php showBorrowed($conn); ?>
                    </table>
                </div>

            </div>
        </div>