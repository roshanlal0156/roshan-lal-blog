document.addEventListener('DOMContentLoaded', function() {
    let headerLogo = document.querySelector('.header_logo');

    headerLogo.addEventListener('click', () => {
        window.location.href = 'http://roshan-lal-blog.test/api';
    })
});