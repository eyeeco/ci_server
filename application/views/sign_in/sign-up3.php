
	<body class="style-3">

		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-push-8">
					

					<!-- Start Sign In Form -->
					
						<?php 
						$attributes = array('class' => 'fh5co-form animate-box', 'data-animate-effect' => 'fadeInRight');
						echo form_open("login/index",$attributes);
						?>
						<h2>Sign Up</h2>
						<div class="form-group">
							<!--<div class="alert alert-success" role="alert" style="">Your info has been saved.</div> -->
						</div>
						<div class="form-group">
							<label for="name" class="sr-only">Name</label>
							<input type="text" class="form-control" id="name" placeholder="Name" autocomplete="off" name="user" value="<?php echo set_value("user"); ?>">
						</div>
						<div class="form-group">
							<label for="email" class="sr-only">Email</label>
							<input type="email" class="form-control" id="email" placeholder="Email" autocomplete="off" name="email" value="<?php echo set_value("email"); ?>">
						</div>
						<div class="form-group">
							<label for="password" class="sr-only">Password</label>
							<input type="password" class="form-control" id="password" placeholder="Password" autocomplete="off" name="password" value="<?php echo set_value("password"); ?>">
						</div>
						<div class="form-group">
							<label for="re-password" class="sr-only">Re-type Password</label>
							<input type="password" class="form-control" id="re-password" placeholder="Re-type Password" autocomplete="off" name="passwordConfirm" value="<?php echo set_value("passwordConfirm"); ?>">
						</div>
						<div class="form-group">
							<?php echo $cap["image"];?>
							<input type="text" class="form-control" id="re-password" placeholder="Confirm" autocomplete="off" name="captcha"> </input></br>
						</div>
						<div class="form-group">
							<p>Already registered? <a><?php echo anchor("login/login_real","Sign In"); ?></a></p>
						</div>
						<div class="form-group">
							<input type="submit" value="Sign Up" class="btn btn-primary">
						</div>
					</form>
					<!-- END Sign In Form -->
					<?php  echo validation_errors();?>


				</div>
			</div>

		</div>
	



