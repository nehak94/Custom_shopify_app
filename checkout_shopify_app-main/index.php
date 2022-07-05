<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("inc/functions.php");
//require_once("conf.php");

$requests = $_REQUEST;
$hmac = $_REQUEST['hmac'];
$serializeArray = serialize($requests);
$requests = array_diff_key($requests, array('hmac' => ''));
ksort($requests);
//accesstoken : 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

print_r($requests);
die;
?>