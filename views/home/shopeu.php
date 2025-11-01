<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper mb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Shop</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li class="active" aria-current="page">EU TO EU </li>
                            </ul>
                        </nav> <!--
                        <p style=" color: #f79e00; font-weight: 600; margin-top: 2rem;margin-bottom: 0; ">
                            What makes our service unique:  
                            100% Guaranteed FREE Worldwide Delivery on all orders in 2 to 8 business days.
                            <ul class="text-center">
                                <li class="d-block">100% Guaranteed FREE Worldwide Delivery</li>
                                <li class="d-block">EU orders delivery 2-4 days</li>
                                <li class="d-block">US orders 6-9 business days</li>
                                <li class="d-block">UK orders 2-4 days</li>
                                <li class="d-block">Australia & New Zealand 9-12 business days</li>
                            </ul>
                            100% Guaranteed FREE Shipping<br>
                            EU to EU ONLY<br>
                            3-7 Days Delivery
                        </p>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="shop-section">
    <div class="container">
        <div class="row flex-lg-row">
            <div class="col-lg-3 d-none">
                <div class="siderbar-section" data-aos="fade-up" data-aos-delay="0">
                    <div class="sidebar-single-widget">
                        <h6 class="sidebar-title">Categories</h6>
                        <div class="sidebar-content">
                            <ul class="sidebar-menu" id="collections">
                                <?php foreach ($data['collections']['categories'] as $collection) : ?>
                                    <li><a href="/home/shop/<?= $collection['url'] ?>"><?= $collection['name'] ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <hr class="my-5" style=" color: #00000085; height: 2px; ">
                    </div>
                </div>
            </div>
            <div class="col-lg-9 mx-auto">
                <div class="sort-product-tab-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <img src="/assets/pictures/baner.png" alt="" class="w-100">
                            </div>
                            <div class="col-12">
                                <div class="tab-content tab-animate-zoom">
                                    <div class="tab-pane sort-layout-single active" id="layout-3-grid">
                                        <div class="row">
                                            <?php if (count($data['collections']['products'])) : ?>
                                                <?php foreach ($data['collections']['products'] as $product) : ?>
                                                    <div class="col-xl-4 col-sm-6 col-12">
                                                        <div class="product-default-single-item product-color--golden">
                                                            <div class="image-box">
                                                                <a href="/home/product/<?= $product['id'] ?>" class="image-link">
                                                                    <img src="<?= $product['main_image'] ?>" alt="">
                                                                </a>
                                                                <?php if ($product['compare_price'] && $product['compare_price'] > $product['selling_price']) : ?>
                                                                    <div class="tag">
                                                                        <span>-<?= $product['discount'] ?>% DISCOUNT</span>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="action-link">
                                                                    <div class="action-link-left">
                                                                        <a href="/home/product/<?= $product['id'] ?>">view product</a>
                                                                        <!-- <a href="/#" data-product-quantity="1" data-product-id="<?= $product['id'] ?>">view product</a> -->
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="content">
                                                                <div class="content-left">
                                                                    <h6 class="title"><a href="/home/product/<?= $product['id'] ?>"><?= $product['title'] ?></a></h6>
                                                                    <ul class="review-star">
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="content-right">
                                                                    <?php if ($product['compare_price'] && $product['compare_price'] > $product['selling_price']) : ?>
                                                                        <span class="price"><del>$<?= $product['compare_price'] ?></del> $<?= $product['selling_price'] ?></span>
                                                                    <?php else : ?>
                                                                        <span class="price">
                                                                            <?php if ($product['price_min'] > 0) :  ?>
                                                                                $<?= $product['price_min'] ?>
                                                                                <!-- $<?= $product['price_min'] == $product['price_max'] ? $product['price_min'] : $product['price_min'] . " - $" . $product['price_max'] ?> -->
                                                                            <?php endif; ?>
                                                                        </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <div class="col-sm-6 mx-auto">
                                                    <div class="emptycart-content text-center">
                                                        <p class="sub-title mb-4 text-none"><span class="mini">Nismo pronašli proizvode za datu pretragu.</span></p>
                                                        <div class="image">
                                                            <img class="img-fluid" src="/assets/img/product-not-found.png" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>