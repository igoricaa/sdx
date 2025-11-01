function cart_loading() {

    // $('#cart-content').html("");
    // $('.cart-loader').show();
    // $('.hide-until-load ').hide();
    loading();

}

function cart() {
    // cart_loadikng();
    loading();
    $.ajax({
        type: 'POST',
        url: ' /response/shop/cart',
        dataType: 'json',
        success: function (e) {
            var cart_content = "";
            var items = (e.items);
            var price = (e.price);
            if (items > 0) {
                $('.items-in-cart').show();
                $('.items-in-cart').html(items);

                $.each(e.data, function (i, s) {
                    cart_content += '<li class="offcanvas-cart-item-single">';
                    cart_content += '<div class="offcanvas-cart-item-block"><a href="/home/product/' + s.product + '" class="offcanvas-cart-item-image-link"><img src="' + s.image + '" alt="" class="offcanvas-cart-image"></a>';
                    cart_content += '<div class="offcanvas-cart-item-content"><a href="/home/product/' + s.product + '" class="offcanvas-cart-item-link">' + s.title + '</a>';
                    cart_content += '<div class="offcanvas-cart-item-details"><span class="offcanvas-cart-item-details-quantity">' + s.quantity + ' x </span>( ' + s.package_name + ' ) <span class="offcanvas-cart-item-details-price">$' + s.price + '</span></div>';
                    cart_content += '</div>';
                    cart_content += '</div>';
                    cart_content += '<div class="offcanvas-cart-item-delete text-right"><a href="#" class="offcanvas-cart-item-delete" onclick="remove(' + i + ')"><i class="fa fa-trash-o"></i></a></div>';
                    cart_content += '</li>';
                });
                $('.hide-until-load ').show();
            } else {
                // $('.items-in-cart').hide();
                $('.items-in-cart').html(0);

                cart_content += '<li>Your cart is empty.</li>';
                cart_content += '<li><a href="/home/shop" class=" btn btn-block btn-golden mt-5">View products</a></li>';
            }

            $('.total-cart-price').html('$' + price);
            $('.count-cart').html(items);
            $('#cart-content').html(cart_content);
        },
        complete: function () {
            $('.cart-loader').hide();
            loading(0);
        },
        error: function (e) {
            // // location.reload();
        }
    });
}
cart();



function add(product, quantity, package = 0) {
    $.ajax({
        type: 'POST',
        url: ' /response/shop/add',
        dataType: 'json',
        data: { product: product, quantity: quantity, package: package },
        success: function (e) {
            if (e != "" && e != 0) {
                $('#cart_added').attr('src', e);
                $('#modalAddcart').modal('show');
            }
        },
        complete: function (e) {
            cart();
        },
        error: function (e) {
            // // location.reload();
        }
    });
    return false
}

function changeShippingCost(shippingCost) {
    loading();
    $.ajax({
        type: 'POST',
        url: ' /response/shop/changeShippingCost',
        dataType: 'json',
        data: { shippingCost: shippingCost },
        success: function (e) {
            console.log(shippingCost)
        },
        complete: function (e) {
            cart();
        },
        error: function (e) {
            // // location.reload();
        }
    });
}

function remove(id) {
    loading();
    $.ajax({
        type: 'POST',
        url: ' /response/shop/remove',
        dataType: 'json',
        data: { remove: id },
        success: function (e) { },
        complete: function (e) {
            cart();
        },
        error: function (e) {
            // // location.reload();
        }
    });
    // return false
}

$('a[data-product-id]').click(function () {
    cart_loading();
    var product = $(this).data('product-id');
    var quantity = $(this).data('product-quantity');
    // hmm
    var package = $(this).data('product-package');

    if (typeof quantity === "undefined") {
        var quantity = 0;
        if ($("#quantity").length != 0) {
            var quantity = $('#quantity').val();
        }
    }
    if (typeof package === "undefined") {
        var package = 0;
        if ($("#package").length != 0) {
            var package = $('#package').val();
        }
    }
    add(product, quantity, package);
    return false
});


function notify(e, a = !1) {
    var t = (a) ? 'success' : 'error';
    var n = (a) ? 'Uspešno!' : 'Greška!';
    swal(n, e, t);
}


// Question handler
$('.sophia-drop li.q').prepend('<img src="/assets/img/arrow1.svg" />')
$('.sophia-drop li.q').on('click', function () {

    // gets next element
    // opens .a of selected question
    $(this).next().slideToggle("500")

        // selects all other answers and slides up any open answer
        .siblings('li.a').slideUp();

    // Grab img from clicked question
    var img = $(this).children('img');

    // remove Rotate class from all images except the active
    $('img').not(img).removeClass('rotate');

    // toggle rotate class
    img.toggleClass('rotate');

});


function loading(s = true) {
    if (s == true)
        $('#loading').show();
    else
        $('#loading').fadeOut();

}

function copy(id, m) {
    var copyText = document.getElementById(id);
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    document.execCommand("copy");
    $("#" + id).after('<p id="success_copied" class="mb-0 text-success small" style="font-size:10px;opacity:0.8;">' + m + '</p>');
    setTimeout(function () {
        $("#success_copied").fadeOut();
    }, 1000);
    return false;
}
$(document).scroll(function () {
    if ($(window).width() < 960) {
        var scroll = $(this).scrollTop();
        if (scroll > 200) {
            $('.mobile-header').css({ "position": "fixed", "top": "0", "width": "100%", "z-index": 9 });
        } else {
            $('.mobile-header').css({ "position": "static", "top": "auto" });
        }
    }
});

function notify(e, a = !1) {
    var t = (a) ? 'success' : 'error';
    var n = (a) ? 'Success!' : 'Error!';
    swal(n, e, t), loading(0);
}
/**
setTimeout(function () {
    if (getCookie("WelcomePromo") == "") {
        $("#WelcomePromo").modal("show");
        setCookie("WelcomePromo", 1, 31);
    }
}, 2000);
*/

function WelcomePromo() {
    var email = $("#PromoEmail").val();
    $.ajax({
        type: 'POST',
        url: ' /response/shop/subscribe',
        dataType: 'json',
        data: { email: email },
        success: function (e) {
            if (e.error) {
                $("#promoWelc").hide();
                $("#promoHello").show();
            } else {
                alert(e.message)
            }
        },
        error: function (e) {
            // location.reload();
        }
    });

}

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}