<?php 

define("CLIENT_ID", "ca_7dsxjCPZ3Ki753aji7elle6doG2Zzp1C"); // Your client ID: https://dashboard.stripe.com/account/applications/settings
define("SECRET_KEY","sk_test_your_secret_key"); // Your secret API KEY: https://dashboard.stripe.com/account/apikeys
define("REDIRECT_URL", "http://12.12.12.12/connected.php"); // https://dashboard.stripe.com/account/applications/settings

\Stripe\Stripe::setApiKey(SECRET_KEY);
?>