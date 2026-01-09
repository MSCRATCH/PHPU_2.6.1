<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//update_last_activity.php
//MMXXVI MSCRATCH

function update_last_activity($db, $user_id) {
$stmt = $db->prepare("UPDATE users SET last_activity = NOW() WHERE user_id = ? LIMIT 1");
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->close();
}
