<!-- Confirmation Toast (Alert) -->
<div id="deleteToast" class="toast position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 1050; max-width: 400px;" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header" style="background-color: #007bff; color: white;">
        <strong class="me-auto">Confirmation</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body" style="background-color: #f1f1f1;">
        <p>Are you sure you want to delete this News? This action is irreversible.</p>
        <div class="d-flex justify-content-end">
            <button class="btn btn-outline-danger btn-sm" id="confirmDelete">Yes, Delete</button>
            <button class="btn btn-outline-secondary btn-sm ms-2" id="cancelDelete">Cancel</button>
        </div>
    </div>
</div>