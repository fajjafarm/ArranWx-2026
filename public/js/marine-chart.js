document.addEventListener('DOMContentLoaded', function () {
    try {
        const canvas = document.getElementById('marineChart');
        if (!canvas) {
            console.error('Canvas element #marineChart not found');
            document.getElementById('chartError').textContent = 'Chart canvas not found.';
            return;
        }
        
        const chartData = JSON.parse(canvas.dataset.chartData || '{}');
        const labels = JSON.parse(canvas.dataset.chartLabels || '[]');
        
        console.log('Chart Data:', chartData);
        console.log('Chart Labels:', labels);
        
        if (!labels.length || !chartData.wave_height || !chartData.wave_height.length) {
            console.error('Invalid chart data:', { labels, chartData });
            document.getElementById('chartError').textContent = 'Chart data is missing or invalid.';
            return;
        }
        
        const ctx = canvas.getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Wave Height (m)',
                        data: chartData.wave_height,
                        backgroundColor: 'rgba(0, 123, 255, 0.5)',
                        borderColor: '#007bff',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Time',
                            font: { size: 14 }
                        },
                        ticks: {
                            maxTicksLimit: 20,
                            font: { size: 12 },
                            autoSkip: true
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Wave Height (m)',
                            font: { size: 14 }
                        },
                        min: 0,
                        position: 'left'
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            font: { size: 14 }
                        }
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.parsed.y.toFixed(2) + ' m';
                                return label;
                            }
                        }
                    }
                }
            }
        });
    } catch (error) {
        console.error('Chart.js error:', error);
        document.getElementById('chartError').textContent = 'Failed to render chart: ' + error.message;
    }
});