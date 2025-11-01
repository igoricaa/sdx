var public = $('#public_key').val();
var stripe = Stripe(public);
var elements = stripe.elements();
var style = {
    base: {
        fontWeight: 400,
        fontFamily: 'Poppins, sans-serif',
        fontSize: '16px',
        lineHeight: '1.5',
        color: '#555',
        backgroundColor: '#fff',
        ':-webkit-autofill': {
            color: '#495057',
        },
        ':focus': {
            outline: 'none',
            borderColor: '#000000',
            boxShadow: '0 0 0 1px #000000',

        }
    },
    invalid: {
        color: '#eb1c26',
    }
};
var cardElement = elements.create('cardNumber', {
    style: style,
});
cardElement.mount('#card_number');
var exp = elements.create('cardExpiry', {
    'style': style,
});
exp.mount('#card_expiry');
var cvc = elements.create('cardCvc', {
    'style': style,
});
cvc.mount('#card_cvc');
var resultContainer = document.getElementById('paymentResponse');
cardElement.addEventListener('change', function(event) {
    if (event.error)
        notify(event.error.message);
});
var form = document.getElementById('paymentFrm');
form.addEventListener('submit', function(e) {
    loading();
    e.preventDefault();
    createToken();
});

function createToken() {
    stripe.createToken(cardElement).then(function(result) {
        if (result.error) {
            loading(0);
            notify(result.error.message);
        } else {
            stripeTokenHandler(result.token);
        }
    });
}

function stripeTokenHandler(token) {
    $('input[name="stripeToken"]').remove();
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
    payment();
}

function payment() {
    loading();
    var frm = $('#paymentFrm').serialize();
    $.ajax({
        type: 'POST',
        url: '/response/shop/payment/',
        dataType: 'json',
        data: frm,
        success: function(e) {
            if (e.error){
                alert(e.message);
                window.location.href="/home/success";
            }else
                alert(e.message);
        },
        complete: function() {
            loading(0);
        },
        error: function(e) {
            alert('unknown error');
            //location.reload();
            
        }
    });
}
