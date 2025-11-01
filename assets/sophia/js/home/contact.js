function contact() {
    loading();
    $.ajax({
        type: 'POST',
        url: ' /response/shop/contact',
        dataType: 'json',
        data: $('form').serialize(),
        success: function(e) {
            alert(e.message);
            loading(0);
            if (e.error) {
                $('form').reset();
            }
        }
    });
    return false
}