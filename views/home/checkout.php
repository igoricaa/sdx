<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper mb-2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Checkout</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="/home/shop">Shop</a></li>
                                <li class="active" aria-current="page">Checkout</li>
                            </ul>
<div class="text-center pt-3" style="font-weight:bold;">
  100% Guaranteed FREE Worldwide Delivery<br>

</div>
                        </nav>
                        <!-- <p style=" color: #f79e00; font-weight: 600; margin-top: 2rem;margin-bottom: 0; ">
                            Free Shipping
                            <br>
                            Express Delivery in 2-8 working days
                        </p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="checkout-section">
    <div class="container">
        <div class="checkout_form" data-aos="fade-up" data-aos-delay="400">
            <div class="row">
                <div class="col-lg-6 col-md-6 mx-auto">
                    <form id="checko">
                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <div class="default-form-box">
                                    <label>First Name <span>*</span></label>
                                    <input type="text" name="firstname">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="default-form-box">
                                    <label>Last Name <span>*</span></label>
                                    <input type="text" name="lastname">
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="default-form-box">
                                    <label for="country">Country <span>*</span></label>
                                    <select class="form-control" name="country" id="country" required>
                                        <option value="">Select Country</option>
                                        <?php
                                        $countries = include(DIR . '/sophia/data/countries.php');
                                        foreach ($countries as $country) : ?>
                                            <option value="<?= htmlspecialchars($country) ?>"><?= htmlspecialchars($country) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="default-form-box">
                                    <label>Town / City <span>*</span></label>
                                    <input type="text" name="city">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="default-form-box">
                                    <label>State</label>
                                    <input type="text" name="state">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="default-form-box">
                                    <label>Street address <span>*</span></label>
                                    <input type="text" name="street" class="mb-2" placeholder="House number and street name">
                                    <input type="text" name="apartment" placeholder="Apartment, suite, unit etc. (optional)">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="default-form-box">
                                    <label>Postcode / ZIP <span>*</span></label>
                                    <input type="text" name="zip">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="default-form-box">
                                    <label>Phone <span>*</span></label>
                                    <input type="text" name="phone">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="default-form-box">
                                    <label>Email address<span>*</span></label>
                                    <input type="text" name="email">
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="order-notes">
                                    <label for="order_note">Note</label>
                                    <textarea id="order_note" name="note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>
                            <!-- <div class="col-12 mt-3 mb-5">
                                <div class="default-form-box">
                                    <label for="country">Choose currency</label>
                                    <select class="country_option nice-select wide" name="currency">
                                        <option value="BTC">Bitcoin (BTC)</option>
                                        <option value="LTC">Litecoin (LTC)</option>
                                        <option value="ETH">Ethereum (ETH)</option>
                                        <option value="XRP">Ripple (XRP)</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-12">
                                <input type="submit" class="btn btn-lg btn-golden btn-block" id="checkout" value="Checkout">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>