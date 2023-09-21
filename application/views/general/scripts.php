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
<script src="<?= base_url("assets/js/height-equal.js") ?>"></script>
<script src="<?= base_url("assets/js/animation/wow/wow.min.js") ?>"></script>
<script src="<?= base_url("assets/js/sweet-alert/sweetalert.min.js") ?>"></script>
<script src="<?= base_url("assets/js/chart/chartist/chartist.js") ?>"></script>
<script src="<?= base_url("assets/js/chart/chartist/chartist-plugin-tooltip.js") ?>"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/boost.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="<?= base_url("assets/js/script.js") ?>"></script>
<!-- <script src="<?= base_url("assets/js/theme-customizer/customizer.js") ?>"></script> -->
<!-- Plugin used-->
<script src="<?= base_url("assets/js/datatable/datatables/jquery.dataTables.min.js") ?>"></script>

<script>
    $('.card :input, .card select').each(function() {
        var attr = $(this).attr('required');

        if (typeof attr !== 'undefined' && attr !== false) {
            var prev = $(this).prev()
            var text = prev.text();
            prev.html(text + ' <span style="color: red">*</span>')

        }
    });
</script>

<?php
if (isset($page['scripts'])) {
    $this->load->view($page['scripts']);
}
?>

<script>
    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

    function validateForm() {
        var no_error = true;

        $('.card :input, .card select').each(function() {
            var text = $(this).prev().text().replace('*', '');
            console.log(text)
            var element = $(this);
            var required = element.attr('required');
            var type = element.attr('type');

            if (type == 'file') return;

            if (element.val() == "" && element.prop('required')) {
                sweetAlert('error', 'Error!', text + ' cannot be empty', null);
                no_error = false;
                return false;
            } else if (type == 'email') {
                if (testEmail.test(element.val()) == false && element.val() != '') {
                    sweetAlert('error', 'Error!', text + ' is not in email format', null);

                    no_error = false;
                    return false;
                }
            }
        });
        return no_error;
    }

    function sweetAlert(icon, title, text, footer) {
        swal(title, text, icon);
    }
</script>

<script>
    $('.data-table').DataTable();

    var data = generateDayWiseTimeSeries(new Date("22 Apr 2017").getTime(), 1000, {
        min: 30,
        max: 90
    });

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
</script>
<script>
    $(document).on('change', '.company-input', function() {
        let data = {
            company_id: $(this).val(),
        }

        $.ajax({
            type: 'post',
            url: '<?= base_url() ?>/api/get-clients',
            cache: false,
            data: data,
            dataType: 'json',
            success: function(data) {
                clients = JSON.parse(data.data)

                let options = '';
                $('.clients-input').html('');
                for (let i in clients) {
                    let row = clients[i];
                    $('.clients-input').append('<option value="' + row.id + '">' + row.name + '</option>');
                }
            },
            error: function(xhr, status, error) {
                return 'Error';
            }
        });
    });
</script>
<script>
    $(document).on('input propertychange', '.name-1', function() {
        var value = $(this).val();
        console.log(value)

        value = value.toUpperCase()
        $(this).val(value)
    })

    $(document).on('input propertychange', '.name-2', function() {
        var value = $(this).val();

        if (value.charAt(0) == '0') {
            value = value.slice(1)
        }
        value = value.toUpperCase()

        $(this).val(value)
    })
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
if (isset($base64_material_ceritification)) {
?>
    <script>
        myPDF1 = "<?= $base64_material_ceritification ?>";

        RenderPDF(myPDF1, 0, 'pdfview_material_certifications')
    </script>
<?php
}
?>

<?php
if (isset($base64_eddy_current)) {
?>
    <script>
        myPDF2 = "<?= $base64_eddy_current ?>";

        RenderPDF(myPDF2, 0, 'pdfview_eddy_current')
    </script>
<?php
}
?>