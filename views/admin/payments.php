<div class="row">
    <div class="col-12 mb-3">
        <h4 class="m-0">Proizvodi
        </h4>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-nowrap table-hover table-sm small">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Transaction ID</th>
                                <th>Crypto address</th>
                                <th>Order ID</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($data['payments'] as $payment) : ?>
                                <tr>
                                    <td><?= $payment['id'] ?>.</td>
                                    <td><?= $payment['txn_id'] ?></td>
                                    <td><?= $payment['address'] ?></td>
                                    <td><?= $payment['order_id'] ?></td>
                                    <td>$<?= $payment['usd'] ?></td>
                                    <td><?= number_format($payment['amount'], 8, ".", "") ?> <?= $payment['currency'] ?></td>
                                    <td><a target="_blank" href="<?= $payment['status_url'] ?>"><?= $payment['description'] ?></a></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>