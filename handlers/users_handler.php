<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//users_handler.php
//MMXXVI MSCRATCH

//Administrator access only.
if (user_is_administrator() === false) {
header('Location:'. BASE_URL. 'login');
exit();
}

if (backend_access_is_verified() === false) {
header('Location:'. BASE_URL. 'backend_login');
exit();
}
//Administrator access only.


$entries_per_page = 5;
$current_page = isset($_GET['page']) ? (INT) $_GET['page'] : 1;

$total_number_of_users = get_total_number_of_users($db);

$number_of_pages = calculate_number_of_pages($total_number_of_users, $entries_per_page);
$current_page = validate_page_number($total_number_of_users, $current_page, $entries_per_page);
$offset = calculate_offset($current_page, $entries_per_page);

$users = get_paginated_users($db, $offset, $entries_per_page);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['remove_user'])) {
if (validate_token('remove_user', $_POST['csrf_token'])) {

$user_id_remove_form = '';
if (isset($_POST['user_id_remove_form'])) {
$user_id_remove_form = (INT) $_POST['user_id_remove_form'];
}

require_once themes_path. '/backend_theme/header_secondary.php';
require_once templates_path. '/message_remove_user.php';
exit();


} else {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your session has been terminated for security reasons.';
$message_url = BASE_URL. 'users';
$message_button_text = 'Back to the user management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}
}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['remove_user_confirm'])) {
if (validate_token('remove_user_confirm', $_POST['csrf_token'])) {

$user_id_remove_user_confirm_form = '';
if (isset($_POST['user_id_remove_user_confirm_form'])) {
$user_id_remove_user_confirm_form = (INT) $_POST['user_id_remove_user_confirm_form'];
}

$result = remove_user($db, $user_id_remove_user_confirm_form);
if ($result === true) {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'The user has been successfully removed.';
$message_url = BASE_URL. 'users';
$message_button_text = 'Back to the user management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}
} else {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your session has been terminated for security reasons.';
$message_url = BASE_URL. 'users';
$message_button_text = 'Back to the user management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}
}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['update_user_level'])) {
if (validate_token('update_user_level', $_POST['csrf_token'])) {

$user_level_form = '';
if (isset($_POST['user_level_form'])) {
$user_level_form = trim($_POST['user_level_form']);
}

$user_id_user_level_form = '';
if (isset($_POST['user_id_user_level_form'])) {
$user_id_user_level_form = (INT) $_POST['user_id_user_level_form'];
}

$result = update_user_level($db, $user_level_form, $user_id_user_level_form);
if ($result === true) {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'The user level have been successfully updated.';
$message_url = BASE_URL. 'users';
$message_button_text = 'Back to the user management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}
} else {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your session has been terminated for security reasons.';
$message_url = BASE_URL. 'users';
$message_button_text = 'Back to the user management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}
}
}

require_once themes_path. '/backend_theme/header.php';

require_once templates_path. '/users_template.php';

require_once themes_path. '/backend_theme/footer_primary.php';
