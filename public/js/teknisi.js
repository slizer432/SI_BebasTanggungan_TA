document.addEventListener('DOMContentLoaded', function() {
    const canvasTeknisi = document.getElementById('adprod_teknisi');

    if (canvasTeknisi) {
        try {
            const ctx = canvasTeknisi.getContext('2d');
            if (!ctx) throw new Error('2D context not supported');
            
            const statusTeknisi = canvasTeknisi.dataset.status;
            const percentageTeknisi = getPercentageByStatus(statusTeknisi);
            
            document.getElementById('teknisi-percentage').textContent = percentageTeknisi + '%';
            
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [percentageTeknisi, 100 - percentageTeknisi],
                        backgroundColor: ['#5DADE2', '#EAF2F8'],
                        borderColor: ['#5DADE2', '#EAF2F8'],
                        borderWidth: 1
                    }]
                },
                options: {
                    cutout: '80%',
                    plugins: {
                        legend: { display: false },
                        centerText: createCenterConfig(percentageTeknisi)
                    }
                }
            });
        } catch (error) {
            console.error("Error creating teknisi chart:", error);
        }
    }
});

function getPercentageByStatus(status) {
    
    if (!status) return 0;
    
    const cleanStatus = status.toLowerCase().trim();
    
    switch(cleanStatus) {
        case 'unverified': return 50;
        case 'pending': return 75;
        case 'verified': return 100;
        case 'empty': default: 
        return 0;
    }
}

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