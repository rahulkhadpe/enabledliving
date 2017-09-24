<?php 
defined('BASEPATH') OR exit('No direct script access allowed');	
?>

<!DOCTYPE html>
<html>
	<head>
		<!--- Head.html -->
		<?php include 'templates/head.php'; ?>
					
	</head>
	<body class="hold-transition skin-blue">
		<div class="wrapper">
	
			<!-------- navigationbar.html  ---------------->
			<?php include 'templates/navigationbar.php'; ?>
			
			
			<?php //if(!empty($sidebar_panel)) { include 'templates/'.$sidebar_panel.'.php'; } ?>
			
			<?php include 'templates/leftsidebar.php'; ?>
			<!-- Content Wrapper. Contains page content -->
			<!--------------- maincontent.html ----------------->
			<!-- Main content -->
			<div class="content-wrapper">
				<section class="content">
					<?php include 'pages/'.$page_name.'.php'; ?>
				</section>
			</div>	
			
			<!--------- footer.html       --------------------------->	  
			<?php // include 'templates/footer.php'; ?> 
		
			<!-- rightsidebar.html -->
     
      
		</div><!-- ./wrapper -->

		<!-- scripts.html  --->
		<?php include 'templates/scripts.php'; ?> 
		<?php include 'templates/ajax-request.php' ?>
	</body>
</html>