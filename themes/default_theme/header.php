<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//header.php
//MMXXVI MSCRATCH
?>

<!DOCTYPE html>
<html lang="de">
<head>
<title><?php echo PAGE_TITLE;?></title>
<meta charset="utf-8">
<meta name="robots" content="INDEX,FOLLOW">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="MSCRATCH">
<meta name="revisit-after" content="2 days">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= BASE_URL ?>themes/default_theme/default.css" media="all" type="text/css">
<link rel="stylesheet" href="<?= BASE_URL ?>fontawesome/css/all.min.css" />
<script src="<?= BASE_URL ?>themes/default_theme/js/menu.js" defer></script>
<script src="<?= BASE_URL ?>themes/default_theme/js/upd_btn.js" defer></script>
</head>
<body>
<nav class="navbar">
<div class="navbar_title"><?php echo PAGE_TITLE;?></div>
<a href="#" class="toggle_button">Menu</a>
<div class="navbar_links">
<ul>
<?php echo home_nav_item();?>
<?php echo blog_nav_item();?>
<?php echo login_nav_item();?>
<?php echo register_nav_item();?>
<?php echo profile_nav_item();?>
<?php echo profile_settings_nav_item();?>
<?php echo dashboard_nav_item();?>
<?php echo dashboard_moderator_nav_item();?>
<?php echo primary_nav($db);?>
<?php echo logout_nav_item();?>
</ul>
</div>
</nav>
<div class="main_wrapper">
