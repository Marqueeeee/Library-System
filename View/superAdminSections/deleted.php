<?php /* Deleted recently section - included by adminDash.php ($conn is available here) */ ?>
        <!-- ============== DELETED RECENTLY SECTION  ============== -->
        <div id="section-deleted" class="section">
            <div class="panel">
                <div class="section-heading">
                    <div class="icon-box">
                        <i class="bi bi-trash3-fill"></i>
                        <h5>Deleted Recently Section </h5>
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

                <form action="../Controller/insertReturned.php" method="POST" id="toReturn">
                    <input type="hidden" id="toReturnID" name="returnID">
                    <input type="hidden" id="memberName" name="name">
                    <input type="hidden" id="returnedBookName" name="title">
                    <input type="hidden" id="dateBorrowed" name="borrowDate">
                    <input type="hidden" id="returnDueDate" name="dueDate">
                    <input type="hidden" id="overDue" name="overDue">

                </form>

                <div class="table-responsive">
                    <table class="table lms-table table-striped" id="toDelRecentTable">

                        <!-- <?php // deleteRecently($conn); ?>  Deleted Recently Logs -->
                                        
                    </table>
                </div>
            </div>
        </div>