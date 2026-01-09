<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//dashboard_moderator_handler.php
//MMXXVI MSCRATCH

//Moderator access only.
if (user_is_moderator() === false) {
header('Location:'. BASE_URL. 'login');
exit();
}

if (backend_access_is_verified() === false) {
header('Location:'. BASE_URL. 'backend_login');
exit();
}
//Moderator access only.

require_once themes_path. '/backend_theme/header.php';

require_once templates_path. '/dashboard_moderator_template.php';

require_once themes_path. '/backend_theme/footer_primary.php';
