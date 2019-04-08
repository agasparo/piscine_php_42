var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
    	labels: ['tel1', 'chaise', 'miroire', 'voiture de reve', 'vetement homme', 'table', 'voiture de bg'],
    	datasets: [{
            label: 'Nombres de ventes',
            data: ['10', '9', '5', '5', '1', '1', '1'],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 159, 60, 0.2)',
                'rgba(255, 159, 50, 0.2)',
                'rgba(255, 159, 40, 0.2)',
                'rgba(255, 159, 30, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 159, 60, 0.2)',
                'rgba(255, 159, 50, 0.2)',
                'rgba(255, 159, 40, 0.2)',
                'rgba(255, 159, 30, 0.2)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});