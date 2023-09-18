<script>
    $(document).on('change', '.company-input', function() {
        let data = {
            company_id: $(this).val(),
        }

        $.ajax({
            type: 'post',
            url: window.location.origin + '/api/get-clients',
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