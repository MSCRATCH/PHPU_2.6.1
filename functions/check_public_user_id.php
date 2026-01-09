<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//check_public_user_id.php
//MMXXVI MSCRATCH

function check_public_user_id($db, $public_user_id_get) {
$stmt = $db->prepare("SELECT user_id FROM users WHERE public_id = ?");
$stmt->bind_param('s', $public_user_id_get);
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
