<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//authentication.php
//MMXXVI MSCRATCH

function user_is_logged_in() {
if (isset($_SESSION['logged_in']['user_level']) && $_SESSION['logged_in']['user_level'] === "administrator" or isset($_SESSION['logged_in']['user_level']) && $_SESSION['logged_in']['user_level'] === "moderator" or isset($_SESSION['logged_in']['user_level']) && $_SESSION['logged_in']['user_level'] === "user") {
return true;
} else {
return false;
}
}

function is_user() {
if (isset($_SESSION['logged_in']['user_level']) && $_SESSION['logged_in']['user_level'] === "user") {
return true;
} else {
return false;
}
}

function user_is_administrator() {
if (isset($_SESSION['logged_in']['user_level']) && $_SESSION['logged_in']['user_level'] === "administrator") {
return true;
} else {
return false;
}
}

function user_is_moderator() {
if (isset($_SESSION['logged_in']['user_level']) && $_SESSION['logged_in']['user_level'] === "moderator") {
return true;
} else {
return false;
}
}

function backend_access_is_verified() {
if (isset($_SESSION['logged_in']['backend_login_token']) && $_SESSION['logged_in']['backend_login_token'] === $_SESSION['backend_login_verification_token']) {
return true;
} else {
return false;
}
}


function user_is_administrator_or_moderator() {
if (isset($_SESSION['logged_in']['user_level']) && $_SESSION['logged_in']['user_level'] === "administrator" or isset($_SESSION['logged_in']['user_level']) && $_SESSION['logged_in']['user_level'] === "moderator") {
return true;
} else {
return false;
}
}

function user_is_not_activated() {
if (isset($_SESSION['logged_in']['user_level']) && $_SESSION['logged_in']['user_level'] === "not_activated") {
return true;
} else {
return false;
}
}

function get_username() {
if (isset($_SESSION['logged_in']['username'])) {
return $_SESSION['logged_in']['username'];
}
}

function get_user_id() {
if (isset($_SESSION['logged_in']['user_id'])) {
return (INT) $_SESSION['logged_in']['user_id'];
}
}

function get_public_user_id() {
if (isset($_SESSION['logged_in']['public_user_id'])) {
return $_SESSION['logged_in']['public_user_id'];
}
}

function get_user_level() {
if (isset($_SESSION['logged_in']['user_level'])) {
return $_SESSION['logged_in']['user_level'];
}
}
