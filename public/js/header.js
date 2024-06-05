document.addEventListener('DOMContentLoaded', function() {
    const headerLogo = document.querySelector('.header_logo');
    headerLogo.addEventListener('click', () => {
        window.location.href = headerLogo.getAttribute('data-url') + '/api';
    })
});