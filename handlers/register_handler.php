<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//register_handler.php
//MMXXVI MSCRATCH

//Access only by users who are not logged in.
if (user_is_logged_in() === true) {
header('Location:'. BASE_URL. 'home');
exit();
}
//Access only by users who are not logged in.

require_once themes_path. '/default_theme/header.php';


if (DISABLE_REGISTRATION === "yes") {
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Registration has been deactivated.';
$message_url = BASE_URL. 'home';
$message_button_text = 'Back to homepage';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/default_theme/footer_secondary.php';
exit();
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['register'])) {
if (validate_token('register', $_POST['csrf_token'])) {

$username_form = '';
if (isset($_POST['username_form'])) {
$username_form = trim($_POST['username_form']);
}

$user_password_form = '';
if (isset($_POST['user_password_form'])) {
$user_password_form = trim($_POST['user_password_form']);
}

$user_password_confirm_form = '';
if (isset($_POST['user_password_confirm_form'])) {
$user_password_confirm_form = trim($_POST['user_password_confirm_form']);
}

$user_email_form = '';
if (isset($_POST['user_email_form'])) {
$user_email_form = trim($_POST['user_email_form']);
}

$security_question_answer_form = '';
if (isset($_POST['security_question_answer_form'])) {
$security_question_answer_form = trim($_POST['security_question_answer_form']);
}

$result = register($db, $username_form, $user_password_form, $user_password_confirm_form, $user_email_form, $security_question_answer_form);
if ($result === true) {
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'You have been successfully registered.';
$message_url = BASE_URL. 'home';
$message_button_text = 'Back to the homepage';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/default_theme/footer_secondary.php';
exit();
} else {
$errors = $result;
}
} else {
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your session has been terminated for security reasons.';
$message_url = BASE_URL. 'register';
$message_button_text = 'Return to the registration form';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/default_theme/footer_secondary.php';
exit();
}

}
}

require_once templates_path. '/register_template.php';

require_once themes_path. '/default_theme/footer_secondary.php';
