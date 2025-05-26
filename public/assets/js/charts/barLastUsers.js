document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('userChart')?.getContext('2d');
    if (!ctx) return;

    // قراءة البيانات من الـ inputs
    const labels = JSON.parse(document.getElementById('newUsersLabels').value);
    const dataValues = JSON.parse(document.getElementById('newUsersData').value);

    const data = {
        labels: labels,
        datasets: [{
            label: 'Number of new users',
            data: dataValues,
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    };

    new Chart(ctx, config);
});
