
<h2><?php echo $title ?></h2>
<?php foreach ( $news as $news_item):?>
	<h3><?php echo $news_item["name"];?></h3>
	<div class="main">
		<?php echo $news_item["text"];?>
	</div>
<!--	<p><a href="<?php echo site_url("news/view/".$news_item["slug"])?>">View Article</a></p> -->
<?php endforeach; ?>

<?php echo anchor("news/create","Click here"); ?>