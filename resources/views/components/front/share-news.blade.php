<!-- Twitter Share Button -->
<div>
    <button class="btn btn-icon" onclick="shareOnTwitter()">
        <i class="fab fa-twitter fs-4"></i> <!-- Twitter Icon -->
    </button>
</div>
<script>
    function shareOnTwitter() {
        let postUrl = encodeURIComponent(window.location.href);
        let postTitle = encodeURIComponent(document.title);

        let twitterUrl = `https://twitter.com/intent/tweet?url=${postUrl}&text=${postTitle}`;

        window.open(twitterUrl, "_blank", "width=600,height=400");
    }
</script>