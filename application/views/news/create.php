<h2><?php echo $title;?></h2>
<?php echo validation_errors();?>

<?php echo form_open("news/create");?>
<label for="title">Title</label>
<input type="input" name="title"/></br>

<select name="category1">
<option value="1">教案</option>
<option value="2">PPT</option>
<option value="3">教案</option>
<option value="4">PPT</option>
</select>

<select name="category2">
<option value="1">高中</option>
<option value="2">初中</option>
</select>

<select name="category3">
<option value="1">数学</option>
<option value="2">英语</option>
</select>

<br/>
<label for="text">Text</label>
<textarea name="text"> </textarea></br>

<input type="submit" name="submit" value="create news item"/>
</form>

<?php echo anchor("pages/index","Click here"); ?>