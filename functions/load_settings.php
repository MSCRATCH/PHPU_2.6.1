<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//load_settings.php
//MMXXVI MSCRATCH

function load_settings($db) {
$stmt = $db->query("SELECT setting_key, setting_value FROM settings");
$settings = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if ($settings !== false && ! empty($settings)) {
foreach ($settings as $setting) {
define(strtoupper($setting['setting_key']), $setting['setting_value']);
}
} else {
die("Failed to load the settings due to a critical error.");
}

}
