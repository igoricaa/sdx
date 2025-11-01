<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h5>Buyers List</h5>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" id="buyer_country_filter" onchange="filterBuyersByCountry()">
                            <?php $selectedRegion = isset($_GET['region']) ? $_GET['region'] : ''; ?>
                            <option value="">All Regions</option>
                            <option value="US" <?= $selectedRegion === 'US' ? 'selected' : '' ?>>US (United States)</option>
                            <option value="UK" <?= $selectedRegion === 'UK' ? 'selected' : '' ?>>UK (United Kingdom)</option>
                            <option value="EU" <?= $selectedRegion === 'EU' ? 'selected' : '' ?>>EU (European Union)</option>
                            <option value="AUS" <?= $selectedRegion === 'AUS' ? 'selected' : '' ?>>Australia</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success btn-block" onclick="exportBuyers()">
                            <i class="fas fa-download"></i> Export
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Total Orders</th>
                                <th>Total Spent</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($data['buyers']) > 0) : ?>
                                <?php $i = 1; foreach ($data['buyers'] as $buyer) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= htmlspecialchars($buyer['email']) ?></td>
                                        <td><?= htmlspecialchars($buyer['firstname'] . ' ' . $buyer['lastname']) ?></td>
                                        <td><?= htmlspecialchars($buyer['phone']) ?></td>
                                        <td><?= htmlspecialchars($buyer['country']) ?></td>
                                        <td><?= htmlspecialchars($buyer['city']) ?></td>
                                        <td><?= $buyer['total_orders'] ?></td>
                                        <td>$<?= number_format($buyer['total_spent'], 2) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="8" class="text-center">No buyers found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function filterBuyersByCountry() {
    var region = document.getElementById('buyer_country_filter').value;
    var url = '/admin/buyers';
    if (region) {
        url += '?region=' + encodeURIComponent(region);
    }
    window.location.href = url;
}

function exportBuyers() {
    var region = document.getElementById('buyer_country_filter').value;
    var url = '/admin/buyers?export=1';
    if (region) {
        url += '&region=' + encodeURIComponent(region);
    }
    window.location.href = url;
}
</script>