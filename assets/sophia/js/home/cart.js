function cart_page_loading() {

    // $('#cart-content').html("");
    // $('.cart-loader').show();
    // $('.hide-until-load ').hide();
    loading();
}

function cart_page() {
    // cart_page_loading();
    loading();

    $.ajax({
        type: 'POST',
        url: ' /response/shop/cart',
        dataType: 'json',
        success: function (e) {
            var cart_content = "";
            var items = (e.items);
            if (items > 0) {
                $('.item-count').show();
                $('.item-count').html(items);

                $.each(e.data, function (i, s) {
                    cart_content += '<tr>';


                    cart_content += '<td><a href="#" class="offcanvas-cart-item-delete" onclick="remove_product(' + i + ')"><i class="fa fa-trash-o"></i></a></td>';
                    cart_content += '<td><img src="' + s.image + '" alt="" class="img-fluid" width="70px"></td>';
                    cart_content += '<td>' + s.title + '<br>(' + s.package_name + ')</td>';
                    cart_content += '<td>$' + s.price + ' </td>';
                    cart_content += '<td class="product-variable-quantity product_quantity"><input min="1" max="100" value="' + s.quantity + '" type="number" data-product-quantity-id="' + s.product + '" data-product-package-id="' + s.package + '"></td>';
                    cart_content += '<td>$' + s.total + '</td>';


                    cart_content += '</tr>';
                });
                $('.hide-until-load ').show();
            } else {
                $('.my-cart-is-empty').show();
                $('.item-count').hide();
                cart_content += '<li>Vaša korpa je prazna, istražite našu kolekciju product(s)!</li>';
                cart_content += '<li><a href="/home/shop" class=" btn btn-block btn-golden mt-5">Pogledaj katalog</a></li>';
            }

            $('#products_price').html(e.price);
            $('#full_price').html('$' + e.full_price);
            // $('#full_price').html('$' + e.price);
            $('#shipping').html("$0.00");

            $("input[type='radio'][name='shipping']").click(function () {
                const shippingCost = $(this).val();
                $('#shipping').html('$' + shippingCost);

                changeShippingCost(parseInt(shippingCost));

                const newFullPrice = parseInt(e.full_price) + parseInt(shippingCost);
                $('#full_price').html('$' + newFullPrice);
            });

            $('#discount_amount').html(e.discount_amount);
            $('#coupon_code').val(e.discount_code);


            $('#result_card').html(cart_content);
            // console.log(e);
        },
        complete: function () {
            $('.cart-loader').hide();
            loading(0);
        },
        error: function (e) {
            // location.reload();
        }
    });
    return false
}
cart_page();

function remove_product(id) {
    $.when(remove(id)).then(cart_page());
}

function update_cart() {
    $.when(update_cart_ajax()).then(cart_page());
    // $.when(update_cart_ajax()).then(cart_page()).then(location.reload());
}

function update_cart_ajax() {
    $('input[data-product-quantity-id]').each(function (i, s) {
        var product = $(this).data('product-quantity-id');
        var package = $(this).data('product-package-id');
        var quantity = $(this).val();
        $.ajax({
            type: 'POST',
            url: ' /response/shop/change',
            dataType: 'json',
            data: { product: product, quantity: quantity, package: package },
            success: function (e) {
                console.log(e);
            },
            complete: function (e) { },
            error: function (e) {
                // location.reload();
            }
        });
    });
    return false;
}

function addCoupon() {
    var code = $('#coupon_code').val();

    // cart_page_loading();
    $.ajax({
        type: 'POST',
        url: ' /response/shop/check_discount_code',
        dataType: 'json',
        data: { code: code },
        success: function (e) {
            notify(e.message, e.error);
            if (e.error) {
                setTimeout(function () {
                    location.reload();
                }, 2500);
            }
        },
        complete: function () {
            $('.cart-loader').hide();
        },
        error: function (e) {
            // location.reload();
        }
    });
    return false
}