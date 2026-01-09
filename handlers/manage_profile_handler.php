<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//manage_profile_handler.php
//MMXXVI MSCRATCH

//Access only by users who are logged in.
if (user_is_logged_in() === false) {
header('Location:'. BASE_URL. 'home');
exit();
}
//Access only by users who are logged in.

if (user_is_logged_in() === true) {
$profile_user_id = get_user_id();
}

$profile = get_profile_by_id($db, $profile_user_id);

require_once themes_path. '/default_theme/header.php';

if (isset($_POST['csrf_token'])) {
if (isset($_POST['update_profile'])) {
if (validate_token('update_profile', $_POST['csrf_token'])) {

$user_profile_location_form = '';
if (isset($_POST['user_profile_location_form'])) {
$user_profile_location_form = trim($_POST['user_profile_location_form']);
}

$user_profile_description_form = '';
if (isset($_POST['user_profile_description_form'])) {
$user_profile_description_form = trim($_POST['user_profile_description_form']);
}

$result = update_profile($db, $user_profile_location_form, $user_profile_description_form, $profile_user_id);
if ($result === true) {
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your profile has been successfully updated.';
$message_url = BASE_URL. 'manage_profile';
$message_button_text = 'Back to manage profile';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/default_theme/footer_secondary.php';
exit();
}
} else {
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your session has been terminated for security reasons.';
$message_url = BASE_URL. 'manage_profile';
$message_button_text = 'Return to manage profile';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/default_theme/footer_secondary.php';
exit();
}
}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['upload_user_profile_image'])) {
if (validate_token('upload_user_profile_image', $_POST['csrf_token'])) {

$profile_image_file = '';
if (isset($_FILES['user_profile_image'])) {
$profile_image_file = $_FILES['user_profile_image'];
}

$result = upload_profile_image($db, $profile_image_file, $profile_user_id);
if ($result === true) {
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your profile image has been successfully uploaded..';
$message_url = BASE_URL. 'manage_profile';
$message_button_text = 'Back to manage profile';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/default_theme/footer_secondary.php';
exit();
} else {
$errors = $result;
}
} else {
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your session has been terminated for security reasons.';
$message_url = BASE_URL. 'manage_profile';
$message_button_text = 'Return to manage profile';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/default_theme/footer_secondary.php';
exit();
}
}
}

require_once templates_path. '/manage_profile_template.php';
