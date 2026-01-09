<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//activity_log_template.php
//MMXXVI MSCRATCH
?>

<?php if ($result !== false) { ?>
<div class="table_wrap">
<div class="horizontal_scroll">
<table class="responsive">
<thead>
<tr>
<th><i class="fa-solid fa-network-wired"></i> IP address</th>
<th><i class="fa-solid fa-server"></i> Browser</th>
<th><i class="fa-solid fa-link"></i> Requested URL</th>
<th><i class="fa-solid fa-calendar"></i> Timestamp</th>
<th><i class="fa-solid fa-user"></i> Registered user</th>
</tr>
</thead>
<tbody>
<?php foreach ($result as $row) {  ?>
<tr>
<td data-label="IP address"><?php echo sanitize_1($row['activity_log_ip_address']);?></td>
<td data-label="Browser"><?php echo sanitize_1($row['activity_log_browser']);?></td>
<td data-label="Requested URL"><?php echo sanitize_1($row['activity_log_requested_url']);?></td>
<td data-label="Timestamp"><?php echo sanitize_1($row['activity_log_timestamp']);?></td>
<?php $username_activity_log = sanitize_1($row['username']);?>
<?php if ($row['username'] === NULL) { ?>
<td data-label="Registered user">No registered user</td>
<?php } else { ?>
<td data-label="Registered user"><?php echo sanitize_3($row['username']);?></td>
<?php } ?>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<div class="pagination_secondary">
<?php echo pagination('activity_log', $number_of_pages, $current_page); ?>
</div>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3>No entries in the activity log</h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb">There are no entries in the activity log.</p>
</div>
</div>
<?php } ?>
