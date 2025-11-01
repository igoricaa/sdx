<?php $product = $data['product']['data']; ?>
<input type="hidden" id="compare_price" value="<?= dc2($product['compare_price']) ?>">
<div class="breadcrumb-section breadcrumb-bg-color--golden d-none">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title"><?= $product['title'] ?> </h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="/home/shop">Proizvodi</a></li>
                                <li class="active" aria-current="page"><?= $product['title'] ?> </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-details-section mt-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="product-details-gallery-area" data-aos="fade-up" data-aos-delay="0">
                    <div class="product-large-image product-large-image-horaizontal swiper-container">
                        <div class="swiper-wrapper">
                            <?php if (count($data['product']['images'])) : ?>
                                <?php foreach ($data['product']['images'] as $image) : ?>
                                    <div class="product-image-large-image swiper-slide zoom-image-hover1 img-responsive">
                                        <img src="<?= $image['url'] ?>" alt="">
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="product-image-large-image swiper-slide zoom-image-hover1 img-responsive">
                                    <img src="/assets/theme/images/product/default/home-1/default-2.jpg" alt="">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="product-image-thumb product-image-thumb-horizontal swiper-container pos-relative mt-5">
                        <div class="swiper-wrapper">
                            <?php if (count($data['product']['images'])) : ?>
                                <?php if (count($data['product']['images']) > 1) : ?>
                                    <?php foreach ($data['product']['images'] as $image) : ?>
                                        <div class="product-image-thumb-single swiper-slide">
                                            <img class="img-fluid" src="<?= $image['url'] ?>" alt="">
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php else : ?>
                                <div class="product-image-thumb-single swiper-slide">
                                    <img class="img-fluid" src="/assets/theme/images/product/default/home-1/default-1.jpg" alt="">
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="gallery-thumb-arrow swiper-button-next"></div>
                        <div class="gallery-thumb-arrow swiper-button-prev"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="product-details-content-area product-details--golden" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-details-text">
                        <h1 class="title"><?= $product['title'] ?> ®</h1>
                        <div class="d-flex align-items-center">
                            <ul class="review-star">
                                <li class="fill"><i class="ion-android-star"></i></li>
                                <li class="fill"><i class="ion-android-star"></i></li>
                                <li class="fill"><i class="ion-android-star"></i></li>
                                <li class="fill"><i class="ion-android-star"></i></li>
                                <li class="fill"><i class="ion-android-star"></i></li>
                            </ul>
                            <a href class="customer-review ml-2">( customer reviews )</a>
                        </div>
                        <div class="price">
                            <?php if ($data['product']['package_prices'][0] != 0) : ?>
                                $<?= $data['product']['package_prices'][0] ?>
                                <!-- $<?= $data['product']['package_prices'][0] ==  $data['product']['package_prices'][1] ? $data['product']['package_prices'][0] : $data['product']['package_prices'][0] . " - $" . $data['product']['package_prices'][1] ?> -->
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if ($data['product']['product_package']) : ?>
                        <div class="variable-single-item">
                            <span>Package</span>
                            <select class="product-variable-size" id="package">
                                <?php foreach ($data['product']['product_package'] as $pack) : ?>
                                    <option value="<?= $pack['id'] ?>"><?= $pack['name'] ?> - $<?= $pack['price'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="product-quantity-order mt-3">
                            <span style="display: block; margin-bottom: 5px; font-weight: 600; text-transform: capitalize; color: #24262b;">Quantity</span>
                            <div class="input-group mb-3 text-center" style=" background-color: #fff; border-radius: 5px; border: solid 1px #e8e8e8; ">
                                <div class="input-group-prepend">
                                    <button style=" margin: 0; border: 0; background: transparent; " class="btn prod-quant" type="button" onclick='addQ(0)'><i class="fa fa-minus"></i></button>
                                </div>
                                <input type="number" class="form-control prod-quant-input text-center" value="1" min="1" id="quantity" style=" background: transparent; border: 0; ">
                                <div class="input-group-append">
                                    <button style=" margin: 0; border: 0; background: transparent; " class="btn prod-quant" type="submit" onclick='addQ()'><i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <a href class="btn btn-golden btn-block btn-lg my-2 btn-rounded" data-product-id="<?= $product['id'] ?>">Add to cart</a>
                    <?php else : ?>
                        <?php if ($product['compare_price'] > 0) : ?>
                            <div class="price">
                                <div class="compare_price">$<?= $product['compare_price'] ?> </div>
                                <div class="selling_price">
                                    <span class="text-theme-primary">$<?= $product['selling_price'] ?> </span>
                                    <span class="discount-value">Save $<?= $product['compare_price'] - $product['selling_price'] ?> </span>
                                </div>
                                <div id="fix-padding" style="height: 18px;"></div>
                                <div id="quantity_discount_price" style="display:none">
                                    <span class="text-theme-primary">$
                                        <span id="discounted_price_new"></span>
                                    </span>
                                    <span class="discount-value">Save $
                                        <span id="discounted_usteda"></span>
                                    </span>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="price">$<?= $product['selling_price'] ?> </div>
                        <?php endif; ?>
                        <?php if (count($data['product']['quantity_discount'])) : ?>
                            <div class="table-responsive mt-5" data-aos="fade-up" data-aos-delay="250" id="quantity_discount">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Price per package</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['product']['quantity_discount'] as $discount) : ?>
                                            <tr class="discount-info" data-quantity-amount="<?= $discount['quantity'] ?>" data-quantity-price="<?= dc2($product['selling_price'] - $discount['discount']) ?>">
                                                <td><?= $discount['quantity'] ?>+</td>
                                                <td>$<?= dc2($product['selling_price'] - $discount['discount']) ?> </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td class="text-none" colspan="2">Za veće količine pozvati za dogovor</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <?php if (count($data['product']['description'])) : ?>
                    <ul class="sophia-drop mt-5" data-aos="fade-up" data-aos-delay="250">
                        <?php foreach ($data['product']['description'] as $desc) : ?>
                            <li class="q">
                                <?= $desc['title'] ?>
                            </li>
                            <li class="a">
                                <?= nl2br(htmlspecialchars_decode($desc['content'])) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <div class="product-description mt-3" data-aos="fade-up" data-aos-delay="0" style="color:#000;">
                    <div class="product-describe"><?= nl2br(htmlspecialchars_decode($product['description'])) ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-details-content-tab-section section-top-gap-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product-details-content-tab-wrapper aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">

                    <!-- Start Product Details Tab Button -->
                    <ul class="nav tablist product-details-content-tab-btn d-flex justify-content-center">
                        <li><a class="nav-link active" data-bs-toggle="tab" href="#review">
                                Reviews (<?= count($data['reviews']) ?>)
                            </a></li>
                    </ul> <!-- End Product Details Tab Button -->

                    <!-- Start Product Details Tab Content -->
                    <div class="product-details-content-tab">
                        <div class="tab-content">
                            <div class="tab-pane active" id="review">
                                <div class="single-tab-content-item">
                                    <!-- Start - Review Comment -->
                                    <ul class="comment">
                                        <!-- Start - Review Comment list-->
                                        <?php foreach ($data['reviews'] as $review) : ?>

                                            <li class="comment-list">
                                                <div class="comment-wrapper">
                                                    <div class="comment-img">
                                                        <img src="/assets/img/sdxuser1.png" alt="">
                                                    </div>
                                                    <div class="comment-content">
                                                        <div class="comment-content-top">
                                                            <div class="comment-content-left">
                                                                <h6 class="comment-name"><?= $review['customer'] ?></h6>
                                                                <h5 class="comment-name"><?= $review['title'] ?></h5>
                                                                <ul class="review-star">
                                                                    <?php for ($i = 0; $i < $review['stars']; $i++) : ?>
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <?php endfor; ?>
                                                                    <?php for ($i = 0; $i < 5 - $review['stars']; $i++) : ?>
                                                                        <li class="empty"><i class="ion-android-star"></i></li>
                                                                    <?php endfor; ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="para-content"><?= $review['review'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>

                                    </ul> <!-- End - Review Comment -->
                                    <div class="review-form">
                                        <div class="review-form-text-top">
                                            <h5>ADD A REVIEW</h5>
                                            <p>Your email address will not be published. Required fields are marked
                                                *</p>
                                        </div>

                                        <form action="#" id="postReview" onsubmit="postReview();return false;">
                                            <input type="hidden" value="<?= $product['id'] ?>" name="product">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="default-form-box">
                                                        <label for="comment-name">Your name <span>*</span></label>
                                                        <input id="comment-name" type="text" placeholder="Enter your name" name="customer" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="default-form-box">
                                                        <label for="comment-email">Your Email <span>*</span></label>
                                                        <input id="comment-email" type="email" placeholder="Enter your email" name="email" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="default-form-box">
                                                        <label for="comment-title">Title <span>*</span></label>
                                                        <input id="comment-title" type="text" placeholder="Enter title" name="title" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="default-form-box">
                                                        <label for="comment-stars">Rate <span>*</span></label>
                                                        <select id="comment-stars" type="text" placeholder="Enter stars" class="0w-100" name="stars" required="">
                                                            <option value="5">5 ⭐⭐⭐⭐⭐</option>
                                                            <option value="4">4 ⭐⭐⭐⭐</option>
                                                            <option value="3">3 ⭐⭐⭐</option>
                                                            <option value="2">2 ⭐⭐</option>
                                                            <option value="1">1 ⭐</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="default-form-box">
                                                        <label for="comment-review-text">Your review
                                                            <span>*</span></label>
                                                        <textarea id="comment-review-text" placeholder="Write a review" name="review" required=""></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-md btn-black-default-hover" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- End Product Details Tab Content Singel -->
                        </div>
                    </div> <!-- End Product Details Tab Content -->

                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-default-slider-section section-top-gap-100 section-fluid">
    <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap">
                        <div class="secton-content">
                            <h3 class="section-title">RELATED PRODUCTS</h3>
                            <p>Browse the collection of our related products.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-slider-default-1row default-slider-nav-arrow">
                        <div class="swiper-container product-default-slider-4grid-1row">
                            <div class="swiper-wrapper">
                                <?php foreach ($data['product']['related'] as $product) : ?>
                                    <div class="product-default-single-item product-color--golden swiper-slide">
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
                                                    <a href="/home/product/<?= $product['id'] ?>">View product</a>

                                                    <!-- <a href data-product-quantity="1" data-product-id="<?= $product['id'] ?>">Add to cart</a> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="content-left">
                                                <h6 class="title"><a href="/home/product/<?= $product['id'] ?>"><?= $product['title'] ?> </a></h6>
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
                                                    <span class="price"><del>$<?= $product['compare_price'] ?> </del> $<?= $product['selling_price'] ?> </span>
                                                <?php else : ?>

                                                    <span class="price">
                                                        $<?= $product['price_min']?>
                                                        <!-- $<?= $product['price_min'] == $product['price_max'] ? $product['price_min'] : $product['price_min'] . " - $" . $product['price_max'] ?> -->
                                                    </span>
                                                <?php endif; ?>
                                            </div>






                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>