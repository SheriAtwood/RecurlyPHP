<?php
require_once('lib/recurly.php');
 
// Required for the API
Recurly_Client::$subdomain = 'supportpay';
Recurly_Client::$apiKey = '3d301163be884aa5935baa1b76bc50a7';
Recurly_js::$privateKey = 'a26316e92322494689c59a1d65b72e5b';
//$planCode = 'innovator-yearly';
$currency = 'USD';
$signature = Recurly_js::sign(array($subscription)); 
$subscription = Recurly_Subscription::get();
/* fetch the account */
$account = $subscription->account->get();
print $account->account_code;    
?>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Innovator Yearly Subscription</title>
<html>
  <head>
  <link rel="stylesheet" href="css/recurly.css" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/recurly.js"></script>
    <script>
    $(function(){
  Recurly.config({
    subdomain: 'supportpay',
    currency: 'USD',
    country: 'US'
  });

  Recurly.buildBillingInfoUpdateForm({
    target: '#recurly-update-billing-info',
    // Signature must be generated server-side with a utility method provided
    // in client libraries.
    signature: '<?php echo $signature;?>',
    successURL: 'confirmation.html',
    accountCode: '<?php echo $subscription;?>',,
    collectContactInfo: true,
    distinguishContactFromBillingInfo: false
  });
   });
</script>

</head>
  <body>
    <div class="subscription-logo"></div>    
    <h2>Update Billing Information</h2>
    <div id="recurly-update-billing-info">
 
    </div>
  </body>
</html>
