<?php

require_once 'vendor/autoload.php';
require_once 'src/OutlineVpnApi.php';

use OutlineVpn\OutlineVpnApi;

$config = require 'config.php';

$api = new OutlineVpnApi('https://api.getoutlinevpn.com', $config['api_token']);

// Register a new user
$ch = curl_init('http://localhost/register.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    'email' => 'test@example.com',
    'password' => 'password',
    'name' => 'Test User',
    'region' => 'other',
]);

$response = curl_exec($ch);
curl_close($ch);
print_r($response);

// Login with the new user
$ch = curl_init('http://localhost/login.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    'email' => 'test@example.com',
    'password' => 'password',
]);

$response = curl_exec($ch);
curl_close($ch);
print_r($response);
