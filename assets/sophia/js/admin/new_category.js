$('#create_category').click(function() {
    loading();
    $.ajax({
        type: 'POST',
        url: ' /response/admin/create_category/',
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