$('#checkout').click(function() {
    loading();
    $.ajax({
        type: 'POST',
        url: ' /response/shop/checkout',
        dataType: 'json',
        data: $('form#checko').serialize(),
        success: function(e) {
            if (e.error) {
                window.location.href = e.message;
            } else {
                alert(e.message);
                loading(0);
            }
        },
        error: function(e) {
            // // location.reload();
        }
    });
    return false
});