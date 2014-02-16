<?php
require_once ('lib/recurly.php');
// Required for the API
Recurly_Client::$subdomain = 'supportpay';
Recurly_Client::$apiKey = '3d301163be884aa5935baa1b76bc50a7';
Recurly_js::$privateKey = 'a26316e92322494689c59a1d65b72e5b';
$planCode = 'innovator';
$currency = 'USD';
$signature = Recurly_js::sign(array($planCode));     
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
	privacyPolicyURL: 'http://supportpay.com/contact/privacy-policy/',
    acceptPaypal: false,
    acceptedCards: ['mastercard',
                    'discover',
                    'american_express',
                    'visa'],
	account: {
	    firstName: ''
	  , lastName: ''
	  , email: ''
	  , phone: ''
	  , companyName: ''
	  }
	, billingInfo: {
	    firstName: ''
	  , lastName: ''
	  , address1: ''
	  , address2: ''
	  , country: ''
	  , city: ''
	  , state: ''
	  , zip: ''	 
	  }    

  });
</script>
</head>
  <body>
   <div class="subscription-logo"></div>    
    <div id="recurly-subscribe">
    </div>
  </body>
</html>
