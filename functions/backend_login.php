<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//backend_login.php
//MMXXVI MSCRATCH

function backend_login($db, $backend_login_name_form, $backend_login_password_form) {

$errors = array();

if (is_login_blocked($db, $backend_login_name_form)) {
$errors [] = MSG_BCKND_LOGIN_BLOCKED;
return $errors;
}

if (empty($backend_login_name_form)) {
$errors [] = MSG_BCKND_LOGIN_NO_USERNAME;
}

if (empty($backend_login_password_form)) {
$errors [] = MSG_BCKND_LOGIN_NO_PASSWORD;
}

if (empty($errors)) {
$stmt = $db->prepare("SELECT user_id, user_password, user_level FROM users WHERE username = ?");
$stmt->bind_param('s', $backend_login_name_form);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($user_id, $user_password, $user_level);
$stmt->fetch();
if ($stmt->num_rows === 1 && password_verify($backend_login_password_form, $user_password)) {
if ($user_level === "administrator" or $user_level === "moderator") {
clear_login_attempts($db, $backend_login_name_form);
update_last_activity($db, $user_id);
$backend_login_token = bin2hex(random_bytes(32));
session_regenerate_id(true);
$_SESSION['logged_in']['backend_login_token'] = $backend_login_token;
$_SESSION['backend_login_verification_token'] = $backend_login_token;
$stmt->close();
return true;
} else {
register_failed_login($db, $backend_login_name_form);
$errors [] = MSG_BCKND_LOGIN_FAILED;
unset($_SESSION['logged_in']['backend_login_token']);
unset($_SESSION['backend_login_verification_token']);
$stmt->close();
return $errors;
}
} else {
register_failed_login($db, $backend_login_name_form);
$errors [] = MSG_BCKND_LOGIN_FAILED;
unset($_SESSION['logged_in']['backend_login_token']);
unset($_SESSION['backend_login_verification_token']);
$stmt->close();
return $errors;
}
} else {
return $errors;
}

}
