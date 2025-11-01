<?php if ($data['isAuth']) : ?>
  <?php if ($data['page'] == 'login') {
    echo '<script>window.location.href="/admin/index"</script>';
    header('Location: /admin/index');
    die;
  } ?>
  <div class="d-flex mh-100" id="wrapper">
    <div id="sidebar-wrapper">
      <div class="list-group list-group-flush">
        <a href="/admin/index" class="list-group-item main-sidebar d-none"><i class="fas fa-home"></i> Overview</a>
        <a href="/admin/orders" class="list-group-item main-sidebar"><i class="fas fa-inbox"></i> Orders
          <?php if ($data['pending_orders']) : ?>
            <span class="badge badge-success float-right py-1"><?= $data['pending_orders'] ?></span>
          <?php endif; ?>
        </a>
        <a href="#" onclick='window.location.href="/admin/products_list"' class="list-group-item main-sidebar" data-dropdown='products_dropdown'><i class="fas fa-tag fa-flip-horizontal"></i> Products</a>
        <div class="dropdown" id="products_dropdown">
          <a href="/admin/products_list" class="list-group-item">Products list</a>
          <a href="/admin/categories" class="list-group-item">Categories</a>
        </div>
        <a href="/admin/reviews" class="list-group-item main-sidebar"><i class="fas fa-star"></i> Reviews
          <?php if ($data['pending_reviews']) : ?>
            <span class="badge badge-success float-right py-1"><?= $data['pending_reviews'] ?></span>
          <?php endif; ?></a>
        <a href="/admin/customers" class="list-group-item main-sidebar"><i class="fas fa-user"></i> Customers</a>
        <a href="/admin/promo" class="list-group-item main-sidebar"><i class="fas fa-ticket"></i> Promo Codes</a>
        <a href="/admin/popup-settings" class="list-group-item main-sidebar"><i class="fas fa-window-restore"></i> Popup Settings</a>
        <a href="/admin/subscribers" class="list-group-item main-sidebar"><i class="fas fa-envelope"></i> Subscribers</a>
        <a href="/admin/buyers" class="list-group-item main-sidebar"><i class="fas fa-envelope"></i> buyers</a>
        <hr>
        <p class="small text-uppercase nav-describer">Online shop</p>
        <a href="/" target="_blank" class="list-group-item main-sidebar"><i class="fas fa-store"></i> Shop <i class="view-shop fas fa-eye"></i></a>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg fixed-top  navbar-light shadow-sm text-dark" style="background:#fff;">
      <button class="btn text-dark" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></button>
      <div class="sidebar-heading mr-auto font-weight-bold">SmartDrugsX</div>
      <div class="ml-auto">
        <div class="dropdown">
          <img src="https://image.flaticon.com/icons/png/512/149/149071.png" class="user-profile" type="button" id="user-profile" style="height: 2rem;border: 2px solid #556080;border-radius: 50%;padding: 1px;background: #e7eced;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="dropdown-menu" aria-labelledby="user-profile" style="right: 0;left: auto;padding: 0;border-radius: 0;">
            <a class="dropdown-item" href="/admin/settings">Settings</a>
            <hr class="m-0">
            <a class="dropdown-item" href="/admin/logout">Logout</a>
          </div>
        </div>
      </div>
    </nav>
    <div id="page-content-wrapper">
      <div class="container-fluid py-3 section-content" style="margin-top:60px;">
        <?php content("$data[view]/$data[page].php", $data); ?>
      </div>
    </div>
  </div>
<?php else : ?>
  <?php if ($data['page'] != 'login') {
    echo '<script>window.location.href="/admin/login"</script>';
    header('Location: /admin/login');
    die;
  } else {
    // echo "SMARTDRUGSX.com";
    content("$data[view]/$data[page].php", $data);
  } ?>
<?php endif; ?>