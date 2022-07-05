<?php

// Set variables for our request
$shop = $_GET['shop'];
$retArray = explode(".",$shop);
$api_key = "2c9526732110b5390aab53e296bedc45";
$scopes = "read_orders,write_orders,write_products,read_products,read_files,write_files,read_checkouts,write_checkouts";
$redirect_uri = "https://jeronone.com/test-server/afzal/neha/app/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $retArray[0] . ".myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();
