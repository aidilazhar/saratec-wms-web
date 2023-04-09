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
<script src="<?= base_url("assets/js/chart/apex-chart/stock-prices.js") ?>"></script>
<script src="<?= base_url("assets/js/chart/apex-chart/moment.min.js") ?>"></script>
<script src="<?= base_url("assets/js/dashboard/dashboard_4.js") ?>"></script>
<script src="<?= base_url("assets/js/height-equal.js") ?>"></script>
<script src="<?= base_url("assets/js/animation/wow/wow.min.js") ?>"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="<?= base_url("assets/js/script.js") ?>"></script>
<script src="<?= base_url("assets/js/theme-customizer/customizer.js") ?>"></script>
<!-- Plugin used-->
<script src="<?= base_url("assets/js/datatable/datatables/jquery.dataTables.min.js") ?>"></script>
<script src="<?= base_url("assets/js/datatable/datatables/datatable.custom.js") ?>"></script>
<script src="<?= base_url("assets/js/dashboard/default.js") ?>"></script>

<script src="<?= base_url("assets/js/chart/echart/esl.js") ?>"></script>
<script src="<?= base_url("assets/js/chart/echart/config.js") ?>"></script>
<script src="<?= base_url("assets/js/chart/echart/pie-chart/facePrint.js") ?>"></script>
<script src="<?= base_url("assets/js/chart/echart/pie-chart/testHelper.js") ?>"></script>
<script src="<?= base_url("assets/js/chart/echart/pie-chart/custom-transition-texture.js") ?>"></script>
<script src="<?= base_url("assets/js/chart/echart/data/symbols.js") ?>"></script>
<script src="<?= base_url("assets/js/chart/echart/custom.js") ?>"></script>

<script src="<?= base_url("assets/js/sidebar-menu.js") ?>"></script>
<script src="<?= base_url("assets/js/slick/slick.min.js") ?>"></script>
<script src="<?= base_url("assets/js/slick/slick.js") ?>"></script>
<script src="<?= base_url("assets/js/header-slick.js") ?>"></script>
<script src="<?= base_url("assets/js/chart/echart/esl.js") ?>"></script>
<script src="<?= base_url("assets/js/chart/echart/config.js") ?>"></script>
<script src="<?= base_url("assets/js/chart/echart/pie-chart/facePrint.js") ?>"></script>
<script src="<?= base_url("assets/js/chart/echart/pie-chart/testHelper.js") ?>"></script>
<script src="<?= base_url("assets/js/chart/echart/pie-chart/custom-transition-texture.js") ?>"></script>
<script src="<?= base_url("assets/js/chart/echart/data/symbols.js") ?>"></script>
<script src="<?= base_url("assets/js/chart/echart/custom.js") ?>"></script>

<script>
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
</script>