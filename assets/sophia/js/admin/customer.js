function customer_add_note() {
    loading();
    $.ajax({
        type: 'POST',
        url: ' /response/admin/customer_add_note/',
        dataType: 'json',
        data: { note: $('#post_note').val(), ID: $('#customer_id').val() },
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


function customer_update_address() {
    loading();
    $.ajax({
        type: 'POST',
        url: ' /response/admin/customer_update_address/',
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

function customer_update_contact() {
    loading();
    $.ajax({
        type: 'POST',
        url: ' /response/admin/customer_update_contact/',
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