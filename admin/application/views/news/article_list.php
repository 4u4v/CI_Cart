<?php $this->load->view('header');?>

<body>
	<table width='700' border='1'>
		<tr>
			<th>编号</th>
			<th>标题</th>
			<th>分类</th>
			<th>作者</th>
			<th>添加时间</th>
			<th>操作</th>
		</tr>
	   <?php foreach($article as $row) : ?>
			<tr>
				<td><?php echo $row['id'] ?></td>
				<td><?php echo $row['title'] ?></td>
				<td><?php echo $row['cat_name'] ?></td>
				<td><?php echo $row['author'] ?></td>
				<td><?php echo $row['add_time'] ?></td>
				<td><a href="<?php echo site_url('news/article/edit').'?id='.$row['id'];?>" >编辑</a> 
	<a href="javascript:if(confirm('确实要删除吗?')) location='<?php echo site_url('news/article/delete').'/'.$row['id'];?>'" >删除</a></td>
			</tr>
	   <?php endforeach; ?>
	</table>
	<div id="turn-page">
    <?php echo $pageinfo;?>
    </div>
<?php $this->load->view('footer');?>