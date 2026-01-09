<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//backend_login_template.php
//MMXXVI MSCRATCH
?>

<?php  $token_backend_login = generate_token('backend_login');?>

<?php if (! isset($errors)) {$errors = '';}?>
<?php if (! empty($errors)) { ?>
<div class="wrapper_narrow_bg">
<div class="wrapper_title"><h3><i class="fa-solid fa-gear"></i> <?php echo sanitize_1(SYSTEM_MESSAGE_TITLE);?></h3></div>
<div class="wrapper_content">
<ul>
<?php foreach ($errors as $error_content) {  ?>
<?php echo '<li class="list_style_none">'. sanitize_1($error_content). '</li>';?>
<?php } ?>
</ul>
</div>
</div>
</div>
<?php } ?>

<div class="wrapper_narrow_bg">
<div class="wrapper_title"><h3><i class="fa-solid fa-key"></i> Authenticate as a backend user</h3></div>
<div class="wrapper_content">
<div class="column">
<form method="post">
<label class="label_default" for="backend_login_name_form">Username</label>
<input class="form_text_default" type="text" name="backend_login_name_form" id="backend_login_name_form" placeholder="Username">
<label class="label_default" for="backend_login_password_form">Password</label>
<input class="form_password_default" type="password" name="backend_login_password_form" id="backend_login_password_form" placeholder="**********">
<input type="hidden" name="csrf_token" value="<?php echo $token_backend_login;?>">
<button class="btn_dynamic_mtb" type="submit" name="backend_login">Authentication for the backend</button>
</form>
<a href="index.php"><button class="btn_dynamic_mtb">Return to home page</button></a>
</div>
</div>
</div>
