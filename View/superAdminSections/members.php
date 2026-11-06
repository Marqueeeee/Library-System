<?php /* Borrowers (members) section - included by adminDash.php ($conn is available here) */ ?>
            <!-- ============== BORROWERS SECTION ============== -->
            <div id="section-members" class="section">
                <div class="panel">
                    <div class="section-heading">
                        <div class="icon-box">
                            <i class="bi bi-people-fill"></i>
                            <h5>Borrower Section</h5>
                        </div>
                    </div>

                    <div class="toolbar">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" name="member-search" id="member-search" class="form-control"
                            placeholder="Search name, email, ..." oninput="filterTable('booksTable', this.value)">
                            <button class="btn btn-success btn-md me-1  " onclick="toggleForm('memberForm')"><i
                            class="bi bi-plus-lg border-opacity-10"></i> Add new Borrower</button>
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
                        <table class="table lms-table table-striped" id="membersTable">

                            <?php showMembers($conn, "Admin") ?>


                        </table>
                    </div>

                    <div class="form-section" id="memberForm">
                        <h6><i class="bi bi-person-plus me-2"></i>Add New Member</h6>

                        <form action="../Controller/insertMember.php" method="post">
                            <div class="row g-3">


                                <div class="col-md-4">
                                    <label class="form-label">First Name:</label>
                                    <input type="text" class="form-control form-control-md" name="firstName" required
                                        placeholder=>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Last Name:</label>
                                    <input type="text" class="form-control form-control-md" name="lastName" required
                                        placeholder=>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Contact:</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control form-control-sm" required
                                            name="contact">
                                    </div>
                                </div>
                                <br>
                                <div class="col-12 d-flex gap-3">
                                    <button class="btn btn-success btn-sm" type="submit"><i
                                            class="bi bi-person-plus me-1"></i>Add
                                        member</button>
                                    <button class="btn btn-secondary btn-sm" onclick="toggleForm('memberForm')"><i
                                            class="bi bi-backspace me-1"></i>Cancel</button>
                                </div>
                        </form>
                    </div>

                    <div class="form-section" id="updateMember">
                        <h6><i class="bi bi-person-plus me-2"></i>Update Member</h6>

                        <div class="row g-3">
                            <form action="../Controller/updateMember.php" method="post">
                                <input type="hidden" name="membershipID" id="membershipID">
                                <div class="col-md-4">
                                    <label class="form-label">First Name:</label>
                                    <input type="text" class="form-control form-control-md" id='firstName'
                                        name="firstName" required placeholder=>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Last Name:</label>
                                    <input type="text" class="form-control form-control-md" id='lastName'
                                        name="lastName" required placeholder=>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Contact:</label>
                                    <div class="input-group">
                                        <div class="input-group-text">09</div>
                                        <input type="number" class="form-control form-control-sm" id='contact' required
                                            name="contact">
                                    </div>
                                </div>
                                <br>
                                <div class="col-12 d-flex gap-3">
                                    <button class="btn btn-success btn-sm" type="submit"><i
                                            class="bi bi-person-plus me-1"></i>Update Member</button>
                                    <button class="btn btn-secondary btn-sm" onclick="toggleForm('updateMember')"><i
                                            class="bi bi-backspace me-1"></i>Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>