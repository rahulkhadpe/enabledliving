<?php if($msg=="true") { ?>
	<span class="label bg-green">Active</span> | <a href="#" data-id="<?php echo $id; ?>" data-category="<?php echo $title; ?>" class="status-inactive text-red">Inactive</a>
<?php } else { ?>
	<span class="label bg-red"><?php echo $msg; ?></span>
<?php } ?>