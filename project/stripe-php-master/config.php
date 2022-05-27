<?php
require('stripe-php-master/init.php');
$publishableKey = "pk_test_51Kw5FGSASBXbEl1NGFZcJb5Gyoi0bTTcyagrJdZun2Y4QR6kLYmxXsY2c4G2lzlz81BZ9dCIUK45UsLDBftu9LeK00IeU7Lfie";
$secretKey = "sk_test_51Kw5FGSASBXbEl1NpLHqU3ZYSc8fpFH7u0OyD6aQ49R0OlKKoFItWW4auvhFBTCKtmOG9OcG6clLQmBRH1IwuJVU00Q6lbShlP";
\Stripe\Stripe::setApiKey($secretKey);

?>