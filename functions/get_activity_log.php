<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//get_activity_log.php
//MMXXVI MSCRATCH

function get_total_number_entries_activity_log($db){
$stmt = $db->query("SELECT COUNT(*) AS count_result FROM activity_log");
$row = $stmt->fetch_assoc();
$stmt->free();
return $row['count_result'];
}

function get_paginated_activity_log($db, $offset, $entries_per_page) {
$stmt = $db->prepare("SELECT activity_log.activity_log_ip_address, activity_log.activity_log_browser, activity_log.activity_log_requested_url, activity_log.activity_log_timestamp, activity_log.user_id, users.username FROM activity_log LEFT JOIN users ON activity_log.user_id = users.user_id ORDER BY activity_log.activity_log_timestamp DESC LIMIT ?, ?");
$stmt->bind_param('ii', $offset, $entries_per_page);
$stmt->execute();
$result = $stmt->get_result();
$activity_log = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if ($activity_log !== false && ! empty($activity_log)) {
return $activity_log;
} else {
die("Failed to load the activity log due to a critical error.");
}
}

function get_activity_log($db) {
$stmt = $db->query("SELECT activity_log.activity_log_ip_address, activity_log.activity_log_browser, activity_log.activity_log_requested_url, activity_log.activity_log_timestamp, activity_log.user_id, users.username FROM activity_log LEFT JOIN users ON activity_log.user_id = users.user_id ORDER BY activity_log.activity_log_timestamp");
$activity_log = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if ($activity_log !== false && ! empty($activity_log)) {
return $activity_log;
} else {
die("Failed to load the activity log due to a critical error.");
}
}
