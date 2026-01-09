<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//profile_template.php
//MMXXVI MSCRATCH
?>

<?php if ($profile['user_level'] !== "not_activated") { ?>
<div class="template_row">
<div class="template_column_1">
<div class="template_wrapper">
<div class="template_wrapper_title"><h3><i class="fa-solid fa-user"></i> <?php echo sanitize_3($profile['username']);?></h3></div>
<?php if (empty($profile['user_profile_image'])) { ?>
<div class="template_wrapper_content">
<p class="paragraph_mtb"><?php echo sanitize_3($profile['username']);?> has not uploaded a profile picture.</p>
</div>
<?php } else { ?>
<img src="<?= BASE_URL ?>images/<?php echo sanitize_1($profile['user_profile_image']);?>" alt="profile_image" class="profile_image">
<?php } ?>
<div class="template_wrapper_content">
<ul>
<li class="list_style_none"><?php echo sanitize_3($profile['user_level']);?></li>
<li class="list_style_none"><?php echo sanitize_1($profile['user_profile_location']);?></li>
<?php if ($profile['last_activity_minutes'] <= 5) { ?>
<li class="list_style_none">Online</li>
<?php } else { ?>
<li class="list_style_none"><?php echo sanitize_1($profile['last_activity']);?></li>
<?php } ?>
</ul>
</div>
</div>
<div class="sidebar_nav">
<div class="sidebar_nav_title"><h3><i class="fa-solid fa-bars"></i> <?php echo PAGE_TITLE;?></h3></div>
<ul>
<?php echo secondary_nav($db);?>
</ul>
</div>
</div>
<div class="template_column_2">
<div class="template_wrapper">
<div class="template_wrapper_title"><h3><i class="fa-solid fa-message"></i> Profile description</h3></div>
<div class="template_wrapper_content">
<?php if (empty($profile['user_profile_description'])) { ?>
<p class="paragraph_mtb">This user has not yet provided a profile description.</p>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo sanitize_1($profile['user_profile_description']);?></p>
<?php } ?>
</div>
</div>
<footer class="footer_primary">
<div class="footer_title">This page is based on <?php echo SCRIPTNAME;?> <?php echo VERSION;?> programmed by <?php echo AUTHOR;?></div>
</footer>
</div>
</div>
<?php } else { ?>
<div class="wrapper_primary_bg">
<div class="wrapper_title"><h3><?php echo SCRIPTNAME;?></h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb">This account is not activated and therefore inaccessible.</p>
</div>
</div>
<?php } ?>
