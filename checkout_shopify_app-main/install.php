<?php

// Set variables for our request
$shop = $_GET['shop'];
$retArray = explode(".",$shop);
$api_key = "513bd40e36851854eeaf95eb13fb15f2";
$scopes = "read_orders,write_orders,write_products,read_products,read_files,write_files,read_checkouts,write_checkouts";
$redirect_uri = "https://app.rahmqvist.io/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $retArray[0] . ".myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();
