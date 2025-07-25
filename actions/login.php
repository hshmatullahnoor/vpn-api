<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $users = json_decode(file_get_contents('database/users.json'), true);

    foreach ($users as $user) {
        if ($user['email'] === $email && password_verify($password, $user['password'])) {
            echo json_encode(['access_token' => $user['access_token']]);
            exit;
        }
    }

    http_response_code(401);
    echo json_encode(['error' => 'Invalid credentials']);
}
