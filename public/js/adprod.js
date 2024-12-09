document.addEventListener('DOMContentLoaded', function() {
    const canvasAdmin = document.getElementById('adprod_admin');

    if (canvasAdmin) {
        try {
            const ctx = canvasAdmin.getContext('2d');
            if (!ctx) throw new Error('2D context not supported');
            
            const statusAdmin = canvasAdmin.dataset.status;
            const percentageAdmin = getPercentageByStatus(statusAdmin);
            document.getElementById('admin-percentage').textContent = percentageAdmin + '%';
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [percentageAdmin, 100 - percentageAdmin],
                        backgroundColor: ['#5DADE2', '#EAF2F8'],
                        borderColor: ['#5DADE2', '#EAF2F8'],
                        borderWidth: 1
                    }]
                },
                options: {
                    cutout: '80%',
                    plugins: {
                        legend: { display: false },
                        centerText: createCenterConfig(percentageAdmin)
                    }
                }
            });
        } catch (error) {
            console.error("Error creating admin chart:", error);
        }
    }
});

// Fungsi untuk menentukan persentase berdasarkan status
function getPercentageByStatus(status) {
    switch(status.toLowerCase()) {
        case 'unverified': return 50;
        case 'pending': return 75;
        case 'verified': return 100;
        case 'empty': default: return 0;
    }
}

// Updated centerConfig to accept percentage as a parameter
function createCenterConfig(percentage) {
    return {
        id: 'centerText',
        afterDraw: function(chart) {
            const width = chart.width;
            const height = chart.height;
            const ctx = chart.ctx;
            
            ctx.restore();
            ctx.font = "bold 20px Arial";
            ctx.textBaseline = "middle";
            ctx.textAlign = "center";
            ctx.fillStyle = "#2C3E50";
            
            const text = percentage + "%";
            ctx.fillText(text, width / 2, height / 2);
            ctx.save();
        }
    };
}