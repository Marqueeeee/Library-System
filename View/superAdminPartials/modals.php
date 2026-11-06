<?php /* Exit + delete confirmation modals - included by adminDash.php ($conn is available here) */ ?>
        <!-- ============== EXIT SYSTEM ============== -->
        <div class="modal fade" id="exitModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgba(226, 11, 11, 0.952);">
                        <i class="bi bi-exclamation-diamond-fill  bi-exclamation-diamond-lg me-2"></i>
                        <h3 style="color: white;">Exit System</h3>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">Do you really want to exit the system?</div>
                    <form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary" formaction="../index.php">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- ============== DELETE CONFIRMATION ============== -->
        <div class="modal fade" id="delModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgba(226, 11, 11, 0.952);">
                        <i class="bi bi-exclamation-diamond-fill  bi-exclamation-diamond-lg me-2"></i>
                        <h3 style="color: white;">Delete</h3>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" id="deleteConfirmation">Are you sure you want to delete it?</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        <form action="../Controller/deleteEntry.php" method="post">
                            <button type="submit" class="btn btn-primary">Yes</button>
                            <input type="hidden" name="deleteID" id="deleteID">
                            <input type="hidden" name="tableID" id="tableID">
                        </form>
                    </div>
                </div>
            </div>
        </div>