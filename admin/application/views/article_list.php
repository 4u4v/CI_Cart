<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
</head>
<body>
	<table width='700' border='1'>
		<tr>
			<th>编号</th>
			<th>标题</th>
			<th>作者</th>
			<th>添加时间</th>
			<th>操作</th>
		</tr>
	   <?php foreach($article as $row) : ?>
			<tr>
				<td><?php echo $row['id'] ?></td>
				<td><?php echo $row['title'] ?></td>
				<td><?php echo $row['author'] ?></td>
				<td><?php echo $row['add_time'] ?></td>
				<td><a href="<?php echo site_url('article/edit') ;?>" >编辑</a> 
					<a href="<?php echo site_url('article/delete');?>" >删除</a></td>
			</tr>
	   <?php endforeach; ?>
	</table>
</body>
</html>