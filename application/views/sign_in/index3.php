<body class="style-3">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-push-8">
					

					<!-- Start Sign In Form -->
					<?php 
					$attributes = array('class' => 'fh5co-form animate-box', 'data-animate-effect' => 'fadeInRight');
					echo form_open("login/login_real",$attributes);
					?>
						<h2>Sign In</h2>
						<div class="form-group">
							<label for="username" class="sr-only">Username</label>
							<input type="text" class="form-control" id="username" placeholder="Username" autocomplete="off" name="user" >
						</div>
						<div class="form-group">
							<label for="password" class="sr-only">Password</label>
							<input type="password" class="form-control" id="password" placeholder="Password" autocomplete="off" name="password">
						</div>
						<div class="form-group">
						    <?php echo $cap["image"];?>
							<input type="password" class="form-control" id="password" placeholder="Confirm" autocomplete="off" name="captcha"> </input></br>
						</div>
						<div class="form-group">
							<p>Not registered? <a><?php echo anchor("login/index","Sign Up"); ?></a> | <a ><?php echo anchor("login/forget","Forgot Password?"); ?></a></p>
						</div>
						<div class="form-group">
							<input type="submit" value="Sign In" class="btn btn-primary">
						</div>
					</form>
					<!-- END Sign In Form -->


				</div>
			</div>
		</div>

