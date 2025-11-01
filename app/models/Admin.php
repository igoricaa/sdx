<?php

namespace Model;

class Admin extends \Sophia\Controller
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
    function isAuth()
    {
        return isset($_SESSION['admin']) ? true : false;
    }
    function pending_orders()
    {
        return $this->DB->check('SELECT count(id) FROM checkout WHERE status = 0');
    }
    function pending_reviews()
    {
        return $this->DB->check('SELECT count(id) FROM reviews WHERE status = 0');
    }

    function category($ID)
    {
        return $this->DB->fetch('SELECT * FROM categories WHERE id = "' . ints($ID) . '"');
    }
    function order($x)
    {
        $return['data'] = $this->DB->fetch('SELECT * FROM checkout WHERE id = "' . $x . '"');
        $products = $this->DB->select('SELECT * FROM checkout_cart WHERE checkout_id = "' . $x . '"');
        foreach ($products as $product) {
            $pack = $this->DB->check('SELECT name FROM product_package WHERE id = "' . $product['product_id'] . '"');
            $product['product_id'] = $this->DB->check('SELECT product_id FROM product_package WHERE id = "' . $product['product_id'] . '"');
            $product['product_name'] = $this->DB->check('SELECT title FROM products WHERE id = "' . $product['product_id'] . '"') . " (" . $pack . ")";

            $product['img'] = $this->DB->check('SELECT main_image FROM products WHERE id = "' . $product['product_id'] . '"');

            if($product['product_id'] == 0) $product['product_name'] = "SHIPPING";
            $return['cart'][] = $product;
        }
        $return['customer']['orders'] = $this->DB->check('SELECT count(id) FROM checkout WHERE email = "' . $return['data']['email'] . '"');
        $return['timeline'] = $this->DB->select('SELECT * FROM order_timeline WHERE checkout_id = "' . $x . '"');

        $return['coinpayments'] = $this->DB->select('SELECT * FROM coinpayments WHERE order_id = "' . $x . '"');

        return $return;
    }
    function customer($email)
    {
        $return['data'] = $this->DB->fetch('SELECT * FROM customers WHERE email = "' . isEmail($email) . '"');
        $return['orders'] = $this->DB->fetch('SELECT sum(price) as spent, (sum(price)/count(id)) as average, count(id) as total FROM checkout WHERE email = "' . isEmail($email) . '"');
        return $return;
    }
    function categories_list()
    {
        return $this->DB->select('SELECT id, name FROM categories WHERE removed = 0 AND status = 0');
    }
    function promo_codes()
    {
        return $this->DB->select('SELECT * FROM promo_codes');
    }
    function payments()
    {
        return $this->DB->select('SELECT * FROM coinpayments');
    }

    function categories($page)
    {
        $s = $page * PAGINATION - PAGINATION;
        $post = $this->check([
            'search' => ''
        ]);
        $data = $this->DB->select("SELECT * FROM categories WHERE name LIKE '%$post->search%' AND removed = 0 ORDER BY id DESC LIMIT $s, " . PAGINATION);
        $count = $this->DB->check("SELECT count(id) FROM categories WHERE name LIKE '%$post->search%' AND removed = 0");
        return ['pages' => ceil($count / PAGINATION), 'results' => $count, 'data' => $data, 'start' => PAGINATION * $page - PAGINATION + 1];
    }
    function product($id)
    {
        $ID = ints($id);
        $return['product_package'] = $this->DB->select('SELECT * FROM product_package WHERE product_id = "' . $ID . '"');
        $return['description'] = $this->DB->select('SELECT * FROM product_description WHERE product_id = "' . ints($id) . '"');
        $return['data'] = $this->DB->fetch('SELECT * FROM products WHERE id = "' . ints($id) . '"');
        $return['img'] = $this->DB->select('SELECT * FROM product_images WHERE product_id = "' . ints($id) . '"');
        $return['quantity_discount'] = $this->DB->select('SELECT * FROM quantity_discount WHERE product_id = "' . ints($id) . '"');
        return $return;
    }
    function orders($page)
    {
        $s = $page * PAGINATION - PAGINATION;
        $post = $this->check([
            'search' => ''
        ]);
        if ($post->status != 0) {
            $znak = "=";
            $catg = $post->status - 1;
        } else {
            $znak = ">=";
            $catg = 0;
        }
        $sch = $post->search;
        $data = $this->DB->select("SELECT * FROM checkout WHERE (firstname LIKE '%$sch%' OR lastname LIKE '%$sch%' OR email LIKE '%$sch%' OR city LIKE '%$sch%' OR zip LIKE '%$sch%' OR phone LIKE '%$sch%' OR hash LIKE '%$sch%') AND status $znak $catg ORDER BY id DESC LIMIT $s, " . PAGINATION);
        $count = $this->DB->check("SELECT count(id) FROM checkout WHERE (firstname LIKE '%$sch%' OR lastname LIKE '%$sch%' OR email LIKE '%$sch%' OR city LIKE '%$sch%' OR zip LIKE '%$sch%' OR phone LIKE '%$sch%' OR hash LIKE '%$sch%') AND status $znak $catg");

        $ct = count($data);
        for ($i = 0; $i < $ct; $i++) {
            $data[$i]['payment'] = $this->DB->check('SELECT description FROM coinpayments WHERE order_id = "' . $data[$i]['id'] . '"');
            if ($this->DB->check('SELECT id FROM payments WHERE user_id = "' . $data[$i]['id'] . '"')) $data[$i]['payment'] = "Paid by card!";
            // $data[$i]['payment'] = $this->DB->check('SELECT description FROM coinpayments WHERE order_id = "'.$data[$i]['id'].'"');
        }


        return ['pages' => ceil($count / PAGINATION), 'results' => $count, 'data' => $data, 'start' => PAGINATION * $page - PAGINATION + 1, 'sql' => "SELECT * FROM checkout WHERE (firstname LIKE '%$sch%' OR lastname LIKE '%$sch%' OR email LIKE '%$sch%' OR city LIKE '%$sch%' OR zip LIKE '%$sch%' OR phone LIKE '%$sch%' OR hash LIKE '%$sch%') AND status $znak $catg"];
    }
    function login()
    {
        $post = $this->check([
            'username' => 'Type username',
            'password' => 'Type password'
        ]);
        if (count($post->_errors)) return $post->_errors[0];

        if ($post->username != ADMIN_USERNAME || $post->password != md50(ADMIN_PASSWORD)) return "Invalid creditinails";

        $_SESSION['admin'] = true;

        return ['success' => 'Success!'];
    }
    function products($page)
    {
        $s = $page * PAGINATION - PAGINATION;
        $post = $this->check([
            'search' => ''
        ]);
        if ($post->status != 0) {
            $znak = "=";
            $catg = $post->status - 1;
        } else {
            $znak = ">=";
            $catg = 0;
        }
        $sch = $post->search;
        $data = $this->DB->select("SELECT * FROM products WHERE title LIKE '%$sch%' AND status $znak $catg AND removed = 0 ORDER BY id DESC LIMIT $s, " . PAGINATION);
        $count = $this->DB->check("SELECT count(id) FROM products WHERE title LIKE '%$sch%' AND status $znak $catg AND removed = 0");
        return ['pages' => ceil($count / PAGINATION), 'results' => $count, 'data' => $data, 'start' => PAGINATION * $page - PAGINATION + 1, 'sql' => "SELECT * FROM checkout WHERE (firstname LIKE '%$sch%' OR lastname LIKE '%$sch%' OR email LIKE '%$sch%' OR city LIKE '%$sch%' OR zip LIKE '%$sch%' OR phone LIKE '%$sch%' OR hash LIKE '%$sch%') AND status $znak $catg"];
    }
    function reviews()
    {
        $return = [];
        $products = $this->DB->select("SELECT * FROM products WHERE removed = 0");
        foreach ($products as $product) {
            $product['reviews'] = $this->DB->check('SELECT count(id) FROM reviews WHERE product_id = "' . $product['id'] . '" AND status = 1');
            $return[] = $product;
        }
        return $return;
    }
    function review($product)
    {
        return $this->DB->select('SELECT * FROM reviews WHERE product_id = "' . $product . '" AND (status = 1 OR status = 2) ');
    }
    function customer_reviews()
    {
        $return = [];
        $reviews = $this->DB->select('SELECT * FROM reviews WHERE status = 0');
        foreach ($reviews as $review) {
            $review['product'] = $this->DB->check('SELECT title FROM products WHERE id = "' . $review['product_id'] . '"');
            $return[] = $review;
        }
        return $return;
    }
    function customers($page)
    {
        $s = $page * PAGINATION - PAGINATION;
        $post = $this->check([
            'search' => ''
        ]);
        // if ($post->status != 0) {
        //     $znak = "=";
        //     $catg = $post->status - 1;
        // } else {
        //     $znak = ">=";
        //     $catg = 0;
        // }
        $sch = $post->search;
        // $data = $this->DB->select("SELECT * FROM customers WHERE firstname LIKE '%$sch%' OR lastname LIKE '%$sch%' OR email LIKE '%$sch%' OR city LIKE '%$sch%' OR zip LIKE '%$sch%' OR phone LIKE '%$sch%' ORDER BY id DESC LIMIT $s, " . PAGINATION);
        $customers = $this->DB->select("SELECT * FROM customers WHERE firstname LIKE '%$sch%' OR lastname LIKE '%$sch%' OR email LIKE '%$sch%' OR city LIKE '%$sch%' OR zip LIKE '%$sch%' OR phone LIKE '%$sch%' ORDER BY id DESC LIMIT $s, " . PAGINATION);
        foreach ($customers as $customer) {
            list($customer['orders'], $customer['spent']) = $this->DB->values('SELECT count(id), sum(price) FROM checkout WHERE email = "' . $customer['email'] . '"');
            $customer['spent'] = dec2($customer['spent']);
            $data[] = $customer;
        }
        // $data = $this->DB->select("SELECT customers.id, customers.email, customers.firstname, customers.lastname, count(checkout.id) as orders, sum(checkout.price) as spent FROM customers, checkout WHERE customers.email = checkout.email ORDER BY customers.id DESC LIMIT $s, " . PAGINATION);
        $count = $this->DB->check("SELECT count(id) FROM customers WHERE firstname LIKE '%$sch%' OR lastname LIKE '%$sch%' OR email LIKE '%$sch%' OR city LIKE '%$sch%' OR zip LIKE '%$sch%' OR phone LIKE '%$sch%'");
        return ['pages' => ceil($count / PAGINATION), 'results' => $count, 'data' => $data, 'start' => PAGINATION * $page - PAGINATION + 1];
    }

    function order_sent()
    {
        $post = $this->check([]);
        $content = "Kod za praćenje: " . $post->tracking . "; Pošta: " . $post->delivery;
        $this->DB->query('INSERT INTO order_timeline (checkout_id,action,content) VALUES ("' . $post->order . '", "7", "' . $content . '") ');
        if ($post->email) {
            #poslati email kupcu
            $this->DB->query('INSERT INTO order_timeline (checkout_id,action,content) VALUES ("' . $post->order . '", "9", "") ');

            $email_template = $_SERVER['DOCUMENT_ROOT'] . "/email_order_shipped.html";
            $open_file = fopen($email_template, "r") or die("Unable to open file!");
            $email_content = fread($open_file, filesize($email_template));
            fclose($open_file);

            $order = $this->DB->fetch('SELECT * FROM checkout WHERE id = "' . $post->order . '"');

            $email_content = str_replace('[DISCOUNT]', $order['discount'], $email_content);
            $email_content = str_replace('[TOTAL]', number_format($order['price'] - $order['discount'], 2), $email_content);

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
            $email_content = str_replace('[ORDER_TRACKING_NUMBER]', $post->tracking, $email_content);

            $subject = "Order sent! #" . $post->order;

            $EMAIL = \Sophia\Addon\Email::shopping($email_content, $order['email'], $subject);
            // var_dump($EMAIL);
        }
        if (!$this->DB->query('UPDATE checkout SET status = 1 WHERE id = "' . $post->order . '" AND status = 0')) return "Nepoznata greška!";
        return ['success' => 'Pošiljka je označena kao poslata!'];
    }

    function order_return()
    {
        $post = $this->check([]);
        $content = "Pošiljka je vraćena!";
        $this->DB->query('INSERT INTO order_timeline (checkout_id,action,content) VALUES ("' . $post->order . '", "8", "' . $content . '") ');
        if ($post->email) {
            #poslati email kupcu
            $this->DB->query('INSERT INTO order_timeline (checkout_id,action,content) VALUES ("' . $post->order . '", "10", "") ');

            \Sophia\Addon\Email::send("Package returned! #" . $post->order, "<p>Package returned!</p>", $post->email);
        }
        if (!$this->DB->query('UPDATE checkout SET status = 2 WHERE id = "' . $post->order . '" AND status = 1')) return "Nepoznata greška!";
        return ['success' => 'Pošiljka je označena kao vraćena!'];
    }


    function create_category()
    {
        $post = $this->check([
            'name' => 'Unesite ime kategorije!'
        ]);
        if (count($post->_errors)) return $post->_errors[0];

        $URL = format_uri($post->name);

        if ($this->DB->check('SELECT count(id) FROM categories WHERE url = "' . $URL . '"')) return 'Izaberite drugi ime kategorije!';

        $this->DB->query('INSERT INTO categories (name,url,description,status) VALUES ("' . $post->name . '", "' . $URL . '", "' . $post->description . '", "' . $post->status . '")');

        return ['success' => 'Kategorija je uspešno kreirana!'];
    }

    function sendReview()
    {
        $post = $this->check([
            'id' => 'Unesite Review ID!',
            'status' => 'Unesite Review status!'
        ]);
        if (count($post->_errors)) return $post->_errors[0];

        if ($post->status == 1 || $post->status == 2) $this->DB->query('UPDATE reviews SET status = ' . $post->status . ' WHERE id = "' . $post->id . '"');

        if ($post->status == 2)
            return ['success' => 'Declined!'];
        elseif ($post->status == 1)
            return ['success' => 'Confirmed!'];
        return "error";
    }
    function addPromoCode()
    {
        $post = $this->check([
            'code' => 'Unesite code!',
            'discount' => 'Unesite discount %!'
        ]);
        if (count($post->_errors)) return $post->_errors[0];

        if ($this->DB->check('SELECT id FROM promo_codes WHERE code = "' . $post->code . '"'))
            return "Promo code already exist!";

        $this->DB->query('INSERT INTO promo_codes (code,discount,type) VALUES ("' . $post->code . '","' . $post->discount . '","1")');

        return ['success' => 'Added!'];
    }
    function updatePromoCode()
    {
        $post = $this->check([
            'code' => 'Unesite code!',
            // 'enable' => 'Unesite enable!'
        ]);
        if (count($post->_errors)) return $post->_errors[0];

        $this->DB->query('UPDATE promo_codes SET status = "' . $post->enable . '" WHERE code = "' . $post->code . '"');

        return ['success' => 'Updated!'];
    }
    function edit_category()
    {
        $post = $this->check([
            'ID' => 'Greška ID kategorije!',
            'name' => 'Unesite ime kategorije!',
        ]);
        if (count($post->_errors)) return $post->_errors[0];

        $URL = format_uri($post->name);

        $this->DB->query('UPDATE categories SET name = "' . $post->name . '", url = "' . $URL . '", description = "' . $post->description . '", status = "' . $post->status . '" WHERE id = "' . $post->ID . '" ');

        return ['success' => 'Kategorija je uspešno izmenjena!'];
    }
    function subscribers()
    {
        return $this->DB->select('SELECT * FROM subscribers');
    }
    function buyersList()
    {
        return $this->DB->select('SELECT DISTINCT email FROM `checkout` WHERE status = 1');
    }
    
    function delete_category()
    {
        $post = $this->check([
            'ID' => 'Greška ID kategorije!'
        ]);
        if (count($post->_errors)) return $post->_errors[0];

        $this->DB->query('UPDATE categories SET removed = 1, status = 1 WHERE id = "' . $post->ID . '" ');

        return ['success' => 'Kategorija je uspešno obrisana!'];
    }
    function delete_product()
    {
        $post = $this->check([
            'ID' => 'Greška ID product(s)!'
        ]);
        if (count($post->_errors)) return $post->_errors[0];

        $this->DB->query('UPDATE products SET removed = 1, status = 1 WHERE id = "' . $post->ID . '" ');

        return ['success' => 'Proizvod je uspešno obrisan!'];
    }
    function new_product()
    {
        $post = $this->check([
            'name' => 'Unesite naziv product(s)!',
            'category' => 'Izaberite kategoriju!',
        ]);
        if (count($post->_errors)) return $post->_errors[0];

        if (empty($post->seo_title)) $post->seo_title = $post->name;
        if (empty($post->seo_keywords)) $post->seo_keywords = $post->name;
        if (empty($post->seo_description)) $post->seo_description = $post->description;

        $post->seo_title = seo_desc($post->seo_title);
        $post->seo_keywords = seo_desc($post->seo_keywords);
        $post->seo_description = seo_desc($post->seo_description);

        $post->main_image = "";

        $i = 0;
        $URL = format_uri($post->name);
        while ($this->DB->check('SELECT count(id) FROM products WHERE url = "' . $URL . '"')) {
            $URL = $URL . "-" . $i++;
        }
        $canonical = $this->DB->check('SELECT url FROM categories WHERE id = "' . $post->category . '"') . '/' . $URL;

        $this->DB->query('INSERT INTO products (canonical,url,title,description,selling_price,compare_price,purchase_price,sku,barcode,track_inventory,inventory,sell_out_of_stock,physical_product,weight,type,vendor,category,tags,variants,status,seo_title,seo_description,seo_keywords,main_image) VALUES ("' . $canonical . '","' . $URL . '","' . $post->name . '", "' . $post->description . '", "' . $post->selling_price . '", "' . $post->compare_price . '", "' . $post->purchase_price . '", "' . $post->sku . '", "' . $post->barcode . '", "' . $post->track_inventory . '", "' . $post->inventory . '", "' . $post->sell_out_of_stock . '", "' . $post->physical_product . '", "' . $post->weight . '", "' . $post->type . '","' . $post->vendor . '", "' . $post->category . '", "' . $post->tags . '", "' . $post->variants . '", "' . $post->status . '", "' . $post->seo_title . '", "' . $post->seo_description . '", "' . $post->seo_keywords . '", "' . $post->main_image . '")');

        return ['success' => "Proizvod je uspešno dodat!"];
    }
    function edit_product()
    {

        $post = $this->check([
            'name' => 'Unesite naziv product(s)!',
            'category' => 'Izaberite kategoriju!',
        ]);
        // return json_encode($post);

        if (count($post->_errors)) return $post->_errors[0];

        if (empty($post->seo_title)) $post->seo_title = $post->name;
        if (empty($post->seo_keywords)) $post->seo_keywords = $post->name;
        if (empty($post->seo_description)) $post->seo_description = $post->description;

        $post->seo_title = seo_desc($post->seo_title);
        $post->seo_keywords = seo_desc($post->seo_keywords);
        $post->seo_description = seo_desc($post->seo_description);

        $AllowedFiles = ['jpg', 'png', 'jpeg', 'gif'];
        $img_seo_name = "prodaja cena modafinila i kamagre srbija " . $post->name . " " . $post->tags . " " . $post->seo_keywords . " " . $post->seo_title;
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/assets/content/';

        $img_files = [];
        $addedImages = $all_images = 0;

        $product_images = $this->DB->select('SELECT url FROM product_images WHERE product_id = "' . $post->product_id . '"');
        foreach ($product_images as $img) {
            $imageFileType = explode('.', $img['url']);
            $imageFileType = end($imageFileType);
            $newName = imgName($img_seo_name, $imageFileType, $target_dir);

            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $img['url'])) {
                rename($_SERVER['DOCUMENT_ROOT'] . $img['url'], $target_dir . $newName);
                $this->DB->query('UPDATE product_images SET url = "/assets/content/' . $newName . '" WHERE url = "' . $img['url'] . '"');
            }
        }

        $post->main_image = $this->DB->check('SELECT url FROM product_images WHERE id = "' . $post->main_image . '"');

        $i = 0;
        $URL = format_uri($post->name);

        while ($this->DB->check('SELECT count(id) FROM products WHERE url = "' . $URL . '" AND id <> "' . $post->product_id . '"')) {
            $URL = $URL . "-" . $i++;
        }
        $canonical = $this->DB->check('SELECT url FROM categories WHERE id = "' . $post->category . '"') . '/' . $URL;


        $discount = $post->compare_price > 0 ? 100 - $post->selling_price * 100 / $post->compare_price : 0;

        $this->DB->query('UPDATE products SET
        title = "' . $post->name . '",
        url = "' . $URL . '",
        discount = "' . $discount . '",
        canonical = "' . $canonical . '",
        description = "' . $post->description . '",
        selling_price = "' . $post->selling_price . '",
        compare_price = "' . $post->compare_price . '",
        purchase_price = "' . $post->purchase_price . '",
        sku = "' . $post->sku . '",
        barcode = "' . $post->barcode . '",
        track_inventory = "' . $post->track_inventory . '",
        inventory = "' . $post->inventory . '",
        sell_out_of_stock = "' . $post->sell_out_of_stock . '",
        physical_product = "' . $post->physical_product . '",
        weight = "' . $post->weight . '",
        type = "' . $post->type . '",
        vendor = "' . $post->vendor . '",
        category = "' . $post->category . '",
        tags = "' . $post->tags . '",
        variants = "' . $post->variants . '",
        status = "' . $post->status . '",
        seo_title = "' . $post->seo_title . '",
        seo_description = "' . $post->seo_description . '",
        seo_keywords = "' . $post->seo_keywords . '",
        main_image = "' . $post->main_image . '"
        WHERE id = "' . $post->product_id . '"');

        $this->DB->query('DELETE FROM quantity_discount WHERE product_id = "' . $post->product_id . '"');
        if ($post->quantity_discount == 1) {
            $discount_inputs = count($post->quantity_discount_num);
            for ($i = 0; $i < $discount_inputs; $i++) {
                $quantity = ints($post->quantity_discount_num[$i]);
                $price = int($post->quantity_discount_price[$i]);
                if ($quantity > 0) $this->DB->query('INSERT INTO quantity_discount (product_id,quantity,discount) VALUES ("' . $post->product_id . '", "' . $quantity . '", "' . $price . '")');
            }
        }

        if (isset($post->delete_image) && count($post->delete_image)) {
            foreach ($post->delete_image as $del) {
                $this->DB->query('UPDATE product_images SET product_id = 0 WHERE id = "' . ints($del) . '"');
            }
        }

        if (!empty($post->img_url))
            foreach ($post->img_url as $img) {
                $imageName = downloadIMG($img, $target_dir, $img_seo_name, $AllowedFiles);
                if ($imageName !== false) {
                    $addedImages++;
                    $all_images++;
                    $img_files[] = str_replace($_SERVER['DOCUMENT_ROOT'], '', $target_dir . $imageName);
                    // $this->DB->query('INSERT INTO product_images (product_id,url) VALUES ("' . $post->product_id . '", "' . $file_dest . '") ');
                }
            }
        $images = count($post->media['name']);
        if (!empty($post->media['name'][0])) {
            for ($i = 0; $i < $images; $i++) {
                $all_images++;
                $info = [];
                $test_file = $target_dir . basename($post->media["name"][$i]);
                $imageFileType = strtolower(pathinfo($test_file, PATHINFO_EXTENSION));
                $imageName = imgName($img_seo_name, $imageFileType, $target_dir);
                $target_file = $target_dir . $imageName;

                if (getimagesize($post->media["tmp_name"][$i]) === false)
                    $info[] = "File is not an image.";

                if (file_exists($target_file))
                    $info[] = "Sorry, file already exists.";

                if ($post->media["size"][$i] > 500000)
                    $info[] = "Sorry, your file is too large.";

                if (!in_array($imageFileType, $AllowedFiles))
                    $info[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

                if (count($info) == 0) {
                    if (move_uploaded_file($post->media["tmp_name"][$i], $target_file)) {
                        $addedImages++;
                        $img_files[] = str_replace($_SERVER['DOCUMENT_ROOT'], '', $target_dir . $imageName);
                    } else
                        $info[] = "Sorry, there was an error uploading your file.";
                }
                $return['img'][] = $info;
            }
        }

        foreach ($img_files as $img) {
            $this->DB->query('INSERT INTO product_images (product_id,url) VALUES ("' . $post->product_id . '", "' . $img . '") ');
        }

        $main = $this->DB->check('SELECT main_image FROM products WHERE id = "' . $post->product_id . '"');
        if (!$this->DB->check('SELECT id FROM product_images WHERE product_id = "' . $post->product_id . '" AND url = "' . $main . '"')) {
            $new = $this->DB->check('SELECT url FROM product_images WHERE id = "' . $post->product_id . '"');
            $this->DB->query('UPDATE products SET main_image = "' . $new . '" WHERE id = "' . $post->product_id . '"');
        }

        if (!empty($post->collapse_name)) {
            $this->DB->query('DELETE FROM product_description WHERE product_id = "' . $post->product_id . '"');

            $collapse_desc = count($post->collapse_name);
            for ($i = 0; $i < $collapse_desc; $i++) {
                if (!empty($post->collapse_name))
                    $this->DB->query('INSERT INTO product_description (product_id,title,content) VALUES ("' . $post->product_id . '", "' . $this->DB->escape($post->collapse_name[$i]) . '", "' . $this->DB->escape($post->collapse_description[$i]) . '") ');
            }
        }

        // package_name
        // package_price
        #?????????
        $this->DB->query('DELETE FROM product_package WHERE product_id = "' . $post->product_id . '"');
        $packages = count($post->package_name);
        for ($i = 0; $i < $packages; $i++) {
            if (empty($post->package_name[$i])) continue;

            $post->package_name[$i] = $this->DB->escape($post->package_name[$i]);
            $price = int($post->package_price[$i]);

            $this->DB->query('INSERT INTO product_package (product_id, name, price) 
            VALUES ("' . $post->product_id . '", "' . $post->package_name[$i] . '", "' . $post->package_price[$i] . '") ');
        }


        $img_info = $addedImages != $all_images ? "\nDodato $addedImages od $all_images fotografija!" . json_encode($return['img']) : '';
        if (!empty($img_info)) return $img_info;
        return ['success' => "Proizvod je uspešno izmenjen!"];
    }
    function post_note()
    {
        $post = $this->check([
            'ID' => 'ID error!',
            'note' => 'Unesite napomenu!',
        ]);
        if (count($post->_errors)) return $post->_errors[0];

        $this->DB->query('INSERT INTO order_timeline (checkout_id,action,content) VALUES ("' . $post->ID . '", "3", "' . $post->note . '") ');


        return ['success' => "Napomena je uspešno dodata!"];
    }
    function updateContact()
    {
        $post = $this->check([
            'ID' => 'ID error!',
            // 'phone' => 'Unesite napomenu!',
            // 'email' => 'Unesite napomenu!',
            // 'update' => 'Unesite napomenu!',
        ]);
        if (count($post->_errors)) return $post->_errors[0];

        list($email, $phone) = $this->DB->values('SELECT email, phone FROM checkout WHERE id = "' . $post->ID . '"');
        $content = $email . ' -> ' . $post->email . '; ' . $phone . ' -> ' . $post->phone;
        $this->DB->query('INSERT INTO order_timeline (checkout_id,action,content) VALUES ("' . $post->ID . '", "4", "' . $content . '") ');
        $this->DB->query('UPDATE checkout SET email = "' . $post->email . '", phone="' . $post->phone . '" WHERE id = "' . $post->ID . '"');

        if ($post->update) {

            list($email, $phone) = $this->DB->values('SELECT email, phone FROM customers WHERE email = "' . $post->email . '"');
            $content = $email . ' -> ' . $post->email . '; ' . $phone . ' -> ' . $post->phone;
            $this->DB->query('INSERT INTO order_timeline (checkout_id,action,content) VALUES ("' . $post->ID . '", "5", "' . $content . '") ');
            $this->DB->query('UPDATE customers SET email = "' . $post->email . '", phone="' . $post->phone . '" WHERE email = "' . $post->email . '"');
        }

        return ['success' => "Uspešno izmenjeni podaci!"];
    }
    function updateAddress()
    {
        $post = $this->check([
            'ID' => 'ID error!',
            // ['ID', 'ints'],
            // ['zip', 'ints'],
            // 'firstname',
            // 'lastname',
            // 'street',
            // 'address',
            // 'country'
        ]);
        if (count($post->_errors)) return $post->_errors[0];

        list($firstname, $lastname, $street, $zip, $country, $city) = $this->DB->values('SELECT firstname, lastname, street, zip, country,city FROM checkout WHERE id = "' . $post->ID . '"');
        $content = $firstname . ' -> ' . $post->firstname . '; ' . $lastname . ' -> ' . $post->lastname . '; ' . $street . ' -> ' . $post->street . '; ' . $zip . ' -> ' . $post->zip . '; ' . $city . ' -> ' . $post->city . '; ' . $country . ' -> ' . $post->country;
        $this->DB->query('INSERT INTO order_timeline (checkout_id,action,content) VALUES ("' . $post->ID . '", "6", "' . $content . '") ');
        $this->DB->query('UPDATE checkout SET 
        firstname = "' . $post->firstname . '",
        lastname = "' . $post->lastname . '",
        street = "' . $post->street . '",
        city = "' . $post->city . '",
        zip = "' . $post->zip . '", 
        country ="' . $post->country  . '" 
        WHERE id = "' . $post->ID . '"');

        return ['success' => "Uspešno izmenjeni podaci!"];
    }

    function customer_add_note()
    {
        $post = $this->check([
            'ID' => 'ID error!',
            'note' => 'Unesite napomenu!',
        ]);
        if (count($post->_errors)) return $post->_errors[0];

        $this->DB->query('UPDATE customers SET note = concat(note, "; ' . $post->note . '") WHERE id = "' . $post->ID . '"');

        return ['success' => "Uspešno dodata napomena!"];
    }

    function customer_update_contact()
    {
        $post = $this->check([
            'ID' => 'ID error!',
            // 'phone' => 'Unesite napomenu!',
            // 'email' => 'Unesite napomenu!',
            // 'update' => 'Unesite napomenu!',
        ]);
        if (count($post->_errors)) return $post->_errors[0];
        $this->DB->query('UPDATE customers SET email = "' . $post->email . '", phone="' . $post->phone . '" WHERE id = "' . $post->ID . '"');
        return ['success' => "Uspešno izmenjeni podaci!"];
    }
    function customer_update_address()
    {
        $post = $this->check([
            'ID' => 'ID error!',
            // ['ID', 'ints'],
            // ['zip', 'ints'],
            // 'firstname',
            // 'lastname',
            // 'street',
            // 'address',
            // 'country'
        ]);
        if (count($post->_errors)) return $post->_errors[0];

        // list($firstname, $lastname, $street, $zip, $country, $city) = $this->DB->values('SELECT firstname, lastname, street, zip, country,city FROM checkout WHERE id = "' . $post->ID . '"');
        // $content = $firstname . ' -> ' . $post->firstname . '; ' . $lastname . ' -> ' . $post->lastname . '; ' . $street . ' -> ' . $post->street . '; ' . $zip . ' -> ' . $post->zip . '; ' . $city . ' -> ' . $post->city . '; ' . $country . ' -> ' . $post->country;
        // $this->DB->query('INSERT INTO order_timeline (checkout_id,action,content) VALUES ("' . $post->ID . '", "6", "' . $content . '") ');
        $this->DB->query('UPDATE customers SET 
        firstname = "' . $post->firstname . '",
        lastname = "' . $post->lastname . '",
        street = "' . $post->street . '",
        city = "' . $post->city . '",
        zip = "' . $post->zip . '", 
        country ="' . $post->country  . '" 
        WHERE id = "' . $post->ID . '"');

        return ['success' => "Uspešno izmenjeni podaci!"];
    }
}
