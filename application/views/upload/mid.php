
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
                              
<?php if (!empty($records[0])) { ?>
<?php   foreach ($records[0] as $chapter) { ?>
    <div class="chapter">
        <p>第<?php echo $chapter['cid']; ?>章资料上传：</p>
        <p>教案：<?php echo $chapter['file1']; ?></p>
        <p>PPT：<?php echo $chapter['file2']; ?></p>
        <p>测试：<?php echo $chapter['file3']; ?></p>
    </div>
<?php   } ?>
<?php } ?>

<?php if ($status == 'chapters') { ?>
    <?php echo form_open_multipart('upload'); ?>
        <p>第<?php echo $maxcid + 1; ?>章资料上传：</p>
        <p>
            <span>教学备案：</span><input type="file" name="file1" class="form-control"/>
            <span class="errmsg"><?php echo isset($upload_err) ? $upload_err[1] : ''; ?></span>
        </p>
        <p>
            <span>讲课PPT：</span><input type="file" name="file2" class="form-control"/>
            <span class="errmsg"><?php echo isset($upload_err) ? $upload_err[2] : ''; ?></span>
        </p>
        <p>
            <span>单元总结测试：</span><input type="file" name="file3" class="form-control"/>
            <span class="errmsg"><?php echo isset($upload_err) ? $upload_err[3] : ''; ?></span>
        </p>
        <p><input type="submit" name="uploadchapter" value="上传本章" class="form-control"/></p>
    </form>
<?php } ?>

<?php if (!empty($records[0]) && $status == 'chapters') { ?>
    <?php echo form_open('upload', array('method' => 'post')); ?>
        <input type="submit" name="goexam" value="不再上传资料，开始上传考试内容" class="form-control"/>
    <form>
<?php } ?>

<?php if (in_array($status, array('midexam', 'endexam', 'finished'))) { ?>
    <h2>考试</h2>
<?php } ?>

<?php if ($status == 'midexam') { ?>
    <?php echo form_open_multipart('upload'); ?>
        <p>期中.</p>
        <p>
            <span>试卷1：</span><input type="file" name="file1" class="form-control">
            <span class="errmsg"><?php echo isset($upload_err) ? $upload_err[1] : ''; ?></span>
        </p>
        <p>
            <span>试卷2：</span><input type="file" name="file2" class="form-control">
            <span class="errmsg"><?php echo isset($upload_err) ? $upload_err[2] : ''; ?></span>
        </p>
        <p>
            <span>试卷3：</span><input type="file" name="file3" class="form-control">
            <span class="errmsg"><?php echo isset($upload_err) ? $upload_err[3] : ''; ?></span>
        </p>
        <p><input type="submit" name="uploadmidexam" value="上传期中试卷" class="form-control"></p>
    </form>
    <?php echo form_open('upload', array('method' => 'post')); ?>
        <input type="submit" name="goendexam" value="无期中试卷，去上传期末试卷" class="form-control" />
    </form>
<?php } ?>

<?php if (!empty($records[1][0])) { ?>
    <div class="chapter">
        <p>期中.</p>
        <p>试卷1：<?php echo $records[1][0]['file1']; ?></p>
        <p>试卷2：<?php echo $records[1][0]['file2']; ?></p>
        <p>试卷3：<?php echo $records[1][0]['file3']; ?></p>
    </div>
<?php } ?>

<?php if ($status == 'endexam') { ?>
    <?php echo form_open_multipart('upload'); ?>
        <p>期末.</p>
        <p>
            <span>试卷1：</span><input type="file" name="file1" class="form-control">
            <span class="errmsg"><?php echo isset($upload_err) ? $upload_err[1] : ''; ?></span>
        </p>
        <p>
            <span>试卷2：</span><input type="file" name="file2" class="form-control">
            <span class="errmsg"><?php echo isset($upload_err) ? $upload_err[2] : ''; ?></span>
        </p>
        <p>
            <span>试卷3：</span><input type="file" name="file3" class="form-control">
            <span class="errmsg"><?php echo isset($upload_err) ? $upload_err[3] : ''; ?></span>
        </p>
        <p><input type="submit" name="uploadendexam" value="上传期末试卷" class="form-control"></p>
    </form>
    <?php echo form_open('upload', array('method' => 'post')); ?>
        <input type="submit" name="gofinish" value="无期末试卷，结束本次上传" class="form-control"/>
    </form>
<?php } ?>

<?php if (!empty($records[1][1])) { ?>
    <div class="chapter">
        <p>期末.</p>
        <p>试卷1：<?php echo $records[1][1]['file1']; ?></p>
        <p>试卷2：<?php echo $records[1][1]['file2']; ?></p>
        <p>试卷3：<?php echo $records[1][1]['file3']; ?></p>
    </div>
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


