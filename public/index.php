<?php
session_start();

require_once __DIR__ . '/../config/database.php';

$uri = $_SERVER['REQUEST_URI'];

if (str_starts_with($uri, '/login')) {
    require __DIR__ . '/../controllers/AuthController.php';
    login();
} elseif (str_starts_with($uri, '/register')) {
    require __DIR__ . '/../controllers/AuthController.php';
    register();
} elseif ($uri === '/' || $uri === '/gallery') {
    if (isset($_SESSION['user_id'])) {
        require __DIR__.'/../controllers/ImageController.php';
        show_gallery();
    } else {
        require __DIR__.'/../controllers/ImageController.php';
        show_public_gallery();
    }
} elseif (str_starts_with($uri, '/confirm')) {
    require __DIR__ . '/../controllers/AuthController.php';
    confirm_account();

} elseif ($uri === '/logout') {
    require __DIR__ . '/../controllers/AuthController.php';
    logout();
} elseif ($uri === '/settings') {
    require __DIR__ . '/../controllers/UserController.php';
    settings();
} elseif ($uri === '/forgot') {
    require __DIR__ . '/../controllers/AuthController.php';
    forgot_password();
} elseif (str_starts_with($uri, '/reset')) {
    require __DIR__ . '/../controllers/AuthController.php';
    reset_password();
} elseif ($uri === '/edit') {
    require __DIR__ . '/../controllers/ImageController.php';
    edit_page();
} elseif ($uri === '/upload') {
    require __DIR__ . '/../controllers/ImageController.php';
    upload_image();
} elseif ($uri === '/delete') {
    require __DIR__ . '/../controllers/ImageController.php';
    delete_image();
} elseif (str_starts_with($uri, '/api/gallery')) {
    require __DIR__ . '/../controllers/ImageController.php';
    api_gallery();
} elseif ($uri === '/like') {
    require __DIR__ . '/../controllers/SocialController.php';
    like_image();
} elseif ($uri === '/comment') {
    require __DIR__ . '/../controllers/SocialController.php';
    comment_image();
} else {
    http_response_code(404);
    echo "404 - Page not found";
}
