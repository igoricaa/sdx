<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Cart</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="/home/shop">Shop</a></li>
                                <li class="active" aria-current="page">Cart</li>
                            </ul>
<div class="text-center pt-3" style="font-weight:bold;">
    100% Guaranteed FREE Worldwide Delivery<br>
                 With every crypto order 10% off<br>
                      Customer support available for you 24/7

    
</div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="empty-cart-section section-fluid my-cart-is-empty">
    <div class="emptycart-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto offset-md-1 col-xl-4 offset-xl-3">
                    <div class="emptycart-content text-center">
                        <div class="image">
                            <img class="img-fluid" src="/assets/img/empty-cart1.png" alt="">
                        </div>
                        <p class="title"><span class="mini">YOUR CART IS EMPTY</span></p>
                        <p class="sub-title text-none"><span class="mini">Explore our range of products.</span></p>
                        <a href="/home/shop" class="btn btn-lg btn-golden">VIEW PRODUCTS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cart-section hide-until-load">
    <div class="cart-table-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc shadow border-0">
                        <div class="table_page table-responsive">
                            <div class="cart-loader"><i class="fas fa-spinner fa-pulse "></i></div>
                            <table class="hide-until-load ">
                                <thead>
                                    <tr>
                                        <th class="product_remove">Remove</th>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>
                                        <th class="product_total">Total</th>
                                    </tr>
                                </thead> <!-- End Cart Table Head -->
                                <tbody id="result_card"></tbody>
                            </table>
                        </div>
                        <div class="cart_submit hide-until-load">
                            <button class="btn btn-md btn-golden" type="submit" onclick="update_cart()">update cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Cart Table -->

    <!-- Start Coupon Start -->
    <div class="coupon_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">

                    <div class="cart-loader"><i class="fas fa-spinner fa-pulse "></i></div>
                    <div class="coupon_code left hide-until-load" data-aos="fade-up" data-aos-delay="200">
                        <h3>Coupon</h3>
                        <div class="coupon_inner">
                            <p>Enter your coupon code if you have one.

                            </p>
                            <input class="mb-2" placeholder="Coupon code" type="text" id="coupon_code">
                            <button type="submit" class="btn btn-md btn-golden" onclick="addCoupon()">Apply coupon</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">

                    <div class="cart-loader"><i class="fas fa-spinner fa-pulse "></i></div>
                    <div class="coupon_code right hide-until-load" data-aos="fade-up" data-aos-delay="400">
                        <h3>CART TOTALS</h3>
                        <div class="coupon_inner">
                            <div class="cart_subtotal">
                                <p>Subtotal</p>
                                <p class="cart_amount">$<span id='products_price'>215.00</span></p>
                            </div>
                            <div class="cart_subtotal">
                                <p>Discount</p>
                                <p class="cart_amount"> $<span id='discount_amount'>0.00</span></p>
                            </div>
                            <!-- <div class="cart_subtotal ">
                                <p>Shipping</p>
                                <div>
                                    <div class="shipping_options_wrapper">
                                        <input type="radio" id="freeShipping" class="shipping_option" name="shipping" value="0.00" checked />
                                        <label for="freeShipping">
                                            Free International Shipping $0 USD
                                            <br>
                                            From India - Worldwide
                                            <br>
                                            9 to 12 business days
                                            <br>
                                            + FREE Sample
                                        </label>
                                    </div>

                                    <div class="shipping_options_wrapper">
                                        <input type="radio" id="euShipping" class="shipping_option" name="shipping" value="9.00" />
                                        <label for="euShipping">
                                            Express Shipping $9 USD
                                            <br>
                                            From the EU - Worldwide
                                            <br>
                                            3 to 8 business days

                                        </label>
                                    </div>
                                </div>

                                <p class="cart_amount">
                                    <span id='shipping'>x</span>
                                </p>
                            </div> -->
                            <hr>
                            <div class="cart_subtotal">
                                <p>Total</p>
                                <p class="cart_amount"><span id='full_price'>$215.00</span></p>
                            </div>
                            <div class="checkout_btn">
                                <a href="/home/shipping" class="btn btn-md btn-golden">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Coupon Start -->
</div> <!-- ...:::: End Cart Section:::... -->