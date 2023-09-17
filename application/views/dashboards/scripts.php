<script>
    let colorPallete = [
        '#B266B2',
        '#FF5733',
        '#FFC300',
        '#36A2EB',
        '#4BC0C0',
        '#9966FF',
        '#FF6384',
        '#FF9F40',
        '#FFCE56',
        '#47D147',
        '#FF00BF',
        '#40E0D0',
        '#FFD700',
        '#00FF7F',
        '#8A2BE2',
        '#FF4500',
        '#32CD32',
        '#9370DB',
        '#FF69B4',
        '#1E90FF'
    ];

    $('.well-name').DataTable({
        searching: false,
        paging: true,
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
            type: "radialBar",
            toolbar: {
                show: false,
            },
        },
        plotOptions: {
            radialBar: {
                dataLabels: {
                    name: {
                        offsetY: 20,
                        color: "var(--chart-text-color)",
                        fontFamily: 'Rubik, sans-serif',
                        fontWeight: 500,
                    },
                    value: {
                        fontSize: '22px',
                        offsetY: -16,
                        label: 'Wire Balance',
                        fontFamily: 'Rubik, sans-serif',
                        fontWeight: 500,
                    },
                    total: {
                        show: true,
                        label: '<?= number_format($dashboard['wire_balances']) ?> ft',
                        fontSize: '12px',
                        formatter: function() {
                            return <?= number_format($dashboard['wire_balances_percent']) ?> + "%"
                        }
                    }
                },
                hollow: {
                    margin: 5,
                    size: '70%',
                },
                track: {
                    background: 'transparent',
                }
            }
        },
        colors: ["#FFA941"],
        labels: ['Wire Balance'],
        stroke: {
            lineCap: 'round'
        },
        legend: {
            show: true,
            position: "bottom",
            horizontalAlign: 'center',
            offsetY: -15,
            fontSize: '14px',
            fontFamily: 'Rubik, sans-serif',
            fontWeight: 500,
            labels: {
                colors: "var(--chart-text-color)",
            },
            markers: {
                width: 6,
                height: 6,
            }
        },
        responsive: [{
                breakpoint: 1830,
                options: {
                    chart: {
                        offsetX: -40,
                    }
                }
            },
            {
                breakpoint: 1750,
                options: {
                    chart: {
                        offsetX: -50,
                    }
                }
            },
            {
                breakpoint: 1661,
                options: {
                    chart: {
                        offsetX: -10,
                    }
                }
            },
            {
                breakpoint: 1530,
                options: {
                    chart: {
                        offsetX: -25,
                    }
                }
            },
            {
                breakpoint: 1400,
                options: {
                    chart: {
                        offsetX: 10,
                    }
                }
            },
            {
                breakpoint: 1300,
                options: {
                    chart: {
                        offsetX: -10,
                    }
                }
            },
            {
                breakpoint: 1200,
                options: {
                    chart: {
                        width: 255,
                    }
                }
            },
            {
                breakpoint: 992,
                options: {
                    chart: {
                        width: 245,
                    }
                }
            },
            {
                breakpoint: 600,
                options: {
                    chart: {
                        width: 225,
                    }
                }
            },
        ]
    };

    var recentchart = new ApexCharts(
        document.querySelector("#wire-on-drum"),
        recentoptions
    );
    recentchart.render();
</script>
<script>
    // area spaline chart
    var cut_off_options = {
        chart: {
            height: 350,
            type: 'area',
            toolbar: {
                show: true
            },
            animation: false,
        },
        markers: {
            size: 0,
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
            name: 'Cut Off',
            data: <?= json_encode(array_column($trials, 'cut_off')) ?>
        }, {
            name: 'Max Pull',
            data: <?= json_encode(array_column($trials, 'max_pull')) ?>
        }, {
            name: 'Number of Jar',
            data: <?= json_encode(array_column($trials, 'jar_number')) ?>
        }],

        xaxis: {
            type: 'date',
            categories: [
                <?php
                foreach ($trials as $trial) {
                    echo "'" . date('d-m-Y', strtotime($trial['issued_at'])) . "', ";
                }
                ?>
            ],
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        },
        colors: ["#7366ff", "#bd7ebe", "#51bb25"],
        legend: {
            horizontalAlign: 'left'
        },
    }

    var cut_off = new ApexCharts(
        document.querySelector("#cut-off-chart"),
        cut_off_options
    );

    cut_off.render();
</script>
<script>
    var length = [10, 25, 50, 100];
    var data_table = $('.trials-datatable').DataTable({
        "lengthMenu": [
            length,
            length
        ],
        dom: '<"wrapper"fl>tip',
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: "<?php echo base_url('trials-ajax/' . encode($wire['id'])) ?>",
            dataType: "json",
            type: "POST",
        },
        initComplete: function() {
            $('.dataTables_columns').find('.filter-column').each(function() {
                toggleColumn($(this).val(), $(this).prop('checked'));
            });
        },
        columnDefs: [{
                "targets": 0,
                "render": function(data, type, row, meta) {
                    return meta.settings._iDisplayStart + meta.row + 1
                },
                "orderable": true,
            },
            {
                "targets": 1,
                "data": "issued_at",
                "type": "datetime",
                "orderable": true,
            },
            {
                "targets": 2,
                "data": "operator_name",
                "orderable": true,
            },
            {
                "targets": 3,
                "data": "assistant1_name",
                "orderable": true,
            },
            {
                "targets": 4,
                "data": "assistant2_name",
                "orderable": true,
            },
            {
                "targets": 5,
                "data": "assistant3_name",
                "orderable": true,
            },
            {
                "targets": 6,
                "data": "supervisor_name",
                "orderable": true,
            },
            {
                "targets": 7,
                "data": "client_name",
                "orderable": true,
            },
            {
                "targets": 8,
                "data": "package_name",
                "orderable": true,
            },
            {
                "targets": 9,
                "data": "drum_name",
                "orderable": true,
            },
            {
                "targets": 10,
                "data": "job_type_name",
                "orderable": true,
            },
            {
                "targets": 11,
                "data": "wrap_test",
                "orderable": true,
            },
            {
                "targets": 12,
                "data": "pull_test",
                "orderable": true,
            },
            {
                "targets": 13,
                "render": function(data, type, row, meta) {
                    if (row.x_inch != null) {
                        return row.x_inch
                    }
                    return '-'
                },
                "orderable": true,
            },
            {
                "targets": 14,
                "render": function(data, type, row, meta) {
                    if (row.y_inch != null) {
                        return row.y_inch
                    }
                    return '-'
                },
                "orderable": true,
            },
            {
                "targets": 15,
                "data": "cut_off",
                "orderable": true,
            },
            {
                "targets": 16,
                "data": "well_name",
                "orderable": true,
            },
            {
                "targets": 17,
                "data": "jar_number",
                "orderable": true,
            },
            {
                "targets": 18,
                "data": "max_pull",
                "orderable": true,
            },
            {
                "targets": 19,
                "data": "max_depth",
                "orderable": true,
            },
            {
                "targets": 20,
                "data": "duration",
                "orderable": true,
            },
            {
                "targets": 21,
                "render": function(data, type, row, meta) {
                    if (row.smart_monitor_name != null) {
                        return '<a href="<?= temp_url() ?>" ' + row.smart_monitor_url + '>' + row.smart_monitor_name + '</a>'
                    }
                    return '-'
                },
                "orderable": true,
            },
            {
                "targets": 22,
                "data": "remarks",
                "orderable": true,
            },
            {
                "targets": 23,
                "data": "job_status",
                "orderable": true,
            },
        ]
    });

    var filter = $('.filter-column-group').html();

    $('div.wrapper').append('<div id="trials_columns" class="dataTables_columns">' + filter + '</div>');

    $(".filter-column").change(function(e) {
        var total = $('.dataTables_columns').find('.filter-column:checked').length
        console.log(total)
        toggleColumn($(this).val(), $(this).prop('checked'))
    });

    function toggleColumn(columnIndex, toggle) {
        var column = data_table.column(columnIndex);
        column.visible(toggle);
    }

    Highcharts.setOptions({
        colors: ["#fd7f6f", "#7eb0d5", "#b2e061", "#bd7ebe", "#ffb55a", "#ffee65", "#beb9db", "#fdcce5", "#8bd3c7"]
    });

    const series = [{
        name: 'X (Inch)',
        id: 'x',
        marker: {
            symbol: 'circle',
            color: 'blue'
        },
        data: <?= json_encode($dashboard['x_inch']) ?>
    }, {
        name: 'Y (Inch)',
        id: 'y',
        marker: {
            symbol: 'circle',
            color: 'red'
        },
        data: <?= json_encode($dashboard['y_inch']) ?>
    }];


    Highcharts.chart('container', {
        chart: {
            type: 'scatter',
            zoomType: 'x'
        },
        title: {
            text: ' ',
            align: 'left'
        },
        xAxis: {
            type: 'datetime',
            labels: {
                format: '{value:%d-%m-%Y}' // Format as hours:minutes:seconds
            },
        },
        yAxis: {
            tickInterval: 0.0002, // 1000 milliseconds = 1 second
            minRange: 0.0002,
            max: <?= $wire['size'] + $wire['range'] ?>,
            plotLines: [{
                    value: <?= $wire['size'] ?>, // y-axis value where the line will be positioned
                    width: 2, // Line width
                    color: 'black', // Line color
                    dashStyle: 'dash' // Line style (optional)
                },
                {
                    value: <?= $wire['size'] - $wire['range'] ?>, // y-axis value where the line will be positioned
                    width: 2, // Line width
                    color: 'red', // Line color
                    dashStyle: 'dash' // Line style (optional)
                }
            ]
        },
        legend: {
            enabled: true
        },
        plotOptions: {
            scatter: {
                marker: {
                    radius: 3,
                    symbol: 'circle',
                    states: {
                        hover: {
                            enabled: true,
                            lineColor: 'rgb(100,100,100)'
                        }
                    }
                },
                states: {
                    hover: {
                        marker: {
                            enabled: false
                        }
                    }
                },
                jitter: {
                    x: 0.5
                }
            }
        },
        tooltip: {
            pointFormat: 'Date: {point.x:%d-%m-%Y}<br/> X inch: {point.y} inch '
        },
        series
    });
</script>
<script>
    var clientOptions = {
        chart: {
            width: 440,
            type: 'pie',
        },
        labels: <?= json_encode(array_column($clients, 'name')) ?>,
        series: <?= json_encode(array_map('floatval', array_column($clients, 'percent'))) ?>,
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 300
                },
                legend: {
                    show: false
                }
            }
        }],
        colors: colorPallete
    }

    var chart8 = new ApexCharts(
        document.querySelector("#client-chart"),
        clientOptions
    );

    chart8.render();
</script>