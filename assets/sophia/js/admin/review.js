function sendReview(status, id) {
    $.ajax({
        type: 'POST',
        url: ' /response/admin/sendReview/',
        dataType: 'json',
        data: { status: status, id: id },
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