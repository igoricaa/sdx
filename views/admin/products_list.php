<div class="row" id="products">
    <div class="col-12 mb-3">
        <h4 class="m-0">Proizvodi
            <a href="/admin/new_product" class="btn btn-success float-right">Dodaj proizvod</a>
        </h4>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header pb-0 bg-white">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link <?=!isset($_GET['status']) ? 'active' : ''?>" href="?">Svi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=isset($_GET['status']) && $_GET['status'] == '1' ? 'active' : ''?>" href="?status=1">Dostupni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=isset($_GET['status']) && $_GET['status'] == '2' ? 'active' : ''?>" href="?status=2">U pripremi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=isset($_GET['status']) && $_GET['status'] == '3' ? 'active' : ''?>" href="?status=3">Arhivirani</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" id="search" class="form-control" placeholder="Pretraga..." style=" border-left: 0; ">
                        </div>
                    </div>
                    <!-- <div class="col-lg-5 mb-3">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light btn-product-search btn-product-search1 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Proizvođač
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light btn-product-search btn-product-search3 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tag
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <div class="btn-group btn-block">
                            <button type="button" class="btn btn-light dropdown-toggle btn-product-search btn-border" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sortiraj
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="table-responsive">
                    <table class="table table-nowrap table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Proizvod</th>
                                <th>Status</th>
                                <!-- <th>Inventar</th>
                                <th>Tip</th>
                                <th>Proizvođač</th> -->
                            </tr>
                        </thead>
                        <tbody id="products_table"></tbody>
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