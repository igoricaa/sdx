<div class="row">
    <div class="col-4">
        <div class="card">
            <form class="card-body" onsubmit="addPromoCode();return false;">
                <div class="form-group">
                    <label>Promo Code:</label>
                    <input type="text" class="form-control" name="code" required>
                </div>
                <div class="form-group">
                    <label>Discount Type:</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="typePercentage" value="1" checked onchange="updateDiscountLabel()">
                            <label class="form-check-label" for="typePercentage">Percentage (%)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="typeFixed" value="2" onchange="updateDiscountLabel()">
                            <label class="form-check-label" for="typeFixed">Fixed Amount ($)</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label id="discountLabel">Discount %:</label>
                    <input type="number" step="0.01" class="form-control" name="discount" id="discountInput" required>
                    <small class="form-text text-muted" id="discountHint">Enter percentage value (e.g., 10 for 10%)</small>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
function updateDiscountLabel() {
    const isPercentage = document.getElementById('typePercentage').checked;
    const label = document.getElementById('discountLabel');
    const hint = document.getElementById('discountHint');

    if (isPercentage) {
        label.textContent = 'Discount %:';
        hint.textContent = 'Enter percentage value (e.g., 10 for 10%)';
    } else {
        label.textContent = 'Discount Amount (USD):';
        hint.textContent = 'Enter fixed dollar amount (e.g., 20 for $20 off)';
    }
}
</script>
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
                                <th>Discount</th>
                                <th>Type</th>
                                <th>Used</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($data['promo_codes'] as $promo) :
                                $isPercentage = ($promo['type'] == 1);
                                $discountDisplay = $isPercentage ? number_format($promo['discount'], 0) . '%' : '$' . number_format($promo['discount'], 2);
                                $typeDisplay = $isPercentage ? 'Percentage' : 'Fixed Amount';
                            ?>
                                <tr>
                                    <td><?= $i++ ?>.</td>
                                    <td><?= $promo['code'] ?></td>
                                    <td><?= $discountDisplay ?></td>
                                    <td><?= $typeDisplay ?></td>
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