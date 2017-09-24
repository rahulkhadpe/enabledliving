<table class="table table-striped table-bordered">
	<tr>
		<th>Name</th>
        <th>Registered Date</th>
        <th>Address</th>
	</tr>
    <tr>
		<?php foreach($modal_result as $res_col) { ?>
		<td><?php echo $res_col->agency_name; ?></td>
		<td><?php echo $res_col->date_registered; ?></td>
		<td><?php echo $res_col->address; ?></td>
		<?php } ?>
    </tr>
</table>