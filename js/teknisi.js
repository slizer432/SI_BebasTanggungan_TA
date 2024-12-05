const ctx = document.getElementById('teknisi').getContext('2d');
const teknisi = new Chart(ctx, {
    type: 'doughnut',
    data: {
        datasets: [{
            label: '# of Votes',
            data: [100],
            backgroundColor: [
                '#5DADE2'
            ],
            borderColor: [
                '#5DADE2'
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