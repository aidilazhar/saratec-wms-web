<script>
    const tension = <?= json_encode($tension) ?>;
    const speed = <?= json_encode($speed) ?>;
    const depth = <?= json_encode($depth) ?>;

    Highcharts.setOptions({
        colors: ["#fd7f6f", "#7eb0d5", "#b2e061", "#bd7ebe", "#ffb55a", "#ffee65", "#beb9db", "#fdcce5", "#8bd3c7"]
    });

    var chart = Highcharts.chart('container', {
        chart: {
            zoomType: 'x',
        },
        title: {
            text: ' ',
            align: 'left'
        },
        subtitle: {
            text: document.ontouchstart === undefined ?
                'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in',
            align: 'left'
        },
        xAxis: {
            type: 'datetime',
            tickInterval: 1000, // 1000 milliseconds = 1 second
            minRange: 1000,
            labels: {
                format: '{value:%d/%m/%Y %H:%M:%S}' // Format as hours:minutes:seconds
            }
        },
        yAxis: {
            title: {
                text: 'Tension, Line Speed & Depth'
            },
        },
        legend: {
            enabled: true
        },
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 3
                },
                lineWidth: 3,
                states: {
                    hover: {
                        lineWidth: 5
                    }
                },
                threshold: null,
                line: {
                    colors: ['red', 'blue', 'green'] // Set colors for each line series
                }
            }
        },
        series: [{
                type: 'line',
                name: 'Tension',
                data: tension
            },
            {
                type: 'line',
                name: 'Line Speed',
                data: speed
            },
            {
                type: 'line',
                name: 'Depth',
                data: depth
            }
        ]
    });

    // Add an event listener to the date filter input
    $('.filter-button').on('click', function() {
        var date = $('.filter-date').val().split("-")
        var from = $('.filter-time-from').val().split(":")
        var to = $('.filter-time-to').val().split(":")

        // Get the start and end dates for the selected day
        var startDate = new Date(parseInt(date[0]), parseInt(date[1]) - 1, parseInt(date[2]), parseInt(from[0]), parseInt(from[1]), 0, 0);
        var endDate = new Date(parseInt(date[0]), parseInt(date[1]) - 1, parseInt(date[2]), parseInt(to[0]), parseInt(to[1]), 0, 0);
        // Set the chart's xAxis minimum and maximum based on the selected date range
        chart.xAxis[0].setExtremes(startDate.getTime(), endDate.getTime());
    });

    $('.reset-button').on('click', function() {
        chart.xAxis[0].setExtremes(null, null);
    });
</script>