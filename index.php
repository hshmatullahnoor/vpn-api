<?php

require_once 'vendor/autoload.php';
require_once 'src/OutlineVpnApi.php';

use OutlineVpn\OutlineVpnApi;

$config = require 'config.php';

$api = new OutlineVpnApi('https://api.getoutlinevpn.com', $config['api_token']);

// Get Regions of Residence
$regions = $api->getRegionsOfResidence();
print_r($regions);

// Get Port Type
$portType = $api->getPortType('other');
print_r($portType);

// Get Locations
$locations = $api->getLocations('other');
print_r($locations);

// Get Plan List
$planList = $api->getPlanList('other');
print_r($planList);

// Create Access Key
// $accessKey = $api->createAccessKey('1', 'other', 'de', 'tcp');
// print_r($accessKey);

// List Access Keys
$accessKeys = $api->listAccessKeys();
print_r($accessKeys);

// Get Access Key
// $accessKey = $api->getAccessKey('your_access_key_name');
// print_r($accessKey);

// Get Access Key Details
// $accessKeyDetails = $api->getAccessKeyDetails('your_access_key_name');
// print_r($accessKeyDetails);

// Change Access Key Location
// $changeLocation = $api->changeAccessKeyLocation('your_access_key_name', 'us', 'tcp');
// print_r($changeLocation);

// Change Access Key Port Type
// $changePortType = $api->changeAccessKeyPortType('your_access_key_name');
// print_r($changePortType);

// Change Access Key
// $changeAccessKey = $api->changeAccessKey('your_access_key_name');
// print_r($changeAccessKey);

// Get Balance
$balance = $api->getBalance();
print_r($balance);

// Revoke Access Key
// $revoke = $api->revokeAccessKey('your_access_key_name');
// print_r($revoke);
