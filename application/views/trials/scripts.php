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
            url: "<?php echo base_url('trials/ajax/' . encode($wire_id)) ?>",
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
                "orderable": true,
            },
            {
                "targets": 2,
                "data": "operator_name",
                "orderable": true,
            },
            {
                "targets": 3,
                "data": "supervisor_name",
                "orderable": true,
            },
            {
                "targets": 4,
                "data": "client_name",
                "orderable": true,
            },
            {
                "targets": 5,
                "data": "package_name",
                "orderable": true,
            },
            {
                "targets": 6,
                "data": "drum_name",
                "orderable": true,
            },
            {
                "targets": 7,
                "data": "job_type_name",
                "orderable": true,
            },
            {
                "targets": 8,
                "data": "wrap_test",
                "orderable": true,
            },
            {
                "targets": 9,
                "data": "pull_test",
                "orderable": true,
            },
            {
                "targets": 10,
                "render": function(data, type, row, meta) {
                    if (row.x_inch != null) {
                        return row.x_inch
                    }
                    return '-'
                },
                "orderable": true,
            },
            {
                "targets": 11,
                "render": function(data, type, row, meta) {
                    if (row.x_inch != null) {
                        return row.y_inch
                    }
                    return '-'
                },
                "orderable": true,
            },
            {
                "targets": 12,
                "data": "cut_off",
                "orderable": true,
            },
            {
                "targets": 13,
                "data": "well_name",
                "orderable": true,
            },
            {
                "targets": 14,
                "data": "jar_number",
                "orderable": true,
            },
            {
                "targets": 15,
                "data": "max_pull",
                "orderable": true,
            },
            {
                "targets": 16,
                "data": "max_depth",
                "orderable": true,
            },
            {
                "targets": 17,
                "data": "duration",
                "orderable": true,
            },
            {
                "targets": 18,
                "render": function(data, type, row, meta) {
                    if (row.smart_monitor_name != null) {
                        return '<a target="_blank" href="<?= temp_url() ?>' + row.smart_monitor_url + '">' + row.smart_monitor_name + '</a>'
                    }
                    return '-'
                },
                "orderable": true,
            },
            {
                "targets": 19,
                "data": "remarks",
                "orderable": true,
            },
            {
                "targets": 20,
                "data": "job_status",
                "orderable": true,
            },
            {
                "targets": 21,
                "data": "actions",
                "orderable": false,
            },
        ]
    });

    var filter = $('.filter-column-group').html();

    $('div.wrapper').append('<div id="trials_columns" class="dataTables_columns">' + filter + '</div>');

    $(".filter-column").change(function(e) {
        var total = $('.dataTables_columns').find('.filter-column:checked').length
        toggleColumn($(this).val(), $(this).prop('checked'))
    });

    function toggleColumn(columnIndex, toggle) {
        var column = data_table.column(columnIndex);
        column.visible(toggle);
    }

    $(document).on('change', '.smart-monitor', function() {
        $(this).closest('.sm-csv').find('.smart-monitor-csv').prop('disabled', !$(this).prop('checked'))
        $(this).closest('.sm-csv').find('.smart-monitor-button').prop('disabled', !$(this).prop('checked'))
        if (!$(this).prop('checked')) {
            $(this).closest('.sm-csv').find('.smart-monitor-hidden').val(0)
        } else {
            $(this).closest('.sm-csv').find('.smart-monitor-hidden').val(1)
        }
    })

    $(document).on('change', '#smart-monitor-csv', function() {
        if (typeof $(this)[0].files[0] !== 'undefined') {
            var file = $(this)[0].files[0].name;
            $(this).closest('.sm-csv').find('.csv-name').text(file);
            $(this).closest('.sm-csv').find('.smart-monitor-csv-validate').prop('disabled', false)
        } else {
            $(this).closest('.sm-csv').find('.csv-name').text('');
            $(this).closest('.sm-csv').find('.smart-monitor-csv-validate').prop('disabled', true)
        }

    });

    $(document).on('click', '.smart-monitor-button', function() {
        $(this).closest('.sm-csv').find('.smart-monitor-csv').click()
    });
</script>

<script type="text/javascript">
    $(document).on('click', '.add-entry', function() {
        var entry = $('.entry-hidden').html()
        $('.entry-body').append(entry);
    });

    $(document).on('click', '.delete-entry', function() {
        var row = $(this).closest('.entry-row');
        row.remove();
    });

    $(document).on('click', '.submit-button', function() {
        if (validateTrialForm()) {
            $('.trial-form').submit()
        }
    });
</script>

<script>
    function validateTrialForm() {
        var no_error = true;

        $('.card :input, .card select').each(function() {
            var text = $(this).prev().text().replace('*', '');
            var element = $(this);
            var required = element.attr('required');
            var type = element.attr('type');

            if (type == "file") {
                return;
            }

            if (element.val() == "" && element.prop('required')) {
                if (text == "") {
                    sweetAlert('error', 'Error!', '(*) input cannot be empty', null);
                } else {
                    sweetAlert('error', 'Error!', text + ' cannot be empty', null);
                }

                no_error = false;
                return false;
            } else if (type == 'email') {
                if (testEmail.test(element.val()) == false && element.val() != '') {
                    if (text == "") {
                        sweetAlert('error', 'Error!', '(*) input cannot be empty', null);
                    } else {
                        sweetAlert('error', 'Error!', text + ' is not in email format', null);
                    }


                    no_error = false;
                    return false;
                }
            }
        });

        if (no_error) {
            swal({
                title: "Are you sure?",
                text: "Kindly to check the metric unit before submitting the form",
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then((isConfirm) => {
                if (isConfirm) {
                    $('.trial-form').submit()
                }
            });
        }
    }

    var substringMatcher = function(strs) {
        console.log(strs)
        return function findMatches(q, cb) {
            var matches, substringRegex;
            matches = [];
            substrRegex = new RegExp(q, 'i');
            $.each(strs, function(i, str) {
                if (substrRegex.test(str)) {
                    matches.push(str);
                }
            });
            cb(matches);
        };
    };

    var prefixes = [];
    var postfixes = [];

    $.ajax({
        url: '<?= base_url('api/well-name-prefix') ?>',
        method: 'POST',
        dataType: 'json',
        async: false,
        success: function(data) {
            let options = [];
            for (let i in data) {
                options.push(data[i].prefix)
            }

            prefixes = options
        },
    });

    $('.well-name-prefix').typeahead({
        hint: true,
        highlight: true,
        async: true,
        minLength: 1
    }, {
        source: substringMatcher(prefixes)
    });

    let postfix_typeahead = $('.well-name-postfix').typeahead();

    postfix_typeahead.typeahead({
        hint: true,
        highlight: true,
        async: true,
        minLength: 1
    }, {
        source: substringMatcher([])
    });


    $('.well-name-prefix').on('change', function() {
        $.ajax({
            url: '<?= base_url('api/well-name-postfix') ?>',
            method: 'POST',
            dataType: 'json',
            data: {
                prefix: $(this).val(),
            },
            async: false,
            success: function(data) {
                let options = [];
                for (let i in data) {
                    options.push(data[i].postfix)
                }

                postfixes = options
            },
        });

        postfix_typeahead.typeahead('destroy')

        postfix_typeahead.typeahead({
            hint: true,
            highlight: true,
            async: true,
            minLength: 1
        }, {
            source: substringMatcher(postfixes)
        });
    })
</script>
<script>
    $('.smart-monitor-csv-validate').on('click', function() {
        console.log(1)
        // Get the file input element
        var inputFile = $('.smart-monitor-csv')[0];

        // Create a FormData object to store the file and other form data
        var formData = new FormData();
        formData.append('smart_monitor_csv', inputFile.files[0]); // Append the file to the form data
        formData.append('wire_id', '<?= $wire_id ?>');

        // Make the AJAX request
        $.ajax({
            type: 'POST',
            url: '<?= base_url('api/validate-csv') ?>', // Replace this with your server endpoint to handle the file upload
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response)

                if (typeof response.status !== 'undefined') {
                    if (response.status == true) {
                        $('.csv-passed').addClass('d-none')
                        $('.csv-failed').addClass('d-none')
                        $('.csv-passed').removeClass('d-none')
                        console.log(1)
                    } else {
                        $('.csv-passed').addClass('d-none')
                        $('.csv-failed').addClass('d-none')
                        $('.csv-failed').removeClass('d-none')
                        console.log(2)
                    }
                } else {

                }
            },
            error: function(error) {
                // Handle the error
                console.error('Error uploading file:', error);
            }
        });
    });
</script>