<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//profile_handler.php
//MMXXVI MSCRATCH

$public_user_id_get = '';
if (isset($_GET['id'])) {
$public_user_id_get = $_GET['id'];
}

$result = check_public_user_id($db, $public_user_id_get);

if ($result === false) {
require_once themes_path. '/default_theme/header.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'The user you are searching for does not exist.';
$message_url = BASE_URL. 'home';
$message_button_text = 'Back to the homepage';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/default_theme/footer_secondary.php';
exit();
}

$profile = get_profile_by_public_user_id($db, $public_user_id_get);

require_once themes_path. '/default_theme/header.php';

require_once templates_path. '/profile_template.php';
