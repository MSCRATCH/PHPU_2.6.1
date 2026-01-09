<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//manage_blog.php
//MMXXVI MSCRATCH

function get_total_number_of_blog_posts($db){
$stmt = $db->query("SELECT COUNT(*) AS count_result FROM blog");
$row = $stmt->fetch_assoc();
$stmt->free();
return $row['count_result'];
}

function get_paginated_blog_posts($db, $offset, $entries_per_page) {
$stmt = $db->prepare("SELECT blog.blog_post_id, blog.blog_post_title, blog.blog_post_date, blog.blog_post_content , users.username FROM blog INNER JOIN users ON blog.blog_post_user_id = users.user_id ORDER BY blog.blog_post_date DESC LIMIT ?, ?");
$stmt->bind_param('ii', $offset, $entries_per_page);
$stmt->execute();
$result = $stmt->get_result();
$blog_posts = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if ($blog_posts !== false && ! empty($blog_posts)) {
return $blog_posts;
} else {
return false;
}
}

function get_total_number_of_blog_posts_by_user($db, $user_id_blog_post){
if (user_is_administrator() === true) {
$stmt = $db->query("SELECT COUNT(*) AS count_result FROM blog");
$row = $stmt->fetch_assoc();
$stmt->free();
return $row['count_result'];
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("SELECT COUNT(*) AS count_result FROM blog WHERE blog_post_user_id = ?");
$stmt->bind_param('i', $user_id_blog_post);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
return $row['count_result'];
}
}

function get_paginated_blog_posts_by_user($db, $offset, $entries_per_page, $user_id_blog_post) {
if (user_is_administrator() === true) {
$stmt = $db->prepare("SELECT blog_post_id, blog_post_title, blog_post_date FROM blog ORDER BY blog_post_date DESC LIMIT ?, ?");
$stmt->bind_param('ii', $offset, $entries_per_page);
$stmt->execute();
$result = $stmt->get_result();
$blog_posts = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if ($blog_posts !== false && ! empty($blog_posts)) {
return $blog_posts;
} else {
return false;
}
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("SELECT blog_post_id, blog_post_title, blog_post_date FROM blog WHERE blog_post_user_id = ? ORDER BY blog_post_date DESC LIMIT ?, ?");
$stmt->bind_param('iii', $user_id_blog_post, $offset, $entries_per_page);
$stmt->execute();
$result = $stmt->get_result();
$blog_posts = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if ($blog_posts !== false && ! empty($blog_posts)) {
return $blog_posts;
} else {
return false;
}
}
}

function check_blog_post_id_by_user($db, $blog_post_id_get, $user_id_blog_post) {
if (user_is_administrator() === true) {
$stmt = $db->prepare("SELECT blog_post_id FROM blog WHERE blog_post_id = ?");
$stmt->bind_param('i', $blog_post_id_get);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows !== 1) {
$stmt->close();
return false;
} else {
$stmt->close();
return true;
}
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("SELECT blog_post_id FROM blog WHERE blog_post_id = ? AND blog_post_user_id = ?");
$stmt->bind_param('ii', $blog_post_id_get, $user_id_blog_post);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows !== 1) {
$stmt->close();
return false;
} else {
$stmt->close();
return true;
}
}
}

function get_blog_post_by_id_and_by_user($db, $blog_post_id_get, $user_id_blog_post) {
if (user_is_administrator() === true) {
$stmt = $db->prepare("SELECT blog.blog_post_title, blog.blog_post_date, blog.blog_post_content, users.public_id, users.username FROM blog INNER JOIN users ON blog.blog_post_user_id = users.user_id WHERE blog.blog_post_id = ?");
$stmt->bind_param('i', $blog_post_id_get);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $row = $result->fetch_assoc()) {
$stmt->close();
return $row;
} else {
$stmt->close();
return false;
}
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("SELECT blog_post_title, blog_post_date, blog_post_content FROM blog WHERE blog_post_id = ? AND blog_post_user_id = ?");
$stmt->bind_param('ii', $blog_post_id_get, $user_id_blog_post);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $row = $result->fetch_assoc()) {
$stmt->close();
return $row;
} else {
$stmt->close();
return false;
}
}
}

function save_blog_post($db, $blog_post_title_form, $blog_post_content_form, $user_id_blog_post) {

$errors = array();

if (empty($blog_post_title_form)) {
$errors [] = MSG_MANAGE_BLOG_NO_TITLE;
}

if (empty($blog_post_content_form)) {
$errors [] = MSG_MANAGE_BLOG_NO_CONTENT;
}

if (empty($errors)) {
$stmt = $db->prepare("INSERT INTO blog(blog_post_title, blog_post_date, blog_post_content, blog_post_user_id) VALUES(?, NOW(), ?, ?)");
$stmt->bind_param('ssi', $blog_post_title_form, $blog_post_content_form, $user_id_blog_post);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
} else {
return $errors;
}
}

function update_blog_post($db, $blog_post_title_update_form, $blog_post_content_update_form, $blog_post_id_get, $user_id_blog_post) {

$errors = array();

if (empty($blog_post_title_update_form)) {
$errors [] = MSG_MANAGE_BLOG_NO_TITLE;
}

if (empty($blog_post_content_update_form)) {
$errors [] = MSG_MANAGE_BLOG_NO_CONTENT;
}

if (empty($errors)) {
if (user_is_administrator() === true) {
$stmt = $db->prepare("UPDATE blog SET blog_post_title = ?, blog_post_content = ? WHERE blog_post_id = ? LIMIT 1");
$stmt->bind_param('ssi', $blog_post_title_update_form, $blog_post_content_update_form, $blog_post_id_get);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("UPDATE blog SET blog_post_title = ?, blog_post_content = ? WHERE blog_post_id = ? AND blog_post_user_id = ? LIMIT 1");
$stmt->bind_param('ssii', $blog_post_title_update_form, $blog_post_content_update_form, $blog_post_id_get, $user_id_blog_post);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}
} else {
return $errors;
}
}

function remove_blog_post($db, $blog_post_id_get, $user_id_blog_post) {
if (user_is_administrator() === true) {
$stmt = $db->prepare("DELETE FROM blog WHERE blog_post_id = ? LIMIT 1");
$stmt->bind_param('i', $blog_post_id_get);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("DELETE FROM blog WHERE blog_post_id = ? AND blog_post_user_id = ? LIMIT 1");
$stmt->bind_param('ii', $blog_post_id_get, $user_id_blog_post);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}
}
