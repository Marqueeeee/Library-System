<?php /* Book accessions + add/borrow/update forms - included by adminDash.php ($conn is available here) */ ?>
        <!-- ============== BOOKS SECTION ============== -->
        <div id="section-books" class="section">
            <div class="panel">
                <div class="section-heading">
                    <div class="icon-box">
                        <i class="bi bi-book-half"></i>
                        <h5>Book Accessions Section</h5>
                    </div>
                </div>


                <div class="toolbar">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" name="member-search" id="member-search" class="form-control"
                            placeholder="Search name, email, ..." oninput="filterTable('booksTable', this.value)">
                            <a href="createBook.php">
                                <button class="btn btn-success btn-md me-1  " onclick="toggleForm('memberForm')"><i
                                class="bi bi-plus-lg border-opacity-10"></i> Add new Book</button>
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
                    <table class="table lms-table table-striped " id="booksTable">
                        <?php showBooks($conn, "Admin") ?>
                    </table>
                </div>


                <!-- ================= ADD-BOOK FORM ================= -->
                <div class="form-section" id="bookForm">
                    <h6><i class="bi bi-bookmark-plus me-2"></i>Add New Book</h6>
                    <form action="../Controller/insertBook.php" method="post">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <label class="form-label">Title:</label>
                                <input type="text" class="form-control form-control-md" name="title" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Author:</label>
                                <input type="text" class="form-control form-control-md" name="author" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Genre:</label>
                                <select class="form-select form-select-xs" name="genre" required>
                                    <option value="Fiction">Fiction</option>
                                    <option value="Non-Fiction">Non-Fiction</option>
                                    <option value="Drama">Drama</option>
                                    <option value="Poetry">Poetry</option>
                                </select>
                            </div>

                            <div class="col-12 d-flex gap-3">
                                <button class="btn btn-success btn-sm" type="submit"><i
                                        class="bi bi-bookmark-plus me-2"></i>Add
                                    book
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="  toggleForm('bookForm')"><i
                                        class="bi bi-backspace me-2"></i>Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- ================= BORROW-BOOK FORM ================= -->
                <div class="form-section" id="borrowForm">
                    <h6><i class="bi bi-bag-plus me-2"></i>Borrow Book</h6>
                    <div class="row g-3">
                        <form action="../Controller/insertBorrowed.php" method="post">
                            <div class="col-md-4">
                                <label class="form-label">Book Number:</label>
                                <input type="text" class="form-control form-control-md" required name="bookID">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Membership Number:</label>
                                <input type="text" class="form-control form-control-md" required name="membershipID">

                            </div>
                            <br>
                            <div class="col-12 d-flex gap-3">
                                <button class="btn btn-warning btn-sm" type="submit"><i
                                        class="bi bi-bag-plus me-2"></i>Borrow
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="toggleForm('borrowForm')"><i
                                        class="bi bi-backspace me-2"></i>Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- ================= UPDATE BOOK FORM ================= -->
                <div class="form-section" id="updateBookForm">
                    <h6><i class="bi bi-bookmark-plus me-2"></i>Update Book</h6>
                    <form action="../Controller/updateBook.php" method="post">
                        <input type="hidden" name="bookID" id="bookID">
                        <div class="row g-6">
                            <div class="col-md-6">
                                <label class="form-label">Title:</label>
                                <input type="text" class="form-control form-control-md" name="title" required
                                    id="bookTitle">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Author:</label>
                                <input type="text" class="form-control form-control-md" name="author" required
                                    id="bookAuthor">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Genre:</label>
                                <select class="form-select form-select-xs" name="genre" required id="bookGenre">
                                    <option value="Fiction">Fiction</option>
                                    <option value="Non-Fiction">Non-Fiction</option>
                                    <option value="Drama">Drama</option>
                                    <option value="Poetry">Poetry</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 d-flex gap-3" style="margin-top: 1.2rem;">
                            <button class="btn btn-success btn-sm" type="submit"><i
                                    class="bi bi-bookmark-plus me-2"></i>Update
                                book</button>
                            <button class="btn btn-secondary btn-sm" onclick="toggleForm('updateBookForm')"><i
                                    class="bi bi-backspace me-2"></i>Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>