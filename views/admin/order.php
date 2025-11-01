<!-- <pre>
    <?php print_r($data['order']); 
    ?>
</pre> -->
<?php if (isset($data['order']['data']['id']) && $data['order']['data']['id'] > 0) : ?>
    <?php $order = $data['order']; ?>
    <div class="container">
        <div class="row">
            <div class="mb-3 col-lg-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="font-weight-bold"><i class="far fa-circle text-warning"></i> Proizvodi</p>
                        <div class="table-responsive">
                            <table class="table mb-0 table-borderless nowrap-table" id="order_info">
                                <?php foreach ($order['cart'] as $product) : ?>
                                    <tr style="<?= $product['product_name'] == "0 (0)" ? "display:none" : "" ?>">
                                        <td>
                                            <img src="<?= $product['img'] ?>">
                                        </td>
                                        <td>
                                            <a href="#"><?= $product['product_name'] ?></a>
                                        </td>
                                        <td>$<?= dec2($product['product_price']) ?> x <?= $product['quantity'] ?></td>
                                        <td>$<?= dec2($product['product_price'] * $product['quantity']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right bg-white">
                        <?php if ($order['data']['status'] == 0) : ?>
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#send-info">Označi kao poslato</a>
                        <?php elseif ($order['data']['status'] == 1) : ?>
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#sent-info">Pošiljka je poslata</a>
                        <?php elseif ($order['data']['status'] == 2) : ?>
                            <span class="text-danger">Pošiljka je vraćena!</span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="font-weight-bold"><i class="far fa-circle text-success"></i> Obračun</p>
                        <div class="table-responsive">
                            <table class="table mb-0 table-borderless nowrap-table table-sm" id="order_info">
                                <?php 
                                if($order['data']['is_paypal']){
                                    ?>
                                    
                                <tr>
                                    <th>Payment</th>
                                    <td class="text-right" colspan=2><strong>PAYPAL</strong></td>
                                </tr>
                                    
                                    <?php
                                }
                                
                                
                                ?>
                                <tr>
                                    <th>Total</th>
                                    <td><?= $order['data']['items'] ?> product(s)</td>
                                    <td class="text-right">$<?= dec2($order['data']['price']) ?></td>
                                </tr>
                                <tr>
                                    <th>Popust</th>
                                    <td><?= $order['data']['discount_code'] ?></td>
                                    <td class="text-right">$<?= dec2($order['data']['discount']) ?></td>
                                </tr>
                                <!-- <tr>
                                <th>Poštarina</th>
                                <td>x KG</td>
                                <td class="text-right">220.00 $</td>
                            </tr> -->
                                <tr>
                                    <th>Total</th>
                                    <td></td>
                                    <td class="text-right">$<?= dec2($order['data']['price'] - $order['data']['discount']) ?></td>
                                    <!-- <td class="text-right">$<?= dec2($order['data']['price'] - $order['data']['discount']) ?></td> -->
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <p class="font-weight-bold"><i class="far fa-circle text-warning"></i> Coinpayments</p>
                        <?php foreach ($order['coinpayments'] as $cps) : ?>
                            <p>Status: <?= $cps['description'] ?>, TXID: <?= $cps['txn_id'] ?>, <a href="<?= $cps['status_url'] ?>" target="_blank">view status</a> </p>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Timeline</h6>
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="form-group">
                                    <label for="usr">Dodaj poruku
                                        <small>(ovo kupac ne vidi)</small>
                                    </label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control py-4" placeholder="#" id="post_note">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="submit" onclick="post_note()">Postavi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <pre>
                        <?php print_r($order); ?>
                    </pre> -->
                        <div id="content">
                            <ul class="timeline">
                                <?php $order['timeline'] = array_reverse($order['timeline']);
                                foreach ($order['timeline'] as $timeline) : ?>
                                    <?php
                                    switch ($timeline['action']) {
                                        case 1:
                                            $action = "Narudžbina";
                                            $content = "Narudžbina kreirana #" . $timeline['checkout_id'] . " od strane kupca " . $order['data']['firstname'] . ' ' . $order['data']['lastname'];
                                            break;
                                        case 2:
                                            $action = "Email o narudžbini";
                                            $content = "Email poruka je poslata na " . $order['data']['email'] . '<br><a href="#" class="mt-2 btn btn-light">Pošalji ponovo</a>';
                                            break;
                                        case 3:
                                            $action = "Napomena";
                                            $content = $timeline['content'];
                                            break;
                                        case 4:
                                            $action = "Izmena podatak o porudžbini";
                                            $content = $timeline['content'];
                                            break;
                                        case 5:
                                            $action = "Izmena podatak o kupcu";
                                            $content = $timeline['content'];
                                            break;
                                        case 6:
                                            $action = "Izmena podatak o adresi dostave";
                                            $content = $timeline['content'];
                                            break;
                                        case 7:
                                            $action = "Narudžbina poslata";
                                            $content = $timeline['content'];
                                            break;
                                        case 8:
                                            $action = "Pošiljka vraćena";
                                            $content = $timeline['content'];
                                            break;
                                        case 9:
                                            $action = "Poslat email";
                                            $content = "Informacije o pošiljci";
                                            break;
                                        case 10:
                                            $action = "Poslat email";
                                            $content = "Informacije o VRAĆENOJ pošiljci";
                                            break;
                                        default:
                                            $action = "Unknown";
                                            $content = "Unknown";
                                    }
                                    ?>
                                    <li class="event" data-date="<?= format_date($timeline['created_date']) ?>">
                                        <h3><?= $action ?></h3>
                                        <p><?= $content ?></p>
                                        <!-- <p>
                                    <a href="-" class="btn btn-light">Resend email</a>
                                </p> -->
                                    </li>
                                <?php endforeach; ?>
                                <!-- <li class="event" data-date="15.02.2021. 22:58">
                                <p>Order confirmation email was sent to Nemanja Momčilović (mneca99@gmail.com).</p>
                            </li>
                            <li class="event" data-date="15.02.2021. 22:58">
                                <h3>FEBRUARY 16 6:05 PM</h3>
                                <p>Nemanja Momčilović placed this order on Online Store (checkout #16875079172252)</p>
                            </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 col-lg-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="font-weight-bold">Napomena</p>
                        <?= $order['data']['note'] ?: '<small class="sub-txt">Kupac nije ostavio napomenu</small>' ?>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="font-weight-bold">Kupac</p>
                        <a href="/admin/customer/<?= $order['data']['email'] ?>"><?= $order['data']['firstname'] . ' ' . $order['data']['lastname'] ?></a>
                        <br>
                        <?= $order['customer']['orders'] ?> porudžbina
                        <hr>
                        <p class="font-weight-bold">Kontakt informacije
                            <a href="#" class="small float-right" data-toggle="modal" data-target="#contact-info">Izmeni</a>
                        </p>
                        <?= $order['data']['email'] ?>
                        <br>
                        <?= $order['data']['phone'] ?>
                        <hr>
                        <p class="font-weight-bold">Podaci za dostavu
                            <a href="#" class="small float-right" data-toggle="modal" data-target="#address-info">Izmeni</a>
                        </p>
                        <?= $order['data']['firstname'] . ' ' . $order['data']['lastname'] ?>,<br>
                        <?= $order['data']['street'] ?>,<br>
                        <?= $order['data']['apartment'] ?>,<br>
                        <?= $order['data']['state'] ?>,<br>
                        <?= $order['data']['zip'] . ' ' . $order['data']['city'] ?>,<br>
                        <?= $order['data']['country'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="modal" id="note-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">Izmeni napomenu</p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Napomena</label>
                    <textarea name="" id="" cols="30" rows="2" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Zatvori</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">Sačuvaj</button>
            </div>
        </div>
    </div>
</div> -->
    <div class="modal" id="contact-info">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title">Izmeni kontakt informacije</p>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form class="modal-body">
                    <input type="hidden" name="ID" value="<?= $order['data']['id'] ?>">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" value="<?= $order['data']['email'] ?>" name="email">
                    </div>
                    <div class="form-group">
                        <label>Broj telefona</label>
                        <input type="text" class="form-control" value="<?= $order['data']['phone'] ?>" name="phone">
                    </div>
                    <div class="form-check mb-0">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" value="1" name="update">Ažuriraj kupca
                        </label>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Zatvori</button>
                    <button type="button" class="btn btn-success" onclick="updateContact()">Sačuvaj</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="address-info">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title">Izmeni podatke za dostavu</p>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form class="modal-body">
                    <input type="hidden" name="ID" value="<?= $order['data']['id'] ?>">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Ime</label>
                                <input type="text" class="form-control" name="firstname" value="<?= $order['data']['firstname'] ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Prezime</label>
                                <input type="text" class="form-control" name="lastname" value="<?= $order['data']['lastname'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Adresa</label>
                        <input type="text" class="form-control" name="street" value="<?= $order['data']['street'] ?>">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Poštanski broj</label>
                                <input type="text" class="form-control" name="zip" value="<?= $order['data']['zip'] ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Grad</label>
                                <input type="text" class="form-control" name="city" value="<?= $order['data']['city'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Država</label>
                        <input type="text" class="form-control" name="country" value="<?= $order['data']['country'] ?>">
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Zatvori</button>
                    <button type="button" class="btn btn-success" onclick="updateAddress()">Sačuvaj</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal" id="send-info">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title">Informacije o pošiljki</p>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form class="modal-body">
                    <input type="hidden" name="order" value="<?= $order['data']['id'] ?>" id="order_id">
                    <div class="form-group">
                        <label>Broj za praćenje</label>
                        <input type="text" class="form-control" name="tracking">
                    </div>
                    <div class="form-group">
                        <label>Ime brze pošte</label>
                        <input type="text" class="form-control" name="delivery">
                    </div>
                    <div class="form-check mb-0">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" value="1" name="email">Pošalji email kupcu
                        </label>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Zatvori</button>
                    <button type="button" class="btn btn-success" onclick="order_sent()">Potvrdi</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="sent-info">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title">Informacije o pošiljki</p>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form class="modal-body">
                    <input type="hidden" name="order" value="<?= $order['data']['id'] ?>">
                    <div class="form-group">
                        <label>Broj za praćenje</label>
                        <input type="text" class="form-control" name="tracking" disabled>
                    </div>
                    <div class="form-group">
                        <label>Ime brze pošte</label>
                        <input type="text" class="form-control" name="delivery" disabled>
                    </div>
                    <div class="form-check mb-0">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" value="1" name="email">Pošalji email kupcu
                        </label>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Zatvori</button>
                    <button type="button" class="btn btn-warning" onclick="order_return()">Pošiljka se vratila</button>
                </div>
            </div>
        </div>
    </div>


<?php else : ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="font-weight-bold mb-0">Porudžbina ne postoji!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>