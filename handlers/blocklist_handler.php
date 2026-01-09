<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//blocklist_handler.php
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

$blocklist_remove_command_get = '';
if (isset($_GET['command'])) {
$blocklist_remove_command_get = "remove_". $_GET['command'];
}

$blocklist_usernames = get_blocklist_usernames($db);
$blocklist_names = get_blocklist_names($db);
$blocklist_emails = get_blocklist_emails($db);
$blocklist_domains = get_blocklist_domains($db);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['submit_blocklist_command'])) {
if (validate_token('submit_blocklist_command', $_POST['csrf_token'])) {

$blocklist_command_form = '';
if (isset($_POST['blocklist_command_form'])) {
$blocklist_command_form = $_POST['blocklist_command_form'];
}

$result_save_remove_blocklist_entry = manage_blocklist($db, $blocklist_command_form);
if ($result_save_remove_blocklist_entry === true) {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'The command was successfully executed.';
$message_url = BASE_URL. 'blocklist';
$message_button_text = 'Back to the blocklist';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
} else {
$errors = $result_save_remove_blocklist_entry;
}
} else {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your session has been terminated for security reasons.';
$message_url = BASE_URL. 'blocklist';
$message_button_text = 'Back to the blocklist';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}

}
}

require_once themes_path. '/backend_theme/header.php';

require_once templates_path. '/blocklist_template.php';

require_once themes_path. '/backend_theme/footer_primary.php';
