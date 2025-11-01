<div class="row">
    <div class="col-4">
        <div class="card">
            <form class="card-body" onsubmit="addPromoCode();return false;">
                <div class="form-group">
                    <label>Promo Code:</label>
                    <input type="text" class="form-control" name="code">
                </div>
                <div class="form-group">
                    <label>Discount %:</label>
                    <input type="text" class="form-control" name="discount">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover nowrap-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Promo Code</th>
                                <th>Discount%</th>
                                <th>Used</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($data['promo_codes'] as $promo) : ?>
                                <tr>
                                    <td><?= $i++ ?>.</td>
                                    <td><?= $promo['code'] ?></td>
                                    <td><?= $promo['discount'] ?>%</td>
                                    <td><?= $promo['used'] ?></td>
                                    <td>
                                        <?php if ($promo['status'] == 0) : ?>
                                            <a href="#" class="btn btn-sm btn-danger" onclick="updatePromoCode('<?= $promo['code'] ?>', 1)">Disable</a>
                                        <?php else : ?>
                                            <a href="#" class="btn btn-sm btn-success" onclick="updatePromoCode('<?= $promo['code'] ?>', 0)">Enable</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>