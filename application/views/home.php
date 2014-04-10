<?php $this->load->view('header');?>

<body>
<div class="home_body">

<?php 
	echo $body;
?>
<ul>
<?php foreach($article as $row) : ?>
	<li>
<a target="_blank" href="<?php echo site_url('article/show').'?id='.$row['id'];?>"><?php echo $row['title'] ?></a>
 | <?php echo $row['author'] ?> | <?php echo $row['add_time'] ?>
	</li>
<?php endforeach; ?>
</ul>
</div>

<?php $this->load->view('footer');?>