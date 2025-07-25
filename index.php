<?php

require_once 'vendor/autoload.php';
require_once 'src/OutlineVpnApi.php';

use OutlineVpn\OutlineVpnApi;

$config = require 'config.php';

$api = new OutlineVpnApi('https://api.getoutlinevpn.com', $config['api_token']);

$action = null;
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = $_GET['action'] ?? null;
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? null;
}

switch ($action) {
    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once 'actions/register.php';
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Method Not Allowed']);
        }
        break;
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once 'actions/login.php';
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Method Not Allowed']);
        }
        break;
    default:
        http_response_code(404);
        echo json_encode(['error' => 'Not Found']);
        break;
}
