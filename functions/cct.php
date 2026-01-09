<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//cct.php
//MMXXVI MSCRATCH

function set_cct() {
if (isset($_POST['cc_accepted'])) {
setcookie('cc_accepted', 'true', time() +31536000);
header('Location: '. $_SERVER['REQUEST_URI']);
exit();
}
}

function cct() {
if (! isset($_COOKIE['cc_accepted'])) {
$output = '';
$output .= '<div class="cct_wrapper">';
$output .= '<div class="cct">';
$output .= '<div class="cct_title">';
$output .= '<h3>';
$output .= sanitize_1(MSG_CCT_TITLE);
$output .= '</h3>';
$output .= '</div>';
$output .= '<div class="cct_content">';
$output .= '<p>'. sanitize_1(MSG_CCT_TEXT). '</p>';
$output .= '<form method="post">';
$output .= '<button class="btn_static_mtb" type="submit" name="cc_accepted">'. sanitize_1(MSG_CCT_BTN). '</button>';
$output .= '</form>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
return $output;
}
}
