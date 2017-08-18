

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="assets/img/logo-dark.png" alt="Klorofil Logo"></div>
								
							</div>

							<?php 
						$attributes = array('class' => 'form-auth-small');
						echo form_open("login/login_real",$attributes);
						?>
								<div class="form-group">
							<label for="username" class="sr-only">用户名</label>
							<input type="text" class="form-control" id="username" placeholder="用户名" autocomplete="off" name="user" >
						</div>
						<div class="form-group">
							<label for="password" class="sr-only">密码</label>
							<input type="password" class="form-control" id="password" placeholder="密码" autocomplete="off" name="password">
						</div>
						<!--
						<div class="form-group">
						    <?php echo $cap["image"];?>
							<input type="password" class="form-control" id="password" placeholder="Confirm" autocomplete="off" name="captcha"> </input></br>
						</div>
						-->
								<button type="submit" class="btn btn-primary btn-lg btn-block">
									登录
								</button>
							</form>
						</div>
					</div>

					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<p class="heading" style="font-size: 60px">聪迅家教</p>
							<p style="font-size: 30px">资源分享平台</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>