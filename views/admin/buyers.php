<div class="row">
    <div class="col-12">
        <a target="_blank" href="/admin/buyers&export" class="btn btn-primary mb-3">Download</a>
        <div class="card">
            <div class="card-body">
                <?php foreach ($data['buyers'] as $sub) : ?>
                    <p><?= $sub['email'] ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>