const ctx2 = document.getElementById('adprod').getContext('2d');
const adprod = new Chart(ctx2, {
    type: 'doughnut',
    data: {
        datasets: [{
            label: '# of Votes',
            data: [25, 75],
            backgroundColor: [
                '#EAF2F8',
                '#5DADE2'
            ],
            borderColor: [
                '#EAF2F8',
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