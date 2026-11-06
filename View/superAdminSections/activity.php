<?php /* Activity log section - included by adminDash.php ($conn is available here) */ ?>
        <!-- ============== ACTIVITY LOG SECTION ============== -->
        <div id="section-activity" class="section">
            <div class="panel">
                <div class="section-heading">
                    <div class="icon-box">
                        <i class="bi bi-file-text"></i>
                        <h5>Activity Log Section</h5>
                    </div>
                </div>

                <div class="toolbar">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" name="member-search" id="member-search" class="form-control"
                            placeholder="Search name, email, ..." oninput="filterTable('booksTable', this.value)">
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
                    <table class="table lms-table table-striped" id="returnedTable">
                        <?php showReturned($conn, "Admin") ?>
                    </table>
                </div>
            </div>
        </div>