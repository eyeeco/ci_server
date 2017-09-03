
<!--左栏      全部课程2    页-->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="<?php echo site_url('frame/index')?>" class="active"><i class="lnr lnr-home"></i> <span>全部课程</span></a></li>
					</ul>
				</nav>
			</div>
		</div>

<!--右栏      全部课程2    页-->

		<div class="main">
		
					<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="panel">
							<div class="panel-heading">
									<h1 class="panel-title">全部课程/<?php  echo get_object_vars($ca2_info[0])["category_name"]?>/<?php
									 echo get_object_vars($ca1_info[0])["category_name"]?></h1>
							</div>

							<div class="panel-body">

							<div class="row">
								<div class="col-md-8" style="margin-bottom: 20px;font-size:50px">
								
								<p><?php echo get_object_vars($article_info[0])["name"]  ?></p>
								</div>
							</div>
									<div class="row">
												<div class="col-md-3">
													<div class="metric">
														<span class="icon"><i class="fa fa-eye"></i></span>
														<p>
															<span class="number"><?php echo get_object_vars($article_info[0])["overview"]  ?></span>
															<span class="title">点击</span>
														</p>
													</div>
												</div>
												<div class="col-md-3">
												
													<div class="metric">
														<a href="<?php echo site_url('frame/index2/'.$this->uri->segment(3).'/1')?>">
														<span class="icon"><i class="fa fa-heart"></i></span>
														</a>
														<p>
															<span class="number"><?php echo $thumbs_up  ?></span>
															<span class="title">点赞</span>
														</p>
													
													</div>

												</div>
												<div class="col-md-3">
													<div class="metric">
														<span class="icon"><i class="fa fa-download"></i></span>
														<p>
															<span class="number">0</span>
															<span class="title">下载</span>
														</p>
													</div>
												</div>

												<div class="col-md-3">
													<div class="metric">
														<span class="icon"><i class="fa fa-bar-chart"></i></span>
														<p>
															<span class="number">35%</span>
															<span class="title">评分</span>
														</p>
													</div>
												</div>
										</div>
							</div>
						</div>
					</div>
				</div>
					<div class="row">
						<div class="col-md-8">
							<!-- BUTTONS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">资料简介</h3>
								</div>
								<div class="panel-body">
									<p>
										<?php echo get_object_vars($article_info[0])["text"]  ?>
									</p>
									<!---->
								</div>
							</div>
							<!-- END BUTTONS -->
							
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">课程资料</h3>
								</div>
								<div class="panel-body">
									<?php 
									foreach ($file as $key => $value) {
										# code...
									
									?>

									<h3>
									<span><?php echo $value['fname']?></span>		
									

									<span style="float: right;">
								

									<a href="<?php echo  $value['fpath'] ?> " target="_blank">
									<button class="btn btn-primary" type="button">
								 	查看
									</button>
									</a>

									
									</span>
									</h3>

									<?php 
									}
									?>
								</div>
							</div>
				
						</div>
						<div class="col-md-4">
							<!-- LABELS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">作者</h3>
								</div>
								<div class="panel-body">
									<div class="row">
									<div class="col-md-6">
									
										<img src="assets/img/user-medium.png" class="img-circle" alt="Avatar">
									
									</div>
									<div class="col-md-6">
										<h3 class="name"><?php echo get_object_vars($article_info[0])["author"]  ?></h3>
										<span class="online-status status-available">Available</span>
									
									</div>
									</div>
									<br>
									<br>
									<div class="row">
									<div class="col-md-12">
									<span class="label label-default">作家</span>
									<span class="label label-primary">高级教师</span>
									</div>
									</div>
									<br>
									
									<p>
										<?php echo get_object_vars($article_info[0])["text"]  ?>
									</p>
									
									
									<br>
								
									
									
									<button class="btn btn-primary" type="button">
										联系他 </button>
								</div>
							</div>
							<!-- END LABELS -->
							
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>


