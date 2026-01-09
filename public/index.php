<?php

//This file is part of PHPUC
//index.php
//MMXXVI MSCRATCH

define('MAIN', true);

error_reporting(0);
ini_set('display_errors', 0);

require_once '../includes/paths.php';
require_once includes_path. '/loader.php';

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);
session_start ();

define('SCRIPTNAME', 'PHPUC');
define('VERSION', '2.6.1');
define('AUTHOR', 'MSCRATCH');
define('YEAR', 'MMXXV');

$csp = "default-src 'self'; "
. "script-src 'self'; "
. "style-src 'self'; "
. "font-src 'self'; "
. "img-src 'self' data:;";

header("Content-Security-Policy: $csp");

$db = connect();
register_error_handler($db);
load_settings($db);
log_activity($db);
if (user_is_logged_in() === false) {
set_cct();
echo cct();
} else {
$user_id_front_controller = get_user_id();
update_last_activity($db, $user_id_front_controller);
}
if (user_is_not_activated() === true) {
require_once themes_path. '/default_theme/header_secondary.php';
require_once templates_path. '/message_not_activated.php';
require_once themes_path. '/default_theme/footer_secondary.php';
exit();
}

if (isset($_GET['p']) && $_GET['p'] === 'image' && isset($_GET['file']) && ! empty($_GET['file'])) {
require functions_path . '/serve_image.php';
serve_image($_GET['file']);
exit;
}

front_controller($db);
