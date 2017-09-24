<!-- Client horizontal Form -->
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Client Registration</h3>
	</div><!-- /.box-header -->
	
	<?php   if(isset($insert_message)) { ?>
		<div class="alert alert-info alert-dismissable fade in text-center">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong><?php echo $insert_message; ?></strong>
		</div>
	<?php } ?>
	
	<?php foreach($client_details as $client_row) { ?>
	<!-- form start -->
	<form class="form-horizontal" action="<?php echo site_url("$action");?>" method="post">
		<?php  //echo validation_errors(); ?>  
		<?php echo form_open('form'); ?>
		<div class="box-body">
			
			<div class="form-group">
				<label for="client_income_source" class="col-sm-2 control-label">Income Source</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="client_income_source" name="client_income_source" placeholder="Income Source" value="<?php echo $client_row->income_source; ?>" required>
					<?php echo form_error('client_income_source','<div class="error text-red">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="client_amount" class="col-sm-2 control-label">Amount</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="client_amount" name="client_amount" placeholder="Amount" value="<?php echo $client_row->amount; ?>" required>
					<?php echo form_error('client_amount','<div class="error text-red">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="client_dignosis" class="col-sm-2 control-label">Diagnosis</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="client_dignosis" name="client_dignosis" placeholder="Diagnosis" value="<?php echo $client_row->diagnosis; ?>" required>
					<?php echo form_error('client_dignosis','<div class="error text-red">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="client_medications" class="col-sm-2 control-label">Medications</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="client_medications" name="client_medications" placeholder="Medications" value="<?php echo $client_row->medications; ?>" required>
					<?php echo form_error('client_medications','<div class="error text-red">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="client_health_insurance" class="col-sm-2 control-label">Health Insurance</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="client_health_insurance" name="client_health_insurance" placeholder="Health Insurance" value="<?php echo $client_row->health_insurance; ?>" required>
					<?php echo form_error('client_health_insurance','<div class="error text-red">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="client_medical_providers" class="col-sm-2 control-label">Medical Provider</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="client_medical_providers" name="client_medical_providers" placeholder="Medical Provider" value="<?php echo $client_row->medical_providers; ?>" required>
					<?php echo form_error('client_medical_providers','<div class="error text-red">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="client_service_coorindator" class="col-sm-2 control-label">Service Coorindator</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="client_service_coorindator" name="client_service_coorindator" placeholder="Service Coorindator" value="<?php echo $client_row->service_coorindator; ?>" required>
					<?php echo form_error('client_service_coorindator','<div class="error text-red">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="client_legal_issues" class="col-sm-2 control-label">Legal Issues</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="client_legal_issues" name="client_legal_issues" placeholder="Legal Issues" value="<?php echo $client_row->legal_issues; ?>" required>
					<?php echo form_error('client_legal_issues','<div class="error text-red">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="client_status" class="col-sm-2 control-label">Status</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="client_status" name="client_status" placeholder="Status" value="<?php echo $client_row->status; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="client_notes" class="col-sm-2 control-label">Notes</label>
				<div class="col-sm-10">
					<textarea class="form-control" id="client_notes" name="client_notes" rows="3" placeholder="Notes"><?php echo $client_row->notes; ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="client_date_registered" class="col-sm-2 control-label">Registration Date</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="client_date_registered" name="client_date_registered" value="<?php echo $client_row->date_registered; ?>" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask required>
					<?php echo form_error('client_date_registered','<div class="error text-red">', '</div>'); ?>
				</div>	
			</div><!-- /.form group -->
			<input type="hidden" name="client_id" id="client_id" value="<?php echo $client_row->client_id; ?>" />
			<input type="hidden" name="agency_user_id" id="agency_user_id" value="<?php echo $client_row->agency_user_id; ?>" />
			
		</div><!-- /.box-body -->
		<div class="box-footer">
			<button type="submit" id="submit_client_registration" name="submit_client_registration" class="btn btn-info pull-right">Update</button>
		</div><!-- /.box-footer -->
	</form>
	<?php } ?>
</div><!-- /.Client horizontal box -->