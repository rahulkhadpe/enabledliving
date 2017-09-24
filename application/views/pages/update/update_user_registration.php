<div class="row">
	<div class="col-md-8">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">User Registration</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<?php   if(isset($insert_message)) { ?>
				<div class="alert alert-info alert-dismissable fade in text-center">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong><?php echo $insert_message; ?></strong>
				</div>
			<?php } ?>
			
			<?php foreach($agency_user_details as $user_row) { ?>
			<form class="form-horizontal" action="<?php echo site_url("$action");?>" method="post">
				<?php  //echo validation_errors(); ?>  
				<?php echo form_open('form'); ?>
				<div class="box-body">
					
					<div class="form-group">
						<label for="user_role" class="col-sm-2 control-label">Role</label>
						<div class="col-sm-10">
							<select id="user_role" name="user_role" class="form-control" required>
								
								<option value="<?php echo $user_row->role_id; ?>" selected="selected"><?php echo $user_row->role; ?></option>
								
							</select>
							<?php echo form_error('user_role','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $user_row->name; ?>" required>
							<?php echo form_error('name','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="Gender" class="col-sm-2 control-label">Gender</label>
						<div class="radio col-sm-10">
							<label>
								<input type="radio" name="gender" id="option1" value="Male" <?php if($user_row->gender=="Male") { echo "checked"; } ?>>Male
							</label>
							<label>
								<input type="radio" name="gender" id="option2" value="Female" <?php if($user_row->gender=="Female") { echo "checked"; } ?>>Female
							</label>
						</div>
					</div>
					<div class="form-group">
						<label for="client_dob" class="col-sm-2 control-label">Date Of Birth</label>
						<div class="col-sm-10">
							<!--<input type="text" id="client_dob" name="client_dob" class="form-control" Placeholder="YYYY-MM-DD">-->
							<input type="text" class="form-control" id="client_dob" name="client_dob" value="<?php echo $user_row->dob; ?>" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask required>
							<?php echo form_error('client_dob','<div class="error text-red">', '</div>'); ?>
						</div>	
					</div>
					<div class="form-group">
						<label for="user_email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="user_email" name="user_email" placeholder="Email" value="<?php echo $user_row->email; ?>" required>
							<?php echo form_error('user_email','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="language" class="col-sm-2 control-label">Language</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="language" name="language" placeholder="Language" value="<?php echo $user_row->language; ?>" required>
							<?php echo form_error('language','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="address" class="col-sm-2 control-label">Address</label>
						<div class="col-sm-10">
							<textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter Address" required><?php echo $user_row->address; ?></textarea>
							<?php echo form_error('address','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="zip" class="col-sm-2 control-label">Zip</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="zip" name="zip" placeholder="Zip Code" value="<?php echo $user_row->zip; ?>" required>
							<?php echo form_error('zip','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="city" class="col-sm-2 control-label">City</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $user_row->city; ?>" required>
							<?php echo form_error('city','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="state" class="col-sm-2 control-label">State</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="state" name="state" placeholder="State" value="<?php echo $user_row->state; ?>" required>
							<?php echo form_error('state','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="country" class="col-sm-2 control-label">Country</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="country" name="country" placeholder="Country" value="<?php echo $user_row->country; ?>" required>
							<?php echo form_error('country','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="notes" class="col-sm-2 control-label">Notes</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="notes" name="notes" placeholder="Notes" value="<?php echo $user_row->notes; ?>">
						</div>
					</div>
					<input type="hidden" name="agency_id" id="agency_id" value="<?php echo $user_row->agency_id; ?>" />
					<input type="hidden" name="agency_user_id" id="agency_user_id" value="<?php echo $user_row->id; ?>" />
				</div>
				
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" id="submit_user_registraion" name="submit_user_registraion" class="btn btn-info pull-right">Update</button>
				</div>
				<!-- /.box-footer -->
			</form>
			<?php } ?>
		</div>
		<!-- /.box -->
	</div>
</div>	