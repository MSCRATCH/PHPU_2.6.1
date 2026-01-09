<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//manage_blog_handler.php
//MMXXVI MSCRATCH

//Administrator or moderator access only.
if (user_is_administrator_or_moderator() === false) {
header('Location:'. BASE_URL. 'login');
exit();
}

if (backend_access_is_verified() === false) {
header('Location:'. BASE_URL. 'backend_login');
exit();
}

if (user_is_logged_in() !== false) {
$user_id_blog_post = get_user_id();
}
//Administrator or moderator access only.

$blog_post_id_get = '';
if (isset($_GET['post'])) {
$blog_post_id_get = (INT) $_GET['post'];
}

if (isset($blog_post_id_get) && ! empty($blog_post_id_get)) {

$result_check_blog_post_id_by_user = check_blog_post_id_by_user($db, $blog_post_id_get, $user_id_blog_post);

if ($result_check_blog_post_id_by_user === false) {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'The requested blog post does not exist.';
$message_url = BASE_URL. 'manage_blog';
$message_button_text = 'Back to the content management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}

$blog_post = get_blog_post_by_id_and_by_user($db, $blog_post_id_get, $user_id_blog_post);

}

$entries_per_page = 25;
$current_page = isset($_GET['page']) ? (INT) $_GET['page'] : 1;

$total_number_of_blog_posts_by_user = get_total_number_of_blog_posts_by_user($db, $user_id_blog_post);

$number_of_pages = calculate_number_of_pages($total_number_of_blog_posts_by_user, $entries_per_page);
$current_page = validate_page_number($total_number_of_blog_posts_by_user, $current_page, $entries_per_page);
$offset = calculate_offset($current_page, $entries_per_page);

$paginated_blog_posts = get_paginated_blog_posts_by_user($db, $offset, $entries_per_page, $user_id_blog_post);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['save_blog_post'])) {
if (validate_token('save_blog_post', $_POST['csrf_token'])) {

$blog_post_title_form = '';
if (isset($_POST['blog_post_title_form'])) {
$blog_post_title_form = trim($_POST['blog_post_title_form']);
}

$blog_post_content_form = '';
if (isset($_POST['blog_post_content_form'])) {
$blog_post_content_form = trim($_POST['blog_post_content_form']);
}

$result_save_blog_post = save_blog_post($db, $blog_post_title_form , $blog_post_content_form, $user_id_blog_post);
if ($result_save_blog_post === true) {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'The blog post has been successfully saved.';
$message_url = BASE_URL. 'manage_blog';
$message_button_text = 'Back to the blog management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
} else {
$errors = $result_save_blog_post;
}
} else {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your session has been terminated for security reasons.';
$message_url = BASE_URL. 'manage_blog';
$message_button_text = 'Back to the blog management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}

}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['update_blog_post'])) {
if (validate_token('update_blog_post', $_POST['csrf_token'])) {

$blog_post_title_update_form = '';
if (isset($_POST['blog_post_title_update_form'])) {
$blog_post_title_update_form = trim($_POST['blog_post_title_update_form']);
}

$blog_post_content_update_form = '';
if (isset($_POST['blog_post_content_update_form'])) {
$blog_post_content_update_form = trim($_POST['blog_post_content_update_form']);
}

$result_update_blog_post = update_blog_post($db, $blog_post_title_update_form, $blog_post_content_update_form, $blog_post_id_get, $user_id_blog_post);
if ($result_update_blog_post === true) {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'The blog post has been successfully edited.';
$message_url = BASE_URL . 'manage_blog/post/' . $blog_post_id_get;
$message_button_text = 'Back to the blog management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
} else {
$errors = $result_update_blog_post;
}
} else {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your session has been terminated for security reasons.';
$message_url = BASE_URL. 'manage_blog';
$message_button_text = 'Back to the blog management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}

}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['remove_blog_post'])) {
if (validate_token('remove_blog_post', $_POST['csrf_token'])) {

$result_remove_blog_post = remove_blog_post($db, $blog_post_id_get, $user_id_blog_post);
if ($result_remove_blog_post === true) {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'The blog post has been successfully removed.';
$message_url = BASE_URL. 'manage_blog';
$message_button_text = 'Back to the blog management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}
} else {
require_once themes_path. '/backend_theme/header_secondary.php';
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your session has been terminated for security reasons.';
$message_url = BASE_URL. 'manage_blog';
$message_button_text = 'Back to the blog management';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}

}
}

require_once themes_path. '/backend_theme/header.php';

require_once templates_path. '/manage_blog_template.php';

require_once themes_path. '/backend_theme/footer_primary.php';
