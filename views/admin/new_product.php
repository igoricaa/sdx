<form class="container" id="form_product">
    <div class="row">
        <div class="col-12 mb-3">
            <h4 class="m-0">Dodaj proizvod
                <a href="#" id="create_product" class="btn btn-success float-right">Sačuvaj</a>
            </h4>
        </div>
        <div class="col-lg-8">
            <div class="admin-box">
                <div class="form-group">
                    <label>Naziv</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <p class="mb-0">
                    *Ostali detalji se menjaju nakon dodavanja product(s)!
                </p>
                <!-- <div class="form-group mb-0">
                    <label>Opis</label>
                    <textarea name="description" id="" rows="5" class="form-control"></textarea>
                </div> -->
            </div>
            <!-- <div class="admin-box">
                <p class="card-desc">Media</p>
                <div class="form-group">
                    <label>Media from PC</label>
                    <input type="file" id="fileElem" class="form-control" multiple accept="image/*" name="media[]">
                </div>
                <div class="form-group mb-0">
                    <label>Media from URL</label>
                    <div class="input-group mb-3">
                        <input type="text" name="img_url[]" class="form-control" placeholder="https://google.com/image.jpg">
                        <div class="input-group-append">
                            <a class="btn btn-success" type="submit" onclick="addURLinput()"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <div id="URLinputs"></div>
                </div>
            </div>
            <div class="admin-box">
                <span class="card-desc">Cenovnik</span>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Cena</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="selling_price">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Uporedi sa cenom</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="compare_price">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="hr-p-4">
                <div class="form-group mb-0">
                    <label>Nabavna cena po komadu</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="purchase_price">
                        <div class="input-group-append">
                            <span class="input-group-text">$</span>
                        </div>
                    </div>
                    <small class="sub-txt">* Kupac ovo ne vidi</small>
                </div>
            </div>
            <div class="admin-box d-none">
                <span class="card-desc">Inventar</span>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Magacinski broj</label>
                            <input type="text" class="form-control" name="sku">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Barkod</label>
                            <input type="text" class="form-control" name="barcode">
                        </div>
                    </div>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="1" name="track_inventory">Prati stanje product(s)
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="1" name="sell_out_of_stock">Prodaja i nakon prodaje svih product(s) na stanju
                    </label>
                </div>
                <hr class="hr-p-4">
                <span class="card-desc">Broj komada</span>
                <div class="form-group mb-0">
                    <label>Na stanju</label>
                    <input type="number" class="form-control" name="inventory">
                </div>

            </div>
            <div class="admin-box d-none">
                <span class="card-desc">Dostava</span>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="1" name="physical_product" id="physical_product">Ovo je fizički proizvod
                    </label>
                </div>
                <div id="physical_product_details" style="display: none;">
                    <hr class="hr-p-4">
                    <div class="form-group mb-0">
                        <label>Težina</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" name="weight">
                            <div class="input-group-append">
                                <span class="input-group-text">KG</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="admin-box d-none">
                <span class="card-desc">Varijante</span>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="variants" id="variants" value="1">Ovaj proizvod ima u više varijanti
                    </label>
                </div>
                <div id="variant_details" style="display: none;">
                    <hr class="hr-p-4">
                    <div class="row">
                        <div class="col-3 pr-0">
                            <div class="form-group">
                                <label>Naziv</label>
                                <input type="text" class="form-control" placeholder='Boja'>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <label>Opcije
                                    <small>(varijante razdvajate zarezom)</small>
                                </label>
                                <input type="text" class="form-control" placeholder="Plava, Zelena, Crvena">
                            </div>
                        </div>
                    </div>
                    <div id="VARIANTSinputs"></div>
                    <p class="text-right mb-0">
                        <a class="btn btn-success px-4" onclick="addVariant()"><i class="fas fa-plus"></i></a>
                    </p>
                </div>
            </div>
            <div class="admin-box">
                <span class="card-desc">Popust na količinu</span>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="quantity_discount" id="quantity_discount" value="1">Ovaj proizvod ima popust na više komada
                    </label>
                </div>
                <div id="quantity_discount_details" style="display: none;">
                    <hr class="hr-p-4">
                    <div class="row">
                        <div class="col-3 pr-0">
                            <div class="form-group">
                                <label>Broj komada</label>
                                <input type="text" class="form-control" placeholder='10' name="quantity_discount_num[]">
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <label>Popust po komadu</label>
                                <input type="text" class="form-control" placeholder="250" name="quantity_discount_price[]">
                            </div>
                        </div>
                    </div>
                    <div id="quantity_discount_inputs"></div>
                    <p class="text-right mb-0">
                        <a class="btn btn-success px-4" onclick="add_quantity_discount()"><i class="fas fa-plus"></i></a>
                    </p>
                </div>
            </div>
            <div class="admin-box">
                <div class="form-group">
                    <label>SEO title</label>
                    <input type="text" class="form-control" name="seo_title">
                </div>
                <div class="form-group">
                    <label>SEO keywords</label>
                    <input type="text" class="form-control" name="seo_keywords">
                </div>
                <div class="form-group mb-0">
                    <label>SEO description</label>
                    <textarea name="seo_description" id="" cols="30" rows="3" class="form-control"></textarea>
                </div>
            </div> -->
        </div>
        <div class="col-lg-4">
            <div class="admin-box">
                <span class="card-desc">Product status</span>
                <div class="form-group mb-0">
                    <select name="status" id="" class="form-control">
                        <option value="0">Aktivan</option>
                        <option value="1">U pripremi</option>
                    </select>
                </div>
            </div>
            <div class="admin-box">
                <!-- <div class="form-group">
                    <label>Tip</label>
                    <input type="text" class="form-control" name="type">
                </div>
                <div class="form-group">
                    <label>Proizvođač</label>
                    <input type="text" class="form-control" name="vendor">
                </div> -->
                <div class="form-group">
                    <label>Kategorija</label>
                    <select class="form-control" name="category" id="categories_list">
                        <option value="x">x</option>
                    </select>
                </div>
                <!-- <div class="form-group mb-0">
                    <label>Tag</label>
                    <input type="text" class="form-control" name="tags">
                </div> -->
            </div>
        </div>
    </div>
</form>