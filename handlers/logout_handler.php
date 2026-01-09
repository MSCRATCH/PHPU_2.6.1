<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//logout_handler.php
//MMXXVI MSCRATCH

//Access only by logged in users.
if (user_is_logged_in() === false) {
header('Location:'. BASE_URL. 'home');
exit();
}
//Access only by logged in users.

if (is_user() === true) {
require_once themes_path. '/default_theme/header.php';
logout();
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'You have been successfully logged out.';
$message_url = BASE_URL. 'home';
$message_button_text = 'Back to the homepage';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/default_theme/footer_secondary.php';
exit();
}

if (user_is_administrator_or_moderator() === true) {
if (backend_access_is_verified() === true) {
require_once themes_path. '/default_theme/header.php';
backend_logout();
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'You have been successfully logged out.';
$message_url = BASE_URL. 'home';
$message_button_text = 'Back to the homepage';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/default_theme/footer_secondary.php';
exit();
} else {
require_once themes_path. '/default_theme/header.php';
logout();
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'You have been successfully logged out.';
$message_url = BASE_URL. 'home';
$message_button_text = 'Back to the homepage';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/default_theme/footer_secondary.php';
exit();
}
}
