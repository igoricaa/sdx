
function update_shipping() {
    var shippingCost = $('input[name=shippingCost]:checked', '#shipping').val()
    $.ajax({
        type: 'POST',
        url: ' /response/shop/changeShippingCost',
        dataType: 'json',
        data: { shippingCost: shippingCost },
        success: function (e) {
            console.log(e);
            window.location.href = '/home/checkout';
        },
        complete: function (e) { },
        error: function (e) {
            // location.reload();
        }
    });
    return false;
}