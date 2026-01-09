<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//login_template.php
//MMXXVI MSCRATCH
?>

<?php  $token_login = generate_token('login');?>

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
<?php } ?>

<div class="wrapper_narrow_bg">
<div class="wrapper_title"><h3><i class="fa-solid fa-key"></i> Log in</h3></div>
<div class="wrapper_content">
<div class="column">
<form method="post">
<label class="label_default" for="username_form">Username</label>
<input class="form_text_default" type="text" name="username_form" id="username_form" placeholder="Username">
<label class="label_default" for="user_password_form">Password</label>
<input class="form_password_default" type="password" name="user_password_form" id="user_password_form" placeholder="**********">
<input type="hidden" name="csrf_token" value="<?php echo $token_login;?>">
<button class="btn_dynamic_mtb" type="submit" name="login">Login</button>
</form>
<a href="index.php"><button class="btn_dynamic_mtb">Return to home page</button></a>
</div>
</div>
</div>
