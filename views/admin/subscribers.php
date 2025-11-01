<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-10">
                        <h5>Subscribers List</h5>
                    </div>
                    <div class="col-md-2">
                        <a href="/admin/subscribers?export=1" class="btn btn-success btn-block">
                            <i class="fas fa-download"></i> Export
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Subscribed At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($data['subscribers']) > 0) : ?>
                                <?php $i = 1; foreach ($data['subscribers'] as $sub) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= htmlspecialchars($sub['email']) ?></td>
                                        <td><?= $sub['subscribed_at'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="3" class="text-center">No subscribers found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>