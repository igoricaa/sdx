<?php

$SHOPIFY = [
"1478"=>"45213950640394",
"1479"=>"45213950738698",
"1480"=>"45216989282570",
"1481"=>"45216989380874",
"1482"=>"45217014513930",
"1483"=>"45217093976330",
"1484"=>"45217094107402",
"1485"=>"45217094140170",
"1289"=>"45213950574858",
"1290"=>"45213950640394",
"1291"=>"45213950804234",
"1292"=>"45216989446410",
"1293"=>"45217014645002",
"1337"=>"45213950574858",
"1338"=>"45213950640394",
"1339"=>"45213950804234",
"1340"=>"45216989446410",
"1341"=>"45217014645002",
"1342"=>"45217094041866",
"1316"=>"45213950607626",
"1317"=>"45213950673162",
"1318"=>"45213950837002",
"1319"=>"45217014448394",
"1320"=>"45217014677770",
"1321"=>"45217094041866",
"1325"=>"45213950607626",
"1326"=>"45213950673162",
"1327"=>"45213950837002",
"1328"=>"45217014448394",
"1329"=>"45217014677770",
"1330"=>"45217094041866",
"1310"=>"45213950607626",
"1311"=>"45213950673162",
"1312"=>"45213950837002",
"1313"=>"45217014448394",
"1314"=>"45217014677770",
"1315"=>"45217094041866",
"1500"=>"45213950640394",
"1501"=>"45213950738698",
"1502"=>"45216989282570",
"1503"=>"45217014513930",
"1504"=>"45217093976330",
"1505"=>"45217094107402",
"1331"=>"45213950673162",
"1250"=>"45213950574858",
"1251"=>"45213950640394",
"1252"=>"45213950804234",
"1253"=>"45216989446410",
"1254"=>"45217014645002",
"1215"=>"45213950574858",
"1216"=>"45213950640394",
"1217"=>"45213950804234",
"1218"=>"45216989446410",
"1219"=>"45217014645002",
"1240"=>"45213950574858",
"1241"=>"45213950640394",
"1242"=>"45213950804234",
"1243"=>"45216989446410",
"1244"=>"45217014645002",
"1373"=>"45216989282570",
"1374"=>"45217014513930",
"1375"=>"45217014677770",
"1376"=>"45217093976330",
"1377"=>"45217094140170",
"1448"=>"45213950804234",
"1449"=>"45216989446410",
"1450"=>"45217014513930",
"1451"=>"45217093878026",
"1452"=>"45217094107402",
"1545"=>"45216989315338",
"1546"=>"45217014612234",
"1547"=>"45217014743306",
"1548"=>"45217094009098",
"1549"=>"45217094172938",
"1514"=>"45213950640394",
"1515"=>"45213950738698",
"1516"=>"45216989282570",
"1517"=>"45216989380874",
"1518"=>"45217014513930",
"1519"=>"45217093976330",
"1520"=>"45217094107402",
"1521"=>"45217094140170",
"1524"=>"45216989315338",
"1525"=>"45217014612234",
"1526"=>"45217014743306",
"1527"=>"45217094009098",
"1528"=>"45217094172938",

];

$checkout = [];
$checkout_shopify = [];
foreach ($data['order'] as $product) {
    $product_id = $product['product_id'];
    $quantity = $product['quantity'];
    $shopify_url = $SHOPIFY[$product_id] . ':' . $quantity;
    $checkout_shopify[] = $shopify_url;
    #$checkout[] = ['sdx_id' => $product_id, 'SHOPIFY_ID' => $SHOPIFY[$product_id], 'SHOPIFY_URL' => $SHOPIFY[$product_id].":".$quantity, 'quantity' => $quantity];
}

$shopify_checkout_url = implode(',', $checkout_shopify);
$cd = $data['details'];

$so_email = $data['details']['email'];
$so_city = $data['details']['city'];
$so_street = $data['details']['street'];
$so_firstname = $data['details']['firstname'];
$so_lastname = $data['details']['lastname'];
$so_state = $data['details']['state'];
$so_zip = $data['details']['zip'];
$so_phone = $data['details']['phone'];

$URL_redirect = "https://gritcraftus.com/cart/$shopify_checkout_url?checkout[email]=$so_email&checkout[shipping_address][address1]=$so_street&checkout[shipping_address][first_name]=$so_firstname&checkout[shipping_address][last_name]=$so_lastname&checkout[shipping_address][city]=$so_city&checkout[shipping_address][province]=$so_state&checkout[shipping_address][zip]=$so_zip&checkout[shipping_address][phone]=$so_phone";

#$URL_redirect1 = "https://gritnow.myshopify.com/cart/$shopify_checkout_url";

?>

<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper" style=" margin: 0; ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">
                        <!--
                        Card Payment-->
                        Credit/Debit Card 
                        </h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="/home/shop">Shop</a></li>
                                <li class="active" aria-current="page">
                        <!--
                        Card Payment-->
                        Credit/Debit Card </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="checkout-section">
    <div class="container">
        <div class="checkout_form" data-aos="fade-up" data-aos-delay="400">
            <div class="row">
                <div class="col-lg-6 col-md-6 mx-auto">
  Thank you!<p> 
Your order has been placed.
<p> 
Within the next 24 hours, you will receive an email containing the payment link necessary for completing your order payment via credit/debit card. 
<p> 
Upon successful payment, a confirmation email will be sent to you.
<p> 
Once your order has shipped, we'll send you a shipping email with your tracking number.
<p> 
Feel free to contact us if you have any other queries or need more information. We appreciate your support!
<p>                    



                    <!--
                    <?php if (count($data['order']) && false) : ?>
                    
                    
<!--
Thank you for choosing SmartDrugsX!

<p>  
<p>  
At the moment card payments are available on request. Please reach out via email, and we will send you payment instructions. 

<p>  We appreciate your trust and look forward to serving you.

<p>  
Best regards,
Joe

                    Please be aware that you will be now redirected to our secure website for a seamless transaction. Upon clicking the next link, you will access a shop named TShirt Hub. Please choose the exact product value and proceed to the checkout. 
</p>
<p>
Rest assured, we prioritize the confidentiality of your data, and this redirection is a precautionary measure to ensure the absolute safety of your purchase. We guarantee that your Moda product will be delivered to you in its entirety.
</p>
<p>
Anticipate the dispatch of your package within 24-72 hours. We sincerely appreciate your ongoing trust and support in making your shopping experience safe and reliable. Thank you for choosing us!
</p>
<p>
    <a href="https://tshirthubnz.com/" rel="noreferrer" target="_blank" class="btn btn-lg btn-golden px-5">Complete Your Order</a>
</p>
<p>
Please be aware that you will be directed to our secure checkout page for a seamless transaction. Upon clicking the next link, you will access a shop named Grit Craft.
</p><p>
Rest assured, we prioritize the confidentiality of your data, and this redirection is a precautionary measure to ensure the absolute safety of your purchase. We guarantee that your Moda product will be delivered to you in its entirety.
</p><p>
Anticipate the dispatch of your package within 24-48 hours. We sincerely appreciate your ongoing trust and support in making your shopping experience safe and reliable. Thank you for choosing us.
</p>
<p class="text-center">
                    <a href="<?=$URL_redirect?>" rel="noreferrer" target="_blank" class="btn btn-lg btn-golden px-5">COMPLETE YOUR PURCHASE</a>
                       </p>             <?php
                                    #echo $URL_redirect;
                                    #echo "<pre>";
                                    #print_r($data['details']);
                                    #echo "</pre>";
                                    ?>
                    <?php else : ?>
                        <p class="font-weight-bold">Order doesn't exist!</p>
                    <?php endif; ?>
                    -->
                </div>
            </div>
        </div>
    </div>
</div>