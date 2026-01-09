<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//csrf_token.php
//MMXXVI MSCRATCH

function generate_token($form_name) {
$token_name_prefix = 'csrf_token_';
$token = bin2hex(random_bytes(32));
$token_name = $token_name_prefix. $form_name;
$_SESSION[$token_name] = $token;
return $token;
}

function validate_token($form_name, $token) {
$token_name_prefix = 'csrf_token_';
$token_name = $token_name_prefix. $form_name;
if (isset($_SESSION[$token_name]) && $token === $_SESSION[$token_name]) {
unset($_SESSION[$token_name]);
return true;
}
return false;
}
