<script>
    <?php
    foreach ($wires as $key => $wire) {
    ?>
        // recent chart
        var recentoptions = {
            series: [<?= $wire['wire_balances_percent'] ?>],
            chart: {
                height: 270,
                type: 'radialBar',
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                radialBar: {
                    startAngle: 0,
                    endAngle: 360,
                    hollow: {
                        margin: 0,
                        size: '70%',
                        background: '#fff',
                        image: undefined,
                        imageOffsetX: 0,
                        imageOffsetY: 0,
                        position: 'front',
                        dropShadow: {
                            enabled: true,
                            top: 3,
                            left: 0,
                            blur: 4,
                            opacity: 0.24
                        }
                    },
                    track: {
                        background: '#fff',
                        strokeWidth: '67%',
                        margin: 0, // margin is in pixels
                        dropShadow: {
                            enabled: true,
                            top: -3,
                            left: 0,
                            blur: 4,
                            opacity: 0.35
                        }
                    },

                    dataLabels: {
                        show: true,
                        name: {
                            offsetY: -30,
                            show: true,
                            color: '#888',
                            fontSize: '15px'
                        },
                        value: {
                            formatter: function(val) {
                                return val + '%';
                            },
                            color: '#111',
                            fontSize: '50px',
                            show: true,
                        },
                    }
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    type: 'horizontal',
                    shadeIntensity: 0.5,
                    gradientToColors: ['#ABE5A1'],
                    inverseColors: true,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100]
                }
            },
            stroke: {
                lineCap: 'round'
            },
            labels: ['Wire Balance (ft)'],
        };

        var recentchart = new ApexCharts(
            document.querySelector("#radial-<?= $key + 1 ?>"),
            recentoptions
        );
        recentchart.render();
    <?php
    }
    ?>
</script>