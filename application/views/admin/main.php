



<div class="container clearfix">
<div class="row">
<div class="col-md-12">
    <div class="course-zz">

        <div class="course-list">
            <div class="js-course-lists">
                <ul>

<?php foreach ($get_article_list as  $value) {  ?>
        <li class="course-one">
             <a  href="<?php echo site_url('frame/index2/'.$value->id) ?>" target="_blank">
            <div class="course-list-img">
                <img width="240" height="135" alt="<?php echo $value->name ?>" src="<?php echo $value->http ?>">
            </div>
            <h5>
                <span><?php echo $value->name ?></span>
            </h5>
            <div class="tips">
                <p class="text-ellipsis"><span><?php echo $value->text ?></span></p>
                <span class="l "><?php echo $value->thumbs_up ?> 赞</span>

                <span class="l ml20">
                    <?php echo $value->overview ?>人看过
                </span>
            </div>
            <span class="time-label">4章</span>
            <b class="follow-label">跟我学</b>
        </a>
    </li>
<?php } ?>  

                </ul>
            </div>
            </div> 
</div>
</div>

