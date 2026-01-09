<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//login.php
//MMXXVI MSCRATCH

function login($db, $username_form, $user_password_form) {

$errors = array();

if (is_login_blocked($db, $username_form)) {
$errors [] = MSG_LOGIN_BLOCKED;
return $errors;
}

if (empty($username_form)) {
$errors [] = MSG_LOGIN_NO_USERNAME;
}

if (empty($user_password_form)) {
$errors [] = MSG_LOGIN_NO_PASSWORD;
}

if (empty($errors)) {
$stmt = $db->prepare("SELECT user_id, public_id, username, user_password, user_level FROM users WHERE username = ?");
$stmt->bind_param('s', $username_form);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($user_id, $public_id, $username, $user_password, $user_level);
$stmt->fetch();
if ($stmt->num_rows === 1 && password_verify($user_password_form, $user_password)) {
clear_login_attempts($db, $username_form);
update_last_activity($db, $user_id);
session_regenerate_id(true);
$_SESSION['logged_in']['username'] = $username;
$_SESSION['logged_in']['user_level'] = $user_level;
$_SESSION['logged_in']['user_id'] = $user_id;
$_SESSION['logged_in']['public_user_id'] = $public_id;
$stmt->close();
return true;
} else {
register_failed_login($db, $username_form);
$errors [] = MSG_LOGIN_FAILED;
unset($_SESSION['logged_in']['username']);
unset($_SESSION['logged_in']['user_level']);
unset($_SESSION['logged_in']['user_id']);
unset($_SESSION['logged_in']['public_user_id']);
$stmt->close();
return $errors;
}
} else {
return $errors;
}

}
