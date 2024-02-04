<!-- Process Reservation Modal -->
<div class="modal fade" id="process_reservation" tabindex="-1" aria-labelledby="process_reservation_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="process_reservation_modal">Process Reservation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> <span id="process_modalId"></span></p>
                <p><strong>Library ID:</strong> <span id="process_modalLibraryId"></span></p>
                <p><strong>Name:</strong> <span id="process_modalName"></span></p>
                <p><strong>Course:</strong> <span id="process_modalCourse"></span></p>
                <p><strong>Email:</strong> <span id="process_modalEmail"></span></p>
                <p><strong>Access No.:</strong> <span id="process_modalAccessNo"></span></p>
                <p><strong>Tittle:</strong> <span id="process_modalTittle"></span></p>
                <p><strong>Call No.:</strong> <span id="process_modalCallNo"></span></p>
                <p><strong>Pick up Date:</strong> <span id="process_modalPickUpDate"></span></p>
                <p><strong>Return Date:</strong> <span id="process_modalReturnDate"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Pick Up</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Process Reservation Modal -->

<!-- Deny Reservation Modal -->
<div class="modal fade" id="deny_reservation" tabindex="-1" aria-labelledby="deny_reservation_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deny_reservation_modal">Decline Reservation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> <span id="deny_modalId"></span></p>
                <p><strong>Library ID:</strong> <span id="deny_modalLibraryId"></span></p>
                <p><strong>Name:</strong> <span id="deny_modalName"></span></p>
                <p><strong>Course:</strong> <span id="deny_modalCourse"></span></p>
                <p><strong>Email:</strong> <span id="deny_modalEmail"></span></p>
                <p><strong>Access No.:</strong> <span id="deny_modalAccessNo"></span></p>
                <p><strong>Tittle:</strong> <span id="deny_modalTittle"></span></p>
                <p><strong>Call No.:</strong> <span id="deny_modalCallNo"></span></p>
                <p><strong>Pick up Date:</strong> <span id="deny_modalPickUpDate"></span></p>
                <p><strong>Return Date:</strong> <span id="deny_modalReturnDate"></span></p>
                <form method="post">
                    <div class="px-3">
                        <label for="declineOption">Decline Options:</label>
                        <select class="form-control" id="declineOption" name="selectedOption">
                            <option value="default" selected>Select an option</option>
                            
                            <!-- The student may have violated library policies, such as having outstanding fines or overdue materials,
                            preventing them from borrowing additional books until the issues are resolved. -->
                            <option value="Policy Violation">Policy Violation</option>

                            <!-- The student may have initially reserved the book but later canceled the request due to a change of mind
                            or a decision to use alternative resources. -->
                            <option value="Reservation Cancellation">Reservation Cancellation</option>

                            <!-- The student may have lost the book and is in the process of resolving the issue with the library, making
                            it temporarily unavailable until the matter is resolved. -->
                            <option value="Lost Book">Lost Book</option>

                            <!-- If the library is closed for a holiday, maintenance, or any other reason, students may not be able to access 
                            or borrow books during that time. -->
                            <option value="Library Closure">Library Closure</option>
                        </select>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">Decline</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Deny Reservation Modal -->

<!-- Damage Book Modal -->
<div class="modal fade" id="book_damage" tabindex="-1" aria-labelledby="book_damage_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="book_damage_modal">Damage Book</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> <span id="damage_modalId"></span></p>
                <p><strong>Library ID:</strong> <span id="damage_modalLibraryId"></span></p>
                <p><strong>Name:</strong> <span id="damage_modalName"></span></p>
                <p><strong>Course:</strong> <span id="damage_modalCourse"></span></p>
                <p><strong>Email:</strong> <span id="damage_modalEmail"></span></p>
                <p><strong>Access No.:</strong> <span id="damage_modalAccessNo"></span></p>
                <p><strong>Tittle:</strong> <span id="damage_modalTittle"></span></p>
                <p><strong>Call No.:</strong> <span id="damage_modalCallNo"></span></p>
                <p><strong>Pick up Date:</strong> <span id="damage_modalPickUpDate"></span></p>
                <p><strong>Return Date:</strong> <span id="damage_modalReturnDate"></span></p>
                <p><strong>Fine:</strong> <span id="damage_modalfine"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">Damage</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Damage Book Modal -->

<!-- Missing Book Modal -->
<div class="modal fade" id="book_missing" tabindex="-1" aria-labelledby="book_missing_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="book_missing_modal">Missing Book</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> <span id="missing_modalId"></span></p>
                <p><strong>Library ID:</strong> <span id="missing_modalLibraryId"></span></p>
                <p><strong>Name:</strong> <span id="missing_modalName"></span></p>
                <p><strong>Course:</strong> <span id="missing_modalCourse"></span></p>
                <p><strong>Email:</strong> <span id="missing_modalEmail"></span></p>
                <p><strong>Access No.:</strong> <span id="missing_modalAccessNo"></span></p>
                <p><strong>Tittle:</strong> <span id="missing_modalTittle"></span></p>
                <p><strong>Call No.:</strong> <span id="missing_modalCallNo"></span></p>
                <p><strong>Pick up Date:</strong> <span id="missing_modalPickUpDate"></span></p>
                <p><strong>Return Date:</strong> <span id="missing_modalReturnDate"></span></p>
                <p><strong>Fine:</strong> <span id="missing_modalfine"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning">Missing</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Missing Book Modal -->

<!-- Return Book Modal -->
<div class="modal fade" id="book_return" tabindex="-1" aria-labelledby="book_return_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="book_return_modal">Return Book</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> <span id="return_modalId"></span></p>
                <p><strong>Library ID:</strong> <span id="return_modalLibraryId"></span></p>
                <p><strong>Name:</strong> <span id="return_modalName"></span></p>
                <p><strong>Course:</strong> <span id="return_modalCourse"></span></p>
                <p><strong>Email:</strong> <span id="return_modalEmail"></span></p>
                <p><strong>Access No.:</strong> <span id="return_modalAccessNo"></span></p>
                <p><strong>Tittle:</strong> <span id="return_modalTittle"></span></p>
                <p><strong>Call No.:</strong> <span id="return_modalCallNo"></span></p>
                <p><strong>Pick up Date:</strong> <span id="return_modalPickUpDate"></span></p>
                <p><strong>Return Date:</strong> <span id="return_modalReturnDate"></span></p>
                <p><strong>Fine:</strong> <span id="return_modalfine"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="book_return">Return</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Return Book Modal -->