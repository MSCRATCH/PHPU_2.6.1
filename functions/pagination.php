<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//pagination.php
//MMXXVI MSCRATCH

function calculate_offset($current_page, $entries_per_page) {
return ($current_page - 1) * $entries_per_page;
}

function calculate_number_of_pages($total_records, $entries_per_page) {
if ($total_records === 0) {
return 1;
}
return ceil($total_records / $entries_per_page);
}

function validate_page_number($total_records, $current_page, $entries_per_page) {
if ($total_records === 0) {
$current_page = 1;
}
$number_of_pages = calculate_number_of_pages($total_records, $entries_per_page);
if ($current_page < 1 || $current_page > $number_of_pages) {
return 1;
} else {
return $current_page;
}
}

function pagination($url, $number_of_pages, $current_page) {
$output = '';
$output .= '<ul class="pagination_ul">';
$prev_page = ($current_page > 1) ? $current_page - 1 : $current_page;
$output .= '<li class="pagination_li">'. '<a class="pagination_link" href="'. BASE_URL .sanitize_1($url). '/page/'. sanitize_1($prev_page). '">'. "Prev". '</a>'. '</li>';
$output .= '<li class="pagination_li">'. "You are on page". "&nbsp;". sanitize_1($current_page). "&nbsp;". "of". "&nbsp;". sanitize_1($number_of_pages). '</li>';
$next_page = ($current_page< $number_of_pages) ? $current_page + 1 : $current_page;
$output .= '<li class="pagination_li">'. '<a class="pagination_link" href="'. BASE_URL .sanitize_1($url). '/page/'. sanitize_1($next_page). '">'. "Next". '</a>'. '</li>';
$output .= '</ul>';
return $output;
}
