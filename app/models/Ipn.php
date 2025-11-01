<?php

namespace Model;

class Ipn extends \Sophia\Controller
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
    function coinpayments_ipn()
    {
        if (!isset($_POST['txn_id'])) return false;
        $txn_id      = $_POST['txn_id'];
        $status      = intval($_POST['status']);
        $status_text = $_POST['status_text'];
        $this->DB->query("UPDATE coinpayments SET description = '$status_text', status = '$status' WHERE txn_id = '$txn_id'");
        if ($status >= 100) {
            $checkout_id = $this->DB->check('SELECT order_id FROM coinpayments WHERE txn_id = "'.$txn_id.'"');
            $email_template = $_SERVER['DOCUMENT_ROOT'] . "/email_payment_received.html";
            $open_file = fopen($email_template, "r") or die("Unable to open file!");
            $email_content = fread($open_file, filesize($email_template));
            fclose($open_file);
            $order = $this->DB->fetch('SELECT * FROM checkout WHERE id = "' . $checkout_id . '"');
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
            $subject = "Payment confirmed! #" . $order['id'];
            \Sophia\Addon\Email::shopping($email_content, $order['email'], $subject);

            $checkout = $this->DB->fetch('SELECT * FROM checkout WHERE id = "'.$checkout_id.'"');
            if ($checkout['discount'] > 0) {
                $this->DB->query('UPDATE promo_codes SET used = used + 1 WHERE code = "' . $checkout['discount_code'] . '"');
                $this->DB->query("INSERT INTO used_promo (ip, code) VALUES ('" . ip() . "', '" . $checkout['discount_code'] . "')");
            }
        }
        die('IPN OK');
    }
}
