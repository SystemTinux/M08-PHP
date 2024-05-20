function showAdminLogin() {
    document.querySelector('.carousel-container').style.transform = 'translateX(0%)';
}

function showUserLogin() {
    document.querySelector('.carousel-container').style.transform = 'translateX(-50%)';
}

document.addEventListener('DOMContentLoaded', function() {
    showUserLogin(); // Show user login by default
});
