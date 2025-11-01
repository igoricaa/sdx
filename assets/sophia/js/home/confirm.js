$('#confirm').click(function() {
    $.ajax({
        type: 'POST',
        url: ' /response/shop/sms_confirm',
        dataType: 'json',
        data: $('form').serialize(),
        success: function(e) {
            if (e.error)
                window.location.href = "/home/success";
            else
                notify(e.message);
        },
        complete: function(e) {},
        error: function(e) {
            // location.reload();
        }
    });
    return false;
});