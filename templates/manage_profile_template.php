<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_profile_template.php
//MMXXVI MSCRATCH
?>

<?php  $token_upload_user_profile_image = generate_token('upload_user_profile_image');?>
<?php  $token_update_profile = generate_token('update_profile');?>

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
<li class="list_style_none"><?php echo sanitize_1($profile['last_activity']);?></li>
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
<?php if (! isset($errors)) {$errors = '';}?>
<?php if (! empty($errors)) { ?>
<div class="template_wrapper">
<div class="template_wrapper_title"><h3><i class="fa-solid fa-gear"></i> <?php echo sanitize_1(SYSTEM_MESSAGE_TITLE);?></h3></div>
<div class="template_wrapper_content">
<ul>
<?php foreach ($errors as $error_content) {  ?>
<?php echo '<li class="list_style_none">'. sanitize_1($error_content). '</li>';?>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>
<div class="template_wrapper">
<div class="template_wrapper_title"><h3><i class="fa-solid fa-cloud-arrow-up"></i> Upload a profile image</h3></div>
<div class="template_wrapper_content">
<form enctype="multipart/form-data" method="post">
<button class="btn_upload" type="button" id="btn_upload">Search for image file</button>
<input type="file" name="user_profile_image" id="file_input">
<input type="hidden" name="csrf_token" value="<?php echo $token_upload_user_profile_image;?>">
<button class="btn_submit" type="submit" name="upload_user_profile_image" id="btn_submit">Upload profile image</button>
</form>
</div>
</div>
<div class="template_wrapper">
<div class="template_wrapper_title"><h3><i class="fa-solid fa-user"></i> Update the profile description</h3></div>
<div class="template_wrapper_content">
<form method="post">
<label class="label_default" for="user_profile_location_form">Location</label>
<input class="form_text_default" type="text" name="user_profile_location_form" id="" value="<?php echo sanitize_1($profile['user_profile_location']);?>">
<label class="label_default" for="user_profile_description_form">Profile description</label>
<textarea class="textarea_default" name="user_profile_description_form" id="user_profile_description_form"><?php echo sanitize_1($profile['user_profile_description']);?></textarea>
<input type="hidden" name="csrf_token" value="<?php echo $token_update_profile;?>">
<button class="btn_dynamic_mtb" type="submit" name="update_profile">Update profile</button>
</form>
</div>
</div>
<footer class="footer_primary">
<div class="footer_title">This page is based on <?php echo SCRIPTNAME;?> <?php echo VERSION;?> programmed by <?php echo AUTHOR;?></div>
</footer>
</div>
</div>
