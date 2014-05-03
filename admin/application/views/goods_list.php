<?php echo $this->load->view('header');?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/base.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/general.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/main.css');?>" />
</head>
<body>

<div class="cat_menu"><span><a href="<?php echo site_url('goods/add');?>">==>添加商品</a></span></div>

<form method="post" action="" name="listForm" onsubmit="return confirmSubmit(this)">
  <!-- start goods list -->
	<div class="list-div" id="listDiv">
		<table cellpadding="3" cellspacing="1">
			<tbody>
				<tr>
					<th><input type="checkbox">编号</th>
					<th>商品名称</th>
					<th>货号</th>
					<th>价格</th>
					<th>上架</th>
					<th>精品</th>
					<th>新品</th>
					<th>热销</th>
					<th>推荐排序</th>
					<th>库存</th>
					<th>操作</th>
				</tr>
				<tr></tr>
				<?php foreach($goods_list as $row) : ?>
				<tr>
					<td><input type="checkbox" name="checkboxes[]" value="<?php echo $row['goods_id'];?>"><?php echo $row['goods_id'];?></td>
					<td class="first-cell"><span><?php echo $row['goods_name'];?></span></td>
					<td><span><?php echo $row['goods_sn'];?></span></td>
					<td align="right"><span><?php echo $row['shop_price'];?></span></td>
					<td align="center"><img src="<?php echo base_url()?>images/yes.gif" onclick=""></td>
					<td align="center"><img src="<?php echo base_url()?>images/yes.gif" onclick=""></td>
					<td align="center"><img src="<?php echo base_url()?>images/yes.gif" onclick=""></td>
					<td align="center"><img src="<?php echo base_url()?>images/yes.gif" onclick=""></td>
					<td align="center"><span onclick=""><?php echo $row['click_count'];?></span></td>
					<td align="right"><span onclick=""><?php echo $row['goods_number'];?></span></td>
					<td align="center">
						<a href="../goods.php?id=<?php echo $row['goods_id'];?>" target="_blank" title="查看"><img src="<?php echo base_url()?>images/icon/view.gif" width="16" height="16" border="0"></a>
						<a href="<?php echo site_url('goods/edit').'/'.$row['goods_id'];?>" title="编辑"><img src="<?php echo base_url()?>images/icon/edit.gif" width="16" height="16" border="0"></a>
						<a href="<?php echo site_url('goods/copy/').$row['goods_id'];?>" title="复制"><img src="<?php echo base_url()?>images/icon/copy.gif" width="16" height="16" border="0"></a>
						<a href="javascript:;" onclick="listTable.remove(32, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="<?php echo base_url()?>images/icon/trash.gif" width="16" height="16" border="0"></a>						<a href="goods.php?act=product_list&amp;goods_id=32" title="货品列表"><img src="<?php echo base_url()?>images/icon/docs.gif" width="16" height="16" border="0"></a>
					</td>
				</tr>
			<?php endforeach; ?>
  </tbody>
 </table>
 </div>
<!-- end goods list -->

<?php $this->load->view('footer');?>
