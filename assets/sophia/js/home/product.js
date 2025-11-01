function addQ(p = 1) {
    var quantity = parseInt($("#quantity").val());
    if (p == 1)
        quantity = quantity + 1;
    else
        quantity = quantity - 1;
    if (quantity < 1) quantity = 1;

    var discount = findDiscount(quantity);
    if (discount !== false) {
        var compare_price = parseFloat($('#compare_price').val());
        $('#fix-padding').hide();
        $('#quantity_discount_price').show();
        $('.selling_price').addClass('text-del');
        $('#discounted_price_new').html(discount);
        $('#discounted_usteda').html(compare_price - parseFloat(discount));
        $('#quantity_discount_price').css("background-color", "#FFFF9C").animate({ backgroundColor: "#FFFFFF" }, 1000);
    } else {
        $('#fix-padding').show();
        $('#quantity_discount_price').hide();
        $('.selling_price').removeClass('text-del');
    }
    $("#quantity").val(quantity);
}

function findDiscount(amount) {
    var price = false;
    $('#quantity_discount tr.discount-info').each(function() {
        var discount_amount = $(this).data('quantity-amount');
        var discount_price = $(this).data('quantity-price');
        if (discount_amount <= amount) {
            price = discount_price;
        }
    });
    return price;
}



function postReview() {
    $.ajax({
        type: 'POST',
        url: ' /response/shop/postReview/',
        dataType: 'json',
        data: $('form#postReview').serialize(),
        success: function(e) {
            notify(e.message, e.error);
            if (e.error) {
                $('form#postReview')[0].reset();
                // location.reload();
            }
        },
        complete: function(e) {},
        error: function(e) {
            // location.reload();
        }
    });
    return false;
}