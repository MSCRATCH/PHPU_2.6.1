<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//blog_template.php
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
<?php if ($result !== false) { ?>
<?php foreach ($result as $row) {  ?>
<div class="template_wrapper">
<div class="template_wrapper_title"><h3><i class="fa-solid fa-message"></i> <?php echo sanitize_1($row['blog_post_title']);?></h3></div>
<div class="template_wrapper_content">
<p class="paragraph_mtb"><?php echo sanitize_1($row['blog_post_content']);?></p>
</div>
<div class="template_wrapper_footer"><h3>by <?php echo sanitize_3($row['username']);?> at <?php echo sanitize_1($row['blog_post_date']);?></h3></div>
</div>
<?php } ?>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3>No blog posts at the moment</h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb">There are currently no blog posts.</p>
</div>
</div>
<?php } ?>
<div class="pagination_secondary">
<?php echo pagination('blog', $number_of_pages, $current_page); ?>
</div>
<footer class="footer_primary">
<div class="footer_title">This page is based on <?php echo SCRIPTNAME;?> <?php echo VERSION;?> programmed by <?php echo AUTHOR;?></div>
</footer>
</div>
</div>
