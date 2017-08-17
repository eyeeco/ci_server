<div class="container clearfix">
<div class="row">
<div class="col-md-12">
    <div class="course-nav-box panel panel-headline" style="padding:20px;margin-top:20px">
        <div class="nav-container">
            
            
            <div class="direction">
                <div class="head">高中： </div>
                <div class="choice">
                    <span class="current"><?php echo anchor('admin/main/1/',"所有",'target="mainFrame"') ?></span>
                    <?php foreach($category as $row){ ?>
                    <span><?php echo anchor('admin/main/1/'.$row->category_id,$row->category_name,'target="mainFrame"') ?></span>
                    <?php } ?>
                </div>
            </div>

            <div class="direction">
                <div class="head">初中：</div>
                <div class="choice">
                    <span class=""><?php echo anchor('admin/main/2/',"所有",'target="mainFrame"') ?></span>
                    <?php foreach($category as $row){ ?>
                    <span><?php echo anchor('admin/main/2/'.$row->category_id,$row->category_name,'target="mainFrame"') ?></span>
                    <?php } ?>
                </div>
            </div>

        </div>
        <!--<div class="newCourse"><span class="news">最新</span><span class="news">最热</span></div>  -->
    </div>
    </div>
 </div>
</div>