<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//contents_template.php
//MMXXVI MSCRATCH
?>
<div class="template_row">
<div class="template_column_1">
<div class="sidebar_nav">
<div class="sidebar_nav_title"><h3><i class="fa-solid fa-bars"></i> <?php echo PAGE_TITLE;?></h3></div>
<ul>
<?php echo secondary_nav($db);?>
</ul>
</div>
</div>
<div class="template_column_2">
<div class="template_wrapper">
<div class="template_wrapper_title"><h3><i class="fa-solid fa-folder"></i> <?php echo sanitize_1($custom_content['custom_content_title']);?></h3></div>
<div class="template_wrapper_content">
<?php echo sanitize_1($custom_content['custom_content']);?>
</div>
</div>
<footer class="footer_primary">
<div class="footer_title">This page is based on <?php echo SCRIPTNAME;?> <?php echo VERSION;?> programmed by <?php echo AUTHOR;?></div>
</footer>
</div>
</div>
