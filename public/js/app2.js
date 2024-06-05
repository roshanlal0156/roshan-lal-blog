document.addEventListener('DOMContentLoaded', function() {
    const blogListItems = document.querySelectorAll('#home_body_blogs-ul li');

    blogListItems.forEach(function(item) {
        item.addEventListener('click', function() {
            const url = item.getAttribute('data-url');
            if (url) {
                window.location.href = url;
            }
        });
    });
});