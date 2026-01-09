<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//backend_logout.php
//MMXXVI MSCRATCH

function backend_logout() {
unset($_SESSION['logged_in']['username']);
unset($_SESSION['logged_in']['user_level']);
unset($_SESSION['logged_in']['user_id']);
unset($_SESSION['logged_in']['backend_login_token']);
unset($_SESSION['backend_login_verification_token']);
}
