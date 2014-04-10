<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>编辑文章</title>
	<style>
		
	</style>
</head>
<body>
	<form action="<?php echo site_url('article/update')."?id=".$id; ?>" method="post">
		<fieldset>
			<legend>编辑文章</legend>
			<ul>
				<li><label for="">标题</label><input value="<?php echo $title;?>" type="text" name="title"/></li>
				<li><label for="">作者</label><input value="<?php echo $author;?>" type="text" name="author"/></li>
				<li><label for="">正文</label><textarea name="content" cols="100" rows="7"><?php echo $content;?></textarea></li>
				<!-- <li><label for="">发布时间</label><input value="<?php echo $add_time;?>" type="text" name="add_time"/></li> -->
				<li><label for="">&nbsp;&nbsp;</label><input type="submit" name="btn" value="更新"/></li>
				<input type="hidden" name="act" value="edit" />
			</ul>
		</fieldset>	
	</form>
	
</body>
</html>