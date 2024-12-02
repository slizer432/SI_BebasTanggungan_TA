const ctx2 = document.getElementById('adprod').getContext('2d');
const adprod = new Chart(ctx2, {
    type: 'doughnut',
    data: {
        datasets: [{
            label: '# of Votes',
            data: [25, 75],
            backgroundColor: [
                'rgba(200, 200, 200, 0.1)',
                'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgba(200, 200, 200, 0.1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        plugins: {
            tooltip: {
                callbacks: {
                    label: function(context) {
                        if (context.label === 'remaining') return '';
                        return `${context.label}: ${context.raw}%`;
                    }
                }
            }
        }
    }
});