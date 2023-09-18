<script>
    $(document).on('change, keydown, paste, input', '.input-name', function() {
        var name = $(this).val()
        $.ajax({
            type: 'post',
            url: '<?= base_url() ?>/api/slugify',
            data: {
                text: name
            },
            success: function(data) {
                $('.input-url').val(data)
            },
            error: function(xhr, status, error) {
                return 'Error';
            }
        });
    });
</script>
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
                $('.clients-input').html('<option value="" selected disabled>--PLEASE SELECT--</option>');
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