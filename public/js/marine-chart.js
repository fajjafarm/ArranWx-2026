document.addEventListener('DOMContentLoaded', function () {
    try {
        const canvas = document.getElementById('marineChart');
        if (!canvas) {
            console.error('Canvas element #marineChart not found');
            return;
        }
        
        const chartData = JSON.parse(canvas.dataset.chartData || '{}');
        const labels = JSON.parse(canvas.dataset.chartLabels || '[]');
        
        console.log('Chart Data:', chartData);
        console.log('Chart Labels:', labels);
        
        if (!labels.length || !chartData.wave_height || !chartData.wave_height.length || 
            !chartData.sea_surface_temperature || !chartData.sea_surface_temperature.length || 
            !chartData.sea_level_height_msl || !chartData.sea_level_height_msl.length) {
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
                        borderWidth: 1,
                        type: 'bar',
                        yAxisID: 'y-wave'
                    },
                    {
                        label: 'Sea Surface Temperature (°C)',
                        data: chartData.sea_surface_temperature,
                        borderColor: '#28a745',
                        backgroundColor: 'rgba(40, 167, 69, 0.1)',
                        fill: true,
                        tension: 0.4,
                        type: 'line',
                        yAxisID: 'y-temp'
                    },
                    {
                        label: 'Sea Level Height (m)',
                        data: chartData.sea_level_height_msl,
                        borderColor: '#dc3545',
                        backgroundColor: 'rgba(220, 53, 69, 0.1)',
                        fill: true,
                        tension: 0.4,
                        type: 'line',
                        yAxisID: 'y-level'
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
                    'y-wave': {
                        title: {
                            display: true,
                            text: 'Wave Height (m)',
                            font: { size: 14 }
                        },
                        min: 0,
                        position: 'left'
                    },
                    'y-temp': {
                        title: {
                            display: true,
                            text: 'Sea Surface Temp (°C)',
                            font: { size: 14 }
                        },
                        min: 0,
                        position: 'right'
                    },
                    'y-level': {
                        title: {
                            display: true,
                            text: 'Sea Level (m)',
                            font: { size: 14 }
                        },
                        position: 'right'
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
                                if (context.datasetIndex === 0) {
                                    label += context.parsed.y.toFixed(2) + ' m';
                                } else if (context.datasetIndex === 1) {
                                    label += context.parsed.y.toFixed(1) + ' °C';
                                } else {
                                    label += context.parsed.y.toFixed(2) + ' m';
                                }
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