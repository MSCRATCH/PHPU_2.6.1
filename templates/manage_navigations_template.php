<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_navigations_template.php
//MMXXVI MSCRATCH
?>

<?php  $token_save_primary_nav_element = generate_token('save_primary_nav_element');?>
<?php  $token_save_secondary_nav_element = generate_token('save_secondary_nav_element');?>
<?php  $token_update_primary_nav_element = generate_token('update_primary_nav_element');?>
<?php  $token_update_secondary_nav_element = generate_token('update_secondary_nav_element');?>
<?php  $token_remove_primary_nav_element = generate_token('remove_primary_nav_element');?>
<?php  $token_remove_secondary_nav_element = generate_token('remove_secondary_nav_element');?>

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
<?php if (isset($primary_navigation_element_id_get) && ! empty($primary_navigation_element_id_get)) { ?>
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-bars"></i> Edit a primary navigation element</h3></div>
<div class="wrapper_content">
<form method="post">
<label class="label_default" for="primary_nav_url_update_form">Edit name for the URL</label>
<input class="form_text_default" type="text" name="primary_nav_url_update_form" id="primary_nav_url_update_form" value="<?php echo sanitize_1($primary_navigation_element['primary_nav_url']);?>">
<label class="label_default" for="primary_nav_name_update_form">Edit name for the navigation element</label>
<input class="form_text_default" type="text" name="primary_nav_name_update_form" id="primary_nav_name_update_form" value="<?php echo sanitize_1($primary_navigation_element['primary_nav_name']);?>">
<label class="label_default" for="primary_nav_order_update_form">Edit numerical order for the element</label>
<input class="form_text_default" type="text" name="primary_nav_order_update_form" id="primary_nav_order_update_form" value="<?php echo sanitize_1($primary_navigation_element['primary_nav_order']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_update_primary_nav_element;?>">
<button class="btn_dynamic_mtb" type="submit" name="update_primary_nav_element">Edit</button>
</form>
<form method="post">
<input type="hidden" name="csrf_token" value="<?php echo $token_remove_primary_nav_element;?>">
<button class="btn_dynamic_mtb" type="submit" name="remove_primary_nav_element">Remove</button>
</form>
</div>
</div>
<?php } elseif (isset($secondary_navigation_element_id_get) && ! empty($secondary_navigation_element_id_get)) { ?>
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-bars"></i> Edit a secondary navigation element</h3></div>
<div class="wrapper_content">
<form method="post">
<label class="label_default" for="secondary_nav_url_update_form">Edit the name for the URL</label>
<input class="form_text_default" type="text" name="secondary_nav_url_update_form" id="secondary_nav_url_update_form" value="<?php echo sanitize_1($secondary_navigation_element['secondary_nav_url']);?>">
<label class="label_default" for="secondary_nav_name_update_form">Edit the name for the navigation element</label>
<input class="form_text_default" type="text" name="secondary_nav_name_update_form" id="secondary_nav_name_update_form" value="<?php echo sanitize_1($secondary_navigation_element['secondary_nav_name']);?>">
<label class="label_default" for="secondary_nav_order_update_form">Edit the numerical order for the element</label>
<input class="form_text_default" type="text" name="secondary_nav_order_update_form" id="secondary_nav_order_update_form" value="<?php echo sanitize_1($secondary_navigation_element['secondary_nav_order']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_update_secondary_nav_element;?>">
<button class="btn_dynamic_mtb" type="submit" name="update_secondary_nav_element">Edit</button>
</form>
<form method="post">
<input type="hidden" name="csrf_token" value="<?php echo $token_remove_secondary_nav_element;?>">
<button class="btn_dynamic_mtb" type="submit" name="remove_secondary_nav_element">Remove</button>
</form>
</div>
</div>
<?php } else { ?>
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-bars"></i> Create a primary navigation element</h3></div>
<div class="wrapper_content">
<form method="post">
<label class="label_default" for="primary_nav_url_form">Enter a name for the URL</label>
<input class="form_text_default" type="text" name="primary_nav_url_form" id="primary_nav_url_form">
<label class="label_default" for="primary_nav_name_form">Enter a name for the navigation element</label>
<input class="form_text_default" type="text" name="primary_nav_name_form" id="primary_nav_name_form">
<label class="label_default" for="primary_nav_order_form">Establish a numerical order for the element</label>
<input class="form_text_default" type="text" name="primary_nav_order_form" id="primary_nav_order_form">
<input type="hidden" name="csrf_token" value="<?php echo $token_save_primary_nav_element;?>">
<button class="btn_dynamic_mtb" type="submit" name="save_primary_nav_element">Save</button>
</form>
</div>
</div>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-bars"></i> Create a secondary navigation element</h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb">In this section, a custom page can be created. Keep in mind that it must then be assigned to a navigation menu.</p>
<form method="post">
<label class="label_default" for="secondary_nav_url_form">Enter a name for the URL</label>
<input class="form_text_default" type="text" name="secondary_nav_url_form" id="secondary_nav_url_form">
<label class="label_default" for="secondary_nav_name_form">Enter a name for the navigation element</label>
<input class="form_text_default" type="text" name="secondary_nav_name_form" id="secondary_nav_name_form">
<label class="label_default" for="secondary_nav_order_form">Establish a numerical order for the element</label>
<input class="form_text_default" type="text" name="secondary_nav_order_form" id="secondary_nav_order_form">
<input type="hidden" name="csrf_token" value="<?php echo $token_save_secondary_nav_element;?>">
<button class="btn_dynamic_mtb" type="submit" name="save_secondary_nav_element">Save</button>
</form>
</div>
</div>
<?php } ?>
</div>
<div class="template_content_column_2">
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-folder"></i> Custom created pages that can be added to a navigation.</h3></div>
<div class="wrapper_content">
<?php if ($contents !== false) { ?>
<ul>
<?php foreach ($contents as $content) { ?>
<li class="list_style_none"><?php echo sanitize_1($content['custom_content_url']);?>_<?php echo sanitize_1($content['custom_content_title']);?></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb">Currently, there are no custom page creation options.</p>
<?php } ?>
</div>
</div>
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-bars"></i> Primary navigation elements</h3></div>
<div class="wrapper_content">
<?php if ($primary_nav_elements !== false) { ?>
<ul>
<li class="list_style_none"><a class="default_link" href="<?= BASE_URL ?>manage_navigations">Back to navigation management</a></li>
<?php foreach ($primary_nav_elements as $primary_nav_element) { ?>
<li class="list_style_none"><a class="default_link" href="<?php echo BASE_URL;?>manage_navigations/primary_navigation_element/<?php echo sanitize_1($primary_nav_element['primary_nav_id']);?>"><?php echo sanitize_1($primary_nav_element['primary_nav_order']);?>. <?php echo sanitize_1($primary_nav_element['primary_nav_url']);?>_<?php echo sanitize_1($primary_nav_element['primary_nav_name']);?></a></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb">The primary navigation currently contains no elements.</p>
<?php } ?>
</div>
</div>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-bars"></i> Secondary navigation elements</h3></div>
<div class="wrapper_content">
<?php if ($secondary_nav_elements !== false) { ?>
<ul>
<li class="list_style_none"><a class="default_link" href="<?= BASE_URL ?>manage_navigations">Back to navigation management</a></li>
<?php foreach ($secondary_nav_elements as $secondary_nav_element) { ?>
<li class="list_style_none"><a class="default_link" href="<?php echo BASE_URL;?>manage_navigations/secondary_navigation_element/<?php echo sanitize_1($secondary_nav_element['secondary_nav_id']);?>"><?php echo sanitize_1($secondary_nav_element['secondary_nav_order']);?>. <?php echo sanitize_1($secondary_nav_element['secondary_nav_url']);?>_<?php echo sanitize_1($secondary_nav_element['secondary_nav_name']);?></a></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb">The secondary navigation currently contains no elements.</p>
<?php } ?>
</div>
</div>
</div>
</div>
