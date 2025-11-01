function order_sent() {
    loading();
    $.ajax({
        type: 'POST',
        url: ' /response/admin/order_sent/',
        dataType: 'json',
        data: $('#send-info form').serialize(),
        success: function(e) {
            notify(e.message, e.error);
            if (e.error) {
                // location.reload();
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

function updateContact() {
    loading();
    $.ajax({
        type: 'POST',
        url: ' /response/admin/updateContact/',
        dataType: 'json',
        data: $('#contact-info form').serialize(),
        success: function(e) {
            notify(e.message, e.error);
            if (e.error) {
                // location.reload();
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

function updateAddress() {
    loading();
    $.ajax({
        type: 'POST',
        url: ' /response/admin/updateAddress/',
        dataType: 'json',
        data: $('#address-info form').serialize(),
        success: function(e) {
            notify(e.message, e.error);
            if (e.error) {
                // location.reload();
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

function post_note() {
    loading();
    $.ajax({
        type: 'POST',
        url: ' /response/admin/post_note/',
        dataType: 'json',
        data: { note: $('#post_note').val(), ID: $('#order_id').val() },
        success: function(e) {
            notify(e.message, e.error);
            if (e.error) {
                // location.reload();
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

function order_return() {
    loading();
    $.ajax({
        type: 'POST',
        url: ' /response/admin/order_return/',
        dataType: 'json',
        data: $('#sent-info form').serialize(),
        success: function(e) {
            notify(e.message, e.error);
            if (e.error) {
                // location.reload();
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