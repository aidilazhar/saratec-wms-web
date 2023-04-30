<!-- latest jquery-->
<script>
    const baseUrl = "<?= base_url() ?>";
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
<script src="<?= base_url("assets/js/bootstrap/bootstrap.bundle.min.js") ?>"></script>
<!-- feather icon js-->
<script src="<?= base_url("assets/js/icons/feather-icon/feather.min.js") ?>"></script>
<script src="<?= base_url("assets/js/icons/feather-icon/feather-icon.js") ?>"></script>
<!-- scrollbar js-->
<script src="<?= base_url("assets/js/scrollbar/simplebar.js") ?>"></script>
<script src="<?= base_url("assets/js/scrollbar/custom.js") ?>"></script>
<!-- Sidebar jquery-->
<script src="<?= base_url("assets/js/config.js") ?>"></script>
<!-- Plugins JS start-->
<script src="<?= base_url("assets/js/sidebar-menu.js") ?>"></script>
<script src="<?= base_url("assets/js/slick/slick.min.js") ?>"></script>
<script src="<?= base_url("assets/js/slick/slick.js") ?>"></script>
<script src="<?= base_url("assets/js/header-slick.js") ?>"></script>
<script src="<?= base_url("assets/js/chart/apex-chart/apex-chart.js") ?>"></script>
<script src="<?= base_url("assets/js/chart/apex-chart/moment.min.js") ?>"></script>
<script src="<?= base_url("assets/js/dashboard/dashboard_4.js") ?>"></script>
<script src="<?= base_url("assets/js/height-equal.js") ?>"></script>
<script src="<?= base_url("assets/js/animation/wow/wow.min.js") ?>"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="<?= base_url("assets/js/script.js") ?>"></script>
<!-- <script src="<?= base_url("assets/js/theme-customizer/customizer.js") ?>"></script> -->
<!-- Plugin used-->
<script src="<?= base_url("assets/js/datatable/datatables/jquery.dataTables.min.js") ?>"></script>
<script src="<?= base_url("assets/js/dashboard/default.js") ?>"></script>

<script>
    $('.data-table').DataTable();

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
            data: [400, 430, 448, 470, 540]
        }],
        xaxis: {
            categories: ['SetRetGLVODummy', 'WireScratcherRun', 'TccTagTdGRingTDrift', 'FishingOperation', 'PerfTbgPunchCut'],
        },
        colors: [CubaAdminConfig.primary]
    }

    var job_type_chart = new ApexCharts(
        document.querySelector("#type-of-jobs"),
        job_type_options
    );

    job_type_chart.render();

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
            curve: 'straight'
        },
        series: [{
            name: "Max Pull (lbs)",
            data: [
                10, 4, 5, 6, 2, 1
            ]
        }],
        labels: [
            '09-04-2023',
            '10-04-2023',
            '11-04-2023',
            '12-04-2023',
            '13-04-2023',
            '14-04-2023',
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
            curve: 'straight'
        },
        series: [{
            name: "Max Pull (lbs)",
            data: [
                2, 5, 4, 7, 3, 2
            ]
        }],
        labels: [
            '09-04-2023',
            '10-04-2023',
            '11-04-2023',
            '12-04-2023',
            '13-04-2023',
            '14-04-2023',
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
            curve: 'straight'
        },
        series: [{
            name: "Max Pull (lbs)",
            data: [
                5, 5, 4, 3, 6, 10
            ]
        }],
        labels: [
            '09-04-2023',
            '10-04-2023',
            '11-04-2023',
            '12-04-2023',
            '13-04-2023',
            '14-04-2023',
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

    var data = generateDayWiseTimeSeries(new Date("22 Apr 2017").getTime(), 1000, {
        min: 30,
        max: 90
    });

    var options1 = {
        chart: {
            id: "chart2",
            type: "area",
            height: 230,
            foreColor: "#ccc",
            toolbar: {
                autoSelected: "pan",
                show: false
            }
        },
        colors: ["#00BAEC"],
        stroke: {
            width: 0
        },
        grid: {
            borderColor: "#555",
            clipMarkers: false,
            yaxis: {
                lines: {
                    show: false
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        fill: {
            gradient: {
                enabled: false,
                opacityFrom: 0,
                opacityTo: 0
            }
        },
        markers: {
            size: 1,
            colors: ["#000524"],
            strokeColor: "#00BAEC",
            strokeWidth: 3
        },
        series: [{
            data: data
        }],
        tooltip: {
            theme: "dark"
        },
        xaxis: {
            type: "datetime"
        },
        yaxis: {
            min: 0,
            tickAmount: 4
        }
    };

    var options2 = {
        chart: {
            id: "chart2",
            type: "area",
            height: 230,
            foreColor: "#ccc",
            toolbar: {
                autoSelected: "pan",
                show: false
            }
        },
        colors: ["#00BAEC"],
        stroke: {
            width: 3
        },
        grid: {
            borderColor: "#555",
            clipMarkers: false,
            yaxis: {
                lines: {
                    show: false
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        fill: {
            gradient: {
                enabled: true,
                opacityFrom: 0.55,
                opacityTo: 0
            }
        },
        markers: {
            size: 1,
            colors: ["#000524"],
            strokeColor: "#00BAEC",
            strokeWidth: 3
        },
        series: [{
            data: data
        }],
        tooltip: {
            theme: "dark"
        },
        xaxis: {
            type: "datetime"
        },
        yaxis: {
            min: 0,
            tickAmount: 4
        }
    };


    var chart1 = new ApexCharts(document.querySelector("#on-site-od-chart"), options1);
    chart1.render();

    var chart2 = new ApexCharts(document.querySelector("#tension-chart"), options2);
    chart2.render();

    var chart3 = new ApexCharts(document.querySelector("#depth-chart"), options2);
    chart3.render();

    var chart4 = new ApexCharts(document.querySelector("#line-speed-chart"), options2);
    chart4.render();

    var chart5 = new ApexCharts(document.querySelector("#laser-od-chart"), options2);
    chart5.render();


    function generateDayWiseTimeSeries(baseval, count, yrange) {
        var i = 0;
        var series = [];
        while (i < count) {
            var x = baseval;
            var y =
                Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

            series.push([x, y]);
            baseval += 86400000;
            i++;
        }
        return series;
    }

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

    var recentchart = new ApexCharts(
        document.querySelector("#radial-1"),
        recentoptions
    );
    recentchart.render();

    var recentchart2 = new ApexCharts(
        document.querySelector("#radial-2"),
        recentoptions
    );
    recentchart2.render();
</script>
<script>
    $(document).on('change', '.company-input', function() {
        let data = {
            company_id: $(this).val(),
        }

        $.ajax({
            type: 'post',
            url: window.location.origin + '/<?= LOCALHOST_PROJECT_NAME ?>' + '/api/get-clients',
            cache: false,
            data: data,
            dataType: 'json',
            success: function(data) {
                let options = '';
                $('.clients-input').html('');
                for (let i in data) {
                    let row = data[i];
                    $('.clients-input').append('<option value="' + row.id + '">' + row.name + '</option>');
                }
            },
            error: function(xhr, status, error) {
                return 'Error';
            }
        });
    });
</script>
<!-- jQuery -->
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- jQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/blitzer/jquery-ui.css">

<!-- pdf.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.489/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.489/pdf.worker.js"></script>
<script src="<?= base_url("assets/js/pdf/easyPDF.js") ?>"></script>
<?php
if (isset($base64)) {
?>
    <script>
        myPDF = "<?= $base64 ?>";

        easyPDF(myPDF, "PDF Name")
    </script>
<?php
}
?>