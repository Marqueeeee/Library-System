<?php /* Activity log section - included by adminDash.php ($conn is available here) */ ?>
        <!-- ============== ACTIVITY LOG SECTION ============== -->
        <div id="section-activity" class="section">
            <div class="panel">
                <div class="section-heading">
                    <div class="icon-box">
                        <i class="bi bi-file-text"></i>
                        <span>Activity Log Section</span>
                    </div>
                </div>

                <div class="toolbar">
                        <div class="input-group ">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" name="member-search" id="member-search" class="form-control"
                            placeholder="Search name, email, ..." oninput="filterTable('booksTable', this.value)">
                            <button class="btn btn-dark btn-md ms-5 dl-file rounded-3" onclick="toggleForm('memberForm')"><i class="bi bi-download me-1"></i> Download</button>

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
                    <table class="table lms-table table-striped" id="returnedTable">
                        <?php showReturned($conn, "Admin") ?>
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