function updatePromoCode(code, enable) {
    $.ajax({
        type: 'POST',
        url: ' /response/admin/updatePromoCode/',
        dataType: 'json',
        data: { code: code, enable: enable },
        success: function(e) {
            notify(e.message, e.error);
            if (e.error) {
                location.reload();
            }
        },
        complete: function(e) {},
        error: function(e) {
            location.reload();
        }
    });
    return false;

}

function addPromoCode() {
    $.ajax({
        type: 'POST',
        url: ' /response/admin/addPromoCode/',
        dataType: 'json',
        data: $('form').serialize(),
        success: function(e) {
            notify(e.message, e.error);
            if (e.error) {
                location.reload();
            }
        },
        complete: function(e) {},
        error: function(e) {
            location.reload();
        }
    });
    return false;
}