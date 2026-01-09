<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//message_remove_user.php
//MMXXVI MSCRATCH
?>

<?php  $token_remove_user_confirm = generate_token('remove_user_confirm'); ?>

<div class="wrapper_narrow_bg">
<div class="wrapper_title"><h3><i class="fa-solid fa-gear"></i> <?php echo sanitize_1(SYSTEM_MESSAGE_TITLE);?></h3></div>
<div class="msg_default">
<p class="paragraph_mtb">Are you sure you want to remove that user ?</p>
<form method="post">
<input type="hidden" name="user_id_remove_user_confirm_form" value="<?php echo sanitize_1($user_id_remove_form);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_remove_user_confirm;?>">
<button class="msg_btn" type="submit" name="remove_user_confirm">Confirm</button>
</form>
<a href="<?= BASE_URL ?>users"><button class="msg_btn">Cancel</button></a>
</div>
</div>
