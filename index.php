<?php
require_once('lib/recurly.php');

//adding canvas code to php
//turn on reporting for all errors and display
error_reporting(E_ALL);
ini_set("display_errors", 1);

//In Canvas via SignedRequest/POST, the authentication should be passed via the signed_request header
//You can also use OAuth/GET based flows
$signedRequest = $_REQUEST['signed_request'];
$consumer_secret = $_ENV['2342042923122547944'];

if ($signedRequest == null || $consumer_secret == null) {
   echo "Error: Signed Request or Consumer Secret not found";
}

//decode the signedRequest
$sep = strpos($signedRequest, '.');
$encodedSig = substr($signedRequest, 0, $sep);
$encodedEnv = substr($signedRequest, $sep + 1);
$calcedSig = base64_encode(hash_hmac("sha256", $encodedEnv, $consumer_secret, true));	  
if ($calcedSig != $encodedSig) {
   echo "Error: Signed Request Failed.  Is the app in Canvas?";
}

//decode the signed request object
$sr = base64_decode($encodedEnv);
?>

<script src='scripts/jquery-1.5.1.js'></script>
<script type="text/javascript" src="/sdk/js/canvas.js"></script>
<script type="text/javascript" src="/sdk/js/cookies.js"></script>
<script type="text/javascript" src="/sdk/js/oauth.js"></script>
<script type="text/javascript" src="/sdk/js/xd.js"></script>
<script type="text/javascript" src="/sdk/js/client.js"></script>
<script type="text/javascript" src="/scripts/json2.js"></script>
<script src='scripts/ICanHaz.js'></script>
<script>
        var url = "/services/data/v26.0/query?q=SELECT+ID,NAME+FROM+ACCOUNT";
		var sr = JSON.parse('<?=$sr?>');
		
        $(document).ready(function() {
		console.debug(sr);
		$('#user-name').html(sr.context.user.fullName);
		
		
		//within a Canvas iFrame, AJAX calls proxy via the window messaging
        Sfdc.canvas.client.ajax(url,
            {	client : sr.client,
                method: 'GET',
                contentType: "application/json",
                success : function(data) {
						console.debug('Got Data');
						console.debug(data);
						$('#accountTable').append(ich.accounts(data.payload));
                }
            }); 
		});
</script>


<html>
 <head>
 <title>Subscription Options | SupportPay</title>
    <link rel="stylesheet" href="css/pricing.css"type="text/css" /> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Subscription Options | SupportPay</title>
<link href="//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700" rel="stylesheet" type="text/css" />
<link href="//fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet" type="text/css" /> 
 <script src="js/jquery.js"></script>
<script src="js/jquery.colorbox-min.js"></script>
<!--[if lte IE 7]><apex:includescript src="/resource/1384554884000/js/lte-ie7.js "></script><![endif]-->
 </head>
 <body>

    <div class="container grid">
       <div class="mb10 center">
        <h1>Subscription Plans &amp; Pricing</h1>
        <h1><small>Support SupportPay so We Can Support You</small></h1>
       </div><br />
      <div class="ui-state-error ui-widget-header" id="errorDiv" style="display:none"></div>
        <div class="w-pricing " style="margin:0 auto;">
         <div class="w-pricing-item type_primary">
          <div class="w-pricing-item-h ">
           <div class="w-pricing-item-header">
            <div class="w-pricing-item-title">Premium</div>
            <div class="w-pricing-item-price-background">
            <div class="w-pricing-item-price-primary">             </div>
              <div class="w-pricing-item-price">
             $4.99<small>per month</small></div></div>
             <div class="w-pricing-item-price-secondary type_secondary ">
              <h2 class="orange">LIMITED TIME</h2>
              <h5><strong>Lock in Price For Life*</strong></h5></div></div>
           <div class="">           <div class="w-pricing-item" >            <ul class="w-pricing-item-features">
             <li class="w-pricing-item-feature">              Schedule Base Support             </li>
             <li class="w-pricing-item-feature">              Manage Additional Expenses             </li>
             <li class="w-pricing-item-feature">              Make Payments - Online or Manual             </li>
             <li class="w-pricing-item-feature">              Store Docs &amp; Receipts             </li>
             <li class="w-pricing-item-feature">
              Notifications &amp; Reminders             </li>            </ul>           </div>
         <div class="w-pricing-item" >
            <ul class="w-pricing-item-features">
<li class="w-pricing-item-feature">
              Long Term Storage &amp; History             </li>
             <li class="w-pricing-item-feature">
              Organize by Child             </li>
             <li class="w-pricing-item-feature">
              Certified Documents &#8211; Tax &amp; Court             </li>
             <li class="w-pricing-item-feature">
              Standard &amp; Custom Category Tracking             </li>
             <li class="w-pricing-item-feature">
              All Your Child Finances in One Location             </li></ul>                      </div>                       </div>
<div class="mt10 mb10">
             <a class="btn btn-link mt10" href="#" onClick="MyWindow=window.open('http://supportpay.com/products/#features','MyWindow','width=900,heig&#8204;ht=700'); return false;">And all these features</a>
</div>           <div class="w-pricing-item-footer">
                <a class="btn btn-success btn-large" href="innovator.php">
             <small>I WANT THE </small><br />INNOVATOR DEAL TEST</a>           </div>          </div>         </div>
          <div class="w-pricing-item type_featured">
           <div class="w-pricing-item-h yearly">
            <div class="w-pricing-item-header">
             <div class="w-pricing-item-title ">Premium - Yearly             </div>
             <div class="w-pricing-item-price-background">
            <div class="w-pricing-item-price-yearly">             </div>
              <div class="w-pricing-item-price yearly">              $49.99
              <small>per year</small>             </div>
               </div>               </div>
           <div class="w-pricing-item" >            <ul class="w-pricing-item-features type_primary w-pricing-item-features-primary" style="margin-top:5px;">
             <li class="w-pricing-item-feature">                 <h4>Features of &#8220;Premium&#8221;&nbsp;</h4> <h4 class="green"><strong>PLUS&#8230; </strong></h4> </li>
             <li class="w-pricing-item-feature">              An AMAZING price</li>             <li class="w-pricing-item-feature">                 Only <span class="green" style="font-size:21px;font-weight:700;">96&cent;</span> /week                 </li>
             <li class="w-pricing-item-feature">                 or <span class="teal" style="font-size:16px;font-weight:700;">14&cent;</span> /day             </li>
             <li class="w-pricing-item-feature">              Get it now! </li>
                <li class="w-pricing-item-feature">This deal <div class="orange"><strong>WILL NOT LAST
                    </strong></div>             </li> </ul>               </div>
            <div class="w-pricing-item-footer type_primary w-pricing-item-footer-primary">
          <a class="btn btn-warning btn-large" href="innovator_yearly.php"> <small>GIVE ME THE </small>
             <br />YEARLY DEAL</a></div></div></div>
 <div class="w-pricing-item type_mobile">
           <div class="w-pricing-item-h mobile ">
            <div class="w-pricing-item-header">
             <div class="w-pricing-item-title title-mobile">              Mobile             </div>
             <div class="w-pricing-item-price-background">
              <div class="w-pricing-item-price-background">
       <div class="w-pricing-item-price-background">
            <div class="w-pricing-item-price-mobile">             </div>
              <div class="w-pricing-item-price mobile_price">FREE<small>with subscription</small>             </div>           </div>
              </div>             </div>             </div>
               <div class="w-pricing-item" >
            <ul class="w-pricing-item-features" style="margin-top:5px;">
             <li class="w-pricing-item-feature">
              Enter expenses from your mobile device             </li>
             <li class="w-pricing-item-feature">
              Upload receipts by taking a picture             </li>
             <li class="w-pricing-item-feature">
              Make Payments             </li>            </ul></div>
            <div class="w-pricing-item-footer">
             <a class="apple" href="http://supportpay.com/ios"></a>
             <a class="google" href="https://play.google.com/store/apps/details?id=com.supportpay&amp;hl=en">
             </a>            </div>           </div>          </div>            <p style="margin-top: 15px; font-size: 10px;">
             <em>* You keep this monthly price as long as you don&#8217;t cancel your subscription.</em>
            </p>           </div>          </div>
</body></html>
