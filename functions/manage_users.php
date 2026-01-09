<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//manage_users.php
//MMXXVI MSCRATCH

function get_total_number_of_users($db) {
$administrator_user_level = "administrator";
$stmt = $db->prepare("SELECT COUNT(*) AS count_result FROM users WHERE user_level != ?");
$stmt->bind_param('s', $administrator_user_level);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
return $row['count_result'];
}

function get_paginated_users($db, $offset, $entries_per_page) {
$administrator_user_level = "administrator";
$stmt = $db->prepare("SELECT user_id, public_id, username, user_email, user_level, user_date, last_activity, TIMESTAMPDIFF(MINUTE,last_activity,NOW()) AS last_activity_minutes FROM users WHERE user_level != ? ORDER BY user_date DESC LIMIT ?, ?");
$stmt->bind_param('sii', $administrator_user_level, $offset, $entries_per_page);
if ($stmt->execute()) {
$result = $stmt->get_result();
$users = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if ($users !== false && ! empty($users)) {
return $users;
} else {
return false;
}
} else {
return false;
}
}

function check_if_is_administrator($db, $user_id_remove_user_confirm_form) {
$stmt = $db->prepare("SELECT user_level FROM users WHERE user_id = ?");
$stmt->bind_param('i', $user_id_remove_user_confirm_form);
$stmt->execute();
$stmt->bind_result($user_level);
$stmt->fetch();
$stmt->close();
if ($user_level === "administrator") {
return true;
} else {
return false;
}
}

function remove_user($db, $user_id_remove_user_confirm_form) {
$result = check_if_is_administrator($db, $user_id_remove_user_confirm_form);
if ($result === false) {
$stmt = $db->prepare("DELETE FROM users WHERE user_id = ? LIMIT 1");
$stmt->bind_param('i', $user_id_remove_user_confirm_form);
$stmt->execute();
$success = $stmt->affected_rows;
$stmt->close();
if ($success === 1) {
return true;
} else {
return false;
}
} else {
die("The user is an administrator and cannot be removed.");
}
}

function update_user_level($db, $user_level_form, $user_id_user_level_form) {
$stmt = $db->prepare("UPDATE users SET user_level = ? WHERE user_id = ? LIMIT 1");
$stmt->bind_param('si', $user_level_form, $user_id_user_level_form);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}
