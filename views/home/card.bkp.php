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
                    <style>
                        .field__input {
                            padding: 6px 12px;
                            background-color: white !important;
                            border: 1px solid #ced4da;
                            border-radius: .25rem;
                        }

                        input:-internal-autofill-selected {
                            appearance: menulist-button;
                            background-color: white !important;
                            background-image: none !important;
                            color: -internal-light-dark(black, white) !important;
                        }

                        input:-webkit-autofill,
                        input:-webkit-autofill:hover,
                        input:-webkit-autofill:focus,
                        input:-webkit-autofill:active {
                            -webkit-box-shadow: 0 0 0 30px white inset !important;
                        }
                    </style>

                    <?php if (count($data['order'])) : ?>
                        <input type="hidden" id="public_key" value="pk_live_51NwT28DBKbTPT6LjahtT2VitBT73mS4sa80j5WAmqJYqkMQijN2dU0azwzQNux9ZwFByrPgg1nlTgvJ1dyDWXpWq00waKvNRWp">
                        <div class="row">
                            <div class="col-lg-8 mx-auto mb-5">
                                <form id="paymentFrm">
                                    <input type="hidden" name="order" value="<?= $data['id'] ?>">
                                    <div class="card shadow">
                                        <div class="card-header p-5" style="background-color: #fff;">
                                            <p class="m-0">🔘 Credit card
                                                <br><img class="ml-3" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTADwVdaK1-q4TPyU8LiyQm7pN6rHpNlhU4Og&usqp=CAU" style=" height: 32px; " alt="">
                                                <small style="color: #737373;">and more...</small>
                                            </p>
                                        </div>
                                        <div class="card-body p-5" style="background-color: #fafafa;">
                                            <div class="form-group">
                                                <label>Fullname:</label>
                                                <input type="text" class="form-control" name="name">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label>Email:</label>
                                                <input type="text" class="form-control" name="email">
                                            </div>
                                            <input type="hidden" name="amount" value="<?= $data['details']['price'] - $data['details']['discount'] ?>">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="field__input-wrapper">
                                                            <div class="main">
                                                                <br>
                                                                <label for="card_expiry" class="field__label field__label--visible">Card number</label>
                                                                <div class="field__input field__label--visible" id="card_number"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="field__input-wrapper floating-labels">
                                                            <div class="main">
                                                                <br>
                                                                <label for="card_expiry" class="field__label field__label--visible">Expiration date (MM / YY)</label>
                                                                <div class="field__input" id="card_expiry" placeholder="Expiration date (MM / YY)"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group m-0">
                                                        <div class="field__input-wrapper floating-labels">
                                                            <div class="main">
                                                                <br>
                                                                <label for="card_cvc" class="field__label field__label--visible">Security code</label>
                                                                <div class="field__input" id="card_cvc" placeholder="Security code"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer p-5" style="background-color: #fff;">
                                            <div class="form-group m-0 text-center">
                                                <input type="submit" class="btn btn-primary btn-lg btn-shipping btn-golden" value="Pay now $<?= $data['details']['price'] - $data['details']['discount'] ?>" id="payBtn">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                        <br>
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
                        // print_r($data);
                        ?>



                        </pre>
                        <br>

                    <?php else : ?>
                        <p class="font-weight-bold">Order doesn't exist!</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>