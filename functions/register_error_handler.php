<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//register_error_handler.php
//MMXXVI MSCRATCH

function register_error_handler($db) {
set_error_handler(function($errno, $errstr, $errfile, $errline) use ($db) {
$stmt = $db->prepare("INSERT INTO error_log(errno, errstr, errfile, errline, err_registered_at) VALUES(?, ?, ?, ?, NOW()) ON DUPLICATE KEY UPDATE err_registered_at = err_registered_at");
$stmt->bind_param('issi', $errno, $errstr, $errfile, $errline);
$stmt->execute();
$stmt->close();
});
}
