<script>
    function showAnnouncements(e, t) {
        if (0 === e.length) return;
        var n = document.createElement("ul");
        n.id = "eZZ0lkju", n.className = "text-center py-2 bg-light shadow-lg", n.style.fontWeight = "600", document.body.insertBefore(n, document.body.firstChild);
        let l = [];

        function i(e) {
            e.style.opacity = 0, e.style.display = "";
            let t = +new Date,
                n = function() {
                    e.style.opacity = +e.style.opacity + (new Date - t) / 400, t = +new Date, 1 > +e.style.opacity && (window.requestAnimationFrame && requestAnimationFrame(n) || setTimeout(n, 16))
                };
            n()
        }
        e.forEach(function(e) {
            var t = document.createElement("li");
            t.textContent = e, t.style.display = "none", n.appendChild(t), l.push(t)
        });
        let o = 0;
        i(l[o]), e.length > 1 && setInterval(function() {
            l[o].style.display = "none", l[o].style.opacity = 0, i(l[o = (o + 1) % e.length])
        }, t)
    }
    showAnnouncements([
        "🎃 HALLOWEEN SALE: 15% OFF - Code: BOO15 |LIVE NOW! ⏳",
        //"🚀 Get 20 Pills FREE — leave us 2 reviews of your choice, put the links in your order note and we will add freebies to your order! 🚀",
    "🔥All payment options available!🔥",
        //"🎁 Free samples with your next order when you leave us a review!👉 Just send us your review link, and the freebies are yours!🎁",
        "NO HIDDEN FEES. 24/7 SUPPORT. GUARANTEED FREE SHIPPING.",
        //"If you don't have a Crypto Wallet please reach out and we will be happy to assit you!",
    //Due to the Easter holiday, some delays may occur in processing and shipping. Thank you for your patience.",
    ], 4000);
</script>
<style>
    .main-menu nav>ul>li>a {
        font-size: 17px;
        font-weight: 700;
    }
</style>
<header class="header-section d-none d-xl-block">
    <div class="header-wrapper">
        <div class="header-bottom header-bottom-color--golden section-fluid sticky-header sticky-color--golden shadow">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <div class="header-logo">
                            <div class="logo"><a href="/"><img src="/assets/smartdrugsx/img/logo.svg" alt=""></a></div>
                        </div>
                        <div class="main-menu menu-color--black menu-hover-color--golden">
                            <nav>
                                <ul>
                                    <li><a href="/home/shop">Shop</a></li>
                                    <!-- <li><a href="/home/shopus">US to US</a></li> -->
                                    <li><a href="/home/faq">FAQ</a></li>
                                    <li><a href="/home/contact">Contact</a></li>
                                    <li><a href="/home/blog">Blog</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- <ul class="header-action-link action-color--black action-hover-color--golden">
                            <li><a href="#offcanvas-add-cart" class="offcanvas-toggle"><i class="icon-bag"></i><span class="item-count"></span></a></li>
                        </ul> -->
                        <ul class="header-action-link action-color--black action-hover-color--golden">

                            <li>
                                <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                    <i class="icon-bag"></i>
                                    <span class="item-count items-in-cart">3</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="#search">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </li> -->
                            <li>
                                <a href="#offcanvas-about" class="offacnvas offside-about offcanvas-toggle">
                                    <i class="icon-menu"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header mobile-header-bg-color--golden section-fluid d-lg-block d-xl-none shadow">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-between">
                <div class="mobile-header-left">
                    <ul class="mobile-menu-logo">
                        <li><a href="/">
                                <div class="logo"><img src="/assets/smartdrugsx/img/logo.svg" alt=""></div>
                            </a></li>
                    </ul>
                </div>
                <!-- <div class="mobile-right-side">

                    <ul class="header-action-link action-color--black action-hover-color--golden">
                        <li><a href="#offcanvas-add-cart" class="offcanvas-toggle"><i class="icon-bag"></i><span class="item-count"></span></a></li>
                        <li><a href="#mobile-menu-offcanvas" class="offcanvas-toggle offside-menu"><i class="icon-menu"></i></a></li>
                    </ul>
                </div> -->
                <div class="mobile-right-side">
                    <ul class="header-action-link action-color--black action-hover-color--golden">
                        <!-- <li>
                            <a href="#search">
                                <i class="icon-magnifier"></i>
                            </a>
                        </li> -->
                        <li>
                            <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                <i class="icon-bag"></i>
                                <span class="item-count items-in-cart">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="#mobile-menu-offcanvas" class="offcanvas-toggle offside-menu">
                                <i class="icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
    <div class="offcanvas-header text-right"><button class="offcanvas-close"><i class="ion-android-close"></i></button></div>
    <div class="offcanvas-mobile-menu-wrapper">
        <div class="mobile-menu-bottom">
            <div class="offcanvas-menu">
                <ul style=" margin: auto;  font-weight: 700; font-size: 17px;text-transform:uppercase; ">
                    <li><a href="/home/shop">Shop <i class="ml-3 fa small fa-chevron-right"></i></a></li>
                    <!-- <li><a href="/home/shopus">US to US <i class="ml-3 fa small fa-chevron-right"></i></a></li> -->
                    <li><a href="/home/faq">Faq <i class="ml-3 fa small fa-chevron-right"></i></a></li>
                    <li><a href="/home/contact">Contact <i class="ml-3 fa small fa-chevron-right"></i></a></li>
                    <li><a href="/home/blog">Blog <i class="ml-3 fa small fa-chevron-right"></i></a></li>
                </ul>
            </div>
        </div>
        <br>
        <div class="mobile-contact-info text-left">
            <div class="logo mb-4 mx-0">
                <a href="/"><img src="/assets/smartdrugsx/img/logo-white.svg"></a>
            </div>
            <!-- 
            <address class="address">
                <span>Telefon: 065/422-90-91</span>
                <span>Email: shop@smartdrugsx.com</span>
            </address> -->

            <ul class="social-link">
                <li><a href="https://www.facebook.com/smartdrugsx"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://www.tiktok.com/@smartdrugsx"><i class="fa-brands fa-tiktok"></i></a></li>
                <li><a href="https://www.instagram.com/sdx_online"><i class="fa fa-instagram"></i></a></li>
            </ul>

            <ul class="user-link">
                <li><a href="/home/cart">Shopping Cart</a></li>
                <li><a href="/home/cart" class="floatRight">Checkout</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="hide-until-loads">
    <div id="offcanvas-add-cart" class="offcanvas offcanvas-rightside offcanvas-add-cart-section ">
        <div class="offcanvas-header text-right"><button class="offcanvas-close"><i class="ion-android-close"></i></button></div>
        <div class="offcanvas-add-cart-wrapper">
            <h4 class="offcanvas-title">Shopping Cart</h4>
            <div class="cart-loader"><i class="fas fa-spinner fa-pulse "></i></div>
            <ul class="offcanvas-cart" id="cart-content">

            </ul>
            <div class="hide-until-load">
                <div class="offcanvas-cart-total-price"><span class="offcanvas-cart-total-price-text">Total:</span><span class="offcanvas-cart-total-price-value total-cart-price"></span></div>
                <ul class="offcanvas-cart-action-button">
                    <li><a href="/home/cart" class="btn btn-block btn-golden">View cart</a></li>
                    <li><a href="/home/cart" class=" btn btn-block btn-golden mt-5">Checkout</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas-overlay"></div>
<div style="min-height:45vh;">
    <?php content("$data[view]/$data[page].php", $data); ?>
</div>
<footer class="footer-section footer-bg section-top-gap-100">
    <div class="footer-wrapper">
        <div class="footer-top">
            <div class="container">
                <div class="row mb-n6">
                    <div class="col-lg-3 col-sm-6 mb-6">
                        <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up" data-aos-delay="600">
                            <h5 class="title">SmartDrugsX</h5>
                            <div class="footer-about">
                                <a href="/"><img src="/assets/smartdrugsx/img/logo-white.svg" class="img-fluid"></a>
                                <br>
                                <br>
                                <img src="/assets/img/dmca-website-logo-2022.png" style="max-width:80%;width:110px;background:#fff;padding:.5rem;">
                                <ul class="footer-social-link mt-5">
                                    <li><a href="https://www.facebook.com/smartdrugsx" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://www.tiktok.com/@smartdrugsx" target="_blank"><i class="fa-brands fa-tiktok"></i></a></li>
                                    <li><a href="https://www.instagram.com/sdx_online" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-6">
                        <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up" data-aos-delay="0">
                            <h5 class="title">INFORMATION</h5>
                            <ul class="footer-nav">
                                <li><a href="/home/faq#payment">Payment</a></li>
                                <li><a href="/home/faq#shipping">Shipping</a></li>
                                <li><a href="/home/privacy_policy">Privacy Policy</a></li>
                                <li><a href="/home/return_policy">Return Policy</a></li>
                                <li><a href="/home/terms_and_conditions">Terms and Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-6">
                        <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up" data-aos-delay="200">
                            <h5 class="title">Quick Links</h5>
                            <ul class="footer-nav">
                                <li><a href="/home/faq">Frequently Asked Questions</a></li>
                                <li><a href="/home/contact">Contact</a></li>
                                <li><a href="/home/blog">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-6">
                        <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up" data-aos-delay="400">
                            <h5 class="title">Product Categories</h5>
                            <ul class="footer-nav">
                                <?php foreach ($data['categories'] as $cat) : ?>
                                    <li><a href="/home/shop/<?= $cat['url'] ?>"><?= $cat['name'] ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row justify-content-between align-items-center align-items-center flex-column flex-md-row mb-n6">
                    <div class="col-auto mb-6">
                        <div class="footer-copyright">
                            <p> COPYRIGHT &copy; <a href="https://smartdrugsx.com/" target="_blank">smartdrugsx</a>. ALL RIGHTS RESERVED.</p>
                        </div>
                    </div>
                    <div class="col-auto mb-6">
                        <div class="footer-payment">
                            <!-- <div class="image"><img src="/assets/theme/images/company-logo/payment.png" alt=""></div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="hide-until-loadXXXXXXX">
    <div class="modal fade" id="modalAddcart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content" style=" border-radius: 23px; ">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col text-right"><button type="button" class="close modal-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button></div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="modal-add-cart-product-img">
                                            <img class="img-fluid" src="/assets/smartdrugsx/img/logo.svg" alt="" id="cart_added" width="150px">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="modal-add-cart-info"><i class="fa fa-check-square"></i>Added to cart successfully!</div>
                                        <div class="modal-add-cart-product-cart-buttons"><a href="/home/cart">View cart</a><a href="/home/cart">Checkout</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 modal-border">
                                <ul class="modal-add-cart-product-shipping-info">
                                    <li><strong><i class="icon-shopping-cart"></i> There Are<span class="count-cart"></span> Items In Your Cart.</strong></li>
                                    <li><strong>TOTAL PRICE: </strong>$<span class="total-cart-price"></span></li>
                                    <li class="modal-continue-button mt-5"><a href="#" data-bs-dismiss="modal" class="btn-cst">CONTINUE SHOPPING</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start Offcanvas Mobile Menu Section -->
<div id="offcanvas-about" class="offcanvas offcanvas-rightside offcanvas-mobile-about-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- End Offcanvas Header -->
    <!-- Start Offcanvas Mobile Menu Wrapper -->
    <!-- Start Mobile contact Info -->
    <div class="mobile-contact-info text-left">
        <div class="logo mb-4 mx-0">
            <a href="/"><img src="/assets/smartdrugsx/img/logo-white.svg" alt=""></a>
        </div>
        <!-- 
        <address class="address">
            <span>Address: Your address goes here.</span>
            <span>Call Us: 0123456789, 0123456789</span>
            <span>Email: demo@example.com</span>
        </address> -->

        <ul class="social-link">
            <li><a href="https://www.facebook.com/smartdrugsx" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://www.tiktok.com/@smartdrugsx" target="_blank"><i class="fa-brands fa-tiktok"></i></a></li>
            <li><a href="https://www.instagram.com/sdx_online/" target="_blank"><i class="fa fa-instagram"></i></a></li>
        </ul>

        <ul class="user-link">
            <li><a href="/home/cart">Shopping Cart</a></li>
            <li><a href="/home/cart" class="floatRight">Checkout</a></li>
        </ul>
    </div>
    <!-- End Mobile contact Info -->
</div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->
<!-- Start Offcanvas Search Bar Section -->
<div id="search" class="search-modal">
    <button type="button" class="close">â”œÐ§</button>
    <form action="/home/shop">
        <input type="search" name="search" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-lg btn-golden">Search</button>
    </form>
</div>

<div class="modal fade" id="WelcomePromo">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style=" max-width: 450px; margin: auto; ">
            <div class="modal-body px-5">
                <p class="text-right">
                    <button type="button" class="close" data-dismiss="modal" onclick="$('.modal').modal('hide')">&times;</button>
                </p>
                <div id="promoWelc">
                    <h1 class="text-center font-weight-bold" id="popup-title">UNLOCK 10% OFF <br>your order</h1>
                    <div id="popup-subtitle" class="text-center"></div>
                    <br>
                    <br>
                    <p class="default-form-box"><input type="email" id="PromoEmail" placeholder="Email"></p>
                    <p><a href="#" class="btn btn-golden btn-block btn-lg my-2 btn-rounded" id="popup-button" onclick="WelcomePromo()">Continue</a></p>
                    <p class="small text-center" id="popup-disclaimer">*by submitting this form, you agree to receive promotional and marketing emails.</p>
                    <br>
                    <p class="text-center font-weight-bold"><a href="#" data-dismiss="modal" onclick="$('.modal').modal('hide')" id="popup-dismiss"><u>PAY FULL PRICE</u></a></p>
                </div>
                <div id="promoHello" style="display:none;">
                    <h1 class="text-center" id="popup-thankyou-title">Thank you!</h1>
                    <br>
                    <br>
                    <h5 class="text-center" id="popup-thankyou-message">
                        Use promo code <u><b>10SDX</b></u> at checkout and get 10% off!
                    </h5>
                    <br>
                    <p><button type="button" class="btn btn-golden btn-block btn-lg my-2 btn-rounded" data-dismiss="modal" onclick="$('.modal').modal('hide')" id="popup-thankyou-button">Continue</button>
                    </p>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>