<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//manage_contents_handler.php
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

$content_id_get = '';
if (isset($_GET['content'])) {
$content_id_get = (INT) $_GET['content'];
}

if (isset($content_id_get) && ! empty($content_id_get)) {

$result_check_custom_content_id = check_custom_content_id($db, $content_id_get);

if ($result_check_custom_content_id === false) {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'The requested content does not exist.';
$message_url = BASE_URL. 'manage_contents';
$message_button_text = 'Back to the content management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}

$content = get_content_by_id($db, $content_id_get);

}

$contents = get_contents($db);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['save_content'])) {
if (validate_token('save_content', $_POST['csrf_token'])) {

$custom_content_url_form = '';
if (isset($_POST['custom_content_url_form'])) {
$custom_content_url_form = make_safe_url($_POST['custom_content_url_form']);
}

$custom_content_title_form = '';
if (isset($_POST['custom_content_title_form'])) {
$custom_content_title_form = trim($_POST['custom_content_title_form']);
}

$custom_content_form = '';
if (isset($_POST['custom_content_form'])) {
$custom_content_form = trim($_POST['custom_content_form']);
}

$result_save_custom_content = save_custom_content($db, $custom_content_url_form, $custom_content_title_form, $custom_content_form);
if ($result_save_custom_content === true) {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'The custom content has been successfully saved.';
$message_url = BASE_URL. 'manage_contents';
$message_button_text = 'Back to the content management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
} else {
$errors = $result_save_custom_content;
}
} else {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your session has been terminated for security reasons.';
$message_url = BASE_URL. 'manage_contents';
$message_button_text = 'Back to the content management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}

}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['update_content'])) {
if (validate_token('update_content', $_POST['csrf_token'])) {

$custom_content_url_update_form = '';
if (isset($_POST['custom_content_url_update_form'])) {
$custom_content_url_update_form = make_safe_url($_POST['custom_content_url_update_form']);
}

$custom_content_title_update_form = '';
if (isset($_POST['custom_content_title_update_form'])) {
$custom_content_title_update_form = trim($_POST['custom_content_title_update_form']);
}

$custom_content_update_form = '';
if (isset($_POST['custom_content_update_form'])) {
$custom_content_update_form = trim($_POST['custom_content_update_form']);
}

$result_update_custom_content = update_custom_content($db, $custom_content_url_update_form, $custom_content_title_update_form, $custom_content_update_form, $content_id_get);
if ($result_update_custom_content === true) {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'The custom content has been successfully edited.';
$message_url = BASE_URL . 'manage_contents/content/' . $content_id_get;
$message_button_text = 'Back to the content you are editing';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
} else {
$errors = $result_update_custom_content;
}
} else {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your session has been terminated for security reasons.';
$message_url = BASE_URL. 'manage_contents';
$message_button_text = 'Back to the content management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}

}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['remove_content'])) {
if (validate_token('remove_content', $_POST['csrf_token'])) {

$result_remove_custom_content = remove_custom_content($db, $content_id_get);
if ($result_remove_custom_content === true) {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'The custom content has been successfully removed.';
$message_url = BASE_URL. 'manage_contents';
$message_button_text = 'Back to the content management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}
} else {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your session has been terminated for security reasons.';
$message_url = BASE_URL. 'manage_contents';
$message_button_text = 'Back to the content management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}

}
}

require_once themes_path. '/backend_theme/header.php';

require_once templates_path. '/manage_contents_template.php';

require_once themes_path. '/backend_theme/footer_primary.php';
