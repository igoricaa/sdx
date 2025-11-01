<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php foreach ($data['subscribers'] as $sub) : ?>
                    <p><?= $sub['email'] ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>