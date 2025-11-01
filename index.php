<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

#require 'klaviyo.php';
// foreach ($_REQUEST as $req) {
//     $req = strtolower($req);
//     if (
//         strpos($req, 'sleep(') !== false ||
//         strpos($req, '<script') !== false ||
//         strpos($req, '../') !== false ||
//         strpos($req, 'print(') !== false ||
//         strpos($req, 'md5(') !== false ||
//         strpos($req, '..%252f') !== false ||
//         strpos($req, 'nslookup') !== false ||
//         strpos($req, '(select') !== false ||
//         strpos($req, '<!--') !== false ||
//         strpos($req, 'gethostbyname(') !== false ||
//         strpos($req, 'etc/passwd') !== false ||
//         strpos($req, 'etc%252fpasswd') !== false ||
//         strpos($req, 'echo%20') !== false ||
//         strpos($req, 'sysda 
// te(') !== false ||
//         strpos($req, '/win.ini') !== false ||
//         strpos($req, 'file://') !== false ||
//         strpos($req, 'response.write(') !== false ||
//         strpos($req, '<esi:include') !== false ||
//         strpos($req, '\xf0') !== false ||
//         strpos($req, '%5c..') !== false ||
//         strpos($req, '<%00>') !== false ||
//         strpos($req, 'http://') !== false ||
//         strpos($req, 'https://') !== false ||
//         strpos($req, 'chr(') !== false ||
//         strpos($req, 'hex(') !== false ||
//         strpos($req, 'base64_decode(') !== false ||
//         strpos($req, 'OR%20') !== false ||
//         strpos($req, 'OR 1=1') !== false ||
//         strpos($req, 'OR 1=1') !== false
//     ) {
//         header('Content-Type: application/json');
//         die('{"message": "Not valid input.", "error": false}');
//     }
// }


require_once 'sophia/vendor/autoload.php';
session_start();
date_default_timezone_set('Europe/Belgrade');
define('DIR', $_SERVER['DOCUMENT_ROOT']);
define('APP', DIR . '/app');
define('VIEWS', '/views/');
define('CREATE_FILE', '0');
define('PAGINATION', '10');
define('SITENAME', 'SmartDrugsX 🔥');


###PODESAVANJA:
define("EMAIL_NAME", "SmartDrugsX");
define("EMAIL_HOST", "mail.smartdrugsx.co");
define("EMAIL_USERNAME", "noreply@smartdrugsx.co");
define("EMAIL_PASSWORD", 'p9E057cspzKP');

define('DB_HOST', 'localhost');
define('DB_USER', 'smartdrugsx_admin');
define('DB_PASS', 'SmArTnewpassX0987');
define('DB_NAME', 'smartdrugsx_admin');

define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD', 'ixp6kV8n3cQB9eX2j9UZcSgsqJNSiQfT');

$data = [
    'css' => [
        ['bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css'],
        ['fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'],
        ['Roboto', '//fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap'],
        [
            'hono', [
                
                // '/assets/hono/css/vendor/vendor.min.css',
                '/assets/hono/css/vendor/font-awesome.min.css',
                '/assets/hono/css/vendor/ionicons.css',
                '/assets/hono/css/vendor/jquery-ui.min.css',
                '/assets/hono/css/vendor/simple-line-icons.css',
                
                // '/assets/hono/css/plugins/plugins.min.css',
                '/assets/hono/css/plugins/animate.min.css',
                '/assets/hono/css/plugins/aos.min.css',
                '/assets/hono/css/plugins/jquery.lineProgressbar.css',
                '/assets/hono/css/plugins/nice-select.css',
                '/assets/hono/css/plugins/swiper-bundle.min.css',
                '/assets/hono/css/plugins/venobox.min.css',
                
                '/assets/hono/css/style.css',
            ]
        ],
        ["sidebar", "/assets/sidebar.css"]
    ], 'js' => [
        ['bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js'],
        ['jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'],
        ['sweetalert2', 'https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'],
        ['popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'],
        [
            'hono', [
                '/assets/hono/js/vendor/vendorx.min.js',
                // '/assets/hono/js/plugins/plugins.min.js',
                '/assets/hono/js/plugins/ajax-mail.js',
                '/assets/hono/js/plugins/aos.min.js',
                '/assets/hono/js/plugins/jquery.instagramFeed.js',
                '/assets/hono/js/plugins/jquery.lineProgressbar.js',
                '/assets/hono/js/plugins/jquery.nice-select.min.js',
                '/assets/hono/js/plugins/jquery.waypoints.js',
                '/assets/hono/js/plugins/jquery.zoom.min.js',
                '/assets/hono/js/plugins/material-scrolltop.js',
                '/assets/hono/js/plugins/swiper-bundle.min.js',
                '/assets/hono/js/plugins/venobox.min.js',
                
                
                '/assets/hono/js/main.js',
            ]
        ],
        ["sidebar", "/assets/sidebar.js"],
        ["stripe", "https://js.stripe.com/v3/"],
        ["fontawesome", "https://use.fontawesome.com/1f7bec04b9.js"]
    ]
];

$data = \Sophia\Core::init($data);

$data['view'] = isset($data['view']) ? $data['view'] : '';
$data['page'] = isset($data['page']) ? $data['page'] : '';

$data['view'] = $data['view'] ?? '';
$data['page'] = $data['page'] ?? '';


if ($data['view'] == "") Return500();
if ($data['page'] == "") Return500();
if ($data['page'] == "4") Return500();
if ($_SERVER['HTTP_HOST'] == "51.222.156.28") Return500();
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Google tag (gtag.js) TNR4B1QNBB-->

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TNR4B1QNBB"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-TNR4B1QNBB');
    </script>
    <title><?= SITENAME .  (($data['title'] ?? NULL) ? " | " . $data['title'] : '') ?></title>
    <meta charset="utf-8">
    <meta name="description" content="<?= $data['description'] ?? '' ?>">
    <meta name="keywords" content="<?= $data['keywords'] ?? '' ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" type="image/png" href="/assets/smartdrugsx/favicon/favicon.ico" />
    <?php \Sophia\Stylesheet::page($data); ?>
    <script src="https://kit.fontawesome.com/3281016085.js" crossorigin="anonymous"></script>
    <!-- <script async type="text/javascript" src="https://static.klaviyo.com/onsite/js/klaviyo.js?company_id=YtZu8J"></script> -->
    <script async type="text/javascript" src="https://static.klaviyo.com/onsite/js/klaviyo.js?company_id=UEJZUV"></script>
    <style>
.image-class {
  display: block;
  width: 100%;
  height: auto;
}

.image-class.desktop {
  display: block;
}

.image-class.mobile {
  display: none;
}

@media (max-width: 768px) {
  .image-class.desktop {
    display: none;
  }

  .image-class.mobile {
    display: block;
  }
}

    </style>
</head>

<body>
    <!--
    <div id="loading">
        <div id="loaderC">
            <div id="loader"></div>
        </div>
    </div>
    -->
    <?php content($data['view'] . '.php', $data); ?>
</body>
<?php \Sophia\Javascript::page($data); ?>

</html>