<!-- <pre>
    <?php #print_r($data['customer']);
    ?>
</pre> -->
<?php if (isset($data['customer']['data']['id']) && $data['customer']['data']['id'] > 0) : ?>
    <?php $customer = $data['customer']; ?>
    <div class="container">
        <div class="row">
            <div class="mb-3 col-lg-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <h4 class="font-weight-bold"><i class="far fa-circle text-warning"></i> <?= $customer['data']['email'] ?></h4>
                        <p class="sub-txt ml-4"><?= time_elapsed_string($customer['data']['created_date']) ?></p>
                        <div class="form-group mb-0">
                            <label>Napomena</label>
                            <div class="input-group mb-0">
                                <input type="text" class="form-control" placeholder="Dodaj napomenu" id="post_note">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit" onclick="customer_add_note()">Sačuvaj</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center bg-white">
                        <div class="row py-2">
                            <div class="col-sm-4">
                                <p class="sub-txt p-small text-uppercase mb-0">Poslednja porudžbina</p>
                                <p class="font-weight-bold mb-0"><?= time_elapsed_string($customer['data']['updated_date']) ?></p>
                            </div>
                            <div class="col-sm-4">
                                <p class="sub-txt p-small text-uppercase mb-0">Ukupna potrošnja</p>
                                <p class="font-weight-bold mb-0">$<?= dec2($customer['orders']['spent']) ?></p>
                            </div>
                            <div class="col-sm-4">
                                <p class="sub-txt p-small text-uppercase mb-0">Prosečna porudžbina</p>
                                <p class="font-weight-bold mb-0">$<?= dec2($customer['orders']['average']) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 col-lg-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="font-weight-bold">Napomena</p>
                        <?= $customer['data']['note'] ?: '<small class="sub-txt">Nema napomene</small>' ?>
                        <hr>
                        <p class="font-weight-bold">Pregled kupca</p>
                        <a href="/admin/customer/<?= $customer['data']['email'] ?>"><?= $customer['data']['firstname'] . ' ' . $customer['data']['lastname'] ?></a>
                        <br>
                        <?= ($customer['orders']['total']) ?> porudžbina
                        <hr>
                        <p class="font-weight-bold">Kontakt informacije
                            <a href="#" class="small float-right" data-toggle="modal" data-target="#contact-info">Izmeni</a>
                        </p>
                        <?= $customer['data']['email'] ?>
                        <br>
                        <?= $customer['data']['phone'] ?>
                        <hr>
                        <p class="font-weight-bold">Podaci za dostavu
                            <a href="#" class="small float-right" data-toggle="modal" data-target="#address-info">Izmeni</a>
                        </p>
                        <?= $customer['data']['firstname'] . ' ' . $customer['data']['lastname'] ?><br>
                        <?= $customer['data']['street'] ?><br>
                        <?= $customer['data']['zip'] . ' ' . $customer['data']['city'] ?><br>
                        <?= $customer['data']['country'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="contact-info">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title">Izmeni kontakt informacije</p>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form class="modal-body">
                    <input type="hidden" value="<?= $data['customer']['data']['id'] ?>" name="ID" id="customer_id">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" value="<?= $customer['data']['email'] ?>" name="email1" disabled>
                    </div>
                    <div class="form-group">
                        <label>Broj telefona</label>
                        <input type="text" class="form-control" value="<?= $customer['data']['phone'] ?>" name="phone">
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Zatvori</button>
                    <button type="button" class="btn btn-success" onclick="customer_update_contact()">Sačuvaj</button>
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
                    <input type="hidden" value="<?= $data['customer']['data']['id'] ?>" name="ID" id="">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Ime</label>
                                <input type="text" class="form-control" value="<?= $customer['data']['firstname'] ?>" name="firstname">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Prezime</label>
                                <input type="text" class="form-control" value="<?= $customer['data']['lastname'] ?>" name="lastname">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Adresa</label>
                        <input type="text" class="form-control" value="<?= $customer['data']['street'] ?>" name="street">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Poštanski broj</label>
                                <input type="text" class="form-control" value="<?= $customer['data']['zip'] ?>" name="zip">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Grad</label>
                                <input type="text" class="form-control" value="<?= $customer['data']['city'] ?>" name="city">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Država</label>
                        <input type="text" class="form-control" value="<?= $customer['data']['country'] ?>" name="country">
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Zatvori</button>
                    <button type="button" class="btn btn-success" onclick="customer_update_address()">Sačuvaj</button>
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
                        <p class="font-weight-bold mb-0">Kupac ne postoji!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>