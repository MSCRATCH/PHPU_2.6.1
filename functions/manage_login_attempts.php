<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//manage_login_attempts.php
//MMXXVI MSCRATCH

function get_login_ip_address() {
if (isset($_SERVER['REMOTE_ADDR'])) {
$login_ip_address = $_SERVER['REMOTE_ADDR'];
if (filter_var($login_ip_address, FILTER_VALIDATE_IP)) {
return $login_ip_address;
} else {
return $login_ip_address = "invalid_ip_address";
}
}
}

function clear_login_attempts($db, $username_form) {
$login_ip_address = get_login_ip_address();
$stmt = $db->prepare("DELETE FROM login_attempts WHERE username = ? AND ip_address = ?");
$stmt->bind_param('ss', $username_form, $login_ip_address);
$stmt->execute();
$stmt->close();
}

function is_login_blocked($db, $username_form) {
$login_ip_address = get_login_ip_address();
$stmt = $db->prepare("SELECT attempts, last_attempt FROM login_attempts WHERE username = ? AND ip_address = ?");
$stmt->bind_param('ss', $username_form, $login_ip_address);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
return false;
}

$stmt->bind_result($attempts, $last_attempt);
$stmt->fetch();
$stmt->close();

$block_time = 300;

if ($attempts >= 5) {
if (time() - strtotime($last_attempt) < $block_time) {
return true;
}
clear_login_attempts($db, $username_form);
}
return false;
}

function register_failed_login($db, $username_form) {
$login_ip_address = get_login_ip_address();
$stmt = $db->prepare("INSERT INTO login_attempts(username, ip_address, attempts, last_attempt) VALUES(?, ?, 1, NOW()) ON DUPLICATE KEY UPDATE attempts = attempts + 1, last_attempt = NOW()");
$stmt->bind_param('ss', $username_form, $login_ip_address);
$stmt->execute();
$stmt->close();
}
