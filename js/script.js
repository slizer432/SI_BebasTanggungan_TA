document.addEventListener('DOMContentLoaded', function() {
    const radioAdmin = document.getElementById('radioAdmin');
    const radioMhs = document.getElementById('radioMhs');
    const adminForm = document.getElementById('adminForm');
    const mhsForm = document.getElementById('mhsForm');

    function toggleForms() {
        if (radioAdmin.checked) {
            adminForm.style.display = 'block';
            mhsForm.style.display = 'none';
        } else if (radioMhs.checked) {
            adminForm.style.display = 'none';
            mhsForm.style.display = 'block';
        }
    }

    // Initial toggle based on the default checked radio button
    toggleForms();

    // Add event listeners to radio buttons
    radioAdmin.addEventListener('change', toggleForms);
    radioMhs.addEventListener('change', toggleForms);
});
