<?php $product = $data['product']['data']; ?>
<form class="container" id="form_product">
    <input type="hidden" name="delete_image[]">
    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
    <input type="hidden" name="ID" value="<?= $product['id'] ?>">
    <div class="row">
        <div class="col-12 mb-3">
            <h4 class="m-0">Izmeni proizvod
                <a href="#" id="edit_product" class="btn btn-success float-right">Sačuvaj</a>
            </h4>
        </div>
        <div class="col-lg-8">
            <div class="admin-box">
                <div class="form-group">
                    <label>Naziv</label>
                    <input type="text" class="form-control" name="name" value="<?= $product['title'] ?>">
                </div>
                <div class="form-group mb-0">
                    <label>Opis</label>
                    <textarea name="description" rows="5" class="form-control"><?= $product['description'] ?></textarea>
                </div>
            </div>
            <div class="admin-box">
                <p class="card-desc">Padajući opis</p>
                <hr>
                <?php foreach ($data['product']['description'] as $desc) : ?>
                    <div class="collapse_item">
                        <div class="form-group "><label>Naziv</label><input value="<?= $desc['title'] ?>" type="text" class="form-control" name="collapse_name[]"></div>
                        <div class="form-group collapse_name mb-0"><label>Opis</label><textarea name="collapse_description[]" rows="2" class="form-control"><?= $desc['content'] ?></textarea></div>
                    </div>
                    <hr>
                <?php endforeach; ?>
                <div id="collapse_description_inputs"></div>

                <p class="text-right mb-0">
                    <a class="btn btn-success px-4" onclick="add_collapse_description()"><i class="fas fa-plus"></i></a>
                </p>
            </div>
            <div class="admin-box">
                <p class="card-desc">Media</p>
                <div class="form-group">
                    <label>Media from PC</label>
                    <input type="file" id="fileElem" class="form-control" multiple accept="image/*" name="media[]">
                </div>
                <div class="row">
                    <?php foreach ($data['product']['img'] as $img) : ?>
                        <div class="col-sm-3 mb-3">
                            <input type="radio" name="main_image" value="<?= $img['id'] ?>" <?= $img['url'] == $product['main_image'] ? 'checked' : '' ?>>
                            <div class="product_img">
                                <span class="delete" data-delete-image="<?= $img['id'] ?>"><i class="far fa-times-circle"></i></span>
                                <img src="<?= $img['url'] ?>">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="admin-box">
                <span class="card-desc">Cenovnik po pakovanju</span>
                <hr class="hr-p-4">
                <?php foreach ($data['product']['product_package'] as $pack) : ?>
                    <div class="row">
                        <div class="col-12">Variant ID: <?= $pack['id'] ?></div>
                        <div class="col-3 pr-0">
                            <div class="form-group"><label>Ime pakovanja</label><input value="<?= $pack['name'] ?>" type="text" class="form-control" placeholder="10" name="package_name[]"></div>
                        </div>
                        <div class="col-9">
                            <div class="form-group"><label>Cena pakovanja</label><input value="<?= $pack['price'] ?>" type="text" class="form-control" placeholder="2500" name="package_price[]"></div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div id="packages_input"></div>
                <p class="text-right mb-0">
                    <a class="btn btn-success px-4" onclick="add_packages_input()"><i class="fas fa-plus"></i></a>
                </p>
            </div>
            <div class="admin-box">
                <div class="form-group">
                    <label>SEO title</label>
                    <input type="text" class="form-control" name="seo_title" value="<?= $product['seo_title'] ?>">
                </div>
                <div class="form-group">
                    <label>SEO keywords</label>
                    <input type="text" class="form-control" name="seo_keywords" value="<?= $product['seo_keywords'] ?>">
                </div>
                <div class="form-group mb-0">
                    <label>SEO description</label>
                    <textarea name="seo_description" cols="30" rows="3" class="form-control"><?= $product['seo_description'] ?></textarea>
                </div>
            </div>

            <p>
                <a href="#" id="delete_product" class="btn btn-danger btn-danger-inverse">Obriši proizvod</a></h4>
            </p>
        </div>
        <div class="col-lg-4">
            <div class="admin-box">
                <span class="card-desc">Product status</span>
                <div class="form-group mb-0">
                    <select name="status" class="form-control">
                        <option value="0" <?= $product['status'] == 0 ? 'selected' : '' ?>>Aktivan</option>
                        <option value="1" <?= $product['status'] == 1 ? 'selected' : '' ?>>U pripremi</option>
                    </select>
                </div>
            </div>
            <div class="admin-box">
                <div class="form-group">
                    <label>Kategorija</label>
                    <select class="form-control" name="category" id="categories_list" data-category="<?= $product['category'] ?>">
                        <option value="x">x</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</form>