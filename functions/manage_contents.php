<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//manage_contents.php
//MMXXVI MSCRATCH

function get_contents($db) {
$stmt = $db->query("SELECT custom_content_id, custom_content_url, custom_content_title FROM custom_content");
$contents = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if ($contents !== false && ! empty($contents)) {
return $contents;
} else {
return false;
}
}

function check_custom_content_id($db, $content_id_get) {
$stmt = $db->prepare("SELECT custom_content_id FROM custom_content WHERE custom_content_id = ?");
$stmt->bind_param('i', $content_id_get);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows !== 1) {
$stmt->close();
return false;
} else {
$stmt->close();
return true;
}
}

function get_content_by_id($db, $content_id_get) {
$stmt = $db->prepare("SELECT custom_content_url, custom_content_title, custom_content FROM custom_content WHERE custom_content_id = ?");
$stmt->bind_param('i', $content_id_get);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $row = $result->fetch_assoc()) {
$stmt->close();
return $row;
} else {
$stmt->close();
return false;
}
}

function get_custom_content($db, $section) {
$stmt = $db->prepare("SELECT custom_content_title, custom_content FROM custom_content WHERE custom_content_url = ?");
$stmt->bind_param('s', $section);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $row = $result->fetch_assoc()) {
$stmt->close();
return $row;
} else {
$stmt->close();
return false;
}
}

function save_custom_content($db, $custom_content_url_form, $custom_content_title_form, $custom_content_form) {

$errors = array();

$not_allowed_urls = array(
'home',
'login',
'register',
'logout',
'settings',
'activity_log',
'dashboard',
'blocklist',
'backend_login',
'backend_logout',
'users',
'profile',
'manage_profile',
'error_log',
'dashboard_moderator',
'manage_contents',
'manage_navigations'
);

if (empty($custom_content_url_form)) {
$errors [] = MSG_MANAGE_CONTENTS_NO_NAME;
}

if (in_array($custom_content_url_form, $not_allowed_urls)) {
$errors [] = MSG_MANAGE_CONTENTS_NOT_ALLOWED_URL;
}

if (empty($custom_content_title_form)) {
$errors [] = MSG_MANAGE_CONTENTS_NO_TITLE;
}

if (empty($custom_content_form)) {
$errors [] = MSG_MANAGE_CONTENTS_NO_CONTENT;
}

if (empty($errors)) {
$stmt = $db->prepare("INSERT INTO custom_content(custom_content_url, custom_content_title, custom_content) VALUES(?, ?, ?)");
$stmt->bind_param('sss', $custom_content_url_form, $custom_content_title_form, $custom_content_form);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
} else {
return $errors;
}
}

function update_custom_content($db, $custom_content_url_update_form, $custom_content_title_update_form, $custom_content_update_form, $content_id_get) {

$errors = array();

$not_allowed_urls = array(
'home',
'login',
'register',
'logout',
'settings',
'activity_log',
'dashboard',
'blocklist',
'backend_login',
'backend_logout',
'users',
'profile',
'manage_profile',
'error_log',
'dashboard_moderator',
'manage_contents',
'manage_navigations'
);

if (empty($custom_content_url_update_form)) {
$errors [] = MSG_MANAGE_CONTENTS_NO_NAME;
}

if (in_array($custom_content_url_update_form, $not_allowed_urls)) {
$errors [] = MSG_MANAGE_CONTENTS_NOT_ALLOWED_URL;
}

if (empty($custom_content_title_update_form)) {
$errors [] = MSG_MANAGE_CONTENTS_NO_TITLE;
}

if (empty($custom_content_update_form)) {
$errors [] = MSG_MANAGE_CONTENTS_NO_CONTENT;
}

if (empty($errors)) {
$stmt = $db->prepare("UPDATE custom_content SET custom_content_url = ?, custom_content_title = ?, custom_content = ?  WHERE custom_content_id = ? LIMIT 1");
$stmt->bind_param('sssi', $custom_content_url_update_form , $custom_content_title_update_form, $custom_content_update_form, $content_id_get);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
} else {
return $errors;
}
}

function remove_custom_content($db, $content_id_get) {
$stmt = $db->prepare("DELETE FROM custom_content WHERE custom_content_id = ? LIMIT 1");
$stmt->bind_param('i', $content_id_get);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}
