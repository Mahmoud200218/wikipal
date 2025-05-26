<!-- Add Bookmark Toast (Alert) -->
<div id="deleteToast" class="toast position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 1050; max-width: 400px;" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header" style="background-color:rgb(10, 47, 102); color: white; height: 45px;">
        <strong class="me-auto">Add Bookmark</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body" style="background-color: #f1f1f1;">
        <p>Add a new bookmark</p>
        <form action="{{ route('bookmarks.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" id="bookmarkNameInput" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">URL</label>
                <input type="text" name="url" id="bookmarkUrlInput" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description (optional)</label>
                <input type="text" name="description" id="bookmarkDescriptionInput" class="form-control">
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-info btn-sm" style="margin-right: 20px;" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<!-- Bookmark Form Toast -->