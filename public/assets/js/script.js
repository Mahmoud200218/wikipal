// Show and Hide Links
document.addEventListener('DOMContentLoaded', function () {
    const sourceSelect = document.getElementById('sourceSelect');
    const linksContainer = document.getElementById('linksContainer');

    $(sourceSelect).select2().on('change', function () {
        const value = $(this).val(); // Get the selected value
        if (value === 'yes') {
            linksContainer.style.display = 'block'; // Show links
        } else {
            linksContainer.style.display = 'none'; // Hide links
        }
    });

    $(sourceSelect).trigger('change');
});


// Local Time
function updateTime() {
    const now = new Date();
    const options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };
    const date = now.toLocaleDateString('en-US', options);
    const time = now.toLocaleTimeString('en-US', {
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
    });
    document.getElementById('localTime').textContent = `${date} | ${time}`;
}

// Update the time every second
setInterval(updateTime, 1000);
// Initialize time immediately
updateTime();


// Confirmation Toast | Delete News button
document.getElementById('deleteBtn').addEventListener('click', function () {
    // Show confirmation toast
    var toast = new bootstrap.Toast(document.getElementById('deleteToast'));
    toast.show();
});

document.getElementById('confirmDelete').addEventListener('click', function () {
    // Submit the form to delete the opinion
    document.getElementById('deleteForm').submit();
});

document.getElementById('cancelDelete').addEventListener('click', function () {
    // Close the toast without deleting
    var toast = bootstrap.Toast.getInstance(document.getElementById('deleteToast'));
    toast.hide();
});




// Confirmation Toast | Add Bookmark 
document.getElementById('deleteBtn').addEventListener('click', function () {
    // Show confirmation toast
    var toast = new bootstrap.Toast(document.getElementById('deleteToast'));
    toast.show();
});

document.getElementById('confirmDelete').addEventListener('click', function () {
    // Submit the form to delete the opinion
    document.getElementById('deleteForm').submit();
});

document.getElementById('cancelDelete').addEventListener('click', function () {
    // Close the toast without deleting
    var toast = bootstrap.Toast.getInstance(document.getElementById('deleteToast'));
    toast.hide();
});


document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".delete-bookmark").forEach(button => {
        button.addEventListener("click", function () {
            let bookmarkId = this.getAttribute("data-id");
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

            if (confirm("Are you sure you want to delete this bookmark?")) {
                fetch(`/bookmarks/${bookmarkId}/delete`, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": token,
                        "Content-Type": "application/json"
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById(`bookmark-${bookmarkId}`).remove();
                            alert("Bookmark deleted successfully!");
                        } else {
                            alert("Error deleting bookmark.");
                        }
                    })
                    .catch(error => console.log("Error:", error));
            }
        });
    });
});


