<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//dashboard_handler.php
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

require_once themes_path. '/backend_theme/header.php';

$result = get_activity_log($db);

$system_data = get_system_data($db);
$most_recent_users = get_most_recent_users($db);
$online_users = get_online_users($db);
$not_activated_users = get_not_activated_users($db);
$moderators = get_moderators($db);
$total_number_entries_activity_log = get_total_number_entries_activity_log($db);

$errors = clearing_activity_log($db, $total_number_entries_activity_log, $result);

require_once templates_path. '/dashboard_template.php';

require_once themes_path. '/backend_theme/footer_primary.php';
