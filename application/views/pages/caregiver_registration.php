<!-- CareGiver horizontal Form -->
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Caregiver Details</h3>
	</div><!-- /.box-header -->
	
	<?php include 'table/insert_message.php'?>
	
	<!-- form start -->
	<form class="form-horizontal" action="<?php echo site_url('Agency_Admin/caregiver_registration');?>" method="post">
		<?php  //echo validation_errors(); ?>  
		<?php echo form_open('form'); ?>
		<div class="box-body">
			<div class="form-group">
				<label for="caregiver_languages" class="col-sm-2 control-label">Languages</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="caregiver_languages" name="caregiver_languages" placeholder="Languages" required>
					<?php echo form_error('caregiver_languages','<div class="error text-red">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="caregiver_special_skills" class="col-sm-2 control-label">Special Skills</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="caregiver_special_skills" name="caregiver_special_skills" placeholder="Special Skills" required>
					<?php echo form_error('caregiver_special_skills','<div class="error text-red">', '</div>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="caregiver_status" class="col-sm-2 control-label">Status</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="caregiver_status" name="caregiver_status" placeholder="Status">
				</div>
			</div>
			<div class="form-group">
				<label for="caregiver_notes" class="col-sm-2 control-label">Notes</label>
				<div class="col-sm-10">
					<textarea class="form-control" id="caregiver_notes" name="caregiver_notes" rows="3" placeholder="Notes"></textarea>
				</div>
			</div>
			<input type="hidden" name="last_id" id="last_id" value="<?php echo $last_insert_id; ?>" />
		</div><!-- /.box-body -->
		<div class="box-footer">
			<button type="submit" id="submit_caregiver_registration" name="submit_caregiver_registration" class="btn btn-info pull-right">Save</button>
		</div><!-- /.box-footer -->
	</form>
</div><!-- /.Test horizontal box -->