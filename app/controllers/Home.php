<?php

namespace Controllers;

class Home extends \Sophia\Controller
{
    protected $Shop;

    function __construct()
    {
        $this->Shop = $this->model('Shop');
        $this->data = [
            'style' => ['hono'],
            'script' => ['hono', 'stripe', 'sweetalert2'],
            'categories' => $this->Shop->categories()
        ];
    }

    function blog()
    {
        return $this->view();
    }
    function index()
    {
        return $this->view([
            'products' => $this->Shop->popular()
        ]);
    }
    function product($product_id = 0)
    {
        $SEO = $this->Shop->product_seo($product_id);
        if ($SEO == NULL) {
            header('Location: /home/shop');
            exit;
        }
        return $this->view([
            'product' => $this->Shop->product(ints($product_id)),
            'reviews' => $this->Shop->reviews(ints($product_id)),
            'description' => $SEO['description'],
            'canonical' => $SEO['canonical'],
        ]);
    }
    function faq()
    {
        return $this->view();
    }
    function cart()
    {
        return $this->view();
    }
    function shipping()
    {
        return $this->view();
    }
    function checkout()
    {
        if (!isset($_SESSION['cart']) || count(json_decode($_SESSION['cart'], true)) == 0) {
            header('Location: /home/shop');
            exit;
        }
        return $this->view();
    }
    function contact()
    {
        return $this->view();
    }
    function instructions()
    {
        return $this->view();
    }
    function success()
    {
        return $this->view();
    }
    function privacy_policy()
    {
        return $this->view();
    }
    function return_policy()
    {
        return $this->view();
    }
    function terms_and_conditions()
    {
        return $this->view();
    }
    function sdxneuroscience()
    {
        return $this->view();
    }
    function cardpayment()
    {
        return $this->view();
    }
    function paypal($id = 0)
    {
        $this->Shop->paypal_pay(ints($id));
        return $this->view([
            'id' => ints($id),
            'details' => $this->Shop->detailss(ints($id)),
            'order' => $this->Shop->order_details(ints($id))
        ]);
    }
    function proceed($id = 0)
    {
        if (!$id || !$this->Shop->validate_order(ints($id))) {
            header("Location: /home/shop/");
            exit;
        }
        if ($this->Shop->is_proceed(ints($id))) {
            header("Location: /home/payment/" . $id);
            exit;
        }
        return $this->view([
            'order' => ints($id)
        ]);
    }
    function zelle_payment($id = 0)
    {
        return $this->view([
            'order' => ints($id)
        ]);
    }
    function payment($id = 0): array
    {
        if (!$id || !$this->Shop->validate_order(ints($id))) {
            header("Location: /home/shop/");
            exit;
        }
        if (isset($_GET['zelle'])) {
            // header("Location: /home/zelle-payment/" . $id);
            // exit;
            return $this->view([
                'details' => $this->Shop->detailss(ints($id)),
            ]);
        }
        if (!$this->Shop->is_proceed(ints($id))) {
            header("Location: /home/proceed/" . $id);
            exit;
        }
        return $this->view([
            'detailss' => $this->Shop->detailss(ints($id)),
            'details' => $this->Shop->crypto_payment(ints($id)),
            'order' => $this->Shop->order_details(ints($id))
        ]);
    }
    function card($id = 0)
    {
        if (!$id || !$this->Shop->validate_order(ints($id))) {
            header("Location: /home/shop/");
            exit;
        }
        // if (!$this->Shop->is_proceed(ints($id))) {
        //     header("Location: /home/proceed/" . $id);
        //     exit;
        // }
        return $this->view([
            'id' => ints($id),
            'details' => $this->Shop->detailss(ints($id)),
            'order' => $this->Shop->order_details(ints($id))
        ]);
    }
    function shop()
    {
        return $this->view([
            'collections' => $this->Shop->collections(),
        ]);
    }
    function shopus()
    {
        return $this->view([
            'collections' => $this->Shop->collections_us(),
        ]);
    }
    function shopeu()
    {
        return $this->view([
            'collections' => $this->Shop->collections_eu(),
        ]);
    }
    function shopuk()
    {
        return $this->view([
            'collections' => $this->Shop->collections_uk(),
        ]);
    }
    function shopin()
    {
        return $this->view([
            'collections' => $this->Shop->collections_in(),
        ]);
    }
    function shoppremium()
    {
        return $this->view([
            'collections' => $this->Shop->collections_premium(),
        ]);
    }
    function coinpayments()
    {
        $this->Ipn = $this->model("Ipn");
        $this->Ipn->coinpayments_ipn();
    }
    function order_paid($id = 0)
    {
        die($this->Shop->pay_order((int) $id));
    }
}
