<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//get_error_log.php
//MMXXVI MSCRATCH

function get_total_number_of_errors($db) {
$stmt = $db->query("SELECT COUNT(*) AS count_result FROM error_log");
$row = $stmt->fetch_assoc();
$stmt->free();
return $row['count_result'];
}

function get_paginated_error_log($db, $offset, $entries_per_page) {
$stmt = $db->prepare("SELECT errno, errstr, errfile, errline, err_registered_at FROM error_log ORDER BY err_registered_at DESC LIMIT ?, ?");
$stmt->bind_param('ii', $offset, $entries_per_page);
$stmt->execute();
$result = $stmt->get_result();
$error_log = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if ($error_log !== false && ! empty($error_log)) {
return $error_log;
} else {
return false;
}
}
