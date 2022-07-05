<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("inc/functions.php");

$varient_id = $_REQUEST['variant_id'];
$quantity = $_REQUEST['updates'];
$discount = $_REQUEST['customer_discount'];
$postData = [];
$i = count($varient_id);

for($j = 0; $j < $i; $j++)
{
  $postData['checkout']['line_items'][$j]['variant_id'] = $varient_id[$j];
  $postData['checkout']['line_items'][$j]['quantity']= $quantity[$j];
}
$postData['checkout']['applied_discount']['amount'] = '';
$postData['checkout']['applied_discount']['title'] = $discount."% Off";
$postData['checkout']['applied_discount']['description'] = 'wallet money';
$postData['checkout']['applied_discount']['value'] = $discount;
$postData['checkout']['applied_discount']['value_type'] = 'percentage';
$postData['checkout']['applied_discount']['applicable'] = 'true';
$postData['checkout']['applied_discount']['application_type'] = 'script';
$url = 'https://rahmqvist-happyworkday.myshopify.com/admin/api/2020-01/checkouts.json';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','X-Shopify-Access-Token: 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'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($postData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response  = curl_exec($ch);
$res = json_decode($response, true);
$weburl=  $res['checkout']['web_url'];
$newWeburl = str_replace("https://rahmqvist-happyworkday.myshopify.com/","https://happyworkday.com/",$weburl);
echo $newWeburl;
?>
