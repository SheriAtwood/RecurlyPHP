<?php

  require_once ('lib/recurly.php');


// Required for the API
Recurly_Client::$subdomain = 'supportpay';
Recurly_Client::$apiKey = '3d301163be884aa5935baa1b76bc50a7';

// Optional for Recurly.js:
Recurly_js::$privateKey = 'a26316e92322494689c59a1d65b72e5b';
?>

<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Innovator Monthly Subscription</title>
<link rel="stylesheet" href="css/recurly.css" type="text/css" />
<script src="/js/jquery.js"></script>
<script src="/js/recurly.js"></script>

<script>

  Recurly.config({
    subdomain: 'supportpay',
    currency: 'USD'
  });
  Recurly.buildSubscriptionForm({
    target: '#recurly-subscribe',  
    signature: '<?php echo $signature;?>',
    successURL: 'confirmation.html',
    planCode: 'innovator',
    distinguishContactFromBillingInfo: false,
    collectCompany: false,
    collectContact: true,
    termsOfServiceURL: 'http://supportpay.com/contact/terms-of-use/',
    acceptPaypal: false,
    acceptedCards: ['mastercard',
                    'discover',
                    'american_express',
                    'visa'],
    

  });
</script>
</head>
  <body>
    <h1>Subscribe to Plan</h1>
    <h2>Subscribe Test3</h2>
    <div id="recurly-subscribe">
    </div>
  </body>
</html>
<?php
$result = Recurly_js::fetch($_POST['recurly_token']);
?>
