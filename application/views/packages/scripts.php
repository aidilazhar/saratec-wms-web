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

        let data2 = {
            company_id: $(this).val(),
        }

        $.ajax({
            type: 'post',
            url: '<?= base_url() ?>/api/get-operators',
            cache: false,
            data: data2,
            dataType: 'json',
            success: function(data) {
                let result = JSON.parse(data.data);
                let operators = result.operators
                let assistants = result.assistants

                if (operators.length == 0) {
                    sweetAlert('warning', 'Warning!', 'Kindly add operators and assistant operators before creating a package', null);
                }

                let options = '';
                $('.operators-input').html('');
                $('.assistants-input').html('');
                for (let i in operators) {
                    let row = operators[i];
                    $('.operators-input').append('<option value="' + row.id + '">' + row.name + '</option>');
                }

                for (let i in assistants) {
                    let row = assistants[i];
                    $('.assistants-input').append('<option value="' + row.id + '">' + row.name + '</option>');
                }
            },
            error: function(xhr, status, error) {
                return 'Error';
            }
        });
    });
</script>
<script>
    $(document).on('change', '.night-shift', function() {
        let value = $(this).prop('checked');
        let card = $(this).closest('.card');

        console.log(value)

        if (value == true) {
            card.find('select').each(function() {
                $(this).prop('disabled', false)
            });
        } else {
            card.find('select').each(function() {
                $(this).prop('disabled', true)
            });
        }
    });
</script>