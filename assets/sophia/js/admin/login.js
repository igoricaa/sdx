function login() {
    loading();
    $.ajax({
        type: 'POST',
        url: ' /response/admin/login/',
        dataType: 'json',
        data: $('form').serialize(),
        success: function(e) {
            notify(e.message, e.error);
            if (e.error) {
                location.reload();
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
}