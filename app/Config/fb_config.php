<?php
define('FACEBOOK_LOGIN_SUCCESS', 'Facebook Login Successfully');
define('FACEBOOK_LOGIN_FAILURE', 'Something went wrong !!!');

//base path của web
define('BASE_PATH', 'http://yummy-fruit-store.tmh-techlab.vn/');

//thông tin facebook app
define('FACEBOOK_APP_ID', '350297165393731'); // bạn hãy thay XYZ bằng App ID trước đó đã lấy được
define('FACEBOOK_APP_SECRET', 'a159c5ed1e66c9972f68493ad8ccebb4'); // tiếp đó là thay ABC bằng App Secret của bạn
define('FACEBOOK_REDIRECT_URI', 'http://yummy-fruit-store.tmh-techlab.vn/users/fblogin');



require_once(APP . 'Vendor' . DS . 'Facebook' . DS . 'autoload.php');
?>

