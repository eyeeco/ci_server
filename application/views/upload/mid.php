
<!--左栏      全部课程    页-->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="<?php echo site_url('frame/index')?>" ><i class="lnr lnr-home"></i> <span>全部课程</span></a></li>
						<li><a href="<?php echo site_url('upload/main')?>" class="active"><i class="lnr lnr-upload"></i> <span>上传课程</span></a></li>
					</ul>
				</nav>
			</div>
		</div>

<!--右栏      全部课程    页-->

		<div class="main">
		<div class="main-content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-4">

								
								<div class="panel">
                                <div class="panel-heading">
                                <h3 class="panel-title">课程信息</h3>
                                </div>
                                <div class="panel-body">
                              <?php if ($status == 'baseinfos') { ?>
    <!-- 课程基本信息  -->
								    <?php echo form_open_multipart('upload'); ?>
								        <div class="errmsg"><?php echo validation_errors(); ?></div>
								        <div class="errmsg"><?php echo isset($imgerr) ? $imgerr : ''; ?></div>
								        <p>
								            <span>课程名称：</span>
								            <input type="text" name="name" class="form-control" placeholder="课程名称："/>
								        </p>
								        <p>
								            <span>课程分类：</span>
								            <select name="cat2" class="form-control">
								                <option value="">请选择学科级别</option>
								<?php           foreach($cats[1] as $cat) { ?>
								                <option value="<?php echo $cat['category_id']; ?>"><?php echo $cat['category_name']; ?></option>
								<?php           } ?>
								            </select>
								            <br/>
								            <select name="cat1" class="form-control">
								                <option value="">请选择学科类目</option>
								<?php           foreach($cats[0] as $cat) { ?>
								                <option value="<?php echo $cat['category_id']; ?>"><?php echo $cat['category_name']; ?></option>
								<?php           } ?>
								            </select>
								        </p>
								        <p><span>课程简介：</span></p>
								        <textarea name="text" class="form-control" placeholder="textarea" rows="4"></textarea>
								        <p>
								            <span>封面图片：</span>
								            <input type="file" name="img" class="form-control" />
								        </p>
								        <p><input type="submit" name="article" value="设置课程信息" class="form-control"/></p>
								    </form>

									     <?php } else { ?>
								    <!-- 课程名称  -->
								    <p>课程名称：<?php echo $article['name']; ?></p>
								    <p>课程分类：<?php echo $article['cat2'].'，'.$article['cat1']; ?></p>
								    <p>课程简介：<?php echo html_escape($article['text']); ?></p>
								    
								    <p>封面图片：</p>
								    <p><img width="200px" src="<?php echo $article['img']; ?>" alt="封面图片" /></p>
								    <hr />

                                </div>
                          </div>
                          </div>

                          <div class="col-md-8">
                          	<div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">课程信息</h3>
                                </div>
                                <div class="panel-body">
                              
<?php if (!empty($records)) { ?>
<?php   foreach ($records as $chapter) { ?>
    <div class="chapter">
        <p>资料标题：<?php echo $chapter['fname']; ?></p>
        <p>资料文件：<?php echo $chapter['rname']; ?></p>
    </div>
<?php   } ?>
<?php } ?>

<?php if ($status == 'chapters') { ?>
    <?php echo form_open_multipart('upload'); ?>
        <div class="errmsg"><?php echo $upload_err; ?></div>
        <p><span>资料标题：</span><input type="text" name="fname" class="form-control" /></p>
        <p><span>资料文件：</span><input type="file" name="fpath" class="form-control" /></p>
        <p><input type="submit" name="uploadchapter" value="上传本章" class="form-control"/></p>
    </form>
<?php } ?>

<?php if (!empty($records) && $status == 'chapters') { ?>
    <?php echo form_open('upload', array('method' => 'post', 'onclick' => "return confirm('确定要结束本次上传吗？');")); ?>
        <input type="submit" name="gofinish" value="结束本次上传" class="form-control"/>
    <form>
<?php } ?>

<?php if ($status == 'finish') { ?>
    <?php echo form_open_multipart('upload'); ?>
        <input type="submit" name="finish" value="确定" class="form-control"/>
    </form>
<?php } ?>


<?php } ?>
                                </div>
                           </div>
                          </div>

                          </div>
                          </div>
                          </div>


		
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>

<script>
    function confirmGoFinish() {
        return confirm('确定要结束本次上传吗？');
    }
</script>


