<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//get_dashboard_stats.php
//MMXXVI MSCRATCH

function get_system_data($db){
$system_data = array();
$system_data ['php_version'] = phpversion();
$system_data ['webserver_software'] = $_SERVER['SERVER_SOFTWARE'];
$system_data ['db_software'] = mysqli_get_server_info($db);
return $system_data;
}

function get_most_recent_users($db) {
$stmt = $db->query("SELECT user_id, public_id, username, user_level FROM users ORDER BY user_date DESC LIMIT 5");
$most_recent_users = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if ($most_recent_users !== false && ! empty($most_recent_users)) {
return $most_recent_users;
} else {
return false;
}
}

function get_online_users($db) {
$stmt = $db->query("SELECT user_id, public_id, username FROM users WHERE TIMESTAMPDIFF(MINUTE,last_activity,NOW()) <= 5 ORDER BY user_date LIMIT 5");
$online_users = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if ($online_users !== false && ! empty($online_users)) {
return $online_users;
} else {
return false;
}
}

function get_not_activated_users($db) {
$not_activated_user_level = "not_activated";
$stmt = $db->prepare("SELECT user_id, public_id, username FROM users WHERE user_level = ? ORDER BY user_date DESC LIMIT 5");
$stmt->bind_param('s', $not_activated_user_level);
$stmt->execute();
$result = $stmt->get_result();
$not_activated_users = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if ($not_activated_users !== false && ! empty($not_activated_users)) {
return $not_activated_users;
} else {
return false;
}
}

function get_moderators($db) {
$moderator_user_level = "moderator";
$stmt = $db->prepare("SELECT user_id, public_id, username FROM users WHERE user_level = ? ORDER BY user_date DESC LIMIT 5");
$stmt->bind_param('s', $moderator_user_level);
$stmt->execute();
$result_get_moderators = $stmt->get_result();
$moderators = $result_get_moderators->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if ($moderators !== false && ! empty($moderators)) {
return $moderators;
} else {
return false;
}
}
