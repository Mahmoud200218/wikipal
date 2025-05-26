document.addEventListener('DOMContentLoaded', function () {
    const ctxUserStatistics = document.getElementById('userPieChart')?.getContext('2d');

    if (!ctxUserStatistics) return; // إذا لم يجد العنصر، لا ينفذ الرسم

    const data = {
        labels: ['Trusted', '(7 days)', 'Suspended'],
        datasets: [{
            label: 'Users percentage (%)',
            data: [
                parseFloat(document.getElementById('verifiedPercentage').value),
                parseFloat(document.getElementById('newPercentage').value),
                parseFloat(document.getElementById('suspendedPercentage').value)
            ],
            backgroundColor: [
                'rgba(28, 104, 175, 0.7)',
                'rgba(255, 205, 86, 0.7)',
                'rgba(255, 99, 132, 0.7)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 205, 86, 1)',
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    };

    const config = {
        type: 'pie',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            return context.label + ': ' + context.raw + '%';
                        }
                    }
                }
            }
        }
    };

    new Chart(ctxUserStatistics, config);
});
