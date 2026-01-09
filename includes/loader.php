<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//loader.php
//MMXXVI MSCRATCH

require_once includes_path. '/db.php';
require_once functions_path. '/load_settings.php';
require_once includes_path. '/messages.php';
require_once functions_path. '/csrf_token.php';
require_once functions_path. '/authentication.php';
require_once functions_path. '/make_safe_url.php';
require_once functions_path. '/sanitize_functions.php';
require_once functions_path. '/system_message.php';
require_once functions_path. '/register_error_handler.php';
require_once functions_path. '/pagination.php';
require_once functions_path. '/cct.php';
require_once functions_path. '/log_activity.php';
require_once functions_path. '/manage_login_attempts.php';
require_once functions_path. '/backend_login.php';
require_once functions_path. '/login.php';
require_once functions_path. '/check_blocklist.php';
require_once functions_path. '/register.php';
require_once functions_path. '/logout.php';
require_once functions_path. '/backend_logout.php';
require_once functions_path. '/manage_settings.php';
require_once functions_path. '/get_activity_log.php';
require_once functions_path. '/clearing_activity_log.php';
require_once functions_path. '/manage_blocklist.php';
require_once functions_path. '/get_dashboard_stats.php';
require_once functions_path. '/manage_users.php';
require_once functions_path. '/update_last_activity.php';
require_once functions_path. '/check_public_user_id.php';
require_once functions_path. '/manage_profile.php';
require_once functions_path. '/upload_profile_image.php';
require_once functions_path. '/get_error_log.php';
require_once functions_path. '/manage_contents.php';
require_once functions_path. '/manage_navigations.php';
require_once functions_path. '/manage_blog.php';
require_once functions_path. '/front_controller.php';
