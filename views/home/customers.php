<div class="row" id="products">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" id="search" placeholder="Pretraga..." style=" border-left: 0; ">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" id="country_filter">
                            <option value="">All Regions</option>
                            <option value="US">US (United States)</option>
                            <option value="UK">UK (United Kingdom)</option>
                            <option value="EU">EU (European Union)</option>
                            <option value="AUS">Australia</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success btn-block" id="export_customers">
                            <i class="fas fa-download"></i> Export
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover nowrap-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Email</th>
                                <th>Kupac</th>
                                <th>Country</th>
                                <th>Porudžbine</th>
                                <th>Potrošnja</th>
                            </tr>
                        </thead>
                        <tbody id="customers_table">
                        </tbody>
                    </table>
                </div>
                <div class="page-navigation" id="is_pagination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination mb-0" id="pagination">
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>