<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//upload_profile_image.php
//MMXXVI MSCRATCH

function create_new_profile_image_name($file_name) {
$profile_image_name = uniqid();
$file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
return $new_profile_image_name = $profile_image_name.  "." . $file_extension;
}

function check_if_profile_image_exists_db($db, $profile_user_id) {
$stmt = $db->prepare("SELECT user_profile_image FROM user_profiles WHERE user_id = ?");
$stmt->bind_param('i', $profile_user_id);
$stmt->execute();
$stmt->bind_result($user_profile_picture);
$stmt->fetch();
$stmt->close();
if (! empty($user_profile_picture)) {
$path = images_path. '/'. basename($user_profile_picture);
if (file_exists($path)) {
unlink($path);
}
}
}

function update_profile_image_name_db($db, $profile_user_id, $new_profile_image_name) {
$stmt = $db->prepare("UPDATE user_profiles SET user_profile_image = ? WHERE user_id = ? LIMIT 1");
$stmt->bind_param('si', $new_profile_image_name, $profile_user_id);
$stmt->execute();
$stmt->store_result();
if ($stmt->affected_rows === 1) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}

function validate_profile_image($profile_image_file, $allowed_image_extensions, $allowed_image_mime_types, $maximum_image_size, $file_name, $file_error, $file_size, $file_type, $file_tmp_name) {

$errors = array();

if (isset($profile_image_file) && is_array($profile_image_file)) {
if ($file_error === UPLOAD_ERR_OK) {
if ($file_size > $maximum_image_size) {
$errors [] = UPLD_PRF_IMG_INVALID_IMAGE_SIZE;
}

$image_extension = pathinfo($file_name, PATHINFO_EXTENSION);
if (! in_array(strtolower($image_extension), $allowed_image_extensions)) {
$errors [] = UPLD_PRF_IMG_INVALID_IMAGE_EXTENSION;
}
if (! in_array($file_type, $allowed_image_mime_types)) {
$errors [] = UPLD_PRF_IMG_INVALID_MIME_TYPE;
}
$file_image_size = getimagesize($file_tmp_name);
if ($file_image_size !== false) {
$width = $file_image_size[0];
$height = $file_image_size[1];

if ($width > 250 and $height > 250 or $width < 250 and $height < 250) {
$errors [] = UPLD_PRF_IMG_INVALID_DIMENSION;
}
} else {
$errors [] = UPLD_PRF_IMG_INVALID_DIMENSION;
}
} elseif ($file_error === UPLOAD_ERR_NO_FILE) {
$errors [] = UPLD_PRF_IMG_INVALID_NO_FILE;
}
}
return $errors;
}

function upload_profile_image($db, $profile_image_file, $profile_user_id) {

$allowed_image_extensions = array("jpg", "jpeg", "png");
$allowed_image_mime_types = array('image/jpeg', 'image/png');
$maximum_image_size = 2 * 1024 * 1024;

$file_name = $profile_image_file['name'];
$file_error = $profile_image_file['error'];
$file_size = $profile_image_file['size'];
$file_type = $profile_image_file['type'];
$file_tmp_name = $profile_image_file['tmp_name'];

$errors = validate_profile_image($profile_image_file, $allowed_image_extensions, $allowed_image_mime_types, $maximum_image_size, $file_name, $file_error, $file_size, $file_type, $file_tmp_name);

if (empty($errors)) {
check_if_profile_image_exists_db($db, $profile_user_id);
$new_profile_image_name = create_new_profile_image_name($file_name);
$success_update_profile_image_name_db = update_profile_image_name_db($db, $profile_user_id, $new_profile_image_name);
$upload_path = images_path. '/' . basename($new_profile_image_name);
if ($success_update_profile_image_name_db !== false && move_uploaded_file ($file_tmp_name , $upload_path)) {
return true;
} else {
return false;
}
} else {
return $errors;
}
}
