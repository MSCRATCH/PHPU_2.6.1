<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//manage_navigations_handler.php
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

$primary_navigation_element_id_get = '';
if (isset($_GET['primary_navigation_element'])) {
$primary_navigation_element_id_get = (INT) $_GET['primary_navigation_element'];
}

$secondary_navigation_element_id_get = '';
if (isset($_GET['secondary_navigation_element'])) {
$secondary_navigation_element_id_get = (INT) $_GET['secondary_navigation_element'];
}

if (isset($primary_navigation_element_id_get) && ! empty($primary_navigation_element_id_get)) {

$result_check_primary_navigation_element_id = check_primary_navigation_element_id($db, $primary_navigation_element_id_get);

if ($result_check_primary_navigation_element_id === false) {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Such a primary navigation element does not exist.';
$message_url = BASE_URL. 'manage_navigations';
$message_button_text = 'Back to the navigations management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}

$primary_navigation_element = get_primary_navigation_element_by_id($db, $primary_navigation_element_id_get);

}

if (isset($secondary_navigation_element_id_get) && ! empty($secondary_navigation_element_id_get)) {

$result_check_secondary_navigation_element_id = check_secondary_navigation_element_id($db, $secondary_navigation_element_id_get);

if ($result_check_secondary_navigation_element_id === false) {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Such a secondary navigation element does not exist.';
$message_url = BASE_URL. 'manage_navigations';
$message_button_text = 'Back to the navigations management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}

$secondary_navigation_element = get_secondary_navigation_element_by_id($db, $secondary_navigation_element_id_get);

}

$contents = get_contents($db);
$primary_nav_elements = get_primary_nav($db);
$secondary_nav_elements = get_secondary_nav($db);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['save_primary_nav_element'])) {
if (validate_token('save_primary_nav_element', $_POST['csrf_token'])) {

$primary_nav_url_form = '';
if (isset($_POST['primary_nav_url_form'])) {
$primary_nav_url_form = make_safe_url($_POST['primary_nav_url_form']);
}

$primary_nav_name_form = '';
if (isset($_POST['primary_nav_name_form'])) {
$primary_nav_name_form = trim($_POST['primary_nav_name_form']);
}

$primary_nav_order_form = '';
if (isset($_POST['primary_nav_order_form'])) {
$primary_nav_order_form = (INT) $_POST['primary_nav_order_form'];
}

$result_save_primary_nav_element = save_primary_nav_element($db, $primary_nav_url_form, $primary_nav_name_form, $primary_nav_order_form);
if ($result_save_primary_nav_element === true) {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'The element for primary navigation has been successfully created.';
$message_url = BASE_URL. 'manage_navigations';
$message_button_text = 'Back to the navigations management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
} else {
$errors = $result_save_primary_nav_element;
}
} else {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your session has been terminated for security reasons.';
$message_url = BASE_URL. 'manage_navigations';
$message_button_text = 'Back to the navigations management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}

}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['save_secondary_nav_element'])) {
if (validate_token('save_secondary_nav_element', $_POST['csrf_token'])) {

$secondary_nav_url_form = '';
if (isset($_POST['secondary_nav_url_form'])) {
$secondary_nav_url_form = make_safe_url($_POST['secondary_nav_url_form']);
}

$secondary_nav_name_form = '';
if (isset($_POST['secondary_nav_name_form'])) {
$secondary_nav_name_form = trim($_POST['secondary_nav_name_form']);
}

$secondary_nav_order_form = '';
if (isset($_POST['secondary_nav_order_form'])) {
$secondary_nav_order_form = (INT) $_POST['secondary_nav_order_form'];
}

$result_save_secondary_nav_element = save_secondary_nav_element($db, $secondary_nav_url_form, $secondary_nav_name_form, $secondary_nav_order_form);
if ($result_save_secondary_nav_element === true) {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'The element for secondary navigation has been successfully created.';
$message_url = BASE_URL. 'manage_navigations';
$message_button_text = 'Back to the content management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
} else {
$errors = $result_save_secondary_nav_element;
}
} else {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your session has been terminated for security reasons.';
$message_url = BASE_URL. 'manage_navigations';
$message_button_text = 'Back to the content management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}

}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['update_primary_nav_element'])) {
if (validate_token('update_primary_nav_element', $_POST['csrf_token'])) {

$primary_nav_url_update_form = '';
if (isset($_POST['primary_nav_url_update_form'])) {
$primary_nav_url_update_form = make_safe_url($_POST['primary_nav_url_update_form']);
}

$primary_nav_name_update_form = '';
if (isset($_POST['primary_nav_name_update_form'])) {
$primary_nav_name_update_form = trim($_POST['primary_nav_name_update_form']);
}

$primary_nav_order_update_form = '';
if (isset($_POST['primary_nav_order_update_form'])) {
$primary_nav_order_update_form = (INT) $_POST['primary_nav_order_update_form'];
}

$result_update_primary_nav_element = update_primary_nav_element($db, $primary_nav_url_update_form, $primary_nav_name_update_form, $primary_nav_order_update_form, $primary_navigation_element_id_get);
if ($result_update_primary_nav_element === true) {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'The primary navigation element has been successfully edited.';
$message_url = BASE_URL . 'manage_navigations/primary_navigation_element/' . $primary_navigation_element_id_get;
$message_button_text = 'Back to the content management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
} else {
$errors = $result_update_primary_nav_element;
}
} else {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your session has been terminated for security reasons.';
$message_url = BASE_URL. 'manage_navigations';
$message_button_text = 'Back to the navigations management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}

}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['update_secondary_nav_element'])) {
if (validate_token('update_secondary_nav_element', $_POST['csrf_token'])) {

$secondary_nav_url_update_form = '';
if (isset($_POST['secondary_nav_url_update_form'])) {
$secondary_nav_url_update_form = make_safe_url($_POST['secondary_nav_url_update_form']);
}

$secondary_nav_name_update_form = '';
if (isset($_POST['secondary_nav_name_update_form'])) {
$secondary_nav_name_update_form = trim($_POST['secondary_nav_name_update_form']);
}

$secondary_nav_order_update_form = '';
if (isset($_POST['secondary_nav_order_update_form'])) {
$secondary_nav_order_update_form = (INT) $_POST['secondary_nav_order_update_form'];
}

$result_update_secondary_nav_element = update_secondary_nav_element($db, $secondary_nav_url_update_form, $secondary_nav_name_update_form, $secondary_nav_order_update_form, $secondary_navigation_element_id_get);
if ($result_update_secondary_nav_element === true) {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'The secondary navigation element has been successfully edited.';
$message_url = BASE_URL . 'manage_navigations/secondary_navigation_element/' . $secondary_navigation_element_id_get;
$message_button_text = 'Back to the content management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
} else {
$errors = $result_update_secondary_nav_element;
}
} else {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your session has been terminated for security reasons.';
$message_url = BASE_URL. 'manage_navigations';
$message_button_text = 'Back to the navigations management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}

}
}


if (isset($_POST['csrf_token'])) {
if (isset($_POST['remove_primary_nav_element'])) {
if (validate_token('remove_primary_nav_element', $_POST['csrf_token'])) {

$result_remove_primary_nav_element = remove_primary_nav_element($db, $primary_navigation_element_id_get);
if ($result_remove_primary_nav_element === true) {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'The primary navigation element has been successfully removed.';
$message_url = BASE_URL. 'manage_navigations';
$message_button_text = 'Back to the navigations management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}
} else {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your session has been terminated for security reasons.';
$message_url = BASE_URL. 'manage_navigations';
$message_button_text = 'Back to the navigations management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}

}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['remove_secondary_nav_element'])) {
if (validate_token('remove_secondary_nav_element', $_POST['csrf_token'])) {

$result_remove_secondary_nav_element = remove_secondary_nav_element($db, $secondary_navigation_element_id_get);
if ($result_remove_secondary_nav_element === true) {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'The secondary navigation element has been successfully removed.';
$message_url = BASE_URL. 'manage_navigations';
$message_button_text = 'Back to the navigations management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}
} else {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your session has been terminated for security reasons.';
$message_url = BASE_URL. 'manage_navigations';
$message_button_text = 'Back to the navigations management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}

}
}

require_once themes_path. '/backend_theme/header.php';

require_once templates_path. '/manage_navigations_template.php';

require_once themes_path. '/backend_theme/footer_primary.php';
