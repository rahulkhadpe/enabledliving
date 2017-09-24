<?php if($msg=="true") { ?>
	<span class="label bg-red">Inactive</span> | <a href="#" class="status-active text-green" data-category="<?php echo $title; ?>" data-id="<?php echo $id; ?>">Active</a>
<?php } else { ?>
	<span class="label bg-red"><?php echo $msg; ?></span>
<?php } ?>