<?php
require_once ('lib/recurly.php');
// Required for the API
Recurly_Client::$subdomain = 'supportpay';
Recurly_Client::$apiKey = '3d301163be884aa5935baa1b76bc50a7';
Recurly_js::$privateKey = 'a26316e92322494689c59a1d65b72e5b';
$accountCode = 'email'
$currency = 'USD';
$signature = Recurly_js::sign(array);
?>
<html>
  <head>
  <title>My Subscription | SupportPay</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700" rel="stylesheet" type="text/css" />
<link href="//fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet" type="text/css" /> 
<link rel="stylesheet" href="css/pricing.css"type="text/css" /> 
<link rel="stylesheet" href="css/recurly.css" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/recurly.js"></script>
     <script>
     var j$ = jQuery.noConflict();
 j$(function(){
  Recurly.config({
    subdomain: 'supportpay'
  });

  Recurly.buildBillingInfoUpdateForm({
    target: '#recurly-update-billing-info',
    // Signature must be generated server-side with a utility method provided
    // in client libraries.
    signature: '<?php echo $signature; ?>',
    successURL: 'confirmation.html',
    accountCode: '<?php echo $accountCode; ?>'
  });
   });
 </script>
<!--[if lte IE 7]><apex:includescript src="/resource/1384554884000/js/lte-ie7.js "></script><![endif]-->
 </head>
 <body>
        <div class="container grid">        
        <div class="row">
        <div class="span4">
        <h1 class="page-title">My Subscription</h1>
        </div>      
        </div>                    
                
    <div class="outline outline-info">
        <div class="outline-header"></div>
        <div class="outline-body">  
        <div class="row">
        <div class="span8">        
    <div id="recurly-update-billing-info"></div>
    </div>   
 <div class="span4">        
        <a class="btn btn-success btn-large mt5"  href="/subscriptions">       
            Change Subscriptions</a> 
            </div>
            </div>        
 </div>
   </div>
        </div>        
     </body>
     </html>
