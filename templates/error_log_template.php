<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//error_log_template.php
//MMXXVI MSCRATCH
?>

<?php if ($result !== false) { ?>
<div class="table_wrap">
<div class="horizontal_scroll">
<table class="responsive">
<thead>
<tr>
<th><i class="fa-solid fa-hashtag"></i> Error number</th>
<th><i class="fa-solid fa-code"></i> Error string</th>
<th><i class="fa-solid fa-floppy-disk"></i> Error file</th>
<th><i class="fa-solid fa-hashtag"></i> Error line</th>
<th><i class="fa-solid fa-calendar"></i> Registered at</th>
</tr>
</thead>
<tbody>
<?php foreach ($result as $row) {  ?>
<tr>
<td data-label="Error number"><?php echo sanitize_1($row['errno']);?></td>
<td data-label="Error string"><?php echo sanitize_1($row['errstr']);?></td>
<td data-label="Error file"><?php echo sanitize_1($row['errfile']);?></td>
<td data-label="Error line"><?php echo sanitize_1($row['errline']);?></td>
<td data-label="Registered at"><?php echo sanitize_1($row['err_registered_at']);?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<div class="pagination_secondary">
<?php echo pagination('error_log', $number_of_pages, $current_page); ?>
</div>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3>No entries in the error log</h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb">The error log contains no errors, so the system is working flawlessly.</p>
</div>
</div>
<?php } ?>
