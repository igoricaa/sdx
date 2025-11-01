<div class="row" id="products">
    <div class="col-12">
        <div class="card">
            <div class="card-header pb-0 bg-white">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link <?= !isset($_GET['status']) ? 'active' : '' ?>" href="?">Sve</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= isset($_GET['status']) && $_GET['status'] == '1' ? 'active' : '' ?>" href="?status=1">Za slanje</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= isset($_GET['status']) && $_GET['status'] == '2' ? 'active' : '' ?>" href="?status=2">Poslati</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= isset($_GET['status']) && $_GET['status'] == '3' ? 'active' : '' ?>" href="?status=3">Vraćeni</a>
                    </li>
                </ul>
            </div>
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
                                <th>Porudžbina</th>
                                <th>Datum</th>
                                <th>Kupac</th>
                                <th>Total</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Cart</th>
                            </tr>
                        </thead>
                        <tbody id="orders_table"></tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <div class="page-navigation" id="is_pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination mb-0" id="pagination"></ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>