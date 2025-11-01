<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Payment</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="/home/shop">Shop</a></li>
                                <li class="active" aria-current="page">Payment</li>
                            </ul>
                        </nav>
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
                    <p>PLEASE NOTE THAT YOU WILL BE REDIRECTED TO OUR PROTECTED CHECKOUT PAGE. <br>
WE TAKE YOUR DATA AND PRIVACY VERY SERIOUSLY, AND THIS IS OUR WAY TO KEEP THIS PURCHASE 100% SAFE. <br>
YOU CAN EXPECT SHIPPING OF YOUR PACKAGE IN 24-48H.<br>
THANK YOU FOR YOUR CONTINUOUS TRUST AND SUPPORT.</p>
                    <?php if (count($data['order'])) : ?>
                        <div class="table-responsive">
                            <p><b>Order summary:</b></p>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>Product</td>
                                        <td>Price</td>
                                        <td>Quantity</td>
                                        <td>Total</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0;
                                    #echo "<pre>";
                                    #print_r($data['order']);
                                    #echo "</pre>";
                                    foreach ($data['order'] as $product) : if (!empty($product['product_name'])) : ?>
                                            <tr>
                                                <td><?= $product['product_name'] ?></td>
                                                <td>$ <?= $product['product_price'] ?></td>
                                                <td><?= $product['quantity'] ?></td>
                                                <td>$ <?= number_format($product['quantity'] * $product['product_price'], 2, ".", ",") ?></td>
                                            </tr>
                                    <?php $total += $product['quantity'] * $product['product_price'];
                                        endif;
                                    endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <?php $shipping_cost = 0 ?>
                                    <?php #$shipping_cost = isset($_SESSION['shippingCost']) ? $_SESSION['shippingCost'] : 0; ?>
                                    <tr>
                                        <td colspan="3" class="text-right">Sub total:</td>
                                        <td class="text-center">$ <?= number_format($total, 2, ".", ",") ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-right">Discount:</td>
                                        <td class="text-center">$ <?= number_format($data['details']['discount'], 2, ".", ",") ?></td>
                                    </tr>
                                    <!-- <tr>
                                        <td colspan="3" class="text-right">Shipping:</td>
                                        <td class="text-center">$ <?= number_format($shipping_cost, 2, ".", ",") ?></td>
                                    </tr> -->
                                    <tr>
                                        <th colspan="3" class="text-right">Total amount:</th>
                                        <th class="text-center">$ <?= number_format($total - $data['details']['discount'] + $shipping_cost, 2, ".", ",") ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <?php $pay = $data['details']; ?>
                        <pre>
                        <?php
                        //print_r($pay);
                        ?>
                        </pre>

                    <form action="https://cankersorefree.com/wp-json/canker/v1/redirect-checkout">
                      <input type="hidden" name="amount" value="<?= $data['details']['price'] - $data['details']['discount'] ?>"/>
                      <input type="hidden" name="email" value="<?= $pay['email']?>"/>
                      <input type="hidden" name="firstName" value="<?= $pay['firstname']?>"/>
                      <input type="hidden" name="lastName" value="<?= $pay['lastname']?>"/>
                      <input type="hidden" name="country" value="<?= $pay['country']?>"/>
                      <input type="hidden" name="address1" value="<?= $pay['street']?>"/>
                      <input type="hidden" name="address2" value="<?= $pay['apartment']?>"/>
                      <input type="hidden" name="city" value="<?= $pay['city']?>"/>
                      <input type="hidden" name="state" value="<?= $pay['state']?>"/>
                      <input type="hidden" name="phone" value="<?= $pay['phone']?>"/>
                      <input type="hidden" name="zip" value="<?= $pay['zip']?>"/>
                      <input type="hidden" name="returnUrl" value="https://smartdrugsx.com/home/success/"/>
                      <input type="hidden" name="orderId" value="<?= $data['id'] ?>" />
                      <input type="hidden" name="siteUrl" value="https://smartdrugsx.com" />
                      <input type="submit"  class="btn btn-lg btn-golden px-5" value="Proceed to Payment" />
                    </form>
                    <?php else : ?>
                        <p class="font-weight-bold">Order doesn't exist!</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>