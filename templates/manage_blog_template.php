<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_blog_template.php
//MMXXVI MSCRATCH
?>

<?php  $token_save_blog_post = generate_token('save_blog_post');?>
<?php  $token_update_blog_post = generate_token('update_blog_post');?>
<?php  $token_remove_blog_post = generate_token('remove_blog_post');?>

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
<?php if (isset($blog_post_id_get) && ! empty($blog_post_id_get)) { ?>
<div class="wrapper_title"><h3><i class="fa-solid fa-message"></i> <?php echo sanitize_3($blog_post['blog_post_date']);?></h3></div>
<div class="wrapper_content">
<?php  if (user_is_administrator() === true) { ?>
<a class="default_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($blog_post['public_id']);?>"><?php echo sanitize_3($blog_post['username']);?></a>
<?php } ?>
<form method="post">
<label class="label_default" for="blog_post_title_update_form">Edit the title of the blog post</label>
<input class="form_text_default" type="text" name="blog_post_title_update_form" id="blog_post_title_update_form" value="<?php echo sanitize_1($blog_post['blog_post_title']);?>">
<label class="label_default" for="blog_post_content_update_form">Edit the content the blog post</label>
<textarea class="textarea_default" name="blog_post_content_update_form" id="blog_post_content_update_form"><?php echo sanitize_1($blog_post['blog_post_content']);?></textarea>
<input type="hidden" name="csrf_token" value="<?php echo $token_update_blog_post;?>">
<button class="btn_dynamic_mtb" type="submit" name="update_blog_post">Edit</button>
</form>
<form method="post">
<input type="hidden" name="csrf_token" value="<?php echo $token_remove_blog_post;?>">
<button class="btn_dynamic_mtb" type="submit" name="remove_blog_post">Remove</button>
</form>
</div>
</div>
<?php } else { ?>
<div class="wrapper_title"><h3><i class="fa-solid fa-message"></i> Create a blog post</h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb">In this section, a blog post can be created.</p>
<form method="post">
<label class="label_default" for="blog_post_title_form">Title of the blog post</label>
<input class="form_text_default" type="text" name="blog_post_title_form" id="blog_post_title_form">
<label class="label_default" for="blog_post_content_form">Content of the blog post</label>
<textarea class="textarea_default" name="blog_post_content_form" id="blog_post_content_form"></textarea>
<input type="hidden" name="csrf_token" value="<?php echo $token_save_blog_post;?>">
<button class="btn_dynamic_mtb" type="submit" name="save_blog_post">Submit</button>
</form>
</div>
</div>
<?php } ?>
</div>
<div class="template_content_column_2">
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-message"></i> Blog posts</h3></div>
<div class="wrapper_content">
<?php if ($paginated_blog_posts !== false) { ?>
<ul>
<li class="list_style_none"><a class="default_link" href="<?= BASE_URL ?>manage_blog">Back to creating a blog post</a></li>
<?php foreach ($paginated_blog_posts as $paginated_blog_post) { ?>
<li class="list_style_none"><a class="default_link" href="<?php echo BASE_URL;?>manage_blog/post/<?php echo sanitize_1($paginated_blog_post['blog_post_id']);?>"><?php echo sanitize_1($paginated_blog_post['blog_post_title']);?></a></li>
<?php } ?>
</ul>
<div class="pagination">
<?php echo pagination('manage_blog', $number_of_pages, $current_page); ?>
</div>
<?php } else { ?>
<p class="paragraph_mtb">No blog post has been created yet.</p>
<?php } ?>
</div>
</div>
</div>
</div>
