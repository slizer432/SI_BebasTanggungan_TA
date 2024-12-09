const canvas = document.getElementById('adprod');
const status = canvas.dataset.status;
const ctx2 = canvas.getContext('2d');

// Fungsi untuk menentukan persentase berdasarkan status
function getPercentageByStatus(status) {
    switch(status.toLowerCase()) {
        case 'unverified': return 50;
        case 'pending': return 75;
        case 'verified': return 100;
        case 'empty': default: return 0;
    }
}

const percentage = getPercentageByStatus(status);

const adprod = new Chart(ctx2, {
    type: 'doughnut',
    data: {
        datasets: [{
            data: [percentage, 100 - percentage],
            backgroundColor: [
                '#5DADE2',
                '#EAF2F8'
            ],
            borderColor: [
                '#5DADE2',
                '#EAF2F8'
            ],
            borderWidth: 1
        }]
    },
    options: {
        cutout: '80%',
        plugins: {
            legend: {
                display: false
            }
        },
        // Menambahkan plugin untuk menampilkan persentase di tengah
        onDraw: function(chart) {
            const ctx = chart.ctx;
            const width = chart.width;
            const height = chart.height;

            ctx.restore();
            ctx.font = "bold 20px Arial";
            ctx.textBaseline = "middle";
            ctx.textAlign = "center";
            ctx.fillStyle = "#2C3E50";
            
            const text = percentage + "%";
            ctx.fillText(text, width / 2, height / 2);
            ctx.save();
        }
    }
});

// Menambahkan persentase di tengah diagram
const centerConfig = {
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

Chart.register(centerConfig);