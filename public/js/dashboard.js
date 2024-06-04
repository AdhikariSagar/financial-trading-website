document.addEventListener('DOMContentLoaded', function () {
    const fetchIdElement = document.getElementById('fetchId');
    const fetchId = fetchIdElement.getAttribute('data');

    let chart;
    let allLabels = [];
    let allPrices = [];

    fetch(`http://127.0.0.1:8000/gold-data/${fetchId}`)
        .then(response => response.json())
        .then(data => {
            const goldInfo = data.info;
            const goldData = data.data;
            console.log('hello', goldData);

            allLabels = goldData.map(item => item.dateTime); // Keep raw date strings for better formatting
            allPrices = goldData.map(item => item.endPrice);
            console.log({ prices: allPrices, labels: allLabels });

            const ctx = document.getElementById('gold-price-chart').getContext('2d');
            chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: allLabels, // Use all labels initially
                    datasets: [{
                        label: 'Gold Price (USD)',
                        data: allPrices,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: true
                    }]
                },
                options: {
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                unit: 'day',
                                tooltipFormat: 'P' // Correct date-fns format string
                            }
                        },
                        y: {
                            beginAtZero: false
                        }
                    },
                    plugins: {
                        tooltip: {
                            enabled: true,
                            mode: 'index',
                            intersect: false,
                            callbacks: {
                                label: function (tooltipItem) {
                                    return `Price: ${tooltipItem.raw}`;
                                }
                            }
                        }
                    },
                    hover: {
                        mode: 'index',
                        intersect: false
                    }
                }
            });

        }).catch(error => console.error('Error fetching data:', error));

    // Function to update chart data based on the selected time range
    window.updateChart = function (range) {
        let labels = [];
        let prices = [];

        const now = new Date();
        const endTime = now.getTime();

        const getTimeRange = (days) => new Date(endTime - (days * 24 * 60 * 60 * 1000));

        let timeUnit = 'day'; // Default time unit

        console.log('Selected Range:', range);

        switch (range) {
            case '1D':
                labels = allLabels.slice(-1);
                prices = allPrices.slice(-1);
                timeUnit = 'hour';
                break;
            case '5D':
                labels = allLabels.slice(-5);
                prices = allPrices.slice(-5);
                timeUnit = 'day';
                break;
            case '1M':
                ({ labels, prices } = filterByTimeRange(allLabels, allPrices, getTimeRange(30)));
                timeUnit = 'day';
                break;
            case '3M':
                ({ labels, prices } = filterByTimeRange(allLabels, allPrices, getTimeRange(90)));
                timeUnit = 'week';
                break;
            case '6M':
                ({ labels, prices } = filterByTimeRange(allLabels, allPrices, getTimeRange(180)));
                timeUnit = 'month';
                break;
            case '1Y':
                ({ labels, prices } = filterByTimeRange(allLabels, allPrices, getTimeRange(365)));
                timeUnit = 'month';
                break;
            case 'All':
                labels = allLabels;
                prices = allPrices;
                timeUnit = 'year';
                break;
            default:
                labels = allLabels;
                prices = allPrices;
                timeUnit = 'year';
                break;
        }

        console.log('Filtered Labels:', labels);
        console.log('Filtered Prices:', prices);

        chart.data.labels = labels;
        chart.data.datasets[0].data = prices;
        chart.options.scales.x.time.unit = timeUnit;
        chart.update();
    };

    function filterByTimeRange(labels, prices, startTime) {
        const filteredLabels = [];
        const filteredPrices = [];
        for (let i = 0; i < labels.length; i++) {
            if (new Date(labels[i]) >= startTime) {
                filteredLabels.push(labels[i]);
                filteredPrices.push(prices[i]);
            }
        }
        return { labels: filteredLabels, prices: filteredPrices };
    }
});
