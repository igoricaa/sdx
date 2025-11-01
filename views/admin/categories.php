<div class="row">
    <div class="col-12 mb-3">
        <h4 class="m-0">Kategorije
            <a href="/admin/new_category" class="btn btn-success float-right">Kreiraj kategoriju</a>
        </h4>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" id="search" placeholder="Pretraga..." style=" border-left: 0; ">
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover nowrap-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Kategorija</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="categories_table"></tbody>
                    </table>
                </div>
                <div class="page-navigation" id="is_pagination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination mb-0" id="pagination"></ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>