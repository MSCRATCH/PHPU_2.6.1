<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//clearing_activity_log.php
//MMXXVI MSCRATCH

function save_activity_log_as_text($result) {
$text = '';
$file_name = 'log_'. date('Y-m-d_H-i-s'). '.txt';
$file_path = logs_path;
$no_registered_user = "no_registered_user";
foreach ($result as $row) {
if ($row['username'] === NULL) {
$text .= $row['activity_log_ip_address']. '_'.$row['activity_log_browser']. '_'.$row['activity_log_requested_url']. '_'.$row['activity_log_timestamp'].'_'.$no_registered_user."\r\n";
} else {
$text .= $row['activity_log_ip_address']. '_'.$row['activity_log_browser']. '_'.$row['activity_log_requested_url']. '_'.$row['activity_log_timestamp']. '_'.$row['username']."\r\n";
}
}
if (is_writable($file_path)) {
file_put_contents($file_path. '/'. $file_name, $text);
return true;
} else {
return false;
}
}

function remove_entries_activity_log($db) {
$stmt = $db->prepare("DELETE FROM activity_log");
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}

function clearing_activity_log($db, $total_number_entries_activity_log, $result) {
$maximum_number_of_entries = 1000;
if ($total_number_entries_activity_log >= $maximum_number_of_entries) {

$errors = array();

$save_activity_log = save_activity_log_as_text($result);
if ($save_activity_log === false) {
$errors [] = MSG_ACTIVITY_LOG_SAVE_FAILED;
return $errors;
} else {
$remove_entries_activity_log = remove_entries_activity_log($db);
if ($remove_entries_activity_log === false) {
$errors [] = MSG_ACTIVITY_LOG_REMOVE_FAILED;
return $errors;
}
}
}
}
