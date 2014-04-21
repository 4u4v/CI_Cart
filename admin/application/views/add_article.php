<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>添加文章</title>
	<style>
		
	</style>
</head>
<body>
	<form action="<?php echo site_url('article/insert')?>" method="post">
		<fieldset>
			<legend>添加文章</legend>
			<ul>
				<li><label for="">标题</label><input type="text" name="title"/></li>
				<li><label for="">作者</label><input type="text" name="author"/></li>
				<li><label for="">分类</label>
				<select name="cat_list">
				<option value="0" selected="selected">请选择文章分类!</option>
				<?php foreach($cat_list as $row) : ?>
				<option value="<?php echo $row['id'];?>"><?php echo $row['cat_name'];?></option>
				<?php endforeach; ?>
				</select>
				</li>	
				<li><label for="">正文</label><textarea name="content" id="" cols="100" rows="7"></textarea></li>
				<li><label for="">&nbsp;&nbsp;</label><input type="submit" name="btn" value="添加"/></li>
				<input type="hidden" name="act" value="add" />
			</ul>
		</fieldset>	
	</form>
	
</body>
</html>