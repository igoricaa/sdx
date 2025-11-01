$('#edit_category').click(function() {
    loading();
    $.ajax({
        type: 'POST',
        url: ' /response/admin/edit_category/',
        dataType: 'json',
        data: $('form').serialize(),
        success: function(e) {
            notify(e.message, e.error);
            if (e.error) {
                window.location.href = '/admin/categories';
            }
        },
        complete: function(e) {
            loading(0);
        },
        error: function(e) {
            // location.reload();
        }
    });
    return false;
});
$('#delete_category').click(function() {
    swal({
            text: "Potvrdite brisanje kategorije!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((value) => {
            if (!value) return false;
            loading();
            $.ajax({
                type: 'POST',
                url: ' /response/admin/delete_category/',
                dataType: 'json',
                data: $('form').serialize(),
                success: function(e) {
                    notify(e.message, e.error);
                    if (e.error) {
                        window.location.href = '/admin/categories';
                    }
                },
                complete: function(e) {
                    loading(0);
                },
                error: function(e) {
                    // location.reload();
                }
            });
            return false;
        });
});