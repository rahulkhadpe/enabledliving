<div class="login-box">
	<div class="login-logo">
		<b><?php echo $login_page_name;?></b>Login
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<!--<p class="login-box-msg">Sign in</p>-->
		<form action="<?php echo site_url("$login_action");?>" method="post">
			<?php  //echo validation_errors(); ?>  
			<?php echo form_open('form'); ?>
			<div class="form-group has-feedback">
				<input type="email" id="email"  name="email" class="form-control" placeholder="Email" required>
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				<?php echo form_error('email','<div class="error text-red">', '</div>'); ?>
			</div>
			<div class="form-group has-feedback">
				<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				<?php echo form_error('password','<div class="error text-red">', '</div>'); ?>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox">
						<label>
							<input type="checkbox"> Remember Me
						</label>
					</div>
				</div>
				<!-- /.col -->
				<div class="col-xs-4">
				  <button type="submit" name="submit_login" class="btn btn-primary btn-block btn-flat">Sign In</button>
				</div>
				<!-- /.col -->
			</div>
		</form>
			
		<a href="#">I forgot my password</a><br>
			<!--<a href="register.html" class="text-center">Register a new membership</a>-->

	</div>
	<!-- /.login-box-body -->
	
	<?php   if(isset($login_message)) { ?>
	<div class="alert alert-danger text-center">
		<strong><?php echo $login_message;//Invalid Credentials ?></strong>
	</div>
	<?php } ?>
	
</div>
<!-- /.login-box -->
