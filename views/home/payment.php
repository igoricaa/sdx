<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper mb-0">
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
                    <?php if ($data['details']): ?>
                        <?php $pay = $data['details']; ?>
                        <?php if (isset($_GET['card'])): ?>
                            <p>
                                You will be able to purchase cryptocurrency (Bitcoin) with your Credit/debit card. In order to
                                succesfully complete your transaction, in the field for cryptocurrency address, copy and paste
                                our cryptocurrency wallet address:
                            </p>
                            <div class="row">
                                <div class="col-md-10 mx-auto">
                                    <div class="form-group mb-3">
                                        <label for="usr"><?= $pay['currency'] ?> Address:</label>
                                        <div class="row">
                                            <div class="col-9">
                                                <input readonly type="text" class="form-control"
                                                    value="13uJHCqg3eHzP3mpxakLRA9ETmGKDCramC" id="crypto-address">
                                            </div>
                                            <div class="col-3 pl-0">
                                                <a href="#" class="btn btn-lg btn-golden btn-block p-1"
                                                    style="margin-top:2.5px;"
                                                    onclick="copy('crypto-address', 'Address has been copied!')">Copy</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="usr"><?= $pay['currency'] ?> Amount:</label>
                                        <div class="row">
                                            <div class="col-9">
                                                <input readonly type="text" class="form-control" value="<?= $pay['amount'] ?>"
                                                    id="crypto-amount">
                                            </div>
                                            <div class="col-3 pl-0">
                                                <a href="#" class="btn btn-lg btn-golden btn-block p-1"
                                                    style="margin-top:2.5px;"
                                                    onclick="copy('crypto-amount', 'Amount has been copied!')">Copy</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="usr">Amount in US$:</label>
                                        <div class="row">
                                            <div class="col-9">
                                                <input readonly type="text" class="form-control" value="<?= $pay['usd'] ?>"
                                                    id="usd-amount">
                                            </div>
                                            <div class="col-3 pl-0">
                                                <a href="#" class="btn btn-lg btn-golden btn-block p-1"
                                                    style="margin-top:2.5px;"
                                                    onclick="copy('usd-amount', 'Amount has been copied!')">Copy</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <p class="text-center">
                                <a href="https://buy.chainbits.com" target="_blank" class="btn btn-lg btn-golden px-5">Proceed
                                    to payment</a>
                            </p>
                            <p>
                                <br>
                                <br>
                                When your transaction is completed, you will receive an email confirmation which should be
                                forwarded to our email address:
                                <b>payment@smartdrugsx.com</b>, as a proof of validity.
                                <br>
                                <br>
                                Once we validate the status of your transaction, your order will be shipped and you will receive
                                an email confirmation.
                            </p>

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
                                        foreach ($data['order'] as $product):
                                            if (!empty($product['product_name'])):
                                                ?>
                                                <tr>
                                                    <td><?= $product['product_name'] ?></td>
                                                    <td>$ <?= $product['product_price'] ?></td>
                                                    <td><?= $product['quantity'] ?></td>
                                                    <td>$
                                                        <?= number_format($product['quantity'] * $product['product_price'], 2, ".", ",") ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            endif;
                                            $total += $product['quantity'] * $product['product_price'];
                                        endforeach;
                                        ?>
                                    </tbody>
                                    <?php if ($data['detailss']['discount'] == 0)
                                        $data['detailss']['discount'] = $total * 0.1; ?>
                                    <?php $shipping_cost = 0; ?>
                                    <?php # $shipping_cost = isset($_SESSION['shippingCost']) ? $_SESSION['shippingCost'] : 0; ?>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="text-right">Sub total:</td>
                                            <td class="text-center">$ <?= number_format($total, 2, ".", ",") ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right">Discount:</td>
                                            <td class="text-center">$
                                                <?= number_format($data['detailss']['discount'], 2, ".", ",") ?>
                                            </td>
                                        </tr>
                                        <!-- <tr>
                                            <td colspan="3" class="text-right">Shipping:</td>
                                            <td class="text-center">$ <?= number_format($shipping_cost, 2, ".", ",") ?></td>
                                        </tr> -->
                                        <tr>
                                            <th colspan="3" class="text-right">Total amount:</th>
                                            <th class="text-center">$
                                                <?= number_format($total - $data['details']['discount'] + $shipping_cost, 2, ".", ",") ?>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        <?php elseif (isset($_GET['zelle'])): ?>
                            <div class="row justify-content-center text-center">
                                <div class="col-md-8">
                                    <p class="fs-4 text-center mb-0">We accept payments via Zelle. Please follow the steps below
                                        to
                                        complete your
                                        order:
                                    </p>
                                    <img class="w-100" src="/assets/img/zelle-qr.png" alt="" width="350">

                                    <p class="fs-4 text-center">Or follow the next steps:</p>
                                    <ol>
                                        <li>1. Open your bank's mobile app or the Zelle app.</li>
                                        <li>2. Send the full amount shown at checkout to the following: <br />
                                            <p class="mb-1">Zelle Email: <strong>reviverecover.llc@gmail.com </strong></p>
                                            <p class="mb-1">Recipient Name: <strong>REVIVE</strong></p>
                                            <p>Total
                                                Amount:
                                                <strong>$<?= number_format($data['details']['price'] - $data['details']['discount'], 2) ?></strong>
                                            </p>
                                        </li>
                                        <li>3. In the note or memo, please include your full name used in the order.</li>
                                    </ol>

                                    <p class="fs-4 font-weight-bold text-center mt-5 mb-2">📌 Important:</p>
                                    <p class="fs-4 text-center">Do not put any other info in the note section.
                                        Orders will be processed after payment is confirmed. If you have any questions or
                                        issues, feel free to contact us at: <a
                                            href="mailto:smartdrugsx@gmail.com">smartdrugsx@gmail.com</a></p>
                                </div>

                                <p class="text-center my-5">
                                    <a href="/home/shop" class="btn btn-lg btn-golden py-2"
                                        style=" color: #f79e00; border-color: #f79e00; background: transparent; ">Continue
                                        shopping</a>
                                </p>
                            </div>

                        <?php else: ?>

                            <div>
                                <div class="alert alert-warning text-center">
                                    Please send exact amount as shown, after you send cryptocurrency we will inform you via
                                    email about transactions status and when it is confirmed.
                                </div>
                                <div class="row">
                                    <div class="col-md-8 mx-auto">
                                        <p class="text-center">
                                            <a href="bitcoin:<?= $pay['address'] ?>?amount=<?= $pay['amount'] ?>">
                                                <img src="<?= $pay['qr_code'] ?>" width="150" alt="">
                                            </a>
                                        </p>
                                        <div class="form-group mb-3">
                                            <label for="usr"><?= $pay['currency'] ?> Address:</label>
                                            <div class="row">
                                                <div class="col-9">
                                                    <input readonly type="text" class="form-control"
                                                        value="<?= $pay['address'] ?>" id="crypto-address">
                                                </div>
                                                <div class="col-3 pl-0">
                                                    <a href="#" class="btn btn-lg btn-golden btn-block p-1"
                                                        style="margin-top:2.5px;" onclick="copy('crypto-address')">Copy</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="usr"><?= $pay['currency'] ?> Amount:</label>
                                            <div class="row">
                                                <div class="col-9">
                                                    <input readonly type="text" class="form-control"
                                                        value="<?= $pay['amount'] ?>" id="crypto-amount">
                                                </div>
                                                <div class="col-3 pl-0">
                                                    <a href="#" class="btn btn-lg btn-golden btn-block p-1"
                                                        style="margin-top:2.5px;" onclick="copy('crypto-amount')">Copy</a>
                                                </div>
                                            </div>

                                        </div>
                                        <?php if ($pay['status'] == "100"): ?>
                                            <p class="font-weight-bold text-success">Payment Complete</p>
                                        <?php elseif ($pay['status'] == "-1"): ?>
                                            <p class="font-weight-bold text-danger">Payment Timed Out</p>
                                        <?php else: ?>
                                            <p>
                                                Cryptocurrency address is valid for next: <span id="address_valid"
                                                    data-time="<?= $pay['timeout'] + $pay['time'] ?>"></span>
                                                <br>
                                                <small style=" color: #777; font-size: 85%; ">*If you can't complete payment in that
                                                    time feel free to submit new order!</small>
                                            </p>
                                        <?php endif; ?>
                                        <p>
                                            Follow transaction status: <a href="<?= $pay['status_url'] ?>"
                                                target="_blank">Transaction status</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <p>Order summary:</p>
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
                                            foreach ($data['order'] as $product): ?>
                                                <tr>
                                                    <td><?= $product['product_name'] ?></td>
                                                    <td>$ <?= $product['product_price'] ?></td>
                                                    <td><?= $product['quantity'] ?></td>
                                                    <td>$
                                                        <?= number_format($product['quantity'] * $product['product_price'], 2, ".", ",") ?>
                                                    </td>
                                                </tr>
                                                <?php $total += $product['quantity'] * $product['product_price'];
                                            endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <!-- <tr>
                                            <td colspan="3" class="text-right">Sub total:</td>
                                            <td class="text-center">$ <?= number_format($total, 2, ".", ",") ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right">Discount:</td>
                                            <td class="text-center">$ <?= number_format($total * 0.1, 2, ".", ",") ?></td>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="text-right">Total amount:</th>
                                            <th class="text-center">$ <?= number_format($total * 0.9, 2, ".", ",") ?></th>
                                        </tr> -->
                                            <?php if ($data['detailss']['discount'] == 0)
                                                $data['detailss']['discount'] = $total * 0.1; ?>
                                            <?php $shipping_cost = 0; ?>
                                            <?php #$shipping_cost = isset($_SESSION['shippingCost']) ? $_SESSION['shippingCost'] : 0; ?>
                                            <tr>
                                                <td colspan="3" class="text-right">Sub total:</td>
                                                <td class="text-center">$ <?= number_format($total, 2, ".", ",") ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-right">Discount:</td>
                                                <td class="text-center">$
                                                    <?= number_format($data['detailss']['discount'], 2, ".", ",") ?>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                            <td colspan="3" class="text-right">Shipping:</td>
                                            <td class="text-center">$ <?= number_format($shipping_cost, 2, ".", ",") ?></td>
                                        </tr> -->
                                            <tr>
                                                <th colspan="3" class="text-right">Total amount:</th>
                                                <th class="text-center">$
                                                    <?= number_format($total - $data['detailss']['discount'] + $shipping_cost, 2, ".", ",") ?>
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <p>
                                    If the procedure of purchasing/transferring cryptocurrency (Bitcoin) is too complicated for
                                    you, send us an email at payment@smartdrugsx.com with your order query, and we'll respond
                                    with detailed instructions for credit/debit card payment, Paypal, Zelle, bank transfer, and
                                    other options.
                                </p>
                                <!-- <div class="d-none">
                                <br>

                                <h4 class="mt-5">How to pay with Bitcoin (cryptocurrency)</h4>
                                <p>
                                    The only method of payment we offer is with cryptocurrencies, like bitcoin. A lot of our customers are new to cryptocurrencies and have never used it before as a method of payment. This guide is to explain how to buy bitcoin using bank transfer or credit card. Since we only ship to countries within Europe, this guide is meant for customers living in Europe.
                                </p>
                                <p>
                                    A site to buy bitcoin is called an exchange. There are many exchanges and the most famous being Coinbase, Kraken and Binance. Although these can be used if you already have an account, our advice is not to, because of the extreme high transaction costs (0.5 milliBTC, which is around 25 euro).
                                </p>
                                <p>
                                    Our recommended exchange is Binance.com, a cheap and trustworthy exchange based in Estonia and operating under European laws. Below we explain how to register, get verified and buy bitcoin with bank transfer or credit card.
                                </p>
                                <h5>- Will government know that I buy Modafinil?</h5>
                                <p>
                                    Absolutely not. Every order you place on our site gets a unique bitcoin wallet address. Only we know which order belongs to what bitcoin address, no one else. Binance only sees that you buy bitcoin and send it over to a certain address, not who the address belongs to.
                                </p>
                                <br>
                                <h4>Sites when you can purchase cryptocurrencies:</h4>
                                <ul class="text-uppercase">
                                    <li>
                                        - <a href="https://www.coinbase.com/" target="_blank">coinbase.com</a>
                                    </li>
                                    <li>
                                        - <a href="https://www.coinmama.com/" target="_blank">coinmama.com</a>
                                    </li>
                                    <li>
                                        - <a href="https://www.coingate.com/" target="_blank">coingate.com</a>
                                    </li>
                                    <li>
                                        - <a href="https://www.binance.com/" target="_blank">binance.com</a>
                                    </li>
                                    <li>
                                        - <a href="https://localbitcoins.com/">localbitcoins.com</a>
                                    </li>
                                </ul>
                                <br>
                            </div> -->
                                <p class="text-center my-5">
                                    <a href="/home/shop" class="btn btn-lg btn-golden py-2"
                                        style=" color: #f79e00; border-color: #f79e00; background: transparent; ">Continue
                                        shopping</a>
                                </p>
                            </div>
                        <?php endif; ?>
                        <br>
                    <?php else: ?>
                        <p class="font-weight-bold">Order doesn't exist!</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>