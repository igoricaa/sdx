<div class="row">
    <div class="col-12">
        <a href="/admin/reviews" class="btn btn-sm btn-dark mb-4"><< Back</a>
        <br>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover nowrap-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Customer</th>
                                <th>Review</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($data['review'] as $review) : ?>
                                <tr>
                                    <td><?= $i++ ?>.</td>
                                    <td><?= $review['customer'] ?> (<?= $review['email'] ?>)</td>
                                    <td><?= $review['stars'] ?>* <?= $review['title'] ?><br><?= $review['review'] ?></td>
                                    <td>
                                        <?php if ($review['status'] == 1) : ?>
                                            <a href="#" class="btn btn-sm btn-danger" onclick="sendReview(2, <?= $review['id'] ?>)">Delete</a>
                                        <?php else : ?>
                                            <a href="#" class="btn btn-sm btn-success" onclick="sendReview(1, <?= $review['id'] ?>)">Approve</a>
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