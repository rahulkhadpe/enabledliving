<div class="row">
	<div class="col-md-8">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Change Password</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<?php include 'table/insert_message.php'?>
			
			<form class="form-horizontal" action="<?php echo site_url("$change_password_action");?>" method="post">
				<?php  //echo validation_errors(); ?>  
				<?php echo form_open('form'); ?>
				<div class="box-body">
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Old Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="old_password" id="old_password" placeholder="Password" required>
							<?php echo form_error('old_password','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">New Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="new_password" id="new_password" placeholder="Password" required>
							<?php echo form_error('new_password','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Confirm Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Password" required>
							<?php echo form_error('confirm_password','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" id="submit_change_password" name="submit_change_password" class="btn btn-info pull-right">Change</button>
				</div>
				<!-- /.box-footer -->
			</form>
		</div>
		<!-- /.box -->
	</div>
</div>	