<div class="row">
	<div class="col-md-8">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">User Registration</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<?php include 'table/insert_message.php'?>
			
			<form class="form-horizontal" action="<?php echo site_url('Agency_Admin/agency_insert_user');?>" method="post">
				<?php  //echo validation_errors(); ?>  
				<?php echo form_open('form'); ?>
				<div class="box-body">
					<div class="form-group">
						<label for="user_role" class="col-sm-2 control-label">Role</label>
						<div class="col-sm-10">
							<select id="user_role" name="user_role" class="form-control" required>
								<option></option>
								<?php if(!empty($user_role)) { 
								foreach($user_role as $row_role) {
								?>
								<option value="<?php echo $row_role->id; ?>"><?php echo $row_role->role; ?></option>
								<?php } } else { ?>
								<option>No Roles Found.</option>
								<?php } ?>
							</select>
							<?php echo form_error('user_role','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
							<?php echo form_error('name','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="Gender" class="col-sm-2 control-label">Gender</label>
						<div class="radio col-sm-10">
							<label>
								<input type="radio" name="gender" id="option1" value="Male" checked>Male
							</label>
							<label>
								<input type="radio" name="gender" id="option2" value="Female">Female
							</label>
						</div>
					</div>
					<div class="form-group">
						<label for="client_dob" class="col-sm-2 control-label">Date Of Birth</label>
						<div class="col-sm-10">
							<!--<input type="text" id="client_dob" name="client_dob" class="form-control" Placeholder="YYYY-MM-DD">-->
							<input type="text" class="form-control" id="client_dob" name="client_dob" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask required>
							<?php echo form_error('client_dob','<div class="error text-red">', '</div>'); ?>
						</div>	
					</div>
					<div class="form-group">
						<label for="user_email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="user_email" name="user_email" placeholder="Email" required>
							<?php echo form_error('user_email','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="language" class="col-sm-2 control-label">Language</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="language" name="language" placeholder="Language" required>
							<?php echo form_error('language','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="address" class="col-sm-2 control-label">Address</label>
						<div class="col-sm-10">
							<textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter Address" required></textarea>
							<?php echo form_error('address','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="zip" class="col-sm-2 control-label">Zip</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="zip" name="zip" placeholder="Zip Code" required>
							<?php echo form_error('zip','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="city" class="col-sm-2 control-label">City</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="city" name="city" placeholder="City" required>
							<?php echo form_error('city','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="state" class="col-sm-2 control-label">State</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="state" name="state" placeholder="State" required>
							<?php echo form_error('state','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="country" class="col-sm-2 control-label">Country</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="country" name="country" placeholder="Country" required>
							<?php echo form_error('country','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="notes" class="col-sm-2 control-label">Notes</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="notes" name="notes" placeholder="Notes">
						</div>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" id="submit_user_registraion" name="submit_user_registraion" class="btn btn-info pull-right">Save</button>
				</div>
				<!-- /.box-footer -->
			</form>
		</div>
		<!-- /.box -->
	</div>
</div>	