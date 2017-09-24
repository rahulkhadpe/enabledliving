<script>
	$(document).on('click','#agency-details',function(event){
		
		   $.ajax({
				  url:"<?php echo site_url('System_Admin/sys_agency_details');?>",
				type: "POST",
			   dataType : "text",
			   success: function(html) {
				    $('.content').html(html);
					
				},
				error: function( xhr, status, errorThrown ) {
				 alert( "Sorry, there was a problem!" );
				  console.log( "Error: " + errorThrown );
				  console.log( "Status: " + status );
				  console.dir( xhr );
			   }
			});
			event.preventDefault();
	});
		
	$(document).on('click','.get-agency-details',function(event){
			var agencyID = $(this).attr("data-id");	
		   $.ajax({
				  url:"<?php echo site_url('System_Admin/sys_agency_modal_details');?>",
				data: {agencyID: agencyID},  
				type: "POST",
			   dataType : "text",
			   success: function(html) {
				    $('#modalBody').html(html);
					$('#myModalShowDetails').modal('show');
				},
				error: function( xhr, status, errorThrown ) {
				 alert( "Sorry, there was a problem!" );
				  console.log( "Error: " + errorThrown );
				  console.log( "Status: " + status );
				  console.dir( xhr );
			   }
			});
			event.preventDefault();
	});	
	
	$(document).on('click','#client-details',function(event){
		
		   $.ajax({
				  url:"<?php echo site_url('System_Admin/sys_client_details');?>",
				type: "POST",
			   dataType : "text",
			   success: function(html) {
				    $('.content').html(html);
					
				},
				error: function( xhr, status, errorThrown ) {
				 alert( "Sorry, there was a problem!" );
				  console.log( "Error: " + errorThrown );
				  console.log( "Status: " + status );
				  console.dir( xhr );
			   }
			});
			event.preventDefault();
	});
	
	$(document).on('click','.get-client-details',function(event){
			var agencyuserID = $(this).attr("data-id");	
		   $.ajax({
				  url:"<?php echo site_url('System_Admin/sys_client_modal_details');?>",
				data: {agencyuserID: agencyuserID},  
				type: "POST",
			   dataType : "text",
			   success: function(html) {
				    $('#modalBody').html(html);
					$('#myModalShowDetails').modal('show');
				},
				error: function( xhr, status, errorThrown ) {
				 alert( "Sorry, there was a problem!" );
				  console.log( "Error: " + errorThrown );
				  console.log( "Status: " + status );
				  console.dir( xhr );
			   }
			});
			event.preventDefault();
	});	
	
	$(document).on('click','.edit-module',function(e){
    $('input[name=edit-id]').val($(this).data('edit-id'));
    $('#edit-form').submit();
	});	
	
	$(document).on('click','.status-inactive',function(event){
		var r = confirm("Are You Sure ?");	
		if (r == true)
		{ 
			var id = $(this).attr("data-id");
			var category = $(this).attr("data-category");		
		   $.ajax({
				  url:"<?php echo site_url('System_Admin/change_status_inactive');?>",
				  data: {
				  id: id,
				  category: category
				},
			   type: "POST",
			   dataType : "text",
			   success: function(html) {
					$('#status-'+id+'').html(html);
				},
				error: function( xhr, status, errorThrown ) {
				 alert( "Sorry, there was a problem!" );
				  console.log( "Error: " + errorThrown );
				  console.log( "Status: " + status );
				  console.dir( xhr );
			   }
			});
	}
			event.preventDefault();
	});
	
	$(document).on('click','.status-active',function(event){
		var r = confirm("Are You Sure ?");	
		if (r == true)
		{ 
			var id = $(this).attr("data-id");
			var category = $(this).attr("data-category");		
		   $.ajax({
				  url:"<?php echo site_url('System_Admin/change_status_active');?>",
				  data: {
				  id: id,
				  category: category
				},
			   type: "POST",
			   dataType : "text",
			   success: function(html) {
					$('#status-'+id+'').html(html);
				},
				error: function( xhr, status, errorThrown ) {
				 alert( "Sorry, there was a problem!" );
				  console.log( "Error: " + errorThrown );
				  console.log( "Status: " + status );
				  console.dir( xhr );
			   }
			});
	}
			event.preventDefault();
	});
</script>