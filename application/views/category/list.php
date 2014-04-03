<?php $this->load->view('header'); ?>

<?php foreach ($categories as $cate_item): ?>
    <ul>
    <li><?php echo $cate_item['id'] ?>. <a href="list.php?cat=<?php echo $cate_item['id'] ?>"><?php echo $cate_item['cat_name'] ?></a></li>
    </ul>
<?php endforeach ?>

<?php $this->load->view('footer'); ?>