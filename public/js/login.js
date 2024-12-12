// login.js
document.addEventListener('DOMContentLoaded', function() {
    const radioAdmin = document.getElementById('radioAdmin');
    const radioMhs = document.getElementById('radioMhs');
    const usernameInput = document.getElementById('username');

    function updatePlaceholder() {
        if (radioAdmin.checked) {
            usernameInput.placeholder = 'E-mail';
        } else if (radioMhs.checked) {
            usernameInput.placeholder = 'NIM';
        }
    }

    radioAdmin.addEventListener('change', updatePlaceholder);
    radioMhs.addEventListener('change', updatePlaceholder);
});