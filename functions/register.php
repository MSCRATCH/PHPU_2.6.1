<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//register.php
//MMXXVI MSCRATCH

function register($db, $username_form, $user_password_form, $user_password_confirm_form, $user_email_form, $security_question_answer_form) {

$db->autocommit(false);

$errors = array();

if (! empty($user_email_form) && filter_var($user_email_form, FILTER_VALIDATE_EMAIL) && ! empty($username_form)) {
$errors += check_blocklist($db, $user_email_form, $username_form);
}

if (empty($username_form)) {
$errors [] = MSG_REGISTER_NO_USERNAME;
}

if (empty($user_password_form)) {
$errors [] = MSG_REGISTER_NO_PASSWORD;
}

if (empty($user_password_confirm_form)) {
$errors [] = MSG_REGISTER_NO_PASSWORD_CONFIRMATION;
}

if (empty($user_email_form)) {
$errors [] = MSG_REGISTER_NO_EMAIL_ADDRESS;
}

if (empty($security_question_answer_form)) {
$errors [] = MSG_REGISTER_NO_SECURITY_QUESTION;
}


if (! empty($username_form) && strlen($username_form) > 30) {
$errors [] = MSG_REGISTER_USERNAME_LENGTH;
}

if (! empty($username_form) && strlen($username_form) < 5) {
$errors [] = MSG_REGISTER_USERNAME_SHORT;
}

if (! empty($username_form) && ! ctype_alnum($username_form)) {
$errors [] = MSG_REGISTER_SPECIAL_CHARACTERS;
}

if (! empty($user_password_form) && strlen($user_password_form) > 30) {
$errors [] = MSG_REGISTER_PASSWORD_LENGTH;
}

if (! empty($user_password_form) && strlen($user_password_form) < 8) {
$errors [] = MSG_REGISTER_PASSWORD_SHORT;
}

if ($user_password_form !== $user_password_confirm_form) {
$errors [] = MSG_REGISTER_PASSWORD_NO_MATCH;
}

if (! empty($user_email_form) && ! filter_var($user_email_form, FILTER_VALIDATE_EMAIL)) {
$errors [] = MSG_REGISTER_INVALID_EMAIL_ADRESS;
}

if (! empty($security_question_answer_form) && $security_question_answer_form !== SECURITY_QUESTION_ANSWER) {
$errors [] = MSG_REGISTER_INVALID_SECURITY_QUESTION;
}

$options = ['cost' => 12];
$hashed_user_password = password_hash($user_password_form, PASSWORD_BCRYPT, $options);

$username_unique = $db->prepare("SELECT username FROM users WHERE username = ?");
$username_unique->bind_param('s', $username_form);
$username_unique->execute();
$username_unique->store_result();
if ($username_unique->num_rows > 0) {
$errors [] = MSG_REGISTER_USERNAME_TAKEN;
}
$username_unique->close();

$user_email_unique = $db->prepare("SELECT user_email FROM users WHERE user_email = ?");
$user_email_unique->bind_param('s', $user_email_form);
$user_email_unique->execute();
$user_email_unique->store_result();
if ($user_email_unique->num_rows > 0) {
$errors [] = MSG_REGISTER_EMAIL_ADDRESS_TAKEN;
}
$user_email_unique->close();

if (empty($errors)) {
$public_id_token = bin2hex(random_bytes(16));
$save_user = $db->prepare("INSERT INTO users(public_id, username, user_password, user_email, user_date) VALUES(?, ?, ?, ?, NOW())");
$save_user->bind_param('ssss', $public_id_token, $username_form, $hashed_user_password, $user_email_form);
$save_user_result = $save_user->execute();
if ($save_user_result) {
$new_user_id = $save_user->insert_id;
$save_profile = $db->prepare("INSERT INTO user_profiles(user_id) VALUES(?)");
$save_profile->bind_param('i', $new_user_id);
$save_profile_result = $save_profile->execute();
if ($save_user_result && $save_profile_result) {
$registration_process_result = true;
} else {
$errors [] = MSG_REGISTER_CRITICAL_ERROR;
}
$save_profile->close();
} else {
$errors [] = MSG_REGISTER_CRITICAL_ERROR;
}
$save_user->close();
}

if (empty($errors)) {
$db->commit();
$db->autocommit(true);
return $registration_process_result;
} else {
$db->rollback();
$db->autocommit(true);
return $errors;
}


}
