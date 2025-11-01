$('#pay_cps').click(function () {
  loading();
  $.ajax({
    type: 'POST',
    url: ' /response/shop/crypto_pay',
    dataType: 'json',
    data: $('form#cps').serialize(),
    success: function (e) {
      if (e.error) {
        window.location.href = e.message;
      } else {
        alert(e.message);
        loading(0);
      }
    },
    error: function (e) {
      // // location.reload();
    },
  });
  return false;
});

function showModalPay() {
  $('body').addClass('modal-open');
  $('#myModalPay').addClass('show');
}

window.onclick = function (event) {
  if ($('#myModalPay').hasClass('show') == true) {
    if ($(event.target).attr('id') == 'myModalPay') {
      $('#myModalPay').removeClass('show');
      $('body').removeClass('modal-open');
    }
  }
};
function Proceed() {
  var input = $('input[name="payment"]:checked').val();
  if (input == 'card') {
    loading();
    //payNowCrypto("BTC", $("#order_id").val(), 1);
    //alert("Working  on it!");
    window.location.href = '/home/card/' + $('#order_id').val();
  } else if (input == 'paypal') {
    loading();
    //payNowCrypto("BTC", $("#order_id").val(), 1);
    //alert("Working  on it!");
    window.location.href = '/home/paypal/' + $('#order_id').val();
  } else if (input == 'zelle') {
    loading();
    // window.location.href = "/home/zelle-payment/"+ $("#order_id").val();\
    payNowZelle($('#order_id').val(), 0);
  } else {
    showModalPay();
  }
}

function payNowZelle(order = 0, type = 0) {
  loading();
  $.ajax({
    type: 'POST',
    url: ' /response/shop/zelle_pay',
    dataType: 'json',
    data: { order: order },
    success: function (e) {
      if (e.error) {
        if (type == 0) {
          window.location.href = e.message;
        } else {
          window.location.href = e.message + '?c';
          // window.location.href = e.message + "?card";
        }
      } else {
        alert(e.message);
        loading(0);
      }
    },
    error: function (e) {
      // // location.reload();
      console.log(e);
    },
  });
}

function payNowCrypto(curr = 'BTC', order = 0, type = 0) {
  loading();
  $.ajax({
    type: 'POST',
    url: ' /response/shop/crypto_pay',
    dataType: 'json',
    data: { currency: curr, order: order },
    success: function (e) {
      if (e.error) {
        if (type == 0) {
          window.location.href = e.message;
        } else {
          window.location.href = e.message + '?c';
          // window.location.href = e.message + "?card";
        }
      } else {
        alert(e.message);
        loading(0);
      }
    },
    error: function (e) {
      // // location.reload();
    },
  });
}
