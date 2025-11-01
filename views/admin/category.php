<form class="container">
    <input type="hidden" name="ID" value="<?= $data['category']['id'] ?>">
    <div class="row">
        <div class="col-12 mb-3">
            <h4 class="m-0">Izmena kategorije
                <a href="#" id="edit_category" class="btn btn-success float-right">Sačuvaj</a>
            </h4>
        </div>
        <div class="col-lg-8">
            <div class="admin-box">
                <div class="form-group">
                    <label>Naziv</label>
                    <input type="text" class="form-control" name="name" value="<?= $data['category']['name'] ?>">
                </div>
                <div class="form-group mb-0">
                    <label>Opis</label>
                    <textarea name="description" id="" cols="30" rows="3" class="form-control"><?= $data['category']['description'] ?></textarea>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="admin-box">
                <span class="card-desc">Status kategorije</span>
                <div class="form-group mb-0">
                    <select name="status" id="" class="form-control">
                        <option value="0" <?= $data['category']['status'] == 0 ? 'selected' : '' ?>>Aktivan</option>
                        <option value="1" <?= $data['category']['status'] == 1 ? 'selected' : '' ?>>U pripremi</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3">
            <a href="#" id="delete_category" class="btn btn-danger btn-danger-inverse">Obriši kategoriju</a>
        </div>
    </div>
</form>