<?php /* Reports section - included by adminDash.php ($conn is available here) */ ?>
        <!-- ============== REPORTS SECTION  ============== -->
        <div id="section-reports" class="section">
            <div class="panel">
                <div class="section-heading">
                    <div class="icon-box">
                        <i class="bi bi-flag-fill"></i>
                        <h5>Reports Section </h5>
                    </div>
                </div>

                    <h6>File Selection:</h6>

                    <input type="file" name="" id="fileInput" hidden>
                    <button type="button" class="btn btn-outline-primary" id="exportBtn">Export file</button>
                    <button type="button" class="btn btn-outline-dark" id="importBtn">Import file</button>


                <form action="../Controller/insertReturned.php" method="POST" id="toReturn">
                    <input type="hidden" id="toReturnID" name="returnID">
                    <input type="hidden" id="memberName" name="name">
                    <input type="hidden" id="returnedBookName" name="title">
                    <input type="hidden" id="dateBorrowed" name="borrowDate">
                    <input type="hidden" id="returnDueDate" name="dueDate">
                    <input type="hidden" id="overDue" name="overDue">

                </form>

                <div class="table-responsive">
                    <table class="table lms-table table-striped" id="toReportsTable">

                    <!-- activity log + dashboard analytics -->
                        <!-- <?php // showBorrowLog($conn); ?> Summarize reports -->
                        <?php showReturned($conn, "Admin"); ?>
                                        
                    </table>
                </div>
            </div>
        </div>