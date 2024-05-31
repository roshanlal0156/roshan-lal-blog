document.addEventListener('DOMContentLoaded', function() {
    const blogListItems = document.querySelectorAll('#home_body_blogs-ul li');
    const headerLogo = document.querySelectorAll('.header_logo');

    blogListItems.forEach(function(item) {
        item.addEventListener('click', function() {
            const url = item.getAttribute('data-url');
            if (url) {
                window.location.href = url;
            }
        });
    });

    headerLogo.addEventListener('click', () => {
        window.location.href = 'http://roshan-lal-blog.test/api';
    })
});