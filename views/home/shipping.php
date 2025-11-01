<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Shipping</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="/home/shop">Shop</a></li>
                                <li class="active" aria-current="page">Shipping</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .shippingCost {
        box-shadow: 0 0 0pt 2px #f89d00;
        background-color: #FEEBCC;
    }

    [type=radio]:checked+p {
        /* box-shadow: 0 0 0pt 2px #f89d00; */
        background-color: #FEEBCC;
    }

    [type=radio]+p {
        width: 100%;
        font-size: 25px;
    }

    [type=radio]+p {
        padding: 1rem;
        position: relative;
        border: 2px solid #F89D00;
        border-radius: 19px;
        font-size: 12px;
    cursor:pointer;
    }
    .form-check-input[type=radio] {
    display: none;
}
.form-check {
    padding: 0;
    text-align: center;
}


</style>
<div class="checkout-section pb-5 mb-5">
    <div class="container">
        <div class="checkout_form" data-aos="fade-up" data-aos-delay="400">
            <div class="row">
                <div class="col-lg-6 col-md-6 mx-auto">
                    <form id="shipping">
                        <div class="row mt-3">
                            <div class="col-6 mt-3 mb-5 pb-5">
                                <div class="form-check">
                                    <label class="form-check-label w-100">
                                        <input type="radio" class="form-check-input shippingCost" name="shippingCost" value="9" checked>
                                        <p>
                                            <b>Express Shipping $9 USD</b>
                                            
                                            <br>
                                            From the EU - Worldwide
                                            <br>
                                            3 to 8 business days
                                            <br>
                                            <br>
                                        </p>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 mt-3 mb-5 pb-5">
                                <div class="form-check">
                                    <label class="form-check-label w-100">
                                        <input type="radio" class="form-check-input shippingCost" name="shippingCost" value="0">
                                        <p>
<b>Free International Shipping $0 USD</b>
                                            
                                            <br>
                                            From India - Worldwide
                                            <br>
                                            9 to 12 business days
                                            <br>
                                            + FREE Sample
                                        </p>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <input class="btn btn-lg btn-golden btn-block" onclick="update_shipping()" value="Checkout">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br class="p-5 m-5">
<script>
    window.location.href="/home/checkout";
</script>