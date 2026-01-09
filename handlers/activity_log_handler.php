<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//activity_log_handler.php
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

$entries_per_page = 25;
$current_page = isset($_GET['page']) ? (INT) $_GET['page'] : 1;

$total_number_entries_activity_log = get_total_number_entries_activity_log($db);

$number_of_pages = calculate_number_of_pages($total_number_entries_activity_log, $entries_per_page);
$current_page = validate_page_number($total_number_entries_activity_log, $current_page, $entries_per_page);
$offset = calculate_offset($current_page, $entries_per_page);

$result = get_paginated_activity_log($db, $offset, $entries_per_page);

require_once themes_path. '/backend_theme/header.php';

require_once templates_path. '/activity_log_template.php';

require_once themes_path. '/backend_theme/footer_primary.php';
