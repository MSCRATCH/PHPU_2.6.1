<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//manage_profile.php
//MMXXVI MSCRATCH

function get_profile_by_public_user_id($db, $public_user_id_get) {
$stmt = $db->prepare("SELECT users.username, users.user_level, users.last_activity, user_profiles.user_profile_image, user_profiles.user_profile_location, user_profiles.user_profile_description, TIMESTAMPDIFF(MINUTE,last_activity,NOW()) AS last_activity_minutes FROM users INNER JOIN user_profiles ON users.user_id = user_profiles.user_id WHERE users.public_id = ?");
$stmt->bind_param('s', $public_user_id_get);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();
$stmt->close();
return $result;
}

function get_profile_by_id($db, $profile_user_id) {
$stmt = $db->prepare("SELECT users.username, users.user_level, users.last_activity, user_profiles.user_profile_image, user_profiles.user_profile_location, user_profiles.user_profile_description FROM users INNER JOIN user_profiles ON users.user_id = user_profiles.user_id WHERE users.user_id = ?");
$stmt->bind_param('i', $profile_user_id);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();
$stmt->close();
return $result;
}

function update_profile($db, $user_profile_location_form, $user_profile_description_form, $profile_user_id) {
$stmt = $db->prepare("UPDATE user_profiles SET user_profile_location = ?, user_profile_description = ?  WHERE user_id = ? LIMIT 1");
$stmt->bind_param('ssi', $user_profile_location_form, $user_profile_description_form, $profile_user_id);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}
