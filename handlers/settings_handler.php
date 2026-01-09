<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//settings_handler.php
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

$settings = get_settings($db);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['submit_settings'])) {
if (validate_token('submit_settings', $_POST['csrf_token'])) {

$settings_form = '';
if (isset($_POST['settings_form'])) {
$settings_form = $_POST['settings_form'];
}

$result = update_setting($db, $settings_form);
if ($result === true) {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'The settings have been successfully updated.';
$message_url = BASE_URL. 'settings';
$message_button_text = 'Back to the settings';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
} else {
$errors = $result;
}
} else {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your session has been terminated for security reasons.';
$message_url = BASE_URL. 'settings';
$message_button_text = 'Back to the settings';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}

}
}

require_once themes_path. '/backend_theme/header.php';

require_once templates_path. '/settings_template.php';

require_once themes_path. '/backend_theme/footer_primary.php';
