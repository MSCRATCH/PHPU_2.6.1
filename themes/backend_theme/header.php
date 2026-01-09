<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//header.php
//MMXXVI MSCRATCH
?>

<!DOCTYPE html>
<html lang="de">
<head>
<title><?php echo SCRIPTNAME;?></title>
<meta charset="utf-8">
<meta name="robots" content="INDEX,FOLLOW">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="MSCRATCH">
<meta name="revisit-after" content="2 days">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= BASE_URL ?>fontawesome/css/all.min.css" />
<link rel="stylesheet" href="<?= BASE_URL ?>themes/backend_theme/backend.css" media="all" type="text/css">
</head>
<body>
<div class="template_primary_wrapper_row">
<div class="template_column_1">
<div class="sidebar_nav">
<ul>
<div class="sidebar_nav_title"><h3><?php echo SCRIPTNAME;?> <?php echo VERSION;?></h3></div>
<?php if (user_is_moderator() === true) { ?>
<li><a href="<?= BASE_URL ?>home"><i class="fa-solid fa-arrow-left"></i> Back to homepage</a></li>
<li><a href="<?= BASE_URL ?>dashboard_moderator"><i class="fa-solid fa-house"></i> Dashboard</a></li>
<?php } ?>
<?php if (user_is_administrator() === true) { ?>
<li><a href="<?= BASE_URL ?>home"><i class="fa-solid fa-arrow-left"></i> Back to homepage</a></li>
<li><a href="<?= BASE_URL ?>dashboard"><i class="fa-solid fa-house"></i> Dashboard</a></li>
<li><a href="<?= BASE_URL ?>settings"><i class="fa-solid fa-gear"></i> Settings</a></li>
<li><a href="<?= BASE_URL ?>activity_log"><i class="fa-solid fa-floppy-disk"></i> Activity log</a></li>
<li><a href="<?= BASE_URL ?>error_log"><i class="fa-solid fa-bug"></i> Error log</a></li>
<li><a href="<?= BASE_URL ?>blocklist"><i class="fa-solid fa-ban"></i> Blocklist</a></li>
<li><a href="<?= BASE_URL ?>users"><i class="fa-solid fa-user"></i> User management</a></li>
<li><a href="<?= BASE_URL ?>manage_contents"><i class="fa-solid fa-folder"></i> Contents</a></li>
<li><a href="<?= BASE_URL ?>manage_navigations"><i class="fa-solid fa-bars"></i> Navigations</a></li>
<?php } ?>
<?php if (user_is_administrator_or_moderator() === true) { ?>
<li><a href="<?= BASE_URL ?>manage_blog"><i class="fa-solid fa-message"></i> Blog</a></li>
<li><a href="<?= BASE_URL ?>backend_logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>
<?php } ?>
</ul>
</div>
</div>
<div class="template_column_2">
