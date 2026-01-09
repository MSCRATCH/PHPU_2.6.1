<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//db.php
//MMXXVI MSCRATCH

function connect() {

require_once config_path. '/config.php';

$db = new mysqli (SERVERNAME, USERNAME, PASSWORD, DB_NAME);
$db->set_charset ('utf8');
if ($db->connect_errno) {
die ("A critical error occurred while establishing the database connection.");
};
return $db;
}
