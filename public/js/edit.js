document.getElementById('foto-input').addEventListener('change', function(e) {
    const previewImage = document.getElementById('preview-image');
    const file = e.target.files[0];
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImage.src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});