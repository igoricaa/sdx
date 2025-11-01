<?php

namespace Model;


// use Klaviyo\Model\ProfileModel as KlaviyoProfile;
// use Klaviyo\Klaviyo as Klaviyo;


class Shop extends \Sophia\Controller
{
    function __construct()
    {
        $this->DB();
    }
    function index()
    {
        header("Location: /");
        die;
    }
    function categories()
    {
        return $this->DB->select('SELECT id, name,url FROM categories WHERE status = "0"');
    }
    function collections()
    {
        $return['products'] = $this->DB->select('SELECT * FROM products WHERE status = "0" AND category <> 9 ORDER BY category ASC');
        $return['categories'] = $this->DB->select('SELECT * FROM categories WHERE status = "0" AND id <> 9 ');

        $count = count($return['products']);
        for ($i = 0; $i < $count; $i++) {
            $return['products'][$i]['price_min'] = $this->DB->check('SELECT price FROM `product_package` WHERE product_id = "' . $return['products'][$i]['id'] . '" ORDER BY `product_package`.`price` ASC');
            $return['products'][$i]['price_max'] = $this->DB->check('SELECT price FROM `product_package` WHERE product_id = "' . $return['products'][$i]['id'] . '" ORDER BY `product_package`.`price` DESC');
        }
        return $return;
    }
    function collections_us()
    {
        $return['products'] = $this->DB->select('SELECT * FROM products WHERE status = "0" AND category = 9 ORDER BY category ASC');
        $return['categories'] = $this->DB->select('SELECT * FROM categories WHERE status = "0" AND id = 9 ');

        $count = count($return['products']);
        for ($i = 0; $i < $count; $i++) {
            $return['products'][$i]['price_min'] = $this->DB->check('SELECT price FROM `product_package` WHERE product_id = "' . $return['products'][$i]['id'] . '" ORDER BY `product_package`.`price` ASC');
            $return['products'][$i]['price_max'] = $this->DB->check('SELECT price FROM `product_package` WHERE product_id = "' . $return['products'][$i]['id'] . '" ORDER BY `product_package`.`price` DESC');
        }
        return $return;
    }
    function collections_eu()
    {
        $return['products'] = $this->DB->select('SELECT * FROM products WHERE status = "0" AND category = 12 ORDER BY category ASC');
        $return['categories'] = $this->DB->select('SELECT * FROM categories WHERE status = "0" AND id = 12 ');

        $count = count($return['products']);
        for ($i = 0; $i < $count; $i++) {
            $return['products'][$i]['price_min'] = $this->DB->check('SELECT price FROM `product_package` WHERE product_id = "' . $return['products'][$i]['id'] . '" ORDER BY `product_package`.`price` ASC');
            $return['products'][$i]['price_max'] = $this->DB->check('SELECT price FROM `product_package` WHERE product_id = "' . $return['products'][$i]['id'] . '" ORDER BY `product_package`.`price` DESC');
        }
        return $return;
    }
    function collections_uk()
    {
        $return['products'] = $this->DB->select('SELECT * FROM products WHERE status = "0" AND category = 11 ORDER BY category ASC');
        $return['categories'] = $this->DB->select('SELECT * FROM categories WHERE status = "0" AND id = 11 ');

        $count = count($return['products']);
        for ($i = 0; $i < $count; $i++) {
            $return['products'][$i]['price_min'] = $this->DB->check('SELECT price FROM `product_package` WHERE product_id = "' . $return['products'][$i]['id'] . '" ORDER BY `product_package`.`price` ASC');
            $return['products'][$i]['price_max'] = $this->DB->check('SELECT price FROM `product_package` WHERE product_id = "' . $return['products'][$i]['id'] . '" ORDER BY `product_package`.`price` DESC');
        }
        return $return;
    }
    function collections_in()
    {
        $return['products'] = $this->DB->select('SELECT * FROM products WHERE status = "0" AND category = 14 ORDER BY category ASC');
        $return['categories'] = $this->DB->select('SELECT * FROM categories WHERE status = "0" AND id = 14 ');

        $count = count($return['products']);
        for ($i = 0; $i < $count; $i++) {
            $return['products'][$i]['price_min'] = $this->DB->check('SELECT price FROM `product_package` WHERE product_id = "' . $return['products'][$i]['id'] . '" ORDER BY `product_package`.`price` ASC');
            $return['products'][$i]['price_max'] = $this->DB->check('SELECT price FROM `product_package` WHERE product_id = "' . $return['products'][$i]['id'] . '" ORDER BY `product_package`.`price` DESC');
        }
        return $return;
    }
    function collections_premium()
    {
        $return['products'] = $this->DB->select('SELECT * FROM products WHERE status = "0" AND category = 15 ORDER BY category ASC');
        $return['categories'] = $this->DB->select('SELECT * FROM categories WHERE status = "0" AND id = 15 ');

        $count = count($return['products']);
        for ($i = 0; $i < $count; $i++) {
            $return['products'][$i]['price_min'] = $this->DB->check('SELECT price FROM `product_package` WHERE product_id = "' . $return['products'][$i]['id'] . '" ORDER BY `product_package`.`price` ASC');
            $return['products'][$i]['price_max'] = $this->DB->check('SELECT price FROM `product_package` WHERE product_id = "' . $return['products'][$i]['id'] . '" ORDER BY `product_package`.`price` DESC');
        }
        return $return;
    }
    function catalog($collection)
    {
        $category_id = $this->DB->check('SELECT id FROM categories WHERE url = "' . $collection . '"');
        if ($category_id == NULL)
            return false;
        $return['data'] = $this->DB->fetch('SELECT * FROM categories WHERE id = "' . $category_id . '"');
        $products_sql = 'SELECT * FROM products WHERE status = "0" ' . ($category_id != 0 ? 'AND category = "' . $category_id . '"' : '');
        $return['products'] = $this->DB->select($products_sql);
        $return['categories'] = $this->DB->select('SELECT id, name,url FROM categories WHERE status = "0"');
        return $return;
    }
    function product($product_id)
    {
        $return['data'] = $this->DB->fetch('SELECT * FROM products WHERE id = "' . $product_id . '"');
        $return['related'] = $this->DB->select('SELECT * FROM products WHERE status = "0" ORDER BY RAND() LIMIT 9');

        $count = count($return['related']);
        for ($i = 0; $i < $count; $i++) {
            $return['related'][$i]['price_min'] = $this->DB->check('SELECT price FROM `product_package` WHERE product_id = "' . $return['related'][$i]['id'] . '" ORDER BY `product_package`.`price` ASC');
            $return['related'][$i]['price_max'] = $this->DB->check('SELECT price FROM `product_package` WHERE product_id = "' . $return['related'][$i]['id'] . '" ORDER BY `product_package`.`price` DESC');
        }




        $return['images'] = $this->DB->select('SELECT url FROM product_images WHERE product_id = "' . $return['data']['id'] . '"');
        $return['description'] = $this->DB->select('SELECT * FROM product_description WHERE product_id = "' . $return['data']['id'] . '"');
        $return['product_package'] = $this->DB->select('SELECT * FROM product_package WHERE product_id = "' . $return['data']['id'] . '"');


        $package_prices = [];
        foreach ($return['product_package'] as $pack) {
            $package_prices[] = $pack['price'];
        }
        $return['package_prices'] = [current($package_prices), end($package_prices)];


        $return['quantity_discount'] = [];

        if ($this->DB->check('SELECT count(id) FROM quantity_discount WHERE product_id = "' . $return['data']['id'] . '"')) {
            $return['quantity_discount'] = $this->DB->select('SELECT * FROM quantity_discount WHERE product_id = "' . $return['data']['id'] . '"');
        }

        $return['reviews'] = [];
        $return['specifications'] = [];



        return $return;
    }
    function view_product($category, $product)
    {
        $category = format_uri($category);
        $product = format_uri($product);

        $return['data'] = $this->DB->fetch('SELECT * FROM products WHERE canonical = "' . $category . '/' . $product . '"');
        if ($return['data'] == NULL)
            return false;

        $return['related'] = $this->DB->select('SELECT * FROM products WHERE status = "0" ORDER BY RAND() LIMIT 9');
        $return['images'] = $this->DB->select('SELECT url FROM product_images WHERE product_id = "' . $return['data']['id'] . '"');

        $return['quantity_discount'] = [];

        if ($this->DB->check('SELECT count(id) FROM quantity_discount WHERE product_id = "' . $return['data']['id'] . '"')) {
            $return['quantity_discount'] = $this->DB->select('SELECT * FROM quantity_discount WHERE product_id = "' . $return['data']['id'] . '"');
        }

        $return['reviews'] = [];
        $return['specifications'] = [];
        $return['sold'] = $this->DB->check('SELECT sum(checkout_cart.quantity) FROM checkout, checkout_cart WHERE checkout_cart.product_id = "' . $return['data']['id'] . '" AND checkout.created_date > DATE_SUB(NOW(), INTERVAL 24 HOUR)  GROUP BY checkout.hash');

        return $return;
    }
    function popular()
    {
        $products = $this->DB->select('SELECT * FROM products WHERE status = "0" ORDER BY RAND() LIMIT 16');
        $count = count($products);
        for ($i = 0; $i < $count; $i++) {
            $products[$i]['price_min'] = $this->DB->check('SELECT price FROM `product_package` WHERE product_id = "' . $products[$i]['id'] . '" ORDER BY `product_package`.`price` ASC');
            $products[$i]['price_max'] = $this->DB->check('SELECT price FROM `product_package` WHERE product_id = "' . $products[$i]['id'] . '" ORDER BY `product_package`.`price` DESC');
        }
        return $products;
    }
    function check_discount_code()
    {
        $post = $this->check([
            'code' => 'Type promo code!'
        ]);
        if (count($post->_errors))
            return $post->_errors[0];

        if ($this->DB->check('SELECT id FROM promo_codes WHERE code = "' . $post->code . '" AND status = 0')) {

            if ($this->DB->check("SELECT id FROM used_promo WHERE ip = '" . ip() . "' AND code = '" . $post->code . "'")) {
                $_SESSION['promo'] = "";
                return "Exclusive One time usage promo code";
            }

            $_SESSION['promo'] = $post->code;
            return ['success' => 'Promo code accepted'];
        } else {
            return 'Invalid promo code';
        }
    }
    function changeShippingCost()
    {
        $post = $this->check();
        $_SESSION['shippingCost'] = $post->shippingCost;
        return;
    }
    function cart()
    {
        $shipping_cost = isset($_SESSION['shippingCost']) ? $_SESSION['shippingCost'] : 0;


        $update = [];
        $cart = [
            'data' => isset($_SESSION['cart']) ? json_decode($_SESSION['cart'], true) : [],
            'shipping' => 50,
            'price' => 0,
            'items' => 0
        ];
        foreach ($cart['data'] as $product):
            if (!$this->DB->check('SELECT id FROM products WHERE id = "' . $product['product'] . '"'))
                continue;
            if (!$this->DB->check('SELECT id FROM product_package WHERE id = "' . $product['package'] . '" AND product_id = "' . $product['product'] . '"'))
                continue;
            list($product['image'], $product['title']) = $this->DB->values('SELECT main_image, title FROM products WHERE id = "' . $product['product'] . '"');
            list($product['package_name'], $product['price']) = $this->DB->values('SELECT name, price FROM product_package WHERE product_id = "' . $product['product'] . '" AND id = "' . $product['package'] . '"');
            $product['total'] = $product['quantity'] * $product['price'];
            $cart['items'] += $product['quantity'];
            $cart['price'] += $product['total'];
            $product['total'] = number_format($product['total'], 2, ".", " ");
            $update[] = $product;
        endforeach;
        $cart['data'] = $update;
        $cart['price'] = number_format($cart['price'], 2, ".", " ");

        $discount_amount = $promo_amount = $promo_type = 0;
        $discount_code = isset($_SESSION['promo']) ? $_SESSION['promo'] : '';

        if (isset($_SESSION['promo']))
            if ($this->DB->check("SELECT id FROM used_promo WHERE ip = '" . ip() . "' AND code = '" . $_SESSION['promo'] . "'")) {
                $_SESSION['promo'] = "";
                $discount_code = "";
            }

        if (!empty($discount_code)) {
            list($promo_amount, $promo_type) = $this->DB->values('SELECT discount, type FROM promo_codes WHERE code = "' . $discount_code . '"');
        }

        if ($promo_amount > 0 && $promo_type == 1) {
            $discount_amount = $cart['price'] * $promo_amount / 100;
        } elseif ($promo_amount > 0 && $promo_type == 2) {
            $discount_amount = $promo_amount;
        } else {
            $discount_code = "";
        }
        $full_price = $cart['price'] - $discount_amount + $shipping_cost;
        if ($full_price < 0)
            $full_price = 0;
        $cart['full_price'] = $full_price;

        $cart['discount_amount'] = number_format($discount_amount, 2);
        $cart['discount_code'] = $discount_code;

        return $cart;
    }
    function reviews($product)
    {
        return $this->DB->select('SELECT * FROM reviews WHERE product_id = "' . $product . '" AND status = 1');
    }
    function add()
    {
        $post = $this->check();
        if (count($post->_errors))
            return $post->_errors[0];
        $image = $this->DB->check('SELECT main_image FROM products WHERE id = "' . $post->product . '"');
        if (!$image)
            return False;

        $cart = isset($_SESSION['cart']) ? json_decode($_SESSION['cart'], true) : [];

        $key = false;
        foreach ($cart as $cart_key => $val)
            if ($val['product'] == $post->product && $val['package'] == $post->package)
                $key = $cart_key;

        if ($key !== false)
            $cart[$key]['quantity'] = $cart[$key]['quantity'] + $post->quantity;
        else
            $cart[] = ['product' => $post->product, 'quantity' => $post->quantity, 'package' => $post->package];

        $_SESSION['cart'] = json_encode($cart);
        return $image;
    }
    function change()
    {
        $post = $this->check([
            'product' => 'product!',
            'package' => 'package!',
            'quantity' => 'quantity!'
        ]);
        if (count($post->_errors))
            return $post->_errors[0];
        $cart = isset($_SESSION['cart']) ? json_decode($_SESSION['cart'], true) : [];

        $updated_cart = [];
        foreach ($cart as $product) {
            if ($product['product'] == $post->product && $product['package'] == $post->package)
                $product['quantity'] = $post->quantity;
            $updated_cart[] = $product;
        }

        $_SESSION['cart'] = json_encode($updated_cart);
        return $updated_cart;
    }
    function postReview()
    {
        $post = $this->check([
            'email' => 'Please type valid Email address!',
            'customer' => 'Please type your name!',
            'review' => 'Please type review!',
            'title' => 'Please type title!',
            'stars' => 'Stars!',
        ]);
        if (count($post->_errors))
            return $post->_errors[0];

        $this->DB->query('INSERT INTO reviews (customer, email, stars, title, review, product_id) VALUES ("' . $post->customer . '","' . $post->email . '","' . $post->stars . '","' . $post->title . '","' . $post->review . '","' . $post->product . '")');

        return ['success' => 'Review is sent!'];
    }
    function remove()
    {
        $post = $this->check();
        $cart = isset($_SESSION['cart']) ? json_decode($_SESSION['cart'], true) : [];
        $i = 0;
        $c = [];
        foreach ($cart as $item)
            if ($i++ != $post->remove)
                $c[] = $item;
        $_SESSION['cart'] = json_encode($c);
    }
    function checkout()
    {
        $post = $this->check([
            'firstname' => 'Please type your firstname!',
            'lastname' => 'Please type your lastname!',
            'country' => 'Please type your country!',
            'city' => 'Please type your city!',
            'street' => 'Please type your address!',
            'zip' => 'Please type your zip number!',
            'email' => 'Please type your email address!',
            'phone' => 'Please type your phone number!',
        ]);
        if (count($post->_errors))
            return $post->_errors[0];

        // return $post->zip ." TRY LATTER";

        if (!isEmail($post->email))
            return "Invalid email address!";


        $discount_amount = $promo_amount = $promo_type = 0;
        $discount_code = isset($_SESSION['promo']) ? $_SESSION['promo'] : '';

        if (!empty($discount_code)) {
            list($promo_amount, $promo_type) = $this->DB->values('SELECT discount, type FROM promo_codes WHERE code = "' . $discount_code . '"');
        }

        $shipping_cost = isset($_SESSION['shippingCost']) ? $_SESSION['shippingCost'] : 0;

        if (isset($_SESSION['cart'])) {
            $cart = json_decode($_SESSION['cart'], true);
            $checkout_cart = [];
            $items = $price = 0;
            foreach ($cart as $product) {
                list($info['id'], $info['title'], $info['price']) = $this->DB->values('SELECT id, name, price FROM product_package WHERE product_id = "' . $product['product'] . '" AND id = "' . $product['package'] . '"');
                // $price = $this->DB->check('SELECT name, price FROM product_package WHERE product_id = "' . $product['product'] . '" AND id = "' . $product['package'] . '"');
                // $info = $this->DB->fetch('SELECT selling_price as price, title, id FROM products WHERE id = "' . $product['product'] . '"');
                // $check_quantity_discount = $this->DB->check('SELECT discount FROM quantity_discount WHERE product_id = "' . $product['product'] . '" AND quantity <= "' . $product['quantity'] . '" ORDER BY quantity DESC');
                // $info['price'] = $info['price'] - $check_quantity_discount;
                $info['quantity'] = $product['quantity'];

                $items = $items + $product['quantity'];
                $price = $price + $product['quantity'] * $info['price'];

                $checkout_cart[] = $info;
            }
            $hash = hash('md5', rand(10000, 999999999));

            if ($promo_amount > 0 && $promo_type == 1) {
                $discount_amount = $price * $promo_amount / 100;
            } elseif ($promo_amount > 0 && $promo_type == 2) {
                $discount_amount = $promo_amount;
            } else {
                $discount_code = "";
            }

            if ($this->DB->check("SELECT id FROM used_promo WHERE ip = '" . ip() . "' AND code = '" . $discount_code . "'")) {
                $discount_amount = 0;
                $discount_code = "";
            }

            $price = $price + $shipping_cost;

            $full_price = $price - $discount_amount + $shipping_cost;
            if ($full_price < 0)
                $full_price = 0;

            if ($discount_amount > 0) {
                // $this->DB->query('UPDATE promo_codes SET used = used + 1 WHERE code = "' . $discount_code . '"');
                // $this->DB->query("INSERT INTO used_promo (ip, code) VALUES ('" . ip() . "', '" . $discount_code . "')");
            }


            // TODO - proveri u bazi tabelu checkout i vidi da li moze shipping da se doda.
            $checkout_id = $this->DB->query('INSERT INTO checkout (discount,discount_code,firstname,lastname,country,city,street,apartment,zip,phone,email, price,items,hash,note,state) 
            VALUES ("' . $discount_amount . '","' . $discount_code . '","' . $post->firstname . '", "' . $post->lastname . '", "' . $post->country . '", "' . $post->city . '", "' . $post->street . '", "' . $post->apartment . '", "' . $post->zip . '", "0' . $post->phone . '", "' . $post->email . '", "' . $price . '", "' . $items . '", "' . $hash . '", "' . $post->note . '", "' . $post->state . '")');

            foreach ($checkout_cart as $item)
                $this->DB->query('INSERT INTO checkout_cart (checkout_id,product_id,product_price,product_name,quantity) VALUES ("' . $checkout_id . '", "' . $item['id'] . '", "' . $item['price'] . '", "' . $item['title'] . '", "' . $item['quantity'] . '")');

            if ($shipping_cost > 0)
                $this->DB->query('INSERT INTO checkout_cart (checkout_id,product_id,product_price,product_name,quantity) VALUES ("' . $checkout_id . '", "0", "' . $shipping_cost . '", "SHIPPING", "1")');


            $klaviyo_new_subscriber = false;
            if (!$this->DB->check('SELECT count(id) FROM customers WHERE email = "' . $post->email . '"')) {
                $this->DB->query('INSERT INTO customers (firstname,lastname,country,city,street,zip,phone,email) VALUES ("' . $post->firstname . '", "' . $post->lastname . '", "' . $post->country . '", "' . $post->city . '", "' . $post->street . '", "' . $post->zip . '", "0' . $post->phone . '", "' . $post->email . '")');
                $klaviyo_new_subscriber = true;
            } else
                $this->DB->query('UPDATE customers SET firstname = "' . $post->firstname . '" ,lastname = "' . $post->lastname . '" ,country = "' . $post->country . '" ,city = "' . $post->city . '" ,street = "' . $post->street . '" ,zip = "' . $post->zip . '" ,phone = "' . $post->phone . '" WHERE email = "' . $post->email . '"');

            $this->DB->query('INSERT INTO order_timeline (checkout_id,action,content) VALUES ("' . $checkout_id . '", "1", "")');
            $this->DB->query('INSERT INTO order_timeline (checkout_id,action,content) VALUES ("' . $checkout_id . '", "2", "")');

            $_SESSION['promo'] = "";

            // Klaviyo integration removed

            return ['success' => "/home/proceed/" . $checkout_id];
        }
        return "ERROR";
    }
    function paypal_pay($id)
    {
        $orderId = ints($id);
        $this->DB->query("UPDATE checkout SET is_paypal = 1 WHERE id = '$orderId' AND status = 0");

        $order = $this->DB->fetch('SELECT * FROM checkout WHERE id = "' . $orderId . '"');
        if ($order['discount'] > 0) {
            $amount = $order['price'] - $order['discount'] + 10;
        } else {
            $amount = $order['price'] + 10;
        }

        $email = $order['email'];
        $checkout_id = $order['id'];

        $body = "
        We've received your order details, please follow these instructions: <br>
        <br>
        1. Please add $10 for the PayPal fee. 
        <br>
        2. Product is Gift Box (do not state or mention Moda or anything related to the products, if that info is on Paypal, your order will be refunded immediately)
        <br>
        3. Please make a payment to this account: https://paypal.me/expresskalinas?country.x=RS&locale.x=en_US
        <br>
        4. You will receive tracking in 24-72h after the payment is made. Thank you for your patience and trust! 
        <br>
        5. Please consider PayPal confirmation, as order confirmation. The next email will be with the tracking number. 
        <br><br>
        Important: Please do not open disputes on PayPal, if you have any issues with your order reach out to us and we will assist you immediately. 
        
        <br><br>We appreciate your trust and look forward to serving you.<br><br>Best regards,<br>Joe
            <br><br>Order information:<br><br>
            Shipping address: " . $order['street'] . ", " . $order['apartment'] . ", " . $order['city'] . ", " . $order['country'] . ", " . $order['zip'] . "
            <br><br>
            Contact details: $order[firstname] $order[lastname], $order[phone] $order[email]
            <br><br>
            Delivery method
            <br>
            International Express shipping 
            <br>
            Cost: FREE
            <br>
            Expected delivery time:
            <br>
            2-8 business days.
            <br>
            <br>
            Order summary
            <br>
            PRICE: \$$order[price]
            <br>
            DISCOUNT: \$$order[discount]
            <br>
            ITEMS: $order[items]
            <br>
            DELIVERY: FREE
            <br>
            PAYPAL FEE: \$10
            <br>
            <br>
            TOTAL: \$$amount      
        ";

        \Sophia\Addon\Email::send("Order confirmation", $body, $email);
    }
    function zelle_pay()
    {
        $post = $this->check([
            'order' => 'No order id!',
        ]);

        if (count($post->_errors))
            return $post->_errors[0];

        if (!$this->DB->check('SELECT id FROM checkout WHERE id = "' . $post->order . '"'))
            return "Order doesn't exist!";

        $this->DB->query("UPDATE checkout SET is_zelle = 1 WHERE id = '$post->order' AND status = 0");

        $order = $this->DB->fetch('SELECT * FROM checkout WHERE id = "' . $post->order . '"');

        if ($order['discount'] > 0) {
            $amount = $order['price'] - $order['discount'];
        } else {
            $amount = $order['price'];
        }

        $email = $order['email'];
        $checkout_id = $order['id'];

        $email_template = $_SERVER['DOCUMENT_ROOT'] . "/email_order_confirmation.html";
        $open_file = fopen($email_template, "r") or die("Unable to open file!");
        $email_content = fread($open_file, filesize($email_template));
        fclose($open_file);

        $email_content = str_replace('[DISCOUNT]', $order['discount'], $email_content);
        $email_content = str_replace('[FIRSTNAME]', $order['firstname'], $email_content);
        $email_content = str_replace('[LASTNAME]', $order['lastname'], $email_content);
        $email_content = str_replace('[STREET_ADDRESS]', $order['street'] . ", " . $order['apartment'], $email_content);
        $email_content = str_replace('[CITY]', $order['city'], $email_content);
        $email_content = str_replace('[COUNTRY]', $order['country'], $email_content);
        $email_content = str_replace('[ZIP]', $order['zip'], $email_content);
        $email_content = str_replace('[PHONE]', $order['phone'], $email_content);
        $email_content = str_replace('[EMAIL]', $order['email'], $email_content);
        $email_content = str_replace('[PRICE]', $order['price'], $email_content);
        $email_content = str_replace('[ITEMS]', $order['items'], $email_content);
        $email_content = str_replace('[PAYMENT_STATUS]', "Please make a Zelle payment to payment@smartdrugsx.com", $email_content);
        $email_content = str_replace('[TOTAL]', number_format($order['price'] - $order['discount'], 2), $email_content);

        $subject = "Order confirmation! #" . $checkout_id;

        \Sophia\Addon\Email::shopping($email_content, $email, $subject);

        session_destroy();

        return ['success' => "/home/payment/" . $checkout_id . "?zelle"];
    }
    function crypto_pay()
    {

        $post = $this->check([
            'order' => 'Unesite currency!',
            'currency' => 'Unesite currency!'
        ]);
        if (count($post->_errors))
            return $post->_errors[0];

        if (!$this->DB->check('SELECT id FROM checkout WHERE id = "' . $post->order . '"'))
            return "Order doesn't exist!";

        $order = $this->DB->fetch('SELECT * FROM checkout WHERE id = "' . $post->order . '"');
        $currency = strtoupper($post->currency);
        if ($order['discount'] > 0) {
            $amount = $order['price'] - $order['discount'];
        } else {
            $amount = $order['price'] * 0.9;
        }

        $email = $order['email'];
        $checkout_id = $order['id'];

        $niz = array('buyer_id' => $checkout_id, 'amount' => (int) $amount, 'currency1' => 'USD', 'currency2' => $currency, 'buyer_name' => $order['firstname'] . " " . $order['lastname'], 'ipn_url' => 'https://smartdrugsx.co/home/coinpayments', 'buyer_email' => $email);
        $CPS = \Sophia\Addon\Coinpayments::deposit('create_transaction', $niz);

        if ($CPS['error'] != 'ok')
            return $CPS['error'];

        $this->DB->query('INSERT INTO coinpayments (txn_id, address, order_id, usd, currency, amount, time, description, status_url, qr_code,timeout) VALUES ("' . $CPS['result']["txn_id"] . '", "' . $CPS['result']["address"] . '", "' . $checkout_id . '", "' . $amount . '", "' . $currency . '", "' . $CPS['result']["amount"] . '", "' . time() . '", "Loading...", "' . $CPS['result']["status_url"] . '","' . $CPS['result']['qrcode_url'] . '","' . $CPS['result']['timeout'] . '")');

        $email_template = $_SERVER['DOCUMENT_ROOT'] . "/email_order_confirmation.html";
        $open_file = fopen($email_template, "r") or die("Unable to open file!");
        $email_content = fread($open_file, filesize($email_template));
        fclose($open_file);

        $email_content = str_replace('[DISCOUNT]', $order['discount'], $email_content);
        $email_content = str_replace('[FIRSTNAME]', $order['firstname'], $email_content);
        $email_content = str_replace('[LASTNAME]', $order['lastname'], $email_content);
        $email_content = str_replace('[STREET_ADDRESS]', $order['street'] . ", " . $order['apartment'], $email_content);
        $email_content = str_replace('[CITY]', $order['city'], $email_content);
        $email_content = str_replace('[COUNTRY]', $order['country'], $email_content);
        $email_content = str_replace('[ZIP]', $order['zip'], $email_content);
        $email_content = str_replace('[PHONE]', $order['phone'], $email_content);
        $email_content = str_replace('[EMAIL]', $order['email'], $email_content);
        $email_content = str_replace('[PRICE]', $order['price'], $email_content);
        $email_content = str_replace('[ITEMS]', $order['items'], $email_content);
        $email_content = str_replace('[PAYMENT_STATUS]', $CPS['result']["status_url"], $email_content);
        $email_content = str_replace('[TOTAL]', number_format($order['price'] - $order['discount'], 2), $email_content);

        $subject = "Order confirmation! #" . $checkout_id;

        \Sophia\Addon\Email::shopping($email_content, $email, $subject);

        session_destroy();

        return ['success' => "/home/payment/" . $checkout_id];
    }
    function validate_order($id)
    {
        return $this->DB->check("SELECT count(id) FROM checkout WHERE id = '" . $id . "'");
    }
    function is_proceed($id)
    {
        return $this->DB->check("SELECT count(id) FROM coinpayments WHERE order_id = '" . $id . "'");
    }
    function order_details($x)
    {
        return $this->DB->select('SELECT * FROM checkout_cart WHERE checkout_id = "' . $x . '"');
    }
    function product_seo($x)
    {
        return $this->DB->fetch('SELECT seo_title as title, seo_keywords as keywords, seo_description as description, url, canonical FROM products WHERE id = "' . ints($x) . '"');
    }
    function crypto_payment($x)
    {
        return $this->DB->fetch('SELECT * FROM coinpayments WHERE order_id = "' . $x . '"') ?? 0;
    }

    function contact()
    {
        $post = $this->check([
            'email' => 'Please type valid email address!',
        ]);
        if (count($post->_errors))
            return $post->_errors[0];

        $post->message = nl2br($post->message);
        \Sophia\Addon\Email::support($post->message, $post->email, $post->name, $post->subject);

        return ['success' => "Thank you. Your message has been sent successfully."];
    }

    function detailss($x)
    {
        return $this->DB->fetch('SELECT * FROM checkout WHERE id = "' . $x . '"') ?? 0;
    }
    public function pay_order($order_id)
    {
        $order_id = (int) $order_id;
        if (!$order_id || !$this->DB->check('SELECT id FROM checkout WHERE id = "' . $order_id . '"') || $this->DB->check('SELECT id FROM payments WHERE user_id = "' . $order_id . '"'))
            return "0";
        $this->DB->query('INSERT INTO payments (user_id) VALUES ("' . $order_id . '")');
        return "1";
    }
    public function payment()
    {
        $post = $this->check([
            'order' => 'error!',
            'stripeToken' => 'error!',
            'name' => 'Type name!',
            'email' => 'Type email!',
        ]);
        if (count($post->_errors))
            return $post->_errors[0];

        // Old Stripe keys removed - now using environment variables

        $public = $_ENV['STRIPE_PUBLIC_KEY'] ?? getenv('STRIPE_PUBLIC_KEY');
        $secret = $_ENV['STRIPE_SECRET_KEY'] ?? getenv('STRIPE_SECRET_KEY');

        $order = $this->DB->fetch('SELECT * FROM checkout WHERE id = "' . $post->order . '"');
        // $currency = strtoupper($post->currency);
        $amount = $order['price'] - $order['discount'];
        // $amount=1;

        $charge = \Sophia\Addon\Stripe::charge($secret, $public, $post->stripeToken, $amount, 0, $post->name, $post->email);
        if (is_Array($charge)) {

            $this->DB->query('INSERT INTO payments (name, user_id, amount, currency, status, txid, email) 
            VALUES ("' . $charge['name'] . '", "' . $post->order . '", "' . $charge['paidAmount'] . '", "' . $charge['paidCurrency'] . '", "' . $charge['payment_status'] . '", "' . $charge['transactionID'] . '", "' . $post->email . '")');

            // \Sophia\Addon\Email::send("Hvala na vasoj narudzbi!", "Hvala vam na ukazanom povjerenju!<br><br>Sad je vrijeme za edukaciju. U nastavku ovog maila nalazi se link od Discord servera. Nakon što se pridružite serveru molim vas pročitajte upute koje se nalaze u kanalu #početak.<br>Nakon što vam bude dobijete permisiju člana, biti će te mogućnosti pristupiti cijeloj zajednici što znači da će te vidjeti sve kanale, te dobiti pristup svim edukativnim materijalima.<br><br>Link discord servera: https://discord.gg/rDKAbnZnqE<br><br>Još jednom vam se zahvaljujemo na ukazanom povjerenju, te obećavamo da ćemo učiniti sve kako bi ga opravdali.<br><br>S poštovanjem,<br>VukForexa.", $post->email, $charge['name'], false);


            if (!$this->DB->check('SELECT id FROM checkout WHERE id = "' . $post->order . '"'))
                return "Order doesn't exist!";


            $email = $order['email'];
            $checkout_id = $order['id'];

            $email_template = $_SERVER['DOCUMENT_ROOT'] . "/email_order_confirmation_stripe.html";
            $open_file = fopen($email_template, "r") or die("Unable to open file!");
            $email_content = fread($open_file, filesize($email_template));
            fclose($open_file);

            $email_content = str_replace('[DISCOUNT]', $order['discount'], $email_content);
            $email_content = str_replace('[FIRSTNAME]', $order['firstname'], $email_content);
            $email_content = str_replace('[LASTNAME]', $order['lastname'], $email_content);
            $email_content = str_replace('[STREET_ADDRESS]', $order['street'] . ", " . $order['apartment'], $email_content);
            $email_content = str_replace('[CITY]', $order['city'], $email_content);
            $email_content = str_replace('[COUNTRY]', $order['country'], $email_content);
            $email_content = str_replace('[ZIP]', $order['zip'], $email_content);
            $email_content = str_replace('[PHONE]', $order['phone'], $email_content);
            $email_content = str_replace('[EMAIL]', $order['email'], $email_content);
            // $email_content = str_replace('[PRICE]', $order['price'], $email_content);
            $email_content = str_replace('[PRICE]', $amount, $email_content);
            $email_content = str_replace('[ITEMS]', $order['items'], $email_content);
            $email_content = str_replace('[PAYMENT_STATUS]', "PAID", $email_content);
            $email_content = str_replace('[TOTAL]', number_format($order['price'] - $order['discount'], 2), $email_content);

            $subject = "Order confirmation! #" . $post->order;

            $EMAIL = \Sophia\Addon\Email::shopping($email_content, $email, $subject);
            session_destroy();


            $checkout = $this->DB->fetch('SELECT * FROM checkout WHERE id = "' . $checkout_id . '"');
            if ($checkout['discount'] > 0) {
                $this->DB->query('UPDATE promo_codes SET used = used + 1 WHERE code = "' . $checkout['discount_code'] . '"');
                $this->DB->query("INSERT INTO used_promo (ip, code) VALUES ('" . ip() . "', '" . $checkout['discount_code'] . "')");
            }


            return ['success' => 'Successful payment!'];
        } else
            return $charge;
    }
    function subscribe()
    {
        $post = $this->check([
            'email' => 'Type valid email address!',
        ]);
        if (count($post->_errors))
            return $post->_errors[0];

        if (!$this->DB->check('SELECT count(id) FROM subscribers WHERE email = "' . $post->email . '"'))
            $this->DB->query('INSERT INTO subscribers (email) VALUES ("' . $post->email . '")');

        return ['success' => true];
    }

    function get_popup_settings()
    {
        $settings = $this->DB->fetch('SELECT * FROM popup_settings');

        if (!$settings) {
            return ['enabled' => 0];
        }

        // Convert enabled to integer for JSON
        $settings['enabled'] = (int) $settings['enabled'];

        // Only return if enabled
        if ($settings['enabled'] != 1) {
            return ['enabled' => 0];
        }

        return $settings;
    }
}
