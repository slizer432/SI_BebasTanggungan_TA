document.addEventListener('DOMContentLoaded', function() {
    const notifIcon = document.getElementById('notifIcon');
    const popup = document.getElementById('notifPopup');
    const closeBtn = document.querySelector('.close');

    notifIcon.addEventListener('click', function() {
        popup.style.display = 'block';
    });

    closeBtn.addEventListener('click', function() {
        popup.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target == popup) {
            popup.style.display = 'none';
        }
    });
});