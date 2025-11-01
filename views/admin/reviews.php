<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover nowrap-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Product</th>
                                <th>Customer</th>
                                <th>Review</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($data['customer_reviews'] as $review) : ?>
                                <tr>
                                    <td><?= $i++ ?>.</td>
                                    <td><?=$review['product']?></td>
                                    <td><?=$review['customer']?> (<?=$review['email']?>)</td>
                                    <td><?=$review['stars']?>* <?=$review['title']?><br><?=$review['review']?></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-danger"  onclick="sendReview(2, <?=$review['id']?>)">Decline</a>
                                        <a href="#" class="btn btn-sm btn-success" onclick="sendReview(1, <?=$review['id']?>)">Approve</a>
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
                                <th>Product</th>
                                <th>Reviews</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($data['reviews'] as $review) : ?>
                                <tr>
                                    <td><?= $i++ ?>.</td>
                                    <td><a href="/admin/review/<?=$review['id']?>"><?=$review['title']?></a></td>
                                    <td><?=$review['reviews']?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>