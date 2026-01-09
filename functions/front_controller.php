<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//front_controller.php
//MMXXVI MSCRATCH

function front_controller($db) {

$allowed_hardcoded_sections = array(
'home',
'login',
'register',
'logout',
'settings',
'activity_log',
'dashboard',
'blocklist',
'backend_login',
'backend_logout',
'users',
'profile',
'manage_profile',
'error_log',
'dashboard_moderator',
'manage_contents',
'manage_navigations',
'blog',
'manage_blog',
);

$section = $_GET['p'] ?? 'home';
$section = basename($section);

if (in_array($section, $allowed_hardcoded_sections, true)) {
$file = handlers_path . "/{$section}_handler.php";
$real = realpath($file);

if ($real && str_starts_with($real, realpath(handlers_path)) && file_exists($real)) {
require_once $real;
return;
} else {
require_once handlers_path . '/home_handler.php';
return;
}
}

$custom_content = get_custom_content($db, $section);

if ($custom_content !== false) {
require_once themes_path . '/default_theme/header.php';
require_once templates_path. '/contents_template.php';
return;
}

require_once handlers_path . '/home_handler.php';
}
