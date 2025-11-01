<div class="container">
    <form class="row" action="#">
        <div class="col-12 mb-3">
            <h4 class="m-0">Izmena kategorije
                <a href="#" class="btn btn-success float-right" id="create_category">Sačuvaj</a>
            </h4>
        </div>
        <div class="col-lg-8">
            <div class="admin-box">
                <div class="form-group">
                    <label>Naziv</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group mb-0">
                    <label>Opis</label>
                    <textarea cols="30" rows="3" class="form-control" name="description"></textarea>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="admin-box">
                <span class="card-desc">Status kategorije</span>
                <div class="form-group mb-0">
                    <select class="form-control" name="status">
                        <option value="0">Aktivan</option>
                        <option value="1">U pripremi</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
</div>