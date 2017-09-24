<div class="row">
	<div class="col-md-8">
		<!-- Horizontal Form -->
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Agency Registration</h3>
			</div>
			<!-- /.box-header -->
			<!-- Insert Message -->
			<?php include 'table/insert_message.php'?>
			
			
			<form class="form-horizontal" action="<?php echo site_url("$action");?>" method="post">
			<?php  //echo validation_errors(); ?>  
				<?php echo form_open('form'); ?>
				<div class="box-body">
					<div class="form-group">
						<label for="agency_name" class="col-sm-2 control-label">Agency Name</label>

						<div class="col-sm-10">
							<input type="text" class="form-control" id="agency_name" name="agency_name" placeholder="Agency Name" required>
							<?php echo form_error('agency_name','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="date_registred" class="col-sm-2 control-label">Registration Date</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="date_registred" name="date_registred" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask required>
							<?php echo form_error('date_registred','<div class="error text-red">', '</div>'); ?>
						</div>	
					</div><!-- /.form group -->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Email</label>

						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
							<?php echo form_error('email','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="address" class="col-sm-2 control-label">Address</label>
						<div class="col-sm-10">
							<textarea class="form-control" id="address" rows="3" name="address" placeholder="Enter Address" required></textarea>
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
						<label for="regional_center" class="col-sm-2 control-label">Regional Center</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="regional_center" name="regional_center" placeholder="Regional Center" required>
							<?php echo form_error('regional_center','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="notes" class="col-sm-2 control-label">Notes</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="notes" name="notes" placeholder="Notes">
						</div>
					</div>
					<div class="form-group">
						<label for="agency_password" class="col-sm-2 control-label">Set Password</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="agency_password" name="agency_password" placeholder="Password" required>
							<?php echo form_error('agency_password','<div class="error text-red">', '</div>'); ?>
						</div>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" id="submit_agency_registraion" name="submit_agency_registraion" class="btn btn-info pull-right">Sign in</button>
				</div>
				<!-- /.box-footer -->
			</form>
		</div>
		<!-- /.box -->
	</div>
</div>