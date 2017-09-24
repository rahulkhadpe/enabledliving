<div class="box">
    <div class="box-body no-padding">
		<table class="table table-striped table-bordered">
			<tr><th class="text-center" colspan="5">Total Count</th></tr>
			<tr>
				<?php  
					foreach($count_result as $key)
					{
						foreach($key as $column => $row)
						{
							$count[]=$row;
				?>
				<th><?php echo $column; ?></th>
				<?php } } ?>    
            </tr>
            <tr>
				<?php  
					foreach($count as $val)
					{
				?>						
				<td><span class="badge bg-yellow"><?php echo $val; ?></span></td>			
				<?php } ?>
            </tr>
		</table>
	</div>
</div>

<div class="box" id="list-details">
    <div class="box-header">
		<h3 class="box-title"><?php echo $title;?> Details</h3>
	</div>
		<!-- /.box-header -->
	<div class="box-body no-padding">
		<table class="table table-striped table-bordered">
			<tr><th class="text-center" colspan="5">List</th></tr>
			<tr>
				<th style="width: 10px">#</th>
				<th>Name</th>
				<th>Details</th>
				<th>Edit</th>
				<th>Status</th>
			</tr>
			<?php $count=1; foreach($details_result as $result_columns) { ?>
			<tr>
				<td><?php echo $count; ?></td>
				<td><?php echo $result_columns->name; ?></td>
				<td><a href="#" class="get-<?php echo strtolower($title); ?>-details" data-toggle="modal" data-id="<?php echo $result_columns->id; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
				<td><a href="#" class="edit-module" data-edit-id="<?php echo $result_columns->id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
				<td><span id="status-<?php echo $result_columns->id; ?>"><?php if($result_columns->status==1) { ?><span class="label bg-green">Active</span> | <a href="#" data-id="<?php echo $result_columns->id; ?>" data-category="<?php echo strtolower($title); ?>" class="status-inactive text-red">Inactive</a><?php } else { ?><span class="label bg-red">Inactive</span> | <a href="#" class="status-active text-green" data-category="<?php echo strtolower($title); ?>" data-id="<?php echo $result_columns->id; ?>">Active</a><?php } ?></span></td>
			</tr>
			<?php $count++; } ?>
		</table>
		<form style="display: none" action="<?php echo site_url("$action");?>" method="post" id='edit-form'><input type="hidden" name="edit-id" /></form>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModalShowDetails" role="dialog">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Details</h4>
			</div>
			<div id="modalBody" class="modal-body">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
    </div>
</div>
