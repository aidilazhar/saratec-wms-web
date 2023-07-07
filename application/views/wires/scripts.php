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