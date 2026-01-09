<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//home_template.php
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
<div class="template_wrapper_title"><h3><i class="fa-solid fa-gear"></i> <?php echo SCRIPTNAME;?></h3></h3></div>
<div class="template_wrapper_content">
<p class="paragraph_mtb"><?php echo SCRIPTNAME;?> is a PHP content management system.
The system focuses on security and carefully validates user input.
It is written procedurally and is designed to be as clear and simple as possible.
</p>
<p class="paragraph_mtb">
It is also extremely easy to extend. It is intended to serve as a basis for your own projects.
You are welcome to modify the script. The copyright notice may also be removed, although it would be nice to mention the script's name.
Please be fair.
</p>
</div>
</div>
<footer class="footer_primary">
<div class="footer_title">This page is based on <?php echo SCRIPTNAME;?> <?php echo VERSION;?> programmed by <?php echo AUTHOR;?></div>
</footer>
</div>
</div>
