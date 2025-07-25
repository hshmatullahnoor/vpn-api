<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $region = $_POST['region'];

    $users = json_decode(file_get_contents('database/users.json'), true);

    foreach ($users as $user) {
        if ($user['email'] === $email) {
            http_response_code(409);
            echo json_encode(['error' => 'User already exists']);
            exit;
        }
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $accessToken = bin2hex(random_bytes(32));

    $newUser = [
        'email' => $email,
        'password' => $hashedPassword,
        'name' => $name,
        'region' => $region,
        'balance' => 0,
        'access_token' => $accessToken,
    ];

    $users[] = $newUser;

    file_put_contents('database/users.json', json_encode($users, JSON_PRETTY_PRINT));

    echo json_encode(['access_token' => $accessToken]);
}
