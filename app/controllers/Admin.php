<?php

namespace Controllers;

class Admin extends \Sophia\Controller
{
  function __construct()
  {
    $this->Admin = $this->model('Admin');
    $this->data = [
      'style' => ['bootstrap', 'Roboto', 'fontawesome', 'sidebar'],
      'script' => ['jquery', 'bootstrap', 'sweetalert2', 'sidebar'],
      'pending_orders' => $this->Admin->pending_orders(),
      'pending_reviews' => $this->Admin->pending_reviews(),
      'isAuth' => $this->Admin->isAuth(),
    ];
  }

  function login()
  {
    return $this->view();
  }
  function index()
  {
    return $this->view();
  }
  function products_list()
  {
    return $this->view();
  }
  function new_product()
  {
    return $this->view();
  }
  function product($ID = 0)
  {
    return $this->view([
      'product' => $this->Admin->product($ID)
    ]);
  }
  function category($ID = 0)
  {
    return $this->view([
      'category' => $this->Admin->category($ID)
    ]);
  }
  function new_category()
  {
    return $this->view();
  }
  function customers()
  {
    return $this->view();
  }
  function customer($email = 0)
  {
    return $this->view([
      'customer' => $this->Admin->customer($email)
    ]);
  }
  function payments()
  {
    return $this->view([
      'payments' => $this->Admin->payments()
    ]);
  }
  function sent()
  {
    return $this->view();
  }
  function unfinished()
  {
    return $this->view();
  }
  function orders()
  {
    return $this->view();
  }
  function order($ID = 0)
  {
    return $this->view([
      'order' => $this->Admin->order(ints($ID))
    ]);
  }
  function overview()
  {
    return $this->view();
  }
  function reports()
  {
    return $this->view();
  }
  function live()
  {
    return $this->view();
  }
  function categories()
  {
    return $this->view();
  }
  function inventory()
  {
    return $this->view();
  }
  function promo_codes()
  {
    return $this->view();
  }
  function promo()
  {
    return $this->view([
      'promo_codes' => $this->Admin->promo_codes()
    ]);
  }
  function reviews()
  {
    return $this->view([
      'reviews' => $this->Admin->reviews(),
      'customer_reviews' => $this->Admin->customer_reviews()
    ]);
  }
  function review($ID = 0)
  {
    return $this->view([
      'review' => $this->Admin->review(ints($ID))
    ]);
  }
  function settings()
  {
    return $this->view();
  }
  function subscribers()
  {
    return $this->view([
      'subscribers' => $this->Admin->subscribers()
    ]);
  }
  function buyers()
  {
    $buyers = $this->Admin->buyersList();
    if (isset($_GET['export'])) {
      $file = md5(rand() . rand());
      $fp = fopen(__DIR__.'/../../csv/' . $file . '.csv', 'w+');

      // Loop through file pointer and a line
      foreach ($buyers as $fields) {
        fputcsv($fp, $fields);
      }

      fclose($fp);
      // header('Location: /csv/' . $file . '.csv');
      // die;
      die("<script>window.location.href='/csv/$file.csv'</script>");
    }
    return $this->view([
      'buyers' => $buyers
    ]);
  }
  function logout()
  {
    session_destroy();
    header('Location: /admin');
    die;
  }
}
