<?php 

define("CLIENT_ID", "ca_your_client_id"); // Your client ID: https://dashboard.stripe.com/account/applications/settings
define("SECRET_KEY","sk_your_secret_key"); // Your secret API KEY: https://dashboard.stripe.com/account/apikeys
define("REDIRECT_URL", "http://12.12.12.12/connected.php"); // https://dashboard.stripe.com/account/applications/settings

\Stripe\Stripe::setApiKey(SECRET_KEY);
?>