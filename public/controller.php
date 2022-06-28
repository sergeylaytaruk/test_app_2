<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';
include 'display_errors.php';

use components\Login;
use components\Articles;

$action = $_REQUEST['action'];

switch ($action) {
    case 'registration':
        (new Login($_POST['login'], $_POST['password']))->registr();
        break;
    case 'login':
        (new Login($_POST['login'], $_POST['password']))->login();
        break;
    case 'logout':
        session_destroy();
        session_start();
        session_write_close();
        session_regenerate_id(true);
        (new \Redirect('index'))->redirect();
        break;
    case 'add_article':
        (new Articles())->addItem($_POST['title'], $_POST['text'], $_SESSION['id_user']);
        (new \Redirect('articles'))->redirect();
        break;
    default:
        (new Redirect('index'))->redirect();
        break;
}
