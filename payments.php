<?php
if(empty($_POST)){
    echo"it is an empty post";
}

else
{
$Name = $_POST['name'];
$Email = $_POST['email'];
$Mobile = $_POST['mobile'];


$key = "test_4f0dea1b16df45e0f7588a12831";
$token = "test_02d5bce87a53bdefe05e6383409";
$mojoURL = "test.instamojo.com";


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://$mojoURL/api/1.1/payment-requests/");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:$key",
                  "X-Auth-Token:$token"));
$payload = Array(
    'purpose' => 'WEB DEVELOPMENT',
    'amount' => '100',
    'phone' => "$Mobile",
    'buyer_name' => "$Name",
    'redirect_url' => '',
    'send_email' => false,
    'webhook' => '',
    'send_sms' => false,
    'email' => "$Email",
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 
$decode = json_decode($response);

$success = $decode -> success;
if ($success == true)
{
   

$paymentURL = $decode->payment_request->longurl;

// SQL DATA ENTRY


header("Location:$paymentURL");
die();

}
else{ echo"$response"; echo"Contact the developer's email ID ernoheir@gmail.com with screenshot for technical support";}
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final payment</title>
    <link type="icon" href="images/logo.ico">
</head>
<body>
    <script src="payments.php"><script>
</body>
</html>