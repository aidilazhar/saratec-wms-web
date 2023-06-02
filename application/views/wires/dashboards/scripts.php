<script>
    $('.well-name').DataTable({
        searching: false,
        paging: false,
        info: false,
        pageLength: 5,
        order: [
            [1, 'DESC']
        ],
        bLengthChange: false,
    });

    // basic bar chart
    var job_type_options = {
        chart: {
            height: 350,
            type: 'bar',
            toolbar: {
                show: false
            }
        },
        plotOptions: {
            bar: {
                horizontal: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        series: [{
            data: [
                <?php
                foreach ($job_types as $job_type) {
                    echo $job_type['total'] .  ', ';
                } ?>
            ]
        }],
        xaxis: {
            categories: [
                <?php
                foreach ($job_types as $job_type) {
                    echo "'" . $job_type['name'] .  "', ";
                } ?>
            ],
        },
        colors: [CubaAdminConfig.primary]
    }

    var job_type_chart = new ApexCharts(
        document.querySelector("#type-of-jobs"),
        job_type_options
    );

    job_type_chart.render();
</script>

<script>
    // basic area chart
    var cut_off_options = {
        chart: {
            height: 350,
            type: 'area',
            zoom: {
                enabled: false
            },
            toolbar: {
                show: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            curve: 'straight',
            lineCap: 'butt',
            width: 1,
            dashArray: 0,
        },
        series: [{
            name: "Max Pull (lbs)",
            data: [
                <?php
                foreach ($trials as $trial) {
                    echo $trial['cut_off'] . ', ';
                }
                ?>
            ]
        }],
        labels: [
            <?php
            foreach ($trials as $trial) {
                echo "'" . date('d-m-Y', strtotime($trial['issued_at'])) . "', ";
            }
            ?>
        ],
        xaxis: {
            type: 'date',
        },
        yaxis: {
            opposite: false
        },
        legend: {
            horizontalAlign: 'left'
        },
        colors: [CubaAdminConfig.primary]
    }

    var cut_off = new ApexCharts(
        document.querySelector("#cut-off-chart"),
        cut_off_options
    );

    cut_off.render();
</script>

<script>
    // basic area chart
    var max_pull_options = {
        chart: {
            height: 350,
            type: 'area',
            zoom: {
                enabled: false
            },
            toolbar: {
                show: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            curve: 'smooth',
            lineCap: 'butt',
            width: 1,
            dashArray: 0,
        },
        series: [{
            name: "Max Pull (lbs)",
            data: [
                <?php
                foreach ($trials as $trial) {
                    echo $trial['max_pull'] . ', ';
                }
                ?>
            ]
        }],
        labels: [
            <?php
            foreach ($trials as $trial) {
                echo "'" . date('d-m-Y', strtotime($trial['issued_at'])) . "', ";
            }
            ?>
        ],
        xaxis: {
            type: 'date',
        },
        yaxis: {
            opposite: false
        },
        legend: {
            horizontalAlign: 'left'
        },
        colors: ["#f73164"]
    }

    var max_pull = new ApexCharts(
        document.querySelector("#max-pull-chart"),
        max_pull_options
    );

    max_pull.render();
</script>
<script>
    // basic area chart
    var jar_number_options = {
        chart: {
            height: 350,
            type: 'area',
            zoom: {
                enabled: false
            },
            toolbar: {
                show: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            curve: 'smooth',
            lineCap: 'butt',
            width: 1,
            dashArray: 0,
        },
        series: [{
            name: "Max Pull (lbs)",
            data: [
                <?php
                foreach ($trials as $trial) {
                    echo $trial['jar_number'] . ', ';
                }
                ?>
            ]
        }],
        labels: [
            <?php
            foreach ($trials as $trial) {
                echo "'" . date('d-m-Y', strtotime($trial['issued_at'])) . "', ";
            }
            ?>
        ],
        xaxis: {
            type: 'date',
        },
        yaxis: {
            opposite: false
        },
        legend: {
            horizontalAlign: 'right'
        },
        colors: ["#FFAA05"]
    }

    var jar_number = new ApexCharts(
        document.querySelector("#jar-number-chart"),
        jar_number_options
    );

    jar_number.render();
</script>
<script>
    // recent chart
    var recentoptions = {
        series: [75],
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
</script>

<script>
    var recentoptions = {
        series: [<?= $dashboard['wire_balances_percent'] ?>],
        chart: {
            height: 290,
            type: "radialBar",
            toolbar: {
                show: false,
            },
        },
        plotOptions: {
            radialBar: {
                hollow: {
                    margin: 0,
                    size: "60%",
                    background: "var(--recent-chart-bg)",
                    image: undefined,
                    imageOffsetX: 0,
                    imageOffsetY: 0,
                    position: "front",
                    dropShadow: {
                        enabled: true,
                        top: 3,
                        left: 0,
                        blur: 4,
                        opacity: 0.05,
                    },
                },
                track: {
                    background: "#F4F4F4",
                    strokeWidth: "67%",
                    margin: 0,
                    dropShadow: {
                        enabled: true,
                        top: 0,
                        left: 0,
                        blur: 10,
                        color: "#ddd",
                        opacity: 1,
                    },
                },

                dataLabels: {
                    show: true,
                    name: {
                        offsetY: 30,
                        show: true,
                        color: "#888",
                        fontSize: "17px",
                        fontWeight: "500",
                        fontFamily: "Rubik, sans-serif",
                    },
                    value: {
                        formatter: function(val) {
                            return parseFloat(val) + "%";
                        },
                        offsetY: -8,
                        color: "#111",
                        fontSize: "36px",
                        show: true,
                    },
                },
            },
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "dark",
                type: "horizontal",
                shadeIntensity: 0.5,
                opacityFrom: 1,
                opacityTo: 1,
                colorStops: [{
                        offset: 0,
                        color: "#7366FF",
                        opacity: 1,
                    },
                    {
                        offset: 20,
                        color: "#3EA4F1",
                        opacity: 1,
                    },
                    {
                        offset: 100,
                        color: "#FFFFFF",
                        opacity: 1,
                    },
                ],
            },
        },
        stroke: {
            lineCap: "round",
        },
        labels: [""],
        responsive: [{
                breakpoint: 1840,
                options: {
                    chart: {
                        height: 260,
                    },
                },
            },
            {
                breakpoint: 1700,
                options: {
                    chart: {
                        height: 250,
                    },
                },
            },
            {
                breakpoint: 1660,
                options: {
                    chart: {
                        height: 230,
                        dataLabels: {
                            name: {
                                fontSize: "15px",
                            },
                        },
                    },
                },
            },
            {
                breakpoint: 1561,
                options: {
                    chart: {
                        height: 275,
                    },
                },
            },
            {
                breakpoint: 1400,
                options: {
                    chart: {
                        height: 360,
                    },
                },
            },
            {
                breakpoint: 1361,
                options: {
                    chart: {
                        height: 300,
                    },
                },
            },
            {
                breakpoint: 1200,
                options: {
                    chart: {
                        height: 230,
                    },
                },
            },
            {
                breakpoint: 1007,
                options: {
                    chart: {
                        height: 240,
                    },
                },
            },
            {
                breakpoint: 600,
                options: {
                    chart: {
                        height: 230,
                    },
                },
            },
        ],
    };

    var recentchart = new ApexCharts(
        document.querySelector("#wire-on-drum"),
        recentoptions
    );
    recentchart.render();
</script>