<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_contents_template.php
//MMXXVI MSCRATCH
?>

<?php  $token_save_content = generate_token('save_content');?>
<?php  $token_update_content = generate_token('update_content');?>
<?php  $token_remove_content = generate_token('remove_content');?>

<?php if (! isset($errors)) {$errors = '';}?>
<?php if (! empty($errors)) { ?>
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-gear"></i> <?php echo sanitize_1(SYSTEM_MESSAGE_TITLE);?></h3></div>
<div class="wrapper_content">
<ul>
<?php foreach ($errors as $error_content) {  ?>
<?php echo '<li class="list_style_none">'. sanitize_1($error_content). '</li>';?>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>

<div class="template_content_row">
<div class="template_content_column_2">
<div class="template_wrapper">
<?php if (isset($content_id_get) && ! empty($content_id_get)) { ?>
<div class="wrapper_title"><h3><i class="fa-solid fa-folder"></i> <?php echo sanitize_1($content['custom_content_title']);?></h3></div>
<div class="wrapper_content">
<a class="default_link" target="_blank" href="<?= BASE_URL ?><?php echo sanitize_1($content['custom_content_url']);?>">View custom page</a>
<form method="post">
<label class="label_default" for="custom_content_url_update_form">Edit name for the URL</label>
<input class="form_text_default" type="text" name="custom_content_url_update_form" id="custom_content_url_update_form" value="<?php echo sanitize_1($content['custom_content_url']);?>">
<label class="label_default" for="custom_content_title_form">Edit the title</label>
<input class="form_text_default" type="text" name="custom_content_title_update_form" id="custom_content_title_update_form" value="<?php echo sanitize_1($content['custom_content_title']);?>">
<label class="label_default" for="custom_content_form">Edit the content of the page</label>
<textarea class="textarea_default" name="custom_content_update_form" id="custom_content_update_form"><?php echo sanitize_1($content['custom_content']);?></textarea>
<input type="hidden" name="csrf_token" value="<?php echo $token_update_content;?>">
<button class="btn_dynamic_mtb" type="submit" name="update_content">Edit</button>
</form>
<form method="post">
<input type="hidden" name="csrf_token" value="<?php echo $token_remove_content;?>">
<button class="btn_dynamic_mtb" type="submit" name="remove_content">Remove</button>
</form>
</div>
</div>
<?php } else { ?>
<div class="wrapper_title"><h3><i class="fa-solid fa-folder"></i> Create a custom page</h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb">In this section, a custom page can be created. Keep in mind that it must then be assigned to a navigation menu.</p>
<form method="post">
<label class="label_default" for="custom_content_url_form">Name for the URL</label>
<input class="form_text_default" type="text" name="custom_content_url_form" id="custom_content_url_form">
<label class="label_default" for="custom_content_title_form">Enter a title</label>
<input class="form_text_default" type="text" name="custom_content_title_form" id="custom_content_title_form">
<label class="label_default" for="custom_content_form">Enter the content of the new page</label>
<textarea class="textarea_default" name="custom_content_form" id="custom_content_form"></textarea>
<input type="hidden" name="csrf_token" value="<?php echo $token_save_content;?>">
<button class="btn_dynamic_mtb" type="submit" name="save_content">Submit</button>
</form>
</div>
</div>
<?php } ?>
</div>
<div class="template_content_column_2">
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-folder"></i> Contents</h3></div>
<div class="wrapper_content">
<?php if ($contents !== false) { ?>
<ul>
<li class="list_style_none"><a class="default_link" href="<?= BASE_URL ?>manage_contents">Back to creating a custom page</a></li>
<?php foreach ($contents as $content) { ?>
<li class="list_style_none"><a class="default_link" href="<?php echo BASE_URL;?>manage_contents/content/<?php echo sanitize_1($content['custom_content_id']);?>"><?php echo sanitize_1($content['custom_content_url']);?>_<?php echo sanitize_1($content['custom_content_title']);?></a></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb">No custom page has been created yet.</p>
<?php } ?>
</div>
</div>
</div>
</div>
